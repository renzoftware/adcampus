<?php
    $u=null;
    if(Session::getUID()!=""){
        $u = UserData::getById(Session::getUID());
        $idusuario = $u->id;
        $tipo_usuario = $u->user_type;

        $title_page = "";
        $lista_campusasignados = null;
        switch ($tipo_usuario) {
            case 2: /* Técnicos */
                $title_page = "Panel de Atención";
                $lista_campusasignados = UExpTecnicosData::getCampus_ByUsuAsignado($idusuario);
                break;
                
            case 5: /* Analistas */
                $title_page = "Panel de <b>PROVEEDORES</b>";
                $lista_campusasignados = UExpTecnicosData::getCampus_ByUsuAsignado(9);
                break;
            
            default:
                $title_page = "";
                break;
        }

    }
    else{
        echo "<script>window.location='index.php';</script>";
    }
?>
<!-- <script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" type="text/javascript"></script> -->
<style type="text/css">
    .table th, .table td {
        padding: 0.25rem;
    }

    .selected {
        background-color: #e0f3ff !important;
    }
    .dataTables_filter,
    .dataTables_length {
        float: right !important;
        padding-right: 10px;
    }

    .d-block {
        display: table-row !important;
    }

    @media (max-width: 991.98px) {
    .app-page-title .page-title-icon,
    .ui-theme-settings {
        display: none !important;
        }
    }

    .parpadea {
        animation-name: parpadeo;
        animation-duration: 1s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;

        -webkit-animation-name:parpadeo;
        -webkit-animation-duration: 1s;
        -webkit-animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
    }

    @-moz-keyframes parpadeo{  
        0% { opacity: 1.0; }
        50% { opacity: 0.0; }
        100% { opacity: 1.0; }
    }

    @-webkit-keyframes parpadeo {  
        0% { opacity: 1.0; }
        50% { opacity: 0.0; }
        100% { opacity: 1.0; }
    }

    @keyframes parpadeo {  
        0% { opacity: 1.0; }
        50% { opacity: 0.0; }
        100% { opacity: 1.0; }
    }

</style>

<div class="app-main__inner">
    <div class="app-page-title mb-1">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph text-success">
                    </i>
                </div>
                <div><?php echo $title_page; ?> 
                    <div class="page-title-subheading">Tareas e Incidentes 
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <!-- Filtro Campus -->
                <div class="d-inline-block dropdown">
                    <select name="sel_filtro_uexpl" id="sel_filtro_uexpl" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required >
                        <option value=""> - Campus - </option>
                    <?php
                        foreach ($lista_campusasignados as $row_campus_asignado) {
                    ?>
                        <option class="block-element-btn-example-1" value="<?php echo $row_campus_asignado->UExp_nIdUnExp?>"><?php echo $row_campus_asignado->UExp_vNombre ;?></option>
                    <?php
                            
                        }
                    ?>
                    </select>
                </div>
            </div>   
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="main-card mb-3 card">
                <div class="grid-menu grid-menu-2col">
                    <!-- DIV Total Incidentes por prioridad -->
                    <div id="div_incprioridad_total" class="no-gutters row element-block-example">

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- DIV Lista de incidentes según Prioridad seleccionada -->
    <div class="row" id="div_incprioridad_lista">
        
    </div>

    <!-- Modal Finalizar -->
    <div class="modal fade" id="modal_finalizar" tabindex="-1" role="dialog" aria-labelledby="modal_finalizarLabel" aria-hidden="true">
        <form class="" id="form_finalizar" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input name="txt_fin_xid" id="txt_fin_xid" type="hidden">
                    <input name="txt_fin_xprio" id="txt_fin_xprio" type="hidden">

                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_finalizarLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <textarea name="txt_fin_comentario" type="text" rows="1" id="txt_fin_comentario" class="form-control" maxlength="250"  placeholder="Ingresar comentario final" required  oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" ></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="position-relative form-group text-center">
                            <span class="clearfix"></span>                            
                            <label class="btn btn-primary btn-file"> <i class="fa fa-camera"></i> Tomar Foto <br/>
                                <input type="file" name="imagen" id="imagen" required="required" accept="image/*" capture oninvalid="this.setCustomValidity('Foto requerida')" oninput="setCustomValidity('')" >
                            </label>

                            <div class="image-area text-center">
                                <img id="imgSalida" style="max-height: 185px !important;" src="../img/image-upload3.png" alt="" class=" rounded shadow-sm img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btn_close" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success" id="btn_finalizar" type="submit">Solucionado</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal En Curso -->
    <div class="modal fade" id="modal_encurso" tabindex="-1" role="dialog" aria-labelledby="modal_encursoLabel" aria-hidden="true">
        <form class="" id="form_encurso">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input name="txt_encurso_xid" id="txt_encurso_xid" type="hidden">
                    <input name="txt_encurso_xprio" id="txt_encurso_xprio" type="hidden">

                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_encursoLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <input type="text" name="txt_encurso_comentario" id="txt_encurso_comentario" class="form-control" maxlength="250"  placeholder="Ingresar Comentario" required></input>
                                </div>
                            </div>
                        </div>

                         <div class="form-row">
                            <div class="col-md-12">
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" id="chk_material" class="custom-control-input" onclick="ShowHideDiv(this)" >
                                    <label class="custom-control-label" for="chk_material">¿Solicitar Material?</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <input type="text" name="txt_encurso_material" id="txt_encurso_material" class="form-control" maxlength="250" placeholder="" readonly></input>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btn_close_encurso" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success" id="btn_encurso" type="submit">En Curso</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

