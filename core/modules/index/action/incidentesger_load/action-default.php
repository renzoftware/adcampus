<?php
	$u=null;
	if(Session::getUID()!=""){
	    $u = UserData::getById(Session::getUID());
	    $idusuario = $u->id;

        $opt = $_POST["opt"];
        $rango;
        switch ($_POST["rango"]) {
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


		// $row_incidente = IncidentesData::getIncidenteByIdIncidente($idincidente);

        // $row_usuario_asignado = UserData::getById($row_incidente->Inc_User_id);
        // $row_campus = UExplData::getById($row_incidente->Inc_UExp_nIdUnExp);
        // $lista_otros_usuarios = UExpTecnicosData::getOtrosUsuariosAsigIncid($row_incidente->Inc_User_id);

	}
	else{
	    echo "<script>window.location='index.php';</script>";
	}

    switch ($opt) {
        case 1: /* CARGA VISTA RESUMEN DE INCIDENCIAS POR CAMPUS */
            $lista_campus = UExplData::getUExplAllActive_ByRango_OrderByTotalInc($rango);
            foreach ($lista_campus as $row_campus) {
                $lista_inc_campus = IncidentesData::getListaInc_ByIdCampusAndRango($row_campus->UExp_nIdUnExp, $rango);
                // var_dump($lista_inc_campus);
                $total_pendientes = 0;
                $total_encurso = 0;
                $total_resueltos = 0;

                $total_urgente = 0;
                $total_alta = 0;
                $total_media = 0;
                $total_baja = 0;

                if(count($lista_inc_campus)>=1){
                    /* Estado Atención */
                    // if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cEstadoAtencion'))["1"])){
                    //     $total_pendientes = array_count_values(array_column($lista_inc_campus, 'Inc_cEstadoAtencion'))["1"];
                    // }
                    // if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cEstadoAtencion'))["2"])){
                    //     $total_encurso += array_count_values(array_column($lista_inc_campus, 'Inc_cEstadoAtencion'))["2"];
                    // }
                    // if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cEstadoAtencion'))["3"])){
                    //     $total_resueltos = array_count_values(array_column($lista_inc_campus, 'Inc_cEstadoAtencion'))["3"];
                    // }

                    /* Prioridad */
                    if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["3"])){
                        $total_urgente = array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["3"];
                    }
                    if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["2"])){
                        $total_alta = array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["2"];
                    }
                    if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["1"])){
                        $total_media = array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["1"];
                    }
                    if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["0"])){
                        $total_baja = array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["0"];
                    }
                }

            ?>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="mb-3 profile-responsive card card-campus">
                        <div class="dropdown-menu-header">
                            <div class="dropdown-menu-header-inner bg-dark">
                                <div class="menu-header-image opacity-8" style="background-image: url('../img/campus/<?php echo $row_campus->UExp_nIdUnExp; ?>.jpg');">
                                </div>
                                <div class="menu-header-content btn-pane-right">
                                    <!-- <div class="font-icon-wrapper font-icon-lg">
                                        <i class="lnr-apartment icon-gradient bg-sunny-morning"> </i>
                                    </div> -->

                                    <div>
                                        <h5 class="menu-header-title text-dark">
                                            <button style="font-size: 1.3rem !important;" class="mb-2 mr-2 btn btn-light "><b><?php echo $row_campus->UExp_vNombre; ?></b></button>
                                        </h5>
                                        <h6 class="mt-1 mb-1">
                                            <a href="javascript:void(0);" class="mb-2 mr-2 badge badge-info"><?php echo $row_campus->total_pendiente; ?> Pendientes</a>

                                            <a href="javascript:void(0);" class="mb-2 mr-2 badge badge-warning"><?php echo $row_campus->total_encurso; ?> En Curso</a>

                                            <a href="javascript:void(0);" class="mb-2 mr-2 badge badge-success text-dark"><?php echo $row_campus->total_solucion; ?> Solucionado</a>
                                        </h6>
                                    </div>

                                    <div class="menu-header-btn-pane">
                                        <button class="mt-2 btn btn-dark opacity-8">Resumen por Prioridad</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush1 sub1">
                            <div class="grid-menu grid-menu-2col ">
                                <div class="no-gutters row">
                                    <div class="col-sm-6 bg-danger text-white btn_campus_prio" data-xcampus="<?php echo $row_campus->UExp_nIdUnExp; ?>" data-xprio="3" >
                                        <button class=" btn-icon-vertical btn-transition btn btn-outline-danger text-white parpadea "><i class="lnr-heart-pulse btn-icon-wrapper btn-icon mb-1"> </i><span class="badge badge-danger badge-dot badge-dot badge-dot-inside"> </span>
                                            <div class="text-center">
                                                <h3 class="mb-0">
                                                    <b><span class=""><?php echo $total_urgente; ?> </span></b>
                                                </h3>
                                            </div>URGENTE
                                        </button>
                                    </div>
                                    <div class="col-sm-6 btn_campus_prio" data-xcampus="<?php echo $row_campus->UExp_nIdUnExp; ?>" data-xprio="2">
                                        <button class="btn-icon-vertical btn-transition btn btn-outline-danger" ><i class="lnr-warning btn-icon-wrapper btn-icon mb-1"> </i><span class="badge badge-danger badge-dot badge-dot badge-dot-inside"> </span>
                                            <div class="text-center">
                                                <h3 class="mb-0">
                                                    <b><span class=""><?php echo $total_alta; ?> </span></b>
                                                </h3>
                                            </div>ALTA
                                        </button>
                                    </div>
                                    <div class="col-sm-6 btn_campus_prio" data-xcampus="<?php echo $row_campus->UExp_nIdUnExp; ?>" data-xprio="1">
                                        <button class="btn-icon-vertical btn-transition  btn btn-outline-warning " ><i class="lnr-hourglass btn-icon-wrapper btn-icon mb-1"> </i><span class="badge badge-warning badge-dot badge-dot badge-dot-inside"> </span>
                                            <div class="text-center">
                                                <h3 class="mb-0">
                                                    <b><span class=""><?php echo $total_media; ?> </span></b>
                                                </h3>
                                            </div>MEDIA
                                        </button>
                                    </div>
                                    <div class="col-sm-6 btn_campus_prio" data-xcampus="<?php echo $row_campus->UExp_nIdUnExp; ?>" data-xprio="0">
                                        <button class="btn-icon-vertical btn-transition  btn btn-outline-success " ><i class="lnr-construction btn-icon-wrapper btn-icon mb-1"> </i><span class="badge badge-success badge-dot badge-dot badge-dot-inside"> </span>
                                            <div class="text-center">
                                                <h3 class="mb-0">
                                                    <b><span class=""><?php echo $total_baja; ?> </span></b>
                                                </h3>
                                            </div>BAJA
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <ul class="todo-list-wrapper list-group list-group-flush">
                                
                            </ul>
                        </ul>
                    </div>
                </div>

            <?php
            }
            ?>
        <?php
            break;

        
        case 2: /* Muestra el detalle de tickets según campus y prioridad */
            $id_campus = $_POST["campus"];
            $prioridad = $_POST["prio"];

            $text_title = "";
            $bg_title = "";
            switch ($prioridad) {
                case 0:
                    $text_title = "<span class='text-white h5'> <b>BAJA</b> </span>";;
                    $bg_title = "success";
                    break;
                
                case 1:
                    $text_title = "<span class='text-white h5'> <b>MEDIA</b> </span>";
                    $bg_title = "warning";
                    break;
                
                case 2:
                    $text_title = "<span class='text-white h5'> <b>ALTA</b> </span>";
                    $bg_title = "danger";
                    break;
                
                case 3:
                    $text_title = "<span class='text-white h5 parpadea'> <b>URGENTE</b> </span>";
                    $bg_title = "danger";
                    break;
                
                default:
                    $text_title = "NN";
                    break;
            }

            $lista_incidentes = IncidentesData::getListaIncPrio_ByIdCampusAndPrioAndRango($id_campus, $prioridad, $rango);

            ?>
            <div class="card-header opacity-9 bg-<?php echo $bg_title; ?>" >Prioridad &nbsp;<?php echo $text_title; ?></div>
            <?php
            foreach ($lista_incidentes as $row_incidente){
                /* Obtener Tecnico */
                $user_tecnico = UserData::getById($row_incidente->Inc_User_id);

                /* Obtener foto */
                $file = $GLOBALS['ruta_base'].'img/incidentes/'.$row_incidente->Inc_nIdIncidente.'.jpg';
                $name_imagen = buscar_existe_foto($file);
                $name_imagen = str_replace($GLOBALS['ruta_base'], "../", $name_imagen);

                /* Color segun estado */
                $text_estado_color = "info";
                if($row_incidente->Inc_cEstadoAtencion == 2){
                    $text_estado_color = "warning";
                }

                /* Obtene fecha "Hace ..." */
                $fecha_creacion  = new DateTime($row_incidente->Inc_vFechaReporte);
                $lbl_dias = ago($fecha_creacion->getTimestamp());
            ?>
            <li class="list-group-item">
                <div class="todo-indicator bg-<?php echo $text_estado_color; ?>">
                </div>
                <div class="widget-content p-0">
                    <div>
                        <div class="mb-0 mr-0 badge badge-<?php echo $text_estado_color; ?>">
                            Ticket <b>#<?php echo $row_incidente->Inc_vNroTicket; ?></b>
                        </div>
                        <div class="mb-0 mr-0 badge badge-pill badge-secondary">
                            <?php echo $lbl_dias; ?>
                        </div>
                    </div>
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left mr-2">
                            <div class="widget-content-left">
                                <img class="rounded " src="<?php echo $name_imagen; ?>" alt="" width="42" data-action="zoom">
                            </div>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading mt-0 mb-0">
                                Descripcion: <?php echo $row_incidente->Inc_vDescripcion; ?>
                            </div>
                            <div class="widget-subheading mt-0 mb-0">
                                <div> 
                                    <span class="pr-0 opacity-6">
                                        <i class="fa fa-user"></i>
                                    </span><?php echo $user_tecnico->name." ".$user_tecnico->lastname ; ?>
                                </div>
                            </div>
                            <div class="widget-subheading mt-0 mb-0">
                                <div> 
                                    Comentario: <?php echo ($row_incidente->Inc_vComentario==""?"<i>Ninguno</i>":$row_incidente->Inc_vComentario); ?>
                                </div>
                            </div>
                            <div class="widget-subheading mt-0 mb-0">
                                <div> 
                                    Material: <?php echo ($row_incidente->Inc_vMaterial==""?"<i>Ninguno</i>":$row_incidente->Inc_vMaterial); ?>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </li>

            <?php
            }
            
            break;
        
        /* CARGA VISTA RESUMEN DE INCIDENCIAS POR USUARIOS */
        case 3: 
            $lista_usuarios = IncidentesData::getUsuariosAllActive_ByRango_OrderByTotalInc($rango);
            foreach ($lista_usuarios as $row_usuario) {
                $usuario = UserData::getById($row_usuario->UExpTec_User_id);
                $lista_inc_campus = IncidentesData::getListaIncPend_ByIdUsuarioAsignadoAndRango($usuario->id, $rango);

                $total_pendientes = 0;
                $total_encurso = 0;
                $total_resueltos = 0;

                $total_urgente = 0;
                $total_alta = 0;
                $total_media = 0;
                $total_baja = 0;

                if(count($lista_inc_campus)>=1){
                    /* Estado Atención */
                    // if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cEstadoAtencion'))["1"])){
                    //     $total_pendientes = array_count_values(array_column($lista_inc_campus, 'Inc_cEstadoAtencion'))["1"];
                    // }
                    // if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cEstadoAtencion'))["2"])){
                    //     $total_encurso += array_count_values(array_column($lista_inc_campus, 'Inc_cEstadoAtencion'))["2"];
                    // }
                    // if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cEstadoAtencion'))["3"])){
                    //     $total_resueltos = array_count_values(array_column($lista_inc_campus, 'Inc_cEstadoAtencion'))["3"];
                    // }

                    /* Prioridad */
                    if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["3"])){
                        $total_urgente = array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["3"];
                    }
                    if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["2"])){
                        $total_alta = array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["2"];
                    }
                    if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["1"])){
                        $total_media = array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["1"];
                    }
                    if(isset(array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["0"])){
                        $total_baja = array_count_values(array_column($lista_inc_campus, 'Inc_cPrioridad'))["0"];
                    }
                }
                
            ?>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="mb-3 profile-responsive card card-usuario">
                        <div class="dropdown-menu-header">
                            <div class="dropdown-menu-header-inner bg-dark">
                                
                                <div class="menu-header-image opacity-1" style="background-image: url('../img/city2.jpg');"></div>
                                <div class="menu-header-content btn-pane-right">
                                    <!-- <div class="font-icon-wrapper font-icon-lg">
                                        <i class="lnr-apartment icon-gradient bg-sunny-morning"> </i>
                                    </div> -->
                                    <div class="avatar-icon-wrapper mr-3 avatar-icon-xl btn-hover-shine">
                                        <div class="avatar-icon rounded"><img src="../img/avatars/<?php echo $usuario->id; ?>.jpg" alt="Avatar 5"></div>
                                    </div>
                                    <div>
                                        <h5 class="menu-header-title">
                                            <?php echo $usuario->name ." ".$usuario->lastname ; ?>
                                        </h5>
                                        <h7 class="menu-header-subtitle mt-0 pt-0">
                                            <?php echo $usuario->email ; ?>
                                        </h7>
                                    </div>

                                    <div>
                                        <!-- <h5 class="menu-header-title text-dark">
                                            <button style="font-size: 1.3rem !important;" class="mb-2 mr-2 btn btn-light "><b><?php echo $usuario->name; ?></b></button>
                                        </h5> -->
                                        <h6 class="mt-1 mb-1">
                                            <a href="javascript:void(0);" class="mb-2 mr-2 badge badge-info"><?php echo $row_usuario->total_pendiente; ?> Pendientes</a>

                                            <a href="javascript:void(0);" class="mb-2 mr-2 badge badge-warning"><?php echo $row_usuario->total_encurso; ?> En Curso</a>

                                            <a href="javascript:void(0);" class="mb-2 mr-2 badge badge-success text-dark"><?php echo $row_usuario->total_solucion; ?> Solucionado</a>
                                        </h6>
                                    </div>

                                    <div class="menu-header-btn-pane">
                                        <button class="mt-2 btn btn-light opacity-8">Resumen por Prioridad</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush2 sub2">
                            <div class="grid-menu grid-menu-2col ">
                                <div class="no-gutters row">
                                    <div class="col-sm-6 bg-danger text-white btn_usuarios_prio" data-xusuario="<?php echo $usuario->id; ?>" data-xprio="3"  >
                                        <button class=" btn-icon-vertical btn-transition btn btn-outline-danger text-white parpadea "><i class="lnr-heart-pulse btn-icon-wrapper btn-icon mb-1"> </i><span class="badge badge-danger badge-dot badge-dot badge-dot-inside"> </span>
                                            <div class="text-center">
                                                <h3 class="mb-0">
                                                    <b><span class=""><?php echo $total_urgente; ?> </span></b>
                                                </h3>
                                            </div>URGENTE
                                        </button>
                                    </div>
                                    <div class="col-sm-6 btn_usuarios_prio" data-xusuario="<?php echo $usuario->id; ?>" data-xprio="2">
                                        <button class="btn-icon-vertical btn-transition btn btn-outline-danger " ><i class="lnr-warning btn-icon-wrapper btn-icon mb-1"> </i><span class="badge badge-danger badge-dot badge-dot badge-dot-inside"> </span>
                                            <div class="text-center">
                                                <h3 class="mb-0">
                                                    <b><span class=""><?php echo $total_alta; ?> </span></b>
                                                </h3>
                                            </div>ALTA
                                        </button>
                                    </div>
                                    <div class="col-sm-6 btn_usuarios_prio" data-xusuario="<?php echo $usuario->id; ?>" data-xprio="1" >
                                        <button class="btn-icon-vertical btn-transition  btn btn-outline-warning " ><i class="lnr-hourglass btn-icon-wrapper btn-icon mb-1"> </i><span class="badge badge-warning badge-dot badge-dot badge-dot-inside"> </span>
                                            <div class="text-center">
                                                <h3 class="mb-0">
                                                    <b><span class=""><?php echo $total_media; ?> </span></b>
                                                </h3>
                                            </div>MEDIA
                                        </button>
                                    </div>
                                    <div class="col-sm-6 btn_usuarios_prio" data-xusuario="<?php echo $usuario->id; ?>" data-xprio="0" >
                                        <button class="btn-icon-vertical btn-transition  btn btn-outline-success " ><i class="lnr-construction btn-icon-wrapper btn-icon mb-1"> </i><span class="badge badge-success badge-dot badge-dot badge-dot-inside"> </span>
                                            <div class="text-center">
                                                <h3 class="mb-0">
                                                    <b><span class=""><?php echo $total_baja; ?> </span></b>
                                                </h3>
                                            </div>BAJA
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <ul class="todo-list-wrapper list-group list-group-flush">
                                
                            </ul>
                        </ul>
                    </div>
                </div>

            <?php
            }
            ?>
        <?php
            break;

        /* Muestra el detalle de tickets del USUARIO según PRIORIDAD */
        case 4:    
            $id_usuario = $_POST["usuario"];
            $prioridad = $_POST["prio"];

            $text_title = "";
            $bg_title = "";
            switch ($prioridad) {
                case 0:
                    $text_title = "<span class='text-white h5'> <b>BAJA</b> </span>";;
                    $bg_title = "success";
                    break;
                
                case 1:
                    $text_title = "<span class='text-white h5'> <b>MEDIA</b> </span>";
                    $bg_title = "warning";
                    break;
                
                case 2:
                    $text_title = "<span class='text-white h5'> <b>ALTA</b> </span>";
                    $bg_title = "danger";
                    break;
                
                case 3:
                    $text_title = "<span class='text-white h5 parpadea'> <b>URGENTE</b> </span>";
                    $bg_title = "danger";
                    break;
                
                default:
                    $text_title = "NN";
                    break;
            }

            $lista_incidentes = IncidentesData::getListaIncPrio_ByIdUsuarioAndPrioAndRango($id_usuario, $prioridad, $rango);

            ?>
            <div class="card-header opacity-9 bg-<?php echo $bg_title; ?>" >Prioridad &nbsp;<?php echo $text_title; ?></div>
            <?php
            foreach ($lista_incidentes as $row_incidente){
                /* Obtener foto */
                $file = $GLOBALS['ruta_base'].'img/incidentes/'.$row_incidente->Inc_nIdIncidente.'.jpg';
                $name_imagen = buscar_existe_foto($file);
                $name_imagen = str_replace($GLOBALS['ruta_base'], "../", $name_imagen);

                /* Color segun estado */
                $text_estado_color = "info";
                if($row_incidente->Inc_cEstadoAtencion == 2){
                    $text_estado_color = "warning";
                }

                /* Obtene fecha "Hace ..." */
                $fecha_creacion  = new DateTime($row_incidente->Inc_vFechaReporte);
                $lbl_dias = ago($fecha_creacion->getTimestamp());
            ?>
            <li class="list-group-item">
                <div class="todo-indicator bg-<?php echo $text_estado_color; ?>">
                </div>
                <div class="widget-content p-0">
                    <div>
                        <div class="mb-0 mr-0 badge badge-<?php echo $text_estado_color; ?>">
                            Ticket <b>#<?php echo $row_incidente->Inc_vNroTicket; ?></b>
                        </div>
                        <div class="mb-0 mr-0 badge badge-pill badge-secondary">
                            <?php echo $lbl_dias; ?>
                        </div>
                    </div>
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left mr-2">
                            <div class="widget-content-left">
                                <img class="rounded " src="<?php echo $name_imagen; ?>" alt="" width="42" data-action="zoom">
                            </div>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading mt-0 mb-0">
                                Descripcion: <?php echo $row_incidente->Inc_vDescripcion; ?>
                            </div>
                            <div class="widget-subheading mt-0 mb-0">
                                <div> 
                                    Comentario: <?php echo ($row_incidente->Inc_vComentario==""?"<i>Ninguno</i>":$row_incidente->Inc_vComentario); ?>
                                </div>
                            </div>
                            <div class="widget-subheading mt-0 mb-0">
                                <div> 
                                    Material: <?php echo ($row_incidente->Inc_vMaterial==""?"<i>Ninguno</i>":$row_incidente->Inc_vMaterial); ?>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </li>

            <?php
            }
            break;

        case 5:
            $estado = $_POST["estado"];
            // $id_campus = $_POST["campus"];
            // $prioridad = $_POST["prio"];

            $text_title = "";
            $bg_title = "";
            switch ($estado) {
                case 1:
                    $text_title = "<span class='text-white h5'> <b>PENDIENTE</b> </span>";
                    $bg_title = "info";
                    break;
                
                case 2:
                    $text_title = "<span class='text-white h5'> <b>EN CURSO</b> </span>";
                    $bg_title = "warning";
                    break;
                
                case 3:
                    $text_title = "<span class='text-white h5 parpadea'> <b>SOLUCIONADO</b> </span>";
                    $bg_title = "success";
                    break;
                
                default:
                    $text_title = "NN";
                    break;
            }

            $lista_incidentes = IncidentesData::getListaIncEstado_ByEstadoRango($estado, $rango);

            ?>
            <div class="card-header opacity-9 bg-<?php echo $bg_title; ?>" >ESTADO &nbsp;<?php echo $text_title; ?></div>
            <?php
            foreach ($lista_incidentes as $row_incidente){
                /* Obtener Tecnico */
                $user_tecnico = UserData::getById($row_incidente->Inc_User_id);

                /* Obtener foto */
                $file = $GLOBALS['ruta_base'].'img/incidentes/'.$row_incidente->Inc_nIdIncidente.'.jpg';
                $name_imagen = buscar_existe_foto($file);
                $name_imagen = str_replace($GLOBALS['ruta_base'], "../", $name_imagen);

                /* Obtener foto_solucion */
                $file = $GLOBALS['ruta_base'].'img/atenciones/'.$row_incidente->Inc_nIdIncidente.'.jpg';
                $name_imagen_sol = buscar_existe_foto($file);
                $name_imagen_sol = str_replace($GLOBALS['ruta_base'], "../", $name_imagen_sol);

                /* Color segun estado */
                $text_estado_color = "info";
                if($row_incidente->Inc_cEstadoAtencion == 2){
                    $text_estado_color = "warning";
                }

                /* Obtene fecha "Hace ..." */
                $fecha_creacion  = new DateTime($row_incidente->Inc_vFechaReporte);
                // $lbl_dias = ago($fecha_creacion->getTimestamp());
                $fecha_solucion  = new DateTime($row_incidente->Inc_vFechaSolucion);

                $fecha_reporte = strftime("Reportado: %d-%b", $fecha_creacion->getTimestamp());
                $fecha_solucion = strftime("Solución: %d-%b", $fecha_solucion->getTimestamp());
            ?>
            <li class="list-group-item">
                <div class="todo-indicator bg-<?php echo $text_estado_color; ?>">
                </div>
                <div class="widget-content p-0">
                    <div>
                        <div class="mb-0 mr-0 badge badge-<?php echo $text_estado_color; ?>">
                            Ticket <b>#<?php echo $row_incidente->Inc_vNroTicket; ?></b>
                        </div>
                        <div class="mb-0 mr-0 badge badge-pill badge-secondary">
                            <?php echo $fecha_reporte; ?>
                        </div>
                        <?php if ($estado == 3) { ?>
                        <div class="mb-0 mr-0 badge badge-pill badge-success">
                            <?php echo $fecha_solucion; ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left mr-2 mt-1">
                            <div class="widget-content-left">
                                <img class="rounded " src="<?php echo $name_imagen; ?>" alt="" width="42" data-action="zoom">
                            </div>
                            <?php if ($estado == 3) { ?>
                            <div class="widget-content-left mt-1">
                                <img class="rounded " src="<?php echo $name_imagen_sol; ?>" alt="" width="42" data-action="zoom">
                            </div>
                            <?php } ?>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading mt-0 mb-0">
                                Descripcion: <?php echo $row_incidente->Inc_vDescripcion; ?>
                            </div>
                            <div class="widget-subheading mt-0 mb-0">
                                <div> 
                                    <span class="pr-0 opacity-6">
                                        <i class="fa fa-user"></i>
                                    </span><?php echo $user_tecnico->name." ".$user_tecnico->lastname ; ?>
                                </div>
                            </div>
                            <div class="widget-subheading mt-0 mb-0">
                                <div> 
                                    Comentario: <?php echo ($row_incidente->Inc_vComentario==""?"<i>Ninguno</i>":$row_incidente->Inc_vComentario); ?>
                                </div>
                            </div>
                            <div class="widget-subheading mt-0 mb-0">
                                <div> 
                                    Material: <?php echo ($row_incidente->Inc_vMaterial==""?"<i>Ninguno</i>":$row_incidente->Inc_vMaterial); ?>
                                </div>
                                <div>
                                    <button class="mb-1 mt-1 btn-icon btn-shadow btn-outline-2x btn btn-outline-dark btn-sm">
                                        <i class="lnr-apartment btn-icon-wrapper"></i><?php echo $row_incidente->UExp_vNombre;?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </li>

            <?php
            }
            
            break;

        default:
            echo "?";
            break;
    }

?>
