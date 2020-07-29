<?php
	$u=null;
	if(Session::getUID()!=""){
	    $u = UserData::getById(Session::getUID());
	    $idusuario = $u->id;

        $opt = $_REQUEST["opt"];
        $rango = $_REQUEST["rango"];
        switch ($rango) {
            case 1:
                $rango = 0;
                break;
            case 2:
                $rango = 7;
                break;
            case 3:
                $rango = 30;
                break;
            case 4:
                $rango = 365;
                break;
            
            default:
                $rango = 1;
                break;
        }

        switch ($opt) {
            case 1: /* Gráfica BARRAS Por Prioridad - Vista General (Manuel) */
                $lista_total_inc_campus = IncidentesData::getTotalIncCampusPrioridad_ByRango($rango);
                $data = array();

                foreach ($lista_total_inc_campus as $row_total_inc_campus) {
                    $total = $row_total_inc_campus->tot_urgente+ $row_total_inc_campus->tot_alta+$row_total_inc_campus->tot_media+$row_total_inc_campus->tot_baja;

                    $data[$row_total_inc_campus->UExp_vNombre] = [
                                    // $total,
                                    $row_total_inc_campus->tot_urgente,
                                    $row_total_inc_campus->tot_alta,
                                    $row_total_inc_campus->tot_media,
                                    $row_total_inc_campus->tot_baja];
                }

                header("Content-Type: application/json");
                print json_encode($data);
                break;
            
            case 2: /* Gráfica DONUT Total Pendientes - Vista General (Manuel) */
                $array_labels = array();
                $array_series = array();

                $lista_total_inc_campus = IncidentesData::getTotalIncCampusEstado_ByRango($rango);
                

                foreach ($lista_total_inc_campus as $row_total_inc_campus) {
                    $total = $row_total_inc_campus->tot_pendiente + $row_total_inc_campus->tot_encurso;
                    array_push($array_labels, $row_total_inc_campus->UExp_vNombre);
                    array_push($array_series, (int)$total);
                }

                // $data["labels"] = array("UNO","DOS","TRES");
                // $data["series"] = array(4,5,6);
                $data["labels"] = $array_labels;
                $data["series"] = $array_series;

                header("Content-Type: application/json");
                print json_encode($data);
                break;
            
            case 3: /* Totales por Estado de Atencion - Vista General (Manuel) */
                $lista_total_inc_campus = IncidentesData::getTotalIncCampusEstado_ByRango($rango);
                $total_gen = 0;
                $total_pendientes = 0;
                $total_encurso = 0;
                $total_solucionados = 0;
                foreach ($lista_total_inc_campus as $row_total_inc_campus) {
                    $total_pendientes += $row_total_inc_campus->tot_pendiente;
                    $total_encurso += $row_total_inc_campus->tot_encurso;
                    $total_solucionados += $row_total_inc_campus->tot_solucionado;
                }
                $total_gen = $total_pendientes + $total_encurso + $total_solucionados;

                ?>

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Totales por <b>Estado de Atención</b></h5>
                        <div class="grid-menu grid-menu-2col">
                            <div class="no-gutters row">
                                <div class="col-sm-6 bg-dark text-white">
                                    <button style="cursor:default"  class=" btn-icon-vertical btn-transition btn btn-outline-dark text-white"><i class="lnr-pushpin btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-dark badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_gen; ?> </span></b>
                                            </h3>
                                        </div>Total
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn-icon-vertical btn-transition btn btn-outline-info btn_estado_modal" data-xid="1"><i class="lnr-sad btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-info badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_pendientes; ?> </span></b>
                                            </h3>
                                        </div>Pendientes
                                    </button>
                                </div>
                                <div class="col-sm-6" >
                                    <button class="btn-icon-vertical btn-transition  btn btn-outline-warning btn_estado_modal" data-xid="2"><i class="lnr-neutral btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-warning badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_encurso; ?> </span></b>
                                            </h3>
                                        </div>En Curso
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn-icon-vertical btn-transition btn btn-outline-success btn_estado_modal" data-xid="3"><i class="lnr-smile btn-icon-wrapper btn-icon-lg mb-3" data-> </i><span class="badge badge-success badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_solucionados; ?> </span></b>
                                            </h3>
                                        </div>Solucionados
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                                      

                <?php
                break;

            case 4: /* Totales Pendientes por Prioridad - Vista General  (Manuel) */
                $lista_total_inc_campus = IncidentesData::getTotalIncCampusPrioridad_ByRango($rango);    
                $total_urgente = 0;
                $total_alta = 0;
                $total_media = 0;
                $total_baja = 0;
                foreach ($lista_total_inc_campus as $row_total_inc_campus) {
                    $total_urgente += $row_total_inc_campus->tot_urgente;
                    $total_alta += $row_total_inc_campus->tot_alta;
                    $total_media += $row_total_inc_campus->tot_media;
                    $total_baja += $row_total_inc_campus->tot_baja;
                }

                ?>

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pendientes por <b>Prioridad</b></h5>
                        <div class="grid-menu grid-menu-2col">
                            <div class="no-gutters row">
                                <div class="col-sm-6 bg-danger text-white ">
                                    <button class=" btn-icon-vertical btn-transition btn btn-outline-danger text-white parpadea"><i class="lnr-heart-pulse btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-danger badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_urgente; ?> </span></b>
                                            </h3>
                                        </div>URGENTE
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn-icon-vertical btn-transition btn btn-outline-danger"><i class="lnr-warning btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-danger badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_alta; ?> </span></b>
                                            </h3>
                                        </div>ALTA
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn-icon-vertical btn-transition  btn btn-outline-warning"><i class="lnr-hourglass btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-warning badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_media; ?> </span></b>
                                            </h3>
                                        </div>MEDIA
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn-icon-vertical btn-transition  btn btn-outline-success"><i class="lnr-construction btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-success badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_baja; ?> </span></b>
                                            </h3>
                                        </div>BAJA
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                

                <?php
                break;
            
            case 5: /* Totales por Estado de Atencion - Vista Gerente Campus (solo sus campus) */
                $id_gerente = $u->id;
                $lista_total_inc_campus = IncidentesData::getTotalIncCampusEstado_ByRangoAndGerente($rango, $u->id);

                $total_gen = 0;
                $total_pendientes = 0;
                $total_encurso = 0;
                $total_solucionados = 0;
                foreach ($lista_total_inc_campus as $row_total_inc_campus) {
                    $total_pendientes += $row_total_inc_campus->tot_pendiente;
                    $total_encurso += $row_total_inc_campus->tot_encurso;
                    $total_solucionados += $row_total_inc_campus->tot_solucionado;
                }
                $total_gen = $total_pendientes + $total_encurso + $total_solucionados;

                ?>

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Totales por <b>Estado de Atencióndd</b></h5>
                        <div class="grid-menu grid-menu-2col">
                            <div class="no-gutters row">
                                <div class="col-sm-6 bg-dark text-white">
                                    <button class=" btn-icon-vertical btn-transition btn btn-outline-dark text-white"><i class="lnr-pushpin btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-dark badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_gen; ?> </span></b>
                                            </h3>
                                        </div>Total
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn-icon-vertical btn-transition btn btn-outline-info"><i class="lnr-sad btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-info badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_pendientes; ?> </span></b>
                                            </h3>
                                        </div>Pendientes
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn-icon-vertical btn-transition  btn btn-outline-warning"><i class="lnr-neutral btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-warning badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_encurso; ?> </span></b>
                                            </h3>
                                        </div>En Curso
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn-icon-vertical btn-transition  btn btn-outline-success"><i class="lnr-smile btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-success badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_solucionados; ?> </span></b>
                                            </h3>
                                        </div>Solucionados
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                                      
                <?php
                break;

            case 6: /* Totales Pendientes por Prioridad - Vista Gerente Campus (solo sus campus) */
                $id_gerente = $u->id;
                $lista_total_inc_campus = IncidentesData::getTotalIncCampusPrioridad_ByRangoAndIgGerente($rango, $id_gerente);    
                $total_urgente = 0;
                $total_alta = 0;
                $total_media = 0;
                $total_baja = 0;
                foreach ($lista_total_inc_campus as $row_total_inc_campus) {
                    $total_urgente += $row_total_inc_campus->tot_urgente;
                    $total_alta += $row_total_inc_campus->tot_alta;
                    $total_media += $row_total_inc_campus->tot_media;
                    $total_baja += $row_total_inc_campus->tot_baja;
                }

                ?>

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pendientes por <b>Prioridad</b></h5>
                        <div class="grid-menu grid-menu-2col">
                            <div class="no-gutters row">
                                <div class="col-sm-6 bg-danger text-white ">
                                    <button class=" btn-icon-vertical btn-transition btn btn-outline-danger text-white parpadea"><i class="lnr-heart-pulse btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-danger badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_urgente; ?> </span></b>
                                            </h3>
                                        </div>URGENTE
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn-icon-vertical btn-transition btn btn-outline-danger"><i class="lnr-warning btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-danger badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_alta; ?> </span></b>
                                            </h3>
                                        </div>ALTA
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn-icon-vertical btn-transition  btn btn-outline-warning"><i class="lnr-hourglass btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-warning badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_media; ?> </span></b>
                                            </h3>
                                        </div>MEDIA
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn-icon-vertical btn-transition  btn btn-outline-success"><i class="lnr-construction btn-icon-wrapper btn-icon-lg mb-3"> </i><span class="badge badge-success badge-dot badge-dot-lg badge-dot-inside"> </span>
                                        <div class="text-center">
                                            <h3>
                                                <b><span class="count-up-wrapper-4"><?php echo $total_baja; ?> </span></b>
                                            </h3>
                                        </div>BAJA
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                

                <?php
                break;

            case 7: /* Gráfica DONUT Total Pendientes - Vista Gerente Campus (solo sus campus)*/
                $id_gerente = $u->id;
                $array_labels = array();
                $array_series = array();

                $lista_total_inc_campus = IncidentesData::getTotalIncCampusEstado_ByRangoAndIdGerente($rango, $id_gerente);
                

                foreach ($lista_total_inc_campus as $row_total_inc_campus) {
                    $total = $row_total_inc_campus->tot_pendiente + $row_total_inc_campus->tot_encurso;
                    array_push($array_labels, $row_total_inc_campus->UExp_vNombre);
                    array_push($array_series, (int)$total);
                }

                // $data["labels"] = array("UNO","DOS","TRES");
                // $data["series"] = array(4,5,6);
                $data["labels"] = $array_labels;
                $data["series"] = $array_series;

                header("Content-Type: application/json");
                print json_encode($data);
                break;

            case 8: /* Gráfica BARRAS Por Prioridad - Vista Gerente Campus (solo sus campus)*/
                $id_gerente = $u->id;
                $lista_total_inc_campus = IncidentesData::getTotalIncCampusPrioridad_ByRangoIdGerente($rango, $id_gerente);
                $data = array();

                foreach ($lista_total_inc_campus as $row_total_inc_campus) {
                    $total = $row_total_inc_campus->tot_urgente+ $row_total_inc_campus->tot_alta+$row_total_inc_campus->tot_media+$row_total_inc_campus->tot_baja;

                    $data[$row_total_inc_campus->UExp_vNombre] = [
                                    // $total,
                                    $row_total_inc_campus->tot_urgente,
                                    $row_total_inc_campus->tot_alta,
                                    $row_total_inc_campus->tot_media,
                                    $row_total_inc_campus->tot_baja];
                }

                header("Content-Type: application/json");
                print json_encode($data);
                break;

            case 9: /* Gráfica Evolutivo 20 dias - Vista General (Manuel) */
                $data = array();

                $data["Pendientes"] = array();
                $data["Resueltos"] = array();

                for ($i=30; $i >=0 ; $i--) { 
                    $result_temp = IncidentesData::getTotalIncPendAndResu_ByInterval($i);
                    array_push($data["Pendientes"], $result_temp->tot_pendientes);
                    array_push($data["Resueltos"], $result_temp->tot_resueltos);
                }

                // $data["Pendientes"] = [12, 24, 13, 23, 20, 15];
                // $data["Resueltos"] = [2 , 4, 3, 3, 6, 5];

                header("Content-Type: application/json");
                print json_encode($data);
                break;

            default:
                $text_title = "NN";
                break;
        }
	}
	else{
	    echo "<script>window.location='index.php';</script>";
	}

?>

