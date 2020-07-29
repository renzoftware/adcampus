<?php
    $lista_uexpl = UExplData::getUExplAllActive_OrderByNombre();
    $lista_usariosasignados = UExpTecnicosData::getUsuariosAsigIncid();
?>

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
                <div>Tareas e Incidentes
                    <div class="page-title-subheading">Ingreso y asignación de tareas e incidentes 
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Nuevo Incidente" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark mostrar_add_inc">
                    <i class="fa fa-plus"></i>
                </button>
                <!-- Filtro Campus -->
                <div class="d-inline-block dropdown">
                    <select name="sel_filtro_uexpl" id="sel_filtro_uexpl" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required >
                        <option value=""> - Campus - </option>
                    <?php
                        foreach ($lista_uexpl as $row_uexpl) {
                    ?>
                        <option value="<?php echo $row_uexpl->UExp_nIdUnExp?>"><?php echo $row_uexpl->UExp_vNombre;?></option>
                    <?php
                            
                        }
                    ?>
                    </select>
                </div>

                <!-- Filtro Asignado -->
                <div class="d-inline-block dropdown">
                    <select type="select" name="sel_filtro_usu_asig" id="sel_filtro_usu_asig" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                        <option value=""> -Asignado- </option>
                    <?php
                        foreach ($lista_usariosasignados as $row_usuarioasignado) {
                    ?>
                        <option value="<?php echo $row_usuarioasignado->id; ?>"><?php echo $row_usuarioasignado->name;?></option>
                    <?php
                            
                        }
                    ?>
                    </select>
                </div>

                <!-- Filtro Prioridad -->
                <div class="d-inline-block dropdown">
                    <select type="select" name="sel_filtro_prioridad" id="sel_filtro_prioridad" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                        <option value=""> -Prioridad- </option>
                        <option value="0"> Bajo </option>
                        <option value="1"> Medio </option>
                        <option value="2"> Alto </option>
                        <option value="3"> URGENTE </option>
                    </select>
                </div>

                <!-- Filtro Estado -->
                <div class="d-inline-block dropdown">
                    <select type="select" name="sel_filtro_estado" id="sel_filtro_estado" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                        <option value=""> -Estado- </option>
                        <option value="1"> Pendiente </option>
                        <option value="2"> En Curso </option>
                        <option value="3"> Resuelto </option>
                    </select>
                </div>

                <!-- Filtro Material -->
                <div class="d-inline-block dropdown">
                    <select type="select" name="sel_filtro_material" id="sel_filtro_material" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                        <option value=""> - Material - </option>
                        <option value="1"> Si </option>
                        <option value="0"> No </option>
                    </select>
                </div>
            </div>    
        </div>
    </div>

    <div>
        <!-- DIV Registro de Incidente -->
        <div class="main-card mb-3 card" id="div_add_incidentes">
            <div class="card-body">
                <form class="" id="form_add_incidente" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-8">
                            <!-- Descripción -->
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="txt_new_descripcion" class="">Descripcion</label>
                                        <input name="txt_new_descripcion" id="txt_new_descripcion" type="text" class="form-control" maxlength="250" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- Campus -->
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="sel_new_uexpl" class="">Campus</label>
                                        <select name="sel_new_uexpl" id="sel_new_uexpl" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required >
                                            <option value=""> - Campus - </option>
                                        <?php
                                            foreach ($lista_uexpl as $row_uexpl) {
                                        ?>
                                            <option value="<?php echo $row_uexpl->UExp_nIdUnExp?>"><?php echo $row_uexpl->UExp_vNombre; ?></option>
                                        <?php
                                                
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Asignado -->
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="sel_new_asignado" class="">Asignado</label>
                                        <select type="select" name="sel_new_asignado" id="sel_new_asignado" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                                            <option value=""> -Técnico- </option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Prioridad -->
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="sel_new_prioridad" class="">Prioridad</label>
                                        <select type="select" name="sel_new_prioridad" id="sel_new_prioridad" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                                            <option value="0"> Bajo </option>
                                            <option value="1"> Medio </option>
                                            <option value="2"> Alto </option>
                                            <option value="3"> URGENTE </option>
                                        </select>
                                    </div>
                                </div>

                                <!-- F. Registro -->
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="date_new_freporte" class="">Fecha Registro</label>
                                        <input name="date_new_freporte" id="date_new_freporte" type='text' class="form-control" required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>    
                            
                            <!-- Comentario -->
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="txt_new_comentario" class="">Comentario</label>
                                        <textarea name="txt_new_comentario" id="txt_new_comentario" class="form-control" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Foto -->
                            <div class="position-relative form-group text-center">
                                <span class="clearfix"></span>                            
                                <label class="btn btn-primary btn-file"> <i class="fa fa-camera"></i> Cargar Foto <br/>
                                    <input type="file" name="imagen" style="display: none;" id="imagen" accept="image/*" capture>
                                </label>

                                <div class=" image-area">
                                    <img id="imgSalida" width="200px" src="../img/image-upload3.png" alt="" class="img-fluid rounded shadow-sm d-block">
                                </div>
                            </div>
                        </div>

                    </div>
            
                    <button class="mt-2 btn btn-success" id="btn_add" type="submit">Registrar</button>
                    <button class="mt-2 btn btn-secondary ocultar_add_inc" id="btn_close" type="button">Cerrar</button>
                </form>
            </div>
        </div>
        
        <!-- DIV Lista de Solicitudes  -->
        <div class="main-card mb-3 card" id="div_tablesolicitudes" >
            <div class="card-body"  >
                <div class="col-md-12 table-responsive">
                    <table id="table_lista_incidentes" class="table table-striped table-bordered dt-responsive wrap" cellspacing="0">
                      <thead>
                        <tr>
                            <th class="text-center" data-priority="1">#</th>
                            <th class="text-center" data-priority="5">Campus</th>
                            <th class="text-center" data-priority="4">Descripcion</th>
                            <th class="text-center" data-priority="6">Asignado</th>
                            <th class="text-center" data-priority="7">Prioridad</th>
                            <th class="text-center" width="50px" data-priority="8">F. Rep.</th>
                            <th class="text-center" width="50px" data-priority="9">F. Sol.</th>
                            <th class="text-center" data-priority="10">Comentario</th>
                            <th class="text-center" data-priority="3">Estado</th>
                            <th class="text-center" data-priority="2">*</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- DIV Lineas Solicitud -->
        <div class="main-card mb-3 card"  id="div_detalle_inc">
            
        </div>
    </div>
        
</div>

<script>
    $(".mostrar_add_inc").on("click", function(e){
        $('#div_add_incidentes').show("swing");
    })
    $(".ocultar_add_inc").on("click", function(e){
        $('#div_add_incidentes').hide("swing");
    })

    var today, datepicker;
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#date_new_freporte').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd',
        maxDate: today
    });

    $(document).ready(function() {
        $('#div_add_incidentes').hide();

        $("#sel_new_uexpl").change(function(){
            var uexpl = $(this).val();
            $.post("../?action=load_cbo",{opt:"uexpl_tecn", uexpl:uexpl}, function(data){
                $("#sel_new_asignado").html(data);
                $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
            });
        })

        /* INICIO */
        var table =$('#table_lista_incidentes').DataTable({
            responsive: true,
            bProcessing: true, 
            serverSide: true,
            destroy: true,
            deferRender: true,
            autoWidth: false,
            select: true,
            dom: 'Blfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "order": [[ 0, "DESC" ]],
            "aoColumnDefs": [ 
                { 'bSortable': false, 
                'aTargets': [2, 3, 4] } /* No ordernar */
            ],
            "columns": [
                { "data": "cont" },
                { "data": "campus" },
                { "data": "descripcion" },
                { "data": "asignado" },
                { "data": "prioridad" },
                { "data": "freporte" },
                { "data": "fsolucion" },
                { "data": "comentario" },
                { "data": "estado" },
                { "data": "accion" }
            ],
            ajax:{
                url: "../?action=load_data_incidentes",
                type: "POST",
                data: function(d){
                    d.opt = "load01",
                    d.uexpl = $("#sel_filtro_uexpl").val(),
                    d.uasig = $("#sel_filtro_usu_asig").val(), 
                    d.prio = $("#sel_filtro_prioridad").val(),
                    d.estado = $("#sel_filtro_estado").val(),
                    d.material = $("#sel_filtro_material").val()
                },
                error: function(){
                    $("#table_lista_incidentes").css("display","none");
                },
                
                complete: function(){
                    $(".function_lineas").on("click", function(e){
                        var id = $(this).data('id');
                        $('#span_sol').text(id);
                        
                        updateValue(id, 3);
                        carga_DetalleIncidente();
                    })

                }
            },
            
            lengthMenu: [[10, 50, 100, 500], [10, 50, 100, "Todos"]],
                    
        });
        /* FIN */

        $("#sel_filtro_uexpl, #sel_filtro_usu_asig, #sel_filtro_prioridad, #sel_filtro_estado, #sel_filtro_material").change(function(){
            $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
        })

        $('#table_lista_solicitudes tbody').on('click', 'tr', function() {
            // var table=$('#table_lista_solicitudes').DataTable().rows().deselect();
            // $(this).addClass('selected');
        });

        $(document).on('submit', '#form_add_incidente', function(e){
            e.preventDefault();
    
            $("#btn_add").attr("disabled","disabled");

            // var form_data = $('#form_add_incidente').serialize();
            var form_data = new FormData(this);

            $.ajax({
                type: "POST",
                url: "../?action=add_incidente",
                // dataType: "POST",
                data: form_data,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#page-loader').fadeIn(500);
                },
                success: function(data) {
                    // var txt_nrosol = $('#txt_nrosol').val();
                    if(data=="1"){
                        toastr.success('Registro Exitoso',"Titulo");
                        $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
                        $('#page-loader').fadeOut(500);
                        $('#form_add_incidente')[0].reset();
                    }
                    else{
                        toastr.warning('Hubo un error al registrar');
                        $('#page-loader').fadeOut(500);
                    } 
                }
            });

            $("#btn_add").removeAttr("disabled");
        })  
    });


    /* Muestra Detalle de Incidente */
    function carga_DetalleIncidente(){
        $('#page-loader').fadeIn(500);
        $("#div_detalle_inc").empty();

        $.ajax({
            type: "POST",
            url: "../?action=incidentes_detalle", 
            data: {
                opt : null
            },
            beforeSend: function() {
              
            },
            success: function(data) {
                $('#page-loader').fadeOut(500);                 
                $("#div_detalle_inc").html(data);
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
                load_script01();
                $('body,html').stop(true,true).animate({                
                        scrollTop: $("#div_detalle_inc").offset().top
                },1000);

                $("#sel_proyecto").change(function(){
                    var proy = $(this).val();
                    $.post("../?action=load_cbo",{opt:"dpto", proy:proy}, function(data){
                        $("#sel_dpto").html(data);
                    });
                })

                $("#txt_lineasolsubtotal").keyup(function(){
                    var igv = 0;
                    if($("#sel_igv").val()==0){
                        igv = 1;
                    }
                    else if($("#sel_igv").val()==1){
                        igv = 1.18;
                    }
                    var sub_total = parseFloat($(this).val()) * igv ;
                    (Math.round( sub_total * 100 )/100).toString();
                    // sub_total.toFixed(2);
                    $('#txt_lineasoltotal').val(sub_total.toFixed(2));

                });

                $("#sel_igv").change(function(){
                    var igv = 0;
                    if($(this).val()==0){
                        igv = 1;
                    }
                    else if($(this).val()==1){
                        igv = 1.18;
                    }
                    var sub_total = parseFloat($("#txt_lineasolsubtotal").val()) * igv ;
                    (Math.round( sub_total * 100 )/100).toString();
                    $('#txt_lineasoltotal').val(sub_total.toFixed(2));
                });
            }
        });
    }

    /* Funcion para actualizar valor Solicitud/Lineas  */
    function updateValue(value, opt){
        $.ajax({
            type: "POST",
            url: "../?action=set_session",
            data: {
                option: opt,
                value: value
            },
            success:function(data){
                // console.log("tu variable de sesion tiene el valor de "+ data);
            }
        });
    } 

    /* Funciones varias */
    function load_script01() {
        $('.dropdown-toggle').dropdown();

        /* UPD PRIORIDAD */
        $(".upd_prioridad").on('click', function(event){
            var xval = $(this).data("xval");
            var value = $(this).text();

            bootbox.confirm({
                message: "¿Estás seguro de cambiar la incidencia a prioridad <b>"+ value +"</b>?",
                buttons: {
                    confirm: {
                        label: 'Cambiar',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if(result){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_incidente",
                            data: {
                                opt: "upd_prioridad",
                                xval: xval
                            },
                            beforeSend: function() {
                                $('#page-loader').fadeIn(500);
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se actualizó la incidencia',"Realizado");
                                    carga_DetalleIncidente();
                                    $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
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

        /* UPD ESTADO ATENCION */
        $(".upd_estado_at").on('click', function(event){
            var xval = $(this).data("xval");
            var value = $(this).text();

            bootbox.confirm({
                message: "¿Estás seguro de cambiar el estado de atención a <b>"+ value +"</b>?",
                buttons: {
                    confirm: {
                        label: 'Cambiar',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if(result){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_incidente",
                            data: {
                                opt: "upd_estado",
                                xval: xval
                            },
                            beforeSend: function() {
                                $('#page-loader').fadeIn(500);
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se actualizó la incidencia',"Realizado");
                                    carga_DetalleIncidente();
                                    $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
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

        /* UPD ASIGNADO A */
        $(".upd_asignado_a").on('click', function(event){
            var xval = $(this).data("xval");
            var value = $(this).text();

            bootbox.confirm({
                message: "¿Estás seguro de cambiar la asignación a <b>"+ value +"</b>?",
                buttons: {
                    confirm: {
                        label: 'Cambiar',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if(result){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_incidente",
                            data: {
                                opt: "upd_asignado",
                                xval: xval
                            },
                            beforeSend: function() {
                                $('#page-loader').fadeIn(500);
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se actualizó la incidencia',"Realizado");
                                    carga_DetalleIncidente();
                                    $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
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

        /* UPD CAMPUS */
        $(".upd_campus").on('click', function(event){
            var xval = $(this).data("xval");
            var value = $(this).text();

            bootbox.confirm({
                message: "¿Estás seguro de cambiar al campus: <b>"+ value +"</b>?",
                buttons: {
                    confirm: {
                        label: 'Cambiar',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if(result){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_incidente",
                            data: {
                                opt: "upd_campus",
                                xval: xval
                            },
                            beforeSend: function() {
                                $('#page-loader').fadeIn(500);
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se actualizó la incidencia',"Realizado");
                                    carga_DetalleIncidente();
                                    $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
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

        /* UPD DESCRIPCION */
        $(".upd_descripcion").on("click", function(e){
            var value = $(this).data("xvalue");

            var boot_temp= bootbox.prompt({
                title: "Editar Descripcion Incidente", 
                value: value,
                callback: function (result) {
                    if(result != null){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_incidente",
                            data: {
                                opt: "upd_descripcion",
                                valor: result
                            },
                            beforeSend: function() {
                                $('#page-loader').fadeIn(500);
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se actualizó la descripcion de la Incidencia.',"Realizado");
                                    carga_DetalleIncidente();
                                    $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
                                }
                                else if(data==4){
                                    toastr.error('Ocurrió un problema al actualizar.', 'ERROR');
                                }
                                else if(data==2){
                                    toastr.error('No se ha logeado.', 'ERROR');
                                }
                                else{
                                    toastr.error('Verificar con webmaster.', 'ERROR');
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

        /* UPD COMENTARIO */
        $(".upd_comentario").on("click", function(e){
            var value = $(this).data("xvalue");

            var boot_temp= bootbox.prompt({
                title: "Editar Comentario", 
                value: value,
                callback: function (result) {
                    if(result != null){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_incidente",
                            data: {
                                opt: "upd_comentario",
                                valor: result
                            },
                            beforeSend: function() {
                                $('#page-loader').fadeIn(500);
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se actualizó la descripcion de la Incidencia.',"Realizado");
                                    carga_DetalleIncidente();
                                    $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
                                }
                                else if(data==4){
                                    toastr.error('Ocurrió un problema al actualizar.', 'ERROR');
                                }
                                else if(data==2){
                                    toastr.error('No se ha logeado.', 'ERROR');
                                }
                                else{
                                    toastr.error('Verificar con webmaster.', 'ERROR');
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

        /* UPD MATERIAL */
        $(".upd_material").on("click", function(e){
            var value = $(this).data("xvalue");

            var boot_temp= bootbox.prompt({
                title: "Editar Material Requerido", 
                value: value,
                callback: function (result) {
                    if(result != null){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_incidente",
                            data: {
                                opt: "upd_material",
                                valor: result
                            },
                            beforeSend: function() {
                                $('#page-loader').fadeIn(500);
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se actualizó el material requerido de la Incidencia.',"Realizado");
                                    carga_DetalleIncidente();
                                    $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
                                }
                                else if(data==4){
                                    toastr.error('Ocurrió un problema al actualizar.', 'ERROR');
                                }
                                else if(data==2){
                                    toastr.error('No se ha logeado.', 'ERROR');
                                }
                                else{
                                    toastr.error('Verificar con webmaster.', 'ERROR');
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

        /* UPD F. REPORTE */
        $(".upd_freporte").on("click", function(e){
            var value = $(this).data("xvalue");

            var boot_temp= bootbox.prompt({
                title: "Editar Fecha de Reporte", 
                inputType: 'date',
                value: value,
                callback: function (result) {
                    if(result != null){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_incidente",
                            data: {
                                opt: "upd_freporte",
                                valor: result
                            },
                            beforeSend: function() {
                                $('#page-loader').fadeIn(500);
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se actualizó la Incidencia.',"Realizado");
                                    carga_DetalleIncidente();
                                    $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
                                }
                                else if(data==4){
                                    toastr.error('Ocurrió un problema al actualizar.', 'ERROR');
                                }
                                else if(data==2){
                                    toastr.error('No se ha logeado.', 'ERROR');
                                }
                                else{
                                    toastr.error('Verificar con webmaster.', 'ERROR');
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
        
        /* UPD F. SOLUCION */
        $(".upd_fsolucion").on("click", function(e){
            var value = $(this).data("xvalue");

            var boot_temp= bootbox.prompt({
                title: "Editar Fecha de Solución", 
                inputType: 'date',
                value: value,
                callback: function (result) {
                    if(result != null){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_incidente",
                            data: {
                                opt: "upd_fsolucion",
                                valor: result
                            },
                            beforeSend: function() {
                                $('#page-loader').fadeIn(500);
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se actualizó la Incidencia.',"Realizado");
                                    carga_DetalleIncidente();
                                    $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
                                }
                                else if(data==4){
                                    toastr.error('Ocurrió un problema al actualizar.', 'ERROR');
                                }
                                else if(data==2){
                                    toastr.error('No se ha logeado.', 'ERROR');
                                }
                                else{
                                    toastr.error('Verificar con webmaster.', 'ERROR');
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
        
    }

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
        console.log(result);
    }
    /* FIN Funcion carga imagen */



</script>