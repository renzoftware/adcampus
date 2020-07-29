<?php
    $lista_uexpl = UExplData::getUExplAllActive();
    $lista_proyecto = ProyectoData::getProyectoAllActive();
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

    @media (max-width: 991.98px) {
    .app-page-title .page-title-icon,
    .ui-theme-settings {
        display: none !important;
        }
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
                <div>Solicitudes
                    <div class="page-title-subheading">Ingreso de solicitudes, servicios, excepciones, etc
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Nueva Solicitud" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark mostrar_add_sol">
                    <i class="fa fa-plus"></i>
                </button>
                <div class="d-inline-block dropdown">
                    <select name="sel_filtro_uexpl" id="sel_filtro_uexpl" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required >
                        <option value=""> -U. Expl- </option>
                    <?php
                        foreach ($lista_uexpl as $row_uexpl) {
                    ?>
                        <option value="<?php echo $row_uexpl->UExp_nIdUnExp?>"><?php echo $row_uexpl->UExp_cUnidadExp . " " . $row_uexpl->UExp_cSigla ;?></option>
                    <?php
                            
                        }
                    ?>
                    </select>
                </div>

                <div class="d-inline-block dropdown">
                    <select type="select" name="sel_filtro_proyecto" id="sel_filtro_proyecto" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                        <option value=""> -Proyecto- </option>
                    <?php
                        foreach ($lista_proyecto as $row_proyecto) {
                    ?>
                        <option value="<?php echo $row_proyecto->Proy_nIdProyecto; ?>"><?php echo $row_proyecto->Proy_vProyecto;?></option>
                    <?php
                            
                        }
                    ?>
                    </select>
                </div>

                <div class="d-inline-block dropdown">
                    <select type="select" name="sel_filtro_dpto" id="sel_filtro_dpto" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                        <option value=""> -Dpto- </option>
                    </select>
                </div>
            </div>    
        </div>
    </div>

    <div>
        <!-- DIV Registro de Nueva Solicitud -->
        <div class="main-card mb-3 card" id="div_addsolicitudes">
            <div class="card-body">
                <h5 class="card-title">Nueva Solicitud</h5>
                <form class="" id="form_solicitud_add">
                    <div class="form-row">
                        <div class="col-md-2">
                            <div class="position-relative form-group">
                                <label for="txt_nrosol" class=""> Nro. Sol.</label>
                                <input name="txt_nrosol" id="txt_nrosol" type="number" min=70000 class="form-control" maxlength="5" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="txt_descripcion" class="">Descripcion</label>
                                <input name="txt_descripcion" id="txt_descripcion" type="text" class="form-control" maxlength="60" required="">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="position-relative form-group">
                                <label for="date_registro" class="">Fecha Registro</label>
                                <input name="date_registro" id="date_registro" type='text' class="form-control" required />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="position-relative form-group">
                                <label for="sel_moneda" class="">Moneda</label>
                                <select name="sel_moneda" id="sel_moneda" class="form-control">
                                    <option value="1">PEN S/</option>
                                    <option value="2">USD $</option>
                                </select>
                            </div>
                        </div>
                    </div>    
                    
                    <button class="mt-2 btn btn-success" id="btn_add" type="submit">Registrar</button>
                </form>
            </div>
        </div>
        
        <!-- DIV Lista de Solicitudes  -->
        <div class="main-card mb-3 card" id="div_tablesolicitudes">
            <div class="card-body">
                <div class="col-md-12 table-responsive">
                    <table id="table_lista_solicitudes" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"  width="100%">
                      <thead>
                        <tr>
                            <th class="text-center" data-priority="1"># Sol.</th>
                            <th class="text-center">Descripcion</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">MON</th>
                            <th class="text-center">FReg</th>
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
        <div class="main-card mb-3 card"  id="div_addlinea">
            
        </div>
    </div>
        
</div>

<script>
    $(".mostrar_add_sol").on("click", function(e){
        $('#div_addsolicitudes').show("swing");
    })

    var today, datepicker;
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#date_registro').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd',
        maxDate: today
    });

    $(document).ready(function() {
        $('#msj_cargando').hide();
        $('#div_addsolicitudes').hide();

        $("#sel_filtro_proyecto").change(function(){
            var proy = $(this).val();
            $.post("../?action=load_cbo",{opt:"dpto", proy:proy}, function(data){
                $("#sel_filtro_dpto").html(data);
                $('#table_lista_solicitudes').DataTable().ajax.reload(null , false);
            });
        })
        
        /* INICIO */
        $('#table_lista_solicitudes').DataTable({
            responsive: true,
            bProcessing: true, 
            serverSide: true,
            destroy: true,
            deferRender: true,
            rowId: '0',
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
                { 'bSortable': false, 'aTargets': [2, 3, 4] } /* No ordernar */
            ],
            ajax:{
                url: "../?action=load_data_solicitudes",
                type: "POST",
                data: function(d){
                    d.opt = "load01",
                    d.uexpl = $("#sel_filtro_uexpl").val(),
                    d.proy = $("#sel_filtro_proyecto").val(), 
                    d.dpto = $("#sel_filtro_dpto").val() 
                },
                error: function(){
                    $("#table_lista_solicitudes").css("display","none");
                },
                complete: function(){
                    $(".function_lineas").on("click", function(e){
                        var id = $(this).data('id');
                        $('#span_sol').text(id);
                        
                        updateValue(id, 2);
                        carga_DetalleLineasSolicitud();
                    })
                }
            },
            lengthMenu: [[10, 50, 100, 500], [10, 50, 100, "Todos"]]
        });
        /* FIN */

        $("#sel_filtro_uexpl, #sel_filtro_proyecto, #sel_filtro_dpto").change(function(){
            $('#table_lista_solicitudes').DataTable().ajax.reload(null , false);
        })

        $('#table_lista_solicitudes tbody').on('click', 'tr', function() {
            // var table=$('#table_lista_solicitudes').DataTable().rows().deselect();
            // $(this).addClass('selected');
        });

        $(document).on('submit', '#form_solicitud_add', function(e){
            e.preventDefault();
    
            $("#btn_add").attr("disabled","disabled");

            var form_data = $('#form_solicitud_add').serialize();

            $.ajax({
                type: "POST",
                url: "../?action=addsolicitud",
                dataType: "json",
                data: form_data,
                success: function(data) {
                    var txt_nrosol = $('#txt_nrosol').val();
                    if(data=="1"){
                        toastr.success('Registro Exitoso',"Titulo");
                        $('#table_lista_solicitudes').DataTable().ajax.reload(null , false);
                    }
                    else if(data=="2"){
                        toastr.error('El Nro de Solicitud ya se encuentra registrado', "ERROR");
                    }
                    else{
                        toastr.warning('Hubo un error al registrar');
                    } 
                }
            });

            $("#btn_add").removeAttr("disabled");
        })  
    });

    
    $(document).on('submit', '#form_lineasol_add', function(e){
        e.preventDefault();
        $("#btn_add_lineasol").attr("disabled","disabled");
        var id = $('#form_lineasol_add').data('xid');
        var form_data = $('#form_lineasol_add').serialize();

        $.ajax({
            type: "POST",
            url: "../?action=addlineasolicitud",
            dataType: "json",
            data: form_data,
            success: function(data) {
                // var txt_nrosol = $('#txt_nrosol').val();
                if(data=="1"){
                    toastr.success('Registro Exitoso',"Realizado");
                    carga_DetalleLineasSolicitud();
                    $('#table_lista_solicitudes').DataTable().ajax.reload(null , false);
                    // $('#div_addlineasolicitud').hide("swing");
                }
                else if(data=="2"){
                    toastr.error('El Nro. de Linea ya existe.',"ERROR");
                }
                else{
                    toastr.warning('Hubo un error al registrar', "ERROR");
                } 
            }
        });

        $("#btn_add_lineasol").removeAttr("disabled");
    })

    $(document).on('submit', '#form_lineasol_edit_step1', function(e){
        e.preventDefault();
        // console.log("YA CASI");
        $("#btn_lineasol_upd_step1").attr("disabled","disabled");

        var form_data = $('#form_lineasol_edit_step1').serializeArray();
        form_data.push({name: "opt", value: "step1"});
        var renzo = $.ajax({
            type: "POST",
            url: "../?action=upd_lineasolic",
            dataType: "json",
            data: $.param(form_data),
            success: function(data) {
                var txt_nrosol = $('#txt_nrosol').val();
                if(data=="1"){
                    toastr.success('Actualización Exitosa',"Realizado");
                }
                else if(data=="2"){
                  toastr.error('El nro de Línea ya se ha registrado.',"ERROR");
                }
                else if(data=="3"){
                  toastr.error('Verificar que Cantidad/Monto ingresado concuerde con lo actualmente recepcionado.', "ERROR");
                }
                else{
                  toastr.warning('Hubo un error al registrar',"ERROR");
                } 
            }
        });

        $("#btn_lineasol_upd_step1").removeAttr("disabled");
    })

    $(document).on('submit', '#form_lineasol_edit_step2', function(e){
        e.preventDefault();
        $("#btn_lineasol_upd_step2").attr("disabled","disabled");

        var form_data = $('#form_lineasol_edit_step2').serializeArray();
        form_data.push({name: "opt", value: "step2"});
        $.ajax({
            type: "POST",
            url: "../?action=upd_lineasolic",
            dataType: "json",
            data: $.param(form_data),
            success: function(data) {
                // var txt_nrosol = $('#txt_nrosol').val();
                if(data=="1"){
                  toastr.success('Actualización Exitosa',"Realizado");
                }
                else if(data=="2"){
                  toastr.error('Hubo un error al registrar', "ERROR");
                }
                else{
                  toastr.warning('Hubo un error al registrar', "ERROR");
                } 
            }
        });

        $("#btn_lineasol_upd_step2").removeAttr("disabled");
    })

    $(document).on('submit', '#form_lineasol_edit_step3', function(e){
        e.preventDefault();
        $("#btn_lineasol_upd_step3").attr("disabled","disabled");

        var form_data = $('#form_lineasol_edit_step3').serializeArray();
        form_data.push({name: "opt", value: "step3"});
        $.ajax({
            type: "POST",
            url: "../?action=upd_lineasolic",
            dataType: "json",
            data: $.param(form_data),
            success: function(data) {
                // var txt_nrosol = $('#txt_nrosol').val();
                if(data=="1"){
                  toastr.success('Actualización Exitosa',"Realizado");
                }
                else if(data=="2"){
                  toastr.error('No se encontró al proveedor ingresado', "ERROR");
                }
                else{
                  toastr.warning('Hubo un error al registrar', "Cuidado");
                } 
            }
        });

        $("#btn_lineasol_upd_step3").removeAttr("disabled");
    })

    $(document).on('submit', '#form_lineasol_edit_step4', function(e){
        e.preventDefault();
        $("#btn_lineasol_upd_step4").attr("disabled","disabled");

        var form_data = $('#form_lineasol_edit_step4').serializeArray();
        form_data.push({name: "opt", value: "step4"});
        $.ajax({
            type: "POST",
            url: "../?action=upd_lineasolic",
            dataType: "json",
            data: $.param(form_data),
            success: function(data) {
                if(data=="1"){
                  toastr.success('Recepción Registrada',"Realizado");
                  function_load_step4();
                }
                else{
                  toastr.warning('Verificar cantidad a recepcionar', "Cuidado");
                } 
            }
        });

        $("#btn_lineasol_upd_step4").removeAttr("disabled");
    })


    /* Muestra Detalle de solicitud por lineas */
    function carga_DetalleLineasSolicitud(){
        $('body,html').stop(true,true).animate({                
                scrollTop: $("#div_addlinea").offset().top
            },1000);
        $("#div_addlinea").empty();
        $.ajax({
            type: "POST",
            url: "../?action=solic_lineas_detalle", 
            data: {
              // id: id
                opt : null
            },
            beforeSend: function() {
              // $('#msj_cargando').show();
            },
            success: function(data) {
                $("#div_addlinea").html(data);
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
        $('#div_addlineasolicitud').hide();
        $('#tbl_linea_sol').stacktable({headIndex:1});

        $("#btn_close_addlineasol").on("click", function(e){
            $('#div_addlineasolicitud').hide("swing");
        })

        $(".addlineasol").on("click", function(e){
            $('#div_addlineasolicitud').show("swing");
        })
        
        $(".func_edit_sol_nrosol").on("click", function(e){
            var id = $(this).data('xid');
            var value = $(this).data('xvalue');
            bootbox.prompt({
                title: "Editar Nro. Solicitud", 
                value: value,
                callback: function (result) {
                    if(result != null){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_lineasolic",
                            data: {
                                opt: "upd_sol_nro",
                                id: id,
                                valor: result
                            },
                            beforeSend: function() {
                                // console.log("B");
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se actualizó el Nro. de Solicitud.',"Realizado");
                                    carga_DetalleLineasSolicitud();
                                    $('#table_lista_solicitudes').DataTable().ajax.reload(null , false);
                                }
                                else if(data==4){
                                    toastr.error('El Nro de Solicitud ya se encuentra registrado.', 'ERROR');
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
                            }            
                        });
                    }

                }
            });
        })

        $(".func_edit_sol_moneda").on("click", function(e){
            var id = $(this).data('xid');
            var value = $(this).data('xvalue');
            bootbox.prompt({
                title: "Cambiar Tipo Moneda", 
                inputType: "select",
                inputOptions: [{
                    text: 'PEN',
                    value: '1',
                },
                {
                    text: 'USD',
                    value: '2',
                }],
                callback: function (result) {
                    if(result != null){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_lineasolic",
                            data: {
                                opt: "upd_sol_moneda",
                                id: id,
                                valor: result
                            },
                            beforeSend: function() {
                                // console.log("B");
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se cambió el tipo de moneda.',"Realizado");
                                    carga_DetalleLineasSolicitud();
                                    $('#table_lista_solicitudes').DataTable().ajax.reload(null , false);
                                }
                                else if(data==4){
                                    toastr.error('Ocurrió un error al actualizar.', 'ERROR');
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
                            }            
                        });
                    }
                }
            });
        });

        $(".func_edit_sol_tipo_cambio").on("click", function(e){
            var id = $(this).data('xid');
            var value = $(this).data('xvalue');
            bootbox.prompt({
                title: "Editar Tipo de Cambio", 
                value: value,
                callback: function (result) {
                    if(result != null){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_lineasolic",
                            data: {
                                opt: "upd_sol_tcamb",
                                id: id,
                                valor: result
                            },
                            beforeSend: function() {
                                // console.log("B");
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se actualizó el Tipo de Cambio.',"Realizado");
                                    carga_DetalleLineasSolicitud();
                                    $('#table_lista_solicitudes').DataTable().ajax.reload(null , false);
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
                            }            
                        });
                    }

                }
            });
        })

        $(".func_edit_sol_descripcion").on("click", function(e){
            var id = $(this).data('xid');
            var value = $(this).data('xvalue');
            var boot_temp= bootbox.prompt({
                title: "Editar Descripcion Solicitud", 
                value: value,
                callback: function (result) {
                    if(result != null){
                        $.ajax({
                            type: "POST",
                            url: "../?action=upd_lineasolic",
                            data: {
                                opt: "upd_sol_descr",
                                id: id,
                                valor: result
                            },
                            beforeSend: function() {
                            },
                            success: function(data) {
                                if(data==1){
                                    toastr.success('Se actualizó la descripcion de la Solicitud.',"Realizado");
                                    carga_DetalleLineasSolicitud();
                                    $('#table_lista_solicitudes').DataTable().ajax.reload(null , false);
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
                            }            
                        });
                    }
                }
            });
        });

        $(".func_del_linsol").on("click",function(e){
            var id = $(this).data('xid');
            var value = $(this).data('xvalue');

            bootbox.confirm({
            message: "¿Estás seguro de cancelar la <b>Línea "+ value +"</b>?",
            buttons: {
                confirm: {
                    label: 'Eliminar',
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
                        url: "../?action=upd_lineasolic",
                        data: {
                            opt: "del_linsol",
                            id: id
                        },
                        beforeSend: function() {
                        },
                        success: function(data) {
                            if(data==1){
                                toastr.success('Se eliminó la Línea',"Realizado");
                                carga_DetalleLineasSolicitud();
                                $('#table_lista_solicitudes').DataTable().ajax.reload(null , false);
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
                        }            
                    });
                    
                }
            }
        });
        })

        $(".func_edit_linsol").on("click",function(e){
            e.preventDefault();
            var id = $(this).data('xid');
            updateValue(id, 1);
            
            $('#smartwizard').smartWizard("reset");
            $('#smartwizard').smartWizard({
                theme: 'dots',
                selected: 0,
                keyNavigation: false,
                showStepURLhash: false,
                toolbarSettings: {
                    showNextButton: false, // show/hide a Next button
                    showPreviousButton: false, // show/hide a Previous button
                }
            });

            $("#form-step-1").empty();
            $.ajax({
                type: "POST",
                url: "../?action=get_lineasol_step",
                data: null,
                success:function(data){
                    $("#form-step-1").html(data);

                    $("#sel_linsol_edit_proyecto").change(function(){
                        var proy = $(this).val();
                        $.post("../?action=load_cbo",{opt:"dpto", proy:proy}, function(data){
                            $("#sel_linsol_edit_dpto").html(data);
                        });
                    })

                    var proy2 = $("#sel_linsol_edit_proyecto").val();
                    var xid = $("#sel_linsol_edit_dpto").attr("xid");
                    $.post("../?action=load_cbo",{opt:"dpto_edit", proy:proy2, xid: xid}, function(data){
                        $("#sel_linsol_edit_dpto").html(data);
                    });

                    $("#txt_linsol_edit_subcat").autocomplete({
                        source: function( request, response ) {
                            $.ajax({
                              type: "POST",
                                url: "../?action=getdatasubcat",
                                dataType: "json",
                                data: {
                                    opt: "autocomplete",
                                    term: request.term
                                },
                                success: function( data ) {
                                    response( data );
                                }
                            });
                        },
                        select: function (event, ui) {
                            $('#txt_linsol_edit_subcat_data').val(ui.item.id);
                        },
                        minLength: 2
                    });

                    $("#txt_linsol_edit_subtotal").keyup(function(){
                        var igv = 0;
                        if($("#sel_linsol_edit_igv").val()==0){
                            igv = 1;
                        }
                        else if($("#sel_linsol_edit_igv").val()==1){
                            igv = 1.18;
                        }
                        var sub_total = parseFloat($(this).val()) * igv ;
                        (Math.round( sub_total * 100 )/100).toString();
                        // sub_total.toFixed(2);
                        $('#txt_linsol_edit_total').val(sub_total.toFixed(2));
                    });

                     $("#sel_linsol_edit_igv").change(function(){
                        var igv = 0;
                        if($(this).val()==0){
                            igv = 1;
                        }
                        else if($(this).val()==1){
                            igv = 1.18;
                        }
                        var sub_total = parseFloat($("#txt_linsol_edit_subtotal").val()) * igv ;
                        (Math.round( sub_total * 100 )/100).toString();
                        // sub_total.toFixed(2);
                        $('#txt_linsol_edit_total').val(sub_total.toFixed(2));
                    });
                }
            });

            $.ajax({
                type: "POST",
                url: "../?action=get_data_lineasol",
                data: {
                    opt:"txt_title"
                },
                success:function(data){
                    $("#exampleModalLabel").html(data);
                }
            })



            $('#exampleModal').modal("show");
        });

        $('#exampleModal').on('hidden.bs.modal', function () {
            carga_DetalleLineasSolicitud();
            $('#table_lista_solicitudes').DataTable().ajax.reload(null , false);
        });

        $("#txt_subcat").autocomplete({
            source: function(request, response) {
              $.ajax({
                    type: "POST",
                    url: "../?action=getdatasubcat",
                    dataType: "json",
                    data: {
                        opt: "autocomplete",
                        term: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                $('#txt_data_subcat').val(ui.item.id);
            },
            minLength: 2
        });

        $("#btn_tostep2").on("click", function(e){
            e.preventDefault();
            var form = $("#form_lineasol_edit_step1")[0];
            var isValid = form.checkValidity();
            if (!isValid) {
                console.log("HAY CELDAS VACIAS");
            }
            else{
                form.classList.add('was-validated');
                $('#smartwizard').smartWizard("next");
                function_load_step2();  
            }
            // console.log("Hacia Paso 2");
        });

        $("#btn_tostep3").on("click", function(e){
            e.preventDefault();
            var form = $("#form_lineasol_edit_step2")[0];
            var isValid = form.checkValidity();

            if (!isValid) {
                console.log("HAY CELDAS VACIAS");
            }
            else{
                form.classList.add('was-validated');
                $('#smartwizard').smartWizard("next");

                function_load_step3();  
            }
        });

        $("#btn_tostep4").on("click", function(e){
            e.preventDefault();
            var form = $("#form_lineasol_edit_step3")[0];
            var isValid = form.checkValidity();

            if (!isValid) {
                console.log("HAY CELDAS VACIAS");
            }
            else{
                form.classList.add('was-validated');
                $('#smartwizard').smartWizard("next");
                
                function_load_step4();  

            }
        });

        $("#btn_tostep5").on("click", function(e){
            e.preventDefault();
            // $('#smartwizard').modal("hide");
            $('#exampleModal').modal("hide");
            // return false;
        });

        $("#btn_faprob_delete").on("click", function(e){
            e.preventDefault();
            var form = $("#form_lineasol_edit_step2")[0];
            var isValid = form.checkValidity();

            if (!isValid) {
                toastr.error('La Linea no cuenta con Fecha de Aprobacion asignada.', 'ERROR');
                console.log("HAY CELDAS VACIAS");
            }
            else{
                form.classList.add('was-validated');
                $.ajax({
                    type: "POST",
                    url: "../?action=upd_lineasolic",
                    data: {
                        opt: "del_sol_faprob"
                    },
                    beforeSend: function() {
                        // console.log("B");
                    },
                    success: function(data) {
                        if(data==1){
                            $("#date_linsol_faprob").val("");
                            toastr.success('Se eliminó la Fecha de Aprobación',"Realizado");
                        }
                        else if(data==2){
                            toastr.error('No se puede eliminar. Cuenta con OC asignada.',"ERROR");
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
                    }            
                });
            }
        });

        $("#btn_oc_delete").on("click", function(e){
            e.preventDefault();
            var form = $("#form_lineasol_edit_step3")[0];
            var isValid = form.checkValidity();

            if (!isValid) {
                toastr.error('La Linea no cuenta con OC asignada.', 'ERROR');
                console.log("HAY CELDAS VACIAS");
            }
            else{
                form.classList.add('was-validated');
                $.ajax({
                    type: "POST",
                    url: "../?action=upd_lineasolic",
                    data: {
                        opt: "del_sol_oc"
                    },
                    beforeSend: function() {
                        // console.log("B");
                    },
                    success: function(data) {
                        if(data==1){
                            $("#txt_linsol_edit_oc").val("");
                            $("#txt_linsol_edit_proveedor").val("");
                            toastr.success('Se eliminó la OC',"Realizado");
                        }
                        else if(data==2){
                            toastr.error('No se puede eliminar. Existen recepciones activas.',"ERROR");
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
                    }            
                });
            }
        });

                $("#txt_linsol_edit_subtotal").keyup(function(){
            alert("Tecla soltada");
        });
    }

    /* Funciones Step */
    function function_load_step2(){
        $("#form-step-2").empty();
        $.ajax({
            type: "POST",
            url: "../?action=get_lineasol_step2",
            data: null,
            success:function(data){
                $("#form-step-2").html(data);

                var today, datepicker;
                today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                $('#date_linsol_faprob').datepicker({
                    uiLibrary: 'bootstrap4',
                    format: 'yyyy-mm-dd',
                    maxDate: today
                });
            }
        });
    }

    function function_load_step3(){
        $.ajax({
            type: "POST",
            url: "../?action=get_lineasol_step3",
            data: null,
            success:function(data){
                $("#form-step-3").html(data);

                $("#txt_linsol_edit_oc").autocomplete({
                    source: function( request, response ) {
                        $.ajax({
                            type: "POST",
                            url: "../?action=get_data_oc",
                            dataType: "json",
                            data: {
                                opt: "autocomplete",
                                term: request.term
                            },
                            beforeSend: function(){
                                $("#progressbar_oc_prov").show("slow");
                                $("#div_linsol_edit_proveedor").hide();
                            },
                            success: function(data){
                                response(data);
                            },
                            complete: function(){
                                $("#progressbar_oc_prov").hide("slow");
                                $("#div_linsol_edit_proveedor").show("slow");

                                $("#txt_linsol_edit_proveedor").val("");
                            }
                        });
                    },
                    select: function (event, ui) {
                        $('#txt_linsol_edit_oc_data').val(ui.item.id);
                        $('#txt_linsol_edit_proveedor').val(ui.item.other);
                    },
                    minLength: 2
                });

                $("#txt_linsol_edit_oc").blur(function(){});

                $("#txt_linsol_edit_proveedor").autocomplete({
                    source: function(request, response){
                        $.ajax({
                            type: "POST",
                            url: "../?action=get_data_proveedor",
                            dataType: "json",
                            data: {
                                opt: "autocomplete",
                                term: request.term
                            },
                            success: function(data){
                                response(data);
                            }
                        });
                    },
                    select: function (event, ui) {
                        $('#txt_linsol_edit_proveedor_data').val(ui.item.id);
                        $('#txt_linsol_edit_proveedor').val(ui.item.value);
                    },
                    minLength: 2
                });

                $("#progressbar_oc_prov").hide();
            }
        });
    }

    function function_load_step4(){
        $("#form-step-4").empty();
        $.ajax({
            type: "POST",
            url: "../?action=get_lineasol_step4",
            data: null,
            success:function(data){
                $("#form-step-4").html(data);

                $('#tbl_linea_sol_recepcion').stacktable({headIndex:1});

                var today, datepicker;
                today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                $('#date_recep_add_fcontable').datepicker({
                    uiLibrary: 'bootstrap4',
                    format: 'yyyy-mm-dd',
                    maxDate: today
                });

                $(".func_delete_recep").on("click",function(e){
                    e.preventDefault();
                    var id = $(this).data('xid');

                    bootbox.confirm({
                        message: "¿Estás seguro de eliminar esta recepcion?",
                        buttons: {
                            confirm: {
                                label: 'Eliminar',
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
                                    url: "../?action=upd_lineasolic",
                                    data: {
                                        opt: "del_recep",
                                        id: id
                                    },
                                    beforeSend: function() {
                                    },
                                    success: function(data) {
                                        if(data==1){
                                            toastr.success('Se eliminó la Recepción',"Realizado");
                                            function_load_step4();
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
                                    }            
                                });
                                
                            }
                        }
                    });
                })
            }
        });
    }
</script>