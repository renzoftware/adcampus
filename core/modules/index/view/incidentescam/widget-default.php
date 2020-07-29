<?php
    $u=null;
    if(Session::getUID()!=""){
        $u = UserData::getById(Session::getUID());
        $u_type = $u->user_type;

        $lista_uexpl = UExplData::getUExplAllActive_ByGerenteCampus($u->id);
        $lista_usariosasignados = UExpTecnicosData::getUsuariosAsigIncid();
    }
    else{
        echo "<script>window.location='index.php';</script>";
    }
?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js" type="text/javascript"></script>

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

    .card-title{
        position: inherit !important;
    }

</style>

<div class="app-main__inner">
    <div>
        <div class="container">
            <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-rounded-lg">
                <li class="nav-item">
                    <a role="tab" class="nav-link active show" id="tab-0" data-toggle="tab" href="#tab-content-0" aria-selected="true">
                        <span>Resumen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1" aria-selected="false">
                        <span>Listado</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div id="tab-content-0" class="tab-pane tabs-animation fade active show" role="tabpanel">
                <div class="text-center mb-1">
                    <input type="hidden" id="txt_rango" value="2"/>
                    <!-- <h5 class="menu-header-title mb-3 fsize-3">Tareas e Incidencias</h5> -->
                    <div role="group" class="mb-2 btn-group-lg btn-group">
                        <button type="button" data-xrango="1" class="sel_filtro_rango btn-shadow btn btn-info">Hoy</button>
                        <button type="button" data-xrango="2" class="sel_filtro_rango btn-shadow active btn btn-info">Semana</button>
                        <button type="button" data-xrango="3" class="sel_filtro_rango btn-shadow btn btn-info">Mes</button>
                        <button type="button" data-xrango="4" class="sel_filtro_rango btn-shadow btn btn-info">Todos</button>
                    </div>
                </div>

                <div class="row">

                    <!-- DIV TOTALES POR ESTADO DE ATENCION -->
                    <div class="col-md-4 mb-3" id="div_total_estadoat">               
                        
                    </div>
                   
                    <div class="col-md-4 mb-3 card ">
                         <div class="card-body">
                            <h5 class="card-title">Total Pendientes por <b>Campus</b></h5>
                            <!-- Gráfica 01 - Totales pendientes por campus  -->
                            <div id="chart1" style="min-height: 365px">

                            </div>
                        </div>
                    </div>

                    <!-- TOTAL PENDIENTES POR PRIORIDAD -->
                    <div class="col-md-4 mb-3" id="div_total_prioridad">               
                        
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="card mb-3 widget-chart no-gutters ">
                            <!-- Gráfica 02 - Totales por campus y prioridad  -->
                            <div id="chart2" style="min-height: 365px">

                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Vista por campus -->
                <div class="row"  id="div_campus_detalle">
                    
                </div>
            </div>

            <div id="tab-content-1" class="tab-pane tabs-animation fade" role="tabpanel">
                <!-- DIV Filtros  -->
                <div class="app-page-title mb-0">
                    <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-graph text-success">
                                    </i>
                                </div>
                                <div>Tareas e Incidentes
                                    <div class="page-title-subheading">Listado General</div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <!-- Filtro Campus -->
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
                            </div>

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
                                    <th class="text-center" data-priority="8">F. Reporte</th>
                                    <th class="text-center" data-priority="9">F. Solución</th>
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
        
        <div>
           
            
        </div>
    </div>
</div>

