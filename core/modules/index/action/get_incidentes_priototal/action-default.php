<?php
	$u=null;
	if(Session::getUID()!=""){
	    $u = UserData::getById(Session::getUID());
	    $idusuario = $u->id;
        $tipo_usuario = $u->user_type;

        $uexp_id = $_POST["campus"];

        switch ($tipo_usuario) {
            case 2: /* Técnicos */
                $row_total_prio = IncidentesData::getTotalIncPrio_ByIdUsuAndIdCampus($idusuario, $uexp_id);
                break;
                
            case 5: /* Analistas */
                $row_total_prio = IncidentesData::getTotalIncPrio_ByIdUsuAndIdCampus(9, $uexp_id);
                break;
            
            default:
                $row_total_prio = null;
                break;
        }

        if($row_total_prio->cont==0){
            $row_total_prio->tot_urgente_hoy=0;
            $row_total_prio->tot_alta_hoy=0;
            $row_total_prio->tot_media_hoy=0;
            $row_total_prio->tot_baja_hoy=0;

            $row_total_prio->tot_urgente=0;
            $row_total_prio->tot_alta=0;
            $row_total_prio->tot_media=0;
            $row_total_prio->tot_baja=0;
        }
	}
	else{
	    echo "<script>window.location='index.php';</script>";
	}
?>
    <div class="col-sm-3 bg-danger mostrar_lista" data-xval="3">
        <div class="widget-chart widget-chart-hover text-white" style="background-color: #d92550 !important;">
            <div class="icon-wrapper rounded-circle parpadea">
                <div class="icon-wrapper-bg bg-white"></div>
                <i class="lnr-heart-pulse text-white"></i></div>
            <div class="widget-numbers"><?php echo $row_total_prio->tot_urgente; ?></div>
            <div class="widget-subheading h3"><b>URGENTE</b></div>
            <div class="widget-description text-white">
                <b>Hoy&nbsp;<i class="fa fa-angle-up"></i>
                <span class="pl-0"><?php echo $row_total_prio->tot_urgente_hoy; ?></span></b>
            </div>
        </div>
    </div>
    <div class="col-sm-3 mostrar_lista"  data-xval="2" style="border-right-width: 1px;">
        <div class="widget-chart widget-chart-hover text-danger">
            <div class="icon-wrapper rounded-circle">
                <div class="icon-wrapper-bg bg-danger"></div>
                <i class="lnr-warning"></i>
            </div>
            <div class="widget-numbers"><?php echo $row_total_prio->tot_alta; ?></div>
            <div class="widget-subheading h3"><b>ALTA</b></div>
            <div class="widget-description text-danger">
                <b>Hoy&nbsp;<i class="fa fa-angle-up"></i>
                <span class="pl-0"><?php echo $row_total_prio->tot_alta_hoy; ?></span></b>
            </div>
        </div>
    </div>
    <div class="col-sm-3 mostrar_lista" data-xval="1">
        <div class="widget-chart widget-chart-hover text-warning">
            <div class="icon-wrapper rounded-circle">
                <div class="icon-wrapper-bg bg-warning"></div>
                <i class="lnr-hourglass text-warning"></i>
            </div>
            <div class="widget-numbers"><?php echo $row_total_prio->tot_media; ?></div>
            <div class="widget-subheading h3"><b>MEDIA</b></div>
            <div class="widget-description text-warning">
                <b>Hoy&nbsp;<i class="fa fa-angle-up"></i>
                <span class="pl-0"><?php echo $row_total_prio->tot_media_hoy; ?></span></b>
            </div>
        </div>
    </div>
    <div class="col-sm-3 mostrar_lista"  data-xval="0">
        <div class="widget-chart widget-chart-hover br-br text-success">
            <div class="icon-wrapper rounded-circle">
                <div class="icon-wrapper-bg bg-success"></div>
                <i class="lnr-construction"></i></div>
            <div class="widget-numbers text-success"><?php echo $row_total_prio->tot_baja; ?></div>
            <div class="widget-subheading h3"><b>BAJA</b></div>
            <div class="widget-description text-success">
                <b>Hoy&nbsp;<i class="fa fa-angle-up"></i>
                <span class="pl-0"><?php echo $row_total_prio->tot_baja_hoy; ?></span></b>
            </div>
        </div>
    </div>