<script>
    $(document).ready(function() {        
        carga_Inc_Prioridad_Total();

        $("#sel_filtro_uexpl").change(function(){
            carga_Inc_Prioridad_Total();
        })


        $( "input:checkbox[name=chk_material]" ).on( "click", function(e){
            console.log(1);
        }) ;

        /* Formulario para Finalizar Ticket (ATENDIDO)*/
        $(document).on('submit', '#form_finalizar', function(e){
            e.preventDefault();
            var xprio = $("#txt_fin_xprio").val();

            $("#btn_finalizar").attr("disabled","disabled");

            var form_data = new FormData(this);
            form_data.append("opt", "upd_atendido");

            $.ajax({
                type: "POST",
                url: "../?action=upd_incidente",
                data: form_data,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#page-loader').fadeIn(500);
                },
                success: function(data) {
                    $('#form_finalizar')[0].reset();
                    $('#imagen').val('');
                    $('#imgSalida').attr("src", "../img/image-upload3.png");

                    $("#modal_finalizar").modal('hide');//ocultamos el modal
                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                    $('.modal-backdrop').remove();

                    if(data=="1"){
                        toastr.success('Actualización Exitosa',"Realizado");
                        carga_Inc_Prioridad_Total();
                        carga_Inc_Prioridad_Lista(xprio);
                        // $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
                    }
                    else{
                        toastr.warning('Hubo un error al registrar');
                    } 
                },
                complete:function(){
                    $('#page-loader').fadeOut(500);
                }
            });

            $("#btn_finalizar").removeAttr("disabled");
        }) 

        /* Formulario para Actualizar Ticket (EN CURSO)*/
        $(document).on('submit', '#form_encurso', function(e){
            e.preventDefault();
            var xprio = $("#txt_encurso_xprio").val();

            $("#btn_encurso").attr("disabled","disabled");

            var form_data = new FormData(this);
            form_data.append("opt", "upd_encurso");

            $.ajax({
                type: "POST",
                url: "../?action=upd_incidente",
                data: form_data,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#page-loader').fadeIn(500);
                },
                success: function(data) {
                    $('#form_encurso')[0].reset();

                    $("#modal_encurso").modal('hide');//ocultamos el modal
                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                    $('.modal-backdrop').remove();

                    if(data=="1"){
                        toastr.success('Actualización Exitosa',"Realizado");
                        carga_Inc_Prioridad_Total();
                        carga_Inc_Prioridad_Lista(xprio);
                    }
                    else{
                        toastr.warning('Hubo un error al actualizar');
                    } 
                },
                complete:function(){
                    $('#page-loader').fadeOut(500);
                }
            });

            $("#btn_encurso").removeAttr("disabled");
        })

    });

    /* INICIO Funcion carga imagen */
    $('#imagen').change(function(e) {
      addImage(e); 
    });

    function addImage(e){
        var file = e.target.files[0],
        imageType = /image.*/;
        
        if (!file.type.match(imageType))
        return;
      
        var reader = new FileReader();
        reader.onload = fileOnload;
        reader.readAsDataURL(file);
    }
  
    function fileOnload(e) {
        var result=e.target.result;
        $('#imgSalida').attr("src",result);
        // console.log(result);
    }
    /* FIN Funcion carga imagen */

    /* Muestra Total de Incidentes por Prioridad */
    function carga_Inc_Prioridad_Total(){
        $("#div_incprioridad_lista").empty();
        $.ajax({
            type: "POST",
            url: "../?action=get_incidentes_priototal", 
            data: {
                campus : $("#sel_filtro_uexpl").val(),
                opt : null
            },
            beforeSend: function() {
              $('#page-loader').fadeIn(500);
            },
            success: function(data) {
                $("#div_incprioridad_total").html(data);
                $('[data-toggle="tooltip"]').tooltip();                 
            },
            error: function(xhr,textStatus,err){
                console.log("readyState: " + xhr.readyState);
                console.log("responseText: "+ xhr.responseText);
                console.log("status: " + xhr.status);
                console.log("text status: " + textStatus);
                console.log("error: " + err);
            },
            complete: function() {
                $('#page-loader').fadeOut(500);
                $(".mostrar_lista").on("click", function(e){
                    $('html, body').animate({
                        scrollTop: $("#div_incprioridad_lista").offset().top
                     }, 2000);
                    carga_Inc_Prioridad_Lista($(this).data("xval"));
                })

            }
        });
    }

    /* Muestra Total de Incidentes por Prioridad */
    function carga_Inc_Prioridad_Lista(prio){
        $.ajax({
            type: "POST",
            url: "../?action=get_incidentes_priolista", 
            data: {
                campus : $("#sel_filtro_uexpl").val(),
                prio : prio,
                opt : null
            },
            beforeSend: function() {
              $('#page-loader').fadeIn(500);
            },
            success: function(data) {
                $("#div_incprioridad_lista").html(data);
                $('[data-toggle="tooltip"]').tooltip();                 
            },
            error: function(xhr,textStatus,err){
                console.log("readyState: " + xhr.readyState);
                console.log("responseText: "+ xhr.responseText);
                console.log("status: " + xhr.status);
                console.log("text status: " + textStatus);
                console.log("error: " + err);
            },
            complete: function() {
                $('#page-loader').fadeOut(500);
                load_script01()
            }
        });
    }

    function load_script01(){
        /* UPD ESTADO INCIDENTE */
        $(".upd_inc_estat").on("click", function(e){
            var xvalue = $(this).data("xvalue");
            var xprio = $(this).data("xprio");
            var xid = $(this).data("xid");
            var xtitle = $(this).data("xtitle");
            var xstatus = $(this).data("xopt");
            // var txt = "";

            if(xstatus==2){
                txt = "<b class='text-warning'>" + $(this).text() + "</b>";
                xlabel = "EN CURSO";
                xclassname = "btn-warning";
            }
            else if(xstatus==3){
                txt = "<b class='text-success'>" + $(this).text() + "</b>";
                xlabel = "SOLUCIONADO";
                xclassname = "btn-success";
            }

            var boot_temp= bootbox.prompt({
                title: xtitle, 
                message: '<p>Nuevo estado: '+ txt +'. Ingresar comentario:</p>',
                buttons: { 
                    cancel: { 
                        label: "Cancelar"
                    },
                    confirm:{
                        label: xlabel,
                        className: xclassname,
                    }
                },
                value: xvalue,
                callback: function (result) {
                    if(result != null){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_incidente",
                            data: {
                                opt: "upd_estado_at",
                                xval: result,
                                xstatus : xstatus,
                                xid: xid
                            },
                            beforeSend: function() {
                                $('#page-loader').fadeIn(500);
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Actualización Realizada.',"Incidentes");
                                    carga_Inc_Prioridad_Total();
                                    carga_Inc_Prioridad_Lista(xprio);
                                }
                                else{
                                    toastr.error('Error inesperado. Verificar con webmaster.', 'ERROR');
                                }
                            },
                            error: function(xhr,textStatus,err){
                                console.log("readyState: " + xhr.readyState);
                                console.log("responseText: "+ xhr.responseText);
                                console.log("status: " + xhr.status);
                                console.log("text status: " + textStatus);
                                console.log("error: " + err);
                            },
                            complete: function() {
                                $('#page-loader').fadeOut(500);
                            }            
                        });
                    }
                }
            });
        });

        /* DERIVAR A PROVEEDOR */
        $(".upd_inc_prov").on('click', function(event){
            var xprio = $(this).data("xprio");
            var xid = $(this).data("xid");

            bootbox.confirm({
                message: "¿Estás seguro de derivar la incidencia a <b> PROVEEDOR </b>?",
                buttons: {
                    confirm: {
                        label: 'Derivar',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Cerrar',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if(result){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_incidente",
                            data: {
                                opt: "upd_asigna_proveedor",
                                xid: xid
                            },
                            beforeSend: function() {
                                $('#page-loader').fadeIn(500);
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se asignó a proveedor',"Realizado");
                                    carga_Inc_Prioridad_Total();
                                    carga_Inc_Prioridad_Lista(xprio);
                                }
                                else{
                                    toastr.error('Error - Verificar con webmaster.', 'ERROR');
                                }
                            },
                            error: function(xhr,textStatus,err){
                                console.log("readyState: " + xhr.readyState);
                                console.log("responseText: "+ xhr.responseText);
                                console.log("status: " + xhr.status);
                                console.log("text status: " + textStatus);
                                console.log("error: " + err);
                            },
                            complete: function() {
                                $('#page-loader').fadeOut(500);
                            }            
                        });
                        
                    }
                }
            });
        });

        /* EN CURSO */
        $(".upd_encurso").on("click", function(e){
            var xid = $(this).data("xid");
            var xprio = $(this).data("xprio");
            var xtitle = $(this).data("xtitle");

            $('#txt_encurso_xid').val(xid);
            $('#txt_encurso_xprio').val(xprio);
            $("#modal_encursoLabel").text(xtitle);

            $("#txt_encurso_material").attr("readonly", "readonly");
            $('#chk_material').prop('checked', false);
        });

        /* ATENDIDO */
        $(".upd_final").on("click", function(e){
            var xid = $(this).data("xid");
            var xprio = $(this).data("xprio");
            var xtitle = $(this).data("xtitle");

            $('#txt_fin_xid').val(xid);
            $('#txt_fin_xprio').val(xprio);
            $("#modal_finalizarLabel").text(xtitle);
        });

    }

    function ShowHideDiv(chk_material) {
        var dvPassport = document.getElementById("dvPassport");
        chk_material.checked ? $("#txt_encurso_material").removeAttr("readonly") : $("#txt_encurso_material").attr("readonly", "readonly");
    }


</script>