<script>
    var today, datepicker;
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#date_new_freporte').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd',
        maxDate: today
    });

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
            { 'bSortable': false, 'aTargets': [2, 3, 4] } /* No ordernar */
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
                d.opt = "load02",
                d.uexpl = $("#sel_filtro_uexpl").val(),
                d.uasig = $("#sel_filtro_usu_asig").val(), 
                d.prio = $("#sel_filtro_prioridad").val(),
                d.estado = $("#sel_filtro_estado").val()
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
    
    $(document).ready(function() {
        $("#sel_new_uexpl").change(function(){
            var uexpl = $(this).val();
            $.post("../?action=load_cbo",{opt:"uexpl_tecn", uexpl:uexpl}, function(data){
                $("#sel_new_asignado").html(data);
                $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
            });
        })



        $("#sel_filtro_uexpl, #sel_filtro_usu_asig, #sel_filtro_prioridad, #sel_filtro_estado").change(function(){
            $('#table_lista_incidentes').DataTable().ajax.reload(null , false);
        })

        carga_DetalleCampus(); 

    });

    /* Muestra Detalle de Incidente */
    function carga_DetalleIncidente(){
        $('body,html').stop(true,true).animate({                
                scrollTop: $("#div_detalle_inc").offset().top
            },1000);
        $("#div_detalle_inc").empty();
        $.ajax({
            type: "POST",
            url: "../?action=incidentes_detalle", 
            data: {
              // id: id
                opt : null
            },
            beforeSend: function() {
              $('#page-loader').fadeIn(500);
            },
            success: function(data) {
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
                $('#page-loader').fadeOut(500);

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

    /* INICIO Funcion carga imagen */
    $('#imagen').change(function(e) {
        addImage(e); 
    });

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

    /* Funcion seleccion rango de incidentes */
    $(".sel_filtro_rango").on("click", function(e){
        $(".sel_filtro_rango").removeClass("active");
        var rango = $(this).data("xrango");
        $("#txt_rango").val(rango);

        $(this).addClass("active");
        carga_DetalleCampus();
    })

    /* Muestra Detalle de Incidente */
    function carga_DetalleCampus(){
        var rango = $("#txt_rango").val();
        $.ajax({
            type: "POST",
            url: "../?action=incidentescam_load",
            data: {
                opt : 1,
                rango: rango
            },
            beforeSend: function() {
                $('#page-loader').fadeIn(500);
            },
            success: function(data) {
                $("#div_campus_detalle").html(data);
            },
            error: function(xhr,textStatus,err){
                console.log("readyState: " + xhr.readyState);
                console.log("responseText: "+ xhr.responseText);
                console.log("status: " + xhr.status);
                console.log("text status: " + textStatus);
                console.log("error: " + err);
            },
            complete: function() {
                carga_Grafica01();
                carga_Grafica02();
                carga_TotalEstadoAt();
                carga_TotalPrioridad();

                // carga_DetalleUsuarios();

                $(".list-group-flush1").toggle();
                $(".card-campus").click(function(){
                    $(this).find(".list-group-flush1").fadeIn(500);
                })

                $(".btn_campus_prio").click(function(){
                    var xcampus =  $(this).data("xcampus");
                    var xprio = $(this).data("xprio");
                    var temp = $(this).parents('ul.sub1').find('ul');
                    $.ajax({
                        type: "POST",
                        url: "../?action=incidentescam_load", 
                        data: {
                            rango : rango,
                            opt : 2,
                            campus : xcampus,
                            prio : xprio
                        },
                        beforeSend: function() {
                          $('#page-loader').fadeIn(500);
                        },
                        success: function(data) {
                            temp.html(data);                 
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
                })

                $('#page-loader').fadeOut(500);
            }
        });
    }

    /* Gráfica para mostrar totales de incidentes */
    function carga_Grafica01(){
        $("#chart1").empty();
        var rango = $("#txt_rango").val();     

        colors: ['#008ffb', '#00e396', '#fa7500', '#ff4560', '#775dd0',  '#5d4037', '#ffc107', '#7f8c8d']

        var url = '../?action=get_incidentes_graficos';
        $.getJSON(url, {opt:7, rango:rango}, buildAppChart);
    }
    function buildAppChart(data) {
        var options = {
            
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontSize: '22px',
                                fontFamily: 'Rubik',
                                color: '#dfsda',
                                offsetY: -10
                            },
                            value: {
                                show: true,
                                fontSize: '16px',
                                fontFamily: 'Helvetica, Arial, sans-serif',
                                color: undefined,
                                offsetY: 16,
                                formatter: function (val) {
                                    return val
                                }
                            },
                            total: {
                                show: true,
                                label: 'Total',
                                color: '#373d3f',
                                formatter: function (w) {
                                    return w.globals.seriesTotals.reduce((a, b) => {
                                        return a + b
                                    }, 0)
                                }
                            }
                        }
                    }
                }
            },

            dataLabels: {
                enabled: true,
                formatter: function (val) {
                  return parseInt(val) + "%"
                }
            },

            chart: {
                type: 'donut',
                height: 350
            },
            title: {
                // text: "Total Pendientes de Solución"
            },
            labels: data.labels,
            series: data.series,
            colors: ['#008ffb', '#00e396', '#fa7500', '#ff4560', '#775dd0',  '#5d4037', '#ffc107', '#7f8c8d'],
            
            legend: {
                position: 'bottom'
            },

            
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
    }

    /* Gráfica para mostrar totales de incidentes */
    function carga_Grafica02(){
        $("#chart2").empty();
        var rango = $("#txt_rango").val();

        var options = {
           series: [
           ],

            chart: {
                type: 'bar',
                height: 350
            },
            title: {
                text: "Pendientes de Solución - Detalle por Campus y Prioridad"
            },
            
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
        
            dataLabels: {
                enabled: true
            },

            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },

            xaxis: {
                categories: ['Urgente', 'Alta', 'Media', 'Baja'],
            },
            
            colors: ['#008ffb', '#00e396', '#fa7500', '#ff4560', '#775dd0',  '#5d4037', '#ffc107', '#7f8c8d'],
            
            yaxis: {
                tickAmount: 1,
                title: {
                    text: 'Nro. de Tareas/Incidentes '
                },
                labels: {
                    formatter: function(val) {
                        return val.toFixed(0)
                    }
                }
            },
        
            fill: {
                opacity: 1
            },
        
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " incidentes"
                    }
                }
            } ,
            
            noData: {
                text: 'Cargando...'
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();

        $.ajax({
            type: "POST",
            url: "../?action=get_incidentes_graficos",
            dataType: "json",
            data: {
                opt : 8,
                rango: rango
            },
            beforeSend: function() {
              // $('#msj_cargando').show();
            },
            success: function(response) {
                $.each(response, function( key, value ) { 
                    // console.log(value);
                    chart.appendSeries({
                      name: key,
                      data: value
                    });
                });
            },
            complete: function() {
            }
        });
    }

    /* DIV para mostrar total por ESTADO DE ATENCIÓN */
    function carga_TotalEstadoAt(){
        var rango = $("#txt_rango").val();

        $.ajax({
            type: "POST",
            url: "../?action=get_incidentes_graficos",
            data: {
                opt : 5,
                rango: rango
            },
            beforeSend: function() {
              // $('#msj_cargando').show();
            },
            success: function(response) {
                $("#div_total_estadoat").html(response);
                // temp = response;
            },
            complete: function() {
            }
        });
    }

    /* DIV para mostrar total por PRIORIDAD */
    function carga_TotalPrioridad(){
        // $("#chart3").empty();
        var rango = $("#txt_rango").val();

        $.ajax({
            type: "POST",
            url: "../?action=get_incidentes_graficos",
            data: {
                opt : 6,
                rango: rango
            },
            beforeSend: function() {
              // $('#msj_cargando').show();
            },
            success: function(response) {
                $("#div_total_prioridad").html(response);
                // temp = response;
            },
            complete: function() {
            }
        });
    }

</script>