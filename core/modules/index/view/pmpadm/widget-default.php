<?php
    $u=null;
    if(Session::getUID()!=""){
        $u = UserData::getById(Session::getUID());
        $u_type = $u->user_type;
        
        $hoy = date("Y");

        $lista_periodo = PeriodoData::getPeriodoAll();
        $lista_uexpl = UExplData::getUExplAllActive();
    }
    else{
        echo "<script>window.location='index.php';</script>";
    }

?>

<style type="text/css">
    .table th, .table td {
        padding: 0.07rem;
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
                <div>Plan de Mantenimiento Preventivo
                <?php if($u_type=="1"){ ?>
                    <div class="page-title-subheading">Ingreso y asignación</div>
                <?php } else { ?>
                    <div class="page-title-subheading">Reporte General </div>
                <?php } ?>
                </div>
            </div>
            <div class="page-title-actions">
                <?php if($u_type=="1"){ ?>
                <button type="button" data-toggle="tooltip" title="Nuevo Incidente" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark mostrar_add_inc">
                    <i class="fa fa-plus"></i>
                </button>
                <?php } ?>

                <!-- Filtro Periodo -->
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

                <!-- Filtro Campus -->
                <div class="d-inline-block dropdown">
                    <select name="sel_filtro_uexpl" id="sel_filtro_uexpl" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required >
                        <option value=""> -Campus- </option>
                    <?php
                        foreach ($lista_uexpl as $row_uexpl) {
                    ?>
                        <option value="<?php echo $row_uexpl->UExp_nIdUnExp?>"><?php echo $row_uexpl->UExp_vNombre ;?></option>
                    <?php
                            
                        }
                    ?>
                    </select>
                </div>
            </div>    
        </div>
    </div>

    <div class="row" id="div_detalle_pmp">
        
    </div>

</div>

<script>
    $(document).ready(function() {

        $("#sel_filtro_periodo, #sel_filtro_uexpl").change(function(){
            carga_DetallePMP();
        })
    })


    /* Muestra Detalle de PMP por local */
    function carga_DetallePMP(){
        // $('body,html').stop(true,true).animate({                
        //         scrollTop: $("#div_detalle_pmp").offset().top
        //     },1000);
        $("#div_detalle_pmp").empty();
        $.ajax({
            type: "POST",
            url: "../?action=get_pmp_general", 
            data: {
                opt : null,
                campus: $("#sel_filtro_uexpl").val(),
                periodo: $("#sel_filtro_periodo").val()
            },
            beforeSend: function() {
              $('#page-loader').fadeIn(500);
            },
            success: function(data) {
                $("#div_detalle_pmp").html(data);
                // $('[data-toggle="tooltip"]').tooltip();                 
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

                // load_script01();
            }
        });
    }
</script>