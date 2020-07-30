<?php
    $lista_usariosasignados = UExpTecnicosData::getUsuariosAsigIncid();

    $js_txt_30dias = "";
    for ($i=30; $i >=0 ; $i--) { 
       $js_txt_30dias .= "'" . date("d M",strtotime(date("d-m-Y")."- {$i} days")) . "',";
    }
    rtrim($js_txt_30dias,',');
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

    .zoom-img, .zoom-img-wrap{
        position: fixed !important;
    }
</style>

<div class="app-main__inner">
    <div>
        <div class="text-center mb-1">
            <input type="hidden" id="txt_rango" value="2"/>
            <h5 class="menu-header-title mb-3 fsize-3">Tareas e Incidencias</h5>
            <div role="group" class="mb-2 btn-group-lg btn-group">
                <button type="button" data-xrango="1" class="sel_filtro_rango btn-shadow btn btn-info">Hoy</button>
                <button type="button" data-xrango="2" class="sel_filtro_rango btn-shadow active btn btn-info">Semana</button>
                <button type="button" data-xrango="3" class="sel_filtro_rango btn-shadow btn btn-info">Mes</button>
                <button type="button" data-xrango="4" class="sel_filtro_rango btn-shadow btn btn-info">Todos</button>
            </div>
        </div>

        <div class="container">
            <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-rounded-lg">
                <li class="nav-item">
                    <a role="tab" class="nav-link active show" id="tab-0" data-toggle="tab" href="#tab-content-0" aria-selected="true">
                        <span >Campus</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1" aria-selected="false">
                        <span>Usuarios</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <!-- Tab CAMPUS -->
            <div id="tab-content-0" class="tab-pane tabs-animation fade active show" role="tabpanel">
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

                <div class="row">
                    <div class="col-md-12 ">
                        <div class="card mb-3 widget-chart no-gutters ">
                            <!-- Gráfica 03 - Evolutivos ultimos 60 dias  -->
                            <div id="chart3" style="min-height: 365px">

                            </div>
                        </div>
                    </div>
                    
                </div>

                <!-- Vista por campus -->
                <div class="row" id="div_campus_detalle">
                    
                </div>
            </div> 

            <!-- Tab TÉCNICOS -->
            <div id="tab-content-1" class="tab-pane tabs-animation fade" role="tabpanel">
                <div class="row" id="div_usuarios_detalle">
                    
                    <!--  -->

                    <!--  -->

                </div>
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
                carga_Grafica03();
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

                $(".btn_estado_campus_modal").click(function(){

                    var estado = $(this).data("xestado");
                    var campus = $(this).data("xcampus");
                    $(".container-right-rt").html("")
                    carga_DetalleEstadoCampus(estado, campus);

                    $(".app-drawer-wrapper").addClass("drawer-open");
                    $(".app-drawer-overlay").removeClass("d-none");

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
        $.getJSON(url, {opt:2, rango:rango}, buildAppChart);
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

        /* Gráfica para mostrar totales de incidentes */
    function carga_Grafica03(){
        $("#chart3").empty();
        var rango = $("#txt_rango").val();
        
        var options = {
          series: [

        ],
          chart: {
          height: 400,
          type: 'line',
          zoom: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          width: [5, 7, 5],
          curve: 'straight',
          dashArray: [0, 8, 5]
        },
        title: {
          text: 'Evolutivo ultimos 30 dias',
          align: 'left'
        },
        legend: {
          tooltipHoverFormatter: function(val, opts) {
            return val + ': ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
          }
        },
        markers: {
          size: 0,
          hover: {
            sizeOffset: 6
          }
        },
        xaxis: {
          categories: [ <?php echo $js_txt_30dias;?> ],
        },
        tooltip: {
          y: [
            {
              title: {
                formatter: function (val) {
                  return val
                }
              }
            },
            {
              title: {
                formatter: function (val) {
                  return val 
                }
              }
            },
            {
              title: {
                formatter: function (val) {
                  return val;
                }
              }
            }
          ]
        },
        grid: {
          borderColor: '#f1f1f1',
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart3"), options);
        chart.render();

        $.ajax({
            type: "POST",
            url: "../?action=get_incidentes_graficos",
            dataType: "json",
            data: {
                opt : 9,
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
                /* Boton Solucionados */
                $(".btn_estado_modal").click(function(){
                    var estado = $(this).data("xid");
                    $(".container-right-rt").html("")
                    carga_DetalleEstadoGeneral(estado);
                    // alert("HI");
                    $(".app-drawer-wrapper").addClass("drawer-open");
                    $(".app-drawer-overlay").removeClass("d-none");

                })
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

    /* FUNCIONES PARA TAB ESTADO GENERAL */
    function carga_DetalleEstadoGeneral(estado){
        var rango = $("#txt_rango").val();
        $.ajax({
            type: "POST",
            url: "../?action=incidentesger_load",
            data: {
                opt : 5,
                rango: rango,
                estado: estado
            },
            beforeSend: function() {
                $('#page-loader').fadeIn(500);
            },
            success: function(data) {
                $(".container-right-rt").html(data);
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

    /* FUNCIONES PARA TAB ESTADO POR CAMPUS */
    function carga_DetalleEstadoCampus(estado, campus){
        var rango = $("#txt_rango").val();
        $.ajax({
            type: "POST",
            url: "../?action=incidentesger_load",
            data: {
                opt : 6,
                rango: rango,
                estado: estado,
                campus: campus
            },
            beforeSend: function() {
                $('#page-loader').fadeIn(500);
            },
            success: function(data) {
                $(".container-right-rt").html(data);
            },
            error: function(xhr,textStatus,err){
                console.log("readyState: " + xhr.readyState);
                console.log("responseText: "+ xhr.responseText);
                console.log("status: " + xhr.status);
                console.log("text status: " + textStatus);
                console.log("error: " + err);
            },
            complete: function() {
                // $(".list-group-flush2").toggle();
                // $(".card-usuario").click(function(){
                //     $(this).find(".list-group-flush2").fadeIn(500);
                // })

                // $(".btn_usuarios_prio").click(function(){
                //     var xusuario =  $(this).data("xusuario");
                //     var xprio = $(this).data("xprio");
                //     var temp = $(this).parents('ul.sub2').find('ul');
                //     $.ajax({
                //         type: "POST",
                //         url: "../?action=incidentesger_load", 
                //         data: {
                //             rango : rango,
                //             opt : 4,
                //             usuario : xusuario,
                //             prio : xprio
                //         },
                //         beforeSend: function() {
                //           $('#page-loader').fadeIn(500);
                //         },
                //         success: function(data) {
                //             temp.html(data);                 
                //         },
                //         error: function(xhr,textStatus,err){
                //             console.log("readyState: " + xhr.readyState);
                //             console.log("responseText: "+ xhr.responseText);
                //             console.log("status: " + xhr.status);
                //             console.log("text status: " + textStatus);
                //             console.log("error: " + err);
                //         },
                //         complete: function() {
                //             $('#page-loader').fadeOut(500);
                //         }
                //     });
                // })

                $('#page-loader').fadeOut(500);
            }
        });
    }

</script>