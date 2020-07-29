<?php
    $lista_usariosasignados = UExpTecnicosData::getUsuariosAsigIncid();
    $lista_uexpl = UExplData::getUExplAllActive();
    $lista_local = LocalData::getLocalAllActive();
    $lista_periodo = PeriodoData::getPeriodoAll();

    $js_lista_campus = "";
    foreach ($lista_uexpl as $row_uexpl) {
        $js_lista_campus .= "\"".$row_uexpl->UExp_vNombre."\", ";
    }
    $js_lista_campus = trim($js_lista_campus, ',');;
?>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js" type="text/javascript"></script>

<style type="text/css">
    .parpadea {
        animation-name: parpadeo;
        animation-duration: 1s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;

        -webkit-animation-name:parpadeo;
        -webkit-animation-duration: 2s;
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
    
    .tabs-animated .nav-link::before {    
        background: #794C8A !important;
    }
</style>

<div class="app-main__inner">
    <div>
        <div class="text-center mb-1">
            <input type="hidden" id="txt_rango" value="2"/>
            <h5 class="menu-header-title mb-3 fsize-3">Plan de Mantenimiento Preventivo</h5>
             <div class="d-inline-block dropdown">
                    <select name="sel_filtro_periodo" id="sel_filtro_periodo" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required >
                        <?php
                        foreach ($lista_periodo as $row_periodo) {
                            $selected = ($hoy==($row_periodo->Per_vAnual)) ? "selected='selected'" : "" ; 
                        ?>
                            <option value="<?php echo $row_periodo->Per_nIdPeriodo; ?>" <?php echo $selected; ?> > <?php echo $row_periodo->Per_vAnual ;?> </option>
                        <?php
                        }
                        ?>                   
                    </select>
                </div>
           <!--  <div role="group" class="mb-2 btn-group-lg btn-group">
                <button type="button" data-xrango="1" class="sel_filtro_rango btn-shadow btn btn-info">Hoy</button>
                <button type="button" data-xrango="2" class="sel_filtro_rango btn-shadow active btn btn-info">Semana</button>
                <button type="button" data-xrango="3" class="sel_filtro_rango btn-shadow btn btn-info">Mes</button>
                <button type="button" data-xrango="4" class="sel_filtro_rango btn-shadow btn btn-info">Todos</button>
            </div> -->
        </div>

        <div class="container">
            <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-rounded-lg">
                <li class="nav-item">
                    <a role="tab" class="nav-link active show" id="tab-0" data-toggle="tab" href="#tab-content-0" aria-selected="true">
                        <span >General</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1" aria-selected="false">
                        <span>Campus</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <!-- Tab CAMPUS -->
            <div id="tab-content-0" class="tab-pane tabs-animation fade active show" role="tabpanel">
                <div class="row">
                    <!-- DIV TOTALES POR ESTADO DE ATENCION -->
                    <!-- <div class="col-md-4 mb-3" id="div_total_estadoat">               
                        
                    </div> -->
                   
                    <!-- <div class="col-md-4 mb-3 card "> -->
                         <!-- <div class="card-body"> -->
                            <!-- <h5 class="card-title">Total Pendientes por <b>Campus</b></h5> -->
                            <!-- Gráfica 01 - Totales pendientes por campus  -->
                            <!-- <div id="chart1" style="min-height: 365px">

                            </div> -->
                        <!-- </div> -->
                    <!-- </div> -->

                    <!-- TOTAL PENDIENTES POR PRIORIDAD -->
                    <!-- <div class="col-md-4 mb-3" id="div_total_prioridad">               
                        
                    </div> -->
                    
                </div>

                <!-- GRAFICO TOTAL POR CAMPUS -->
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="card mb-3 widget-chart no-gutters ">
                            <!-- Gráfica 02 - Totales por campus y prioridad  -->
                            <div id="chart2" style="min-height: 365px">

                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- DIV TOTAL POR CAMPUS -->
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <div><h5 class="menu-header-title text-capitalize text-dark">Avance por Campus/Local</h5></div>
                        <div class="btn-actions-pane-right">
                            <!-- <div role="group" class="btn-group-sm btn-group">
                                <button class="active btn btn-outline-dark">Last Week</button>
                                <button class="btn btn-outline-dark">All Month</button>
                            </div> -->
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <!-- <th class="text-center"></th> -->
                                <th class="text-center">Campus</th>
                                <th class="text-center">Local</th>
                                <th class="text-center">Progreso</th>
                                <th class="text-center">Total Pendientes</th>
                                <th class="text-center">*</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($lista_local as $row_local) {
                            ?>
                            <tr>
                                <!-- <td class="text-center text-muted">#345</td> -->
                                <td class="text-center">
                                    <div class="badge badge-pill pl-2 pr-2 badge-secondary"><?php echo $row_local->UExp_vNombre; ?></div>
                                </td>
                                <td>
                                    <div class="widget-content p-0">
                                        <?php echo $row_local->Loc_vNombreLocal; ?>
                                        <!-- <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img class="rounded" src="assets/images/avatars/1.jpg" alt="" width="32">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">John Doe</div>
                                                <div class="widget-subheading opacity-7">Web Developer</div>
                                            </div>
                                        </div> -->
                                    </div>
                                </td>
                                <td class="text-center">
                                    <!-- <div class="progress-bar-xs progress">
                                        <?php 
                                            $temp_al = rand(5,18); 

                                        ?>
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo rand(20,38); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $temp_al; ?>%;"></div> 
                                    </div> -->
                                    <div class="mb-0 progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo rand(15,28);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo rand(15,28);?>%;"><?php echo rand(15,28);?>%</div>
                                    </div>
                                </td>

                                <!-- Pendientes -->
                                <td class="text-center" style="width: 150px; position: relative;">
                                    <?php echo rand(5,18); ?>
                                </td>

                                <td class="text-center">
                                    <button type="button" class="btn-icon btn-icon-only btn btn-light btn-sm">
                                        <i class="icon ion-android-apps"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php
                                $temp_local = $row_local->UExp_vNombre;
                                }
                            ?>
                           
                            <!-- <tr>
                                <td class="text-center text-muted">#347</td>
                                <td class="text-center">
                                    <div class="badge badge-pill pl-2 pr-2 badge-success">Completed</div>
                                </td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img class="rounded" src="assets/images/avatars/2.jpg" alt="" width="32">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Ruben Tillman</div>
                                                <div class="widget-subheading opacity-7">Etiam sit amet orci eget</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="progress-bar-xs progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                                    </div>
                                </td>
                                <td class="text-center" style="width: 150px; position: relative;">
                                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 171px; height: 61px;"></div></div><div class="contract-trigger"></div></div></td>
                                <td class="text-center">
                                    <button type="button" class="btn-icon btn-icon-only btn btn-light btn-sm">
                                        <i class="icon ion-android-apps"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center text-muted">#321</td>
                                <td class="text-center">
                                    <div class="badge badge-pill pl-2 pr-2 badge-danger">In Progress</div>
                                </td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img class="rounded" src="assets/images/avatars/3.jpg" alt="" width="32">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Elliot Huber</div>
                                                <div class="widget-subheading opacity-7">Lorem ipsum dolor sic</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="progress-bar-xs progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%;"></div>
                                    </div>
                                </td>
                                <td class="text-center" style="width: 150px; position: relative;">
                                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 171px; height: 61px;"></div></div><div class="contract-trigger"></div></div></td>
                                <td class="text-center">
                                    <button type="button" class="btn-icon btn-icon-only btn btn-light btn-sm">
                                        <i class="icon ion-android-apps"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center text-muted">#55</td>
                                <td class="text-center">
                                    <div class="badge badge-pill pl-2 pr-2 badge-info">On Hold</div>
                                </td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img class="rounded" src="assets/images/avatars/4.jpg" alt="" width="32">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Vinnie Wagstaff</div>
                                                <div class="widget-subheading opacity-7">UI Designer</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="progress-bar-xs progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;"></div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="bar-sparkline-2"><canvas style="display: inline-block; width: 152px; height: 35px; vertical-align: top;" width="152" height="35"></canvas></div>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn-icon btn-icon-only btn btn-light btn-sm">
                                        <i class="icon ion-android-apps"></i>
                                    </button>
                                </td>
                            </tr> -->
                            </tbody>
                        </table>
                    </div>
                   <!--  <div class="d-block clearfix card-footer">
                        <div class="float-left">
                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger btn-sm">Delete</button>
                        </div>
                        <div class="float-right">
                            <button class="btn-wide btn btn-link btn-sm">View All</button>
                            <button class="btn-wide btn-shadow btn btn-primary btn-sm">Add New Entry</button>
                        </div>
                    </div> -->
                </div>


                
                <!-- Vista por campus -->
               <!--  <div class="row" id="div_campus_detalle">
                    
                </div> -->
            </div> 

            <!-- Tab TÉCNICOS -->
            <div id="tab-content-1" class="tab-pane tabs-animation fade" role="tabpanel">
                <!-- <div class="row" id="div_usuarios_detalle"> -->
                    
                    <!--  -->

                    <!--  -->

                <!-- </div> -->
            </div>
        </div>

        
                    
    </div>
        
</div>

<script>
    $(document).ready(function() {
        $('#msj_cargando').hide();
        carga_DetalleCampus();    
    });
    
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
            url: "../?action=incidentesger_load",
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

                carga_DetalleUsuarios();

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
                        url: "../?action=incidentesger_load", 
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
        $.getJSON(url, {opt:2, rango:rango}, buildAppChart01);
    }
    function buildAppChart01(data) {
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
                height: 350,
                stacked: true,
            },
            title: {
                text: "Detalle por Campus y Estado"
            },
            
            plotOptions: {
                bar: {
                    horizontal: true
                },
            },
        
            dataLabels: {
                enabled: true
            },

            stroke: {
                // show: true,
                width: 1,
                colors: ['#fff']
            },

            xaxis: {
                categories: [<?php echo $js_lista_campus;?>],
                labels: {
                    formatter: function (val) {
                      return val //+ "K"
                    }
                }
            },
            
            colors: ['#008ffb', '#00e396', '#fa7500', '#ff4560', '#775dd0',  '#5d4037', '#ffc107', '#7f8c8d'],
            
            yaxis: {
                // tickAmount: 1,
                title: {
                    text: 'Nro. de Tareas/Incidentes '
                }
                // labels: {
                //     formatter: function(val) {
                //         return val.toFixed(0)
                //     }
                // }
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
            url: "../?action=get_pmp_graficos",
            dataType: "json",
            data: {
                opt : 1,
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
                opt : 3,
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
                opt : 4,
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

    /* FUNCIONES PARA TAB USUARIOS */
    function carga_DetalleUsuarios(){
        var rango = $("#txt_rango").val();
        $.ajax({
            type: "POST",
            url: "../?action=incidentesger_load",
            data: {
                opt : 3,
                rango: rango
            },
            beforeSend: function() {
                $('#page-loader').fadeIn(500);
            },
            success: function(data) {
                $("#div_usuarios_detalle").html(data);
            },
            error: function(xhr,textStatus,err){
                console.log("readyState: " + xhr.readyState);
                console.log("responseText: "+ xhr.responseText);
                console.log("status: " + xhr.status);
                console.log("text status: " + textStatus);
                console.log("error: " + err);
            },
            complete: function() {
                // carga_Grafica01();
                // carga_Grafica02();
                // carga_TotalEstadoAt();
                // carga_TotalPrioridad();

                $(".list-group-flush2").toggle();
                $(".card-usuario").click(function(){
                    $(this).find(".list-group-flush2").fadeIn(500);
                })

                $(".btn_usuarios_prio").click(function(){
                    var xusuario =  $(this).data("xusuario");
                    var xprio = $(this).data("xprio");
                    var temp = $(this).parents('ul.sub2').find('ul');
                    $.ajax({
                        type: "POST",
                        url: "../?action=incidentesger_load", 
                        data: {
                            rango : rango,
                            opt : 4,
                            usuario : xusuario,
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

</script>