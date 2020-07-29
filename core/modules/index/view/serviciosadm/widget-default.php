<?php
    $u=null;
    if(Session::getUID()!=""){
        $u = UserData::getById(Session::getUID());
        $u_type = $u->user_type;
        
        $hoy = date("Y");

        // $lista_periodo = PeriodoData::getPeriodoAll();
        // $lista_uexpl = UExplData::getUExplAllActive();
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
    <div class="app-page-title mb-0">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph text-success">
                    </i>
                </div>
                <div>Montos Facturados
                    <div class="page-title-subheading">Agua y Energía</div>
                </div>
            </div>
            <div class="page-title-actions">

        
            </div>    
        </div>
    </div>

    <div class="row mb-5">
        <iframe width="100%" height="600" src="https://datastudio.google.com/embed/reporting/b2230d7c-aed5-48ca-b503-893cbd6ba9f6/page/vGlUB" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

    <div class="app-page-title mb-0">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph text-success">
                    </i>
                </div>
                <div>Consumo por Servicio
                    <div class="page-title-subheading">Agua y Energía</div>
                </div>
            </div>
            <div class="page-title-actions">

        
            </div>    
        </div>
    </div>

    <div class="row">
        <iframe width="100%" height="600" src="https://datastudio.google.com/embed/reporting/b2230d7c-aed5-48ca-b503-893cbd6ba9f6/page/YaiWB" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#page-loader').fadeOut(500);
        
    })


</script>