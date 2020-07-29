<?php
	$u=null;
	if(Session::getUID()!=""){
	    $u = UserData::getById(Session::getUID());
	    $idusuario = $u->id;
        $tipo_usuario = $u->user_type;

        $uexp_id = $_POST["campus"];
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

        $result_incprio_lista;
        switch ($tipo_usuario) {
            case 2: /* Técnicos */
                $result_incprio_lista = IncidentesData::getListaIncPrio_ByIdUsuAndIdCampusAndPrio($idusuario, $uexp_id, $prioridad);
                break;
                
            case 5: /* Analistas */
                $result_incprio_lista = IncidentesData::getListaIncPrio_ByIdUsuAndIdCampusAndPrio(9, $uexp_id, $prioridad);
                break;
            
            default:
                $result_incprio_lista = null;
                break;
        }

	}
	else{
	    echo "<script>window.location='index.php';</script>";
	}
?>
<style type="text/css">
    .list-group-item{
        border: 3px solid rgba(0,0,0,0.125) !important;
    }
</style>

<div class="col-lg-12 col-xl-12">
    <div class="main-card mb-3 card">
        <div class="card-header opacity-9 bg-<?php echo $bg_title; ?>" >Prioridad &nbsp;<?php echo $text_title; ?></div>
        
        <ul class="todo-list-wrapper list-group list-group-flush">
            <?php
                foreach ($result_incprio_lista as $row_incprio_lista) {
                    /* Obtener foto */
                    $file = $GLOBALS['ruta_base'].'img/incidentes/'.$row_incprio_lista->Inc_nIdIncidente.'.jpg';
                    $name_imagen = buscar_existe_foto($file);
                    $name_imagen = str_replace($GLOBALS['ruta_base'], "../", $name_imagen);
                    

                    /* Color segun estado */
                    $text_estado_color = "info";
                    if($row_incprio_lista->Inc_cEstadoAtencion == 2){
                        $text_estado_color = "warning";
                    }

                    /* Obtene fecha "Hace ..." */
                    $fecha_creacion  = new DateTime($row_incprio_lista->Inc_vFechaReporte);
                    $lbl_dias = ago($fecha_creacion->getTimestamp());
            ?>

            <li class="list-group-item">
                <div class="todo-indicator bg-<?php echo $text_estado_color; ?>">    
                </div>

                <div class="widget-content p-0">
                    <div>
                        <!-- <button class="text-primary btn-icon btn-shadow btn ">
                            <i class="lnr-clock btn-icon-wrapper"> </i><?php echo $lbl_dias; ?>
                        </button> -->
                        <div class="mb-0 mr-2 badge badge-<?php echo $text_estado_color; ?>">
                            Ticket #<?php echo "<b>".$row_incprio_lista->Inc_vNroTicket ."</b>"; ?>
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
                                <?php echo $row_incprio_lista->Inc_vDescripcion; ?>
                            </div>
                            <div class="widget-heading mt-0 mb-0">
                                <div> 
                                    Comentario: <?php echo ($row_incprio_lista->Inc_vComentario==""?"<i>Ninguno</i>":$row_incprio_lista->Inc_vComentario); ?>
                                </div>
                            </div>
                            <div class="widget-subheading mt-0 mb-0">
                                <div> 
                                    Material: <?php echo ($row_incprio_lista->Inc_vMaterial==""?"<i>Ninguno</i>":$row_incprio_lista->Inc_vMaterial); ?>
                                </div>
                                <div>
                                    <button class="mb-1 mt-1 btn-icon btn-shadow btn-outline-2x btn btn-outline-dark btn-sm">
                                        <i class="lnr-apartment btn-icon-wrapper"> </i><?php echo ucname($row_incprio_lista->UExp_vNombre); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>

                <div class="text-right mt-2">
                        <button data-xid="<?php echo $row_incprio_lista->Inc_nIdIncidente ;?>" data-xprio="<?php echo $prioridad; ?>" style="font-size:0.6rem !important;" class="border-0 btn-transition btn btn-secondary upd_inc_prov">
                            PROVEEDOR <i class="fa fa-user-md"></i>
                        </button>

                        <?php
                         if($row_incprio_lista->Inc_cEstadoAtencion == 1){
                        ?>
                        <button data-xtitle="<?php echo $row_incprio_lista->Inc_vDescripcion ;?>" data-xid="<?php echo $row_incprio_lista->Inc_nIdIncidente ;?>" data-xopt="2" data-xprio="<?php echo $prioridad; ?>" style="font-size:0.6rem !important;" class="border-0 btn-transition btn btn-warning upd_encurso" data-toggle="modal" data-target="#modal_encurso">
                            EN CURSO <i class="fa fa-history"></i>
                        </button>

                        <?php
                        }
                        ?>

                        <button data-xtitle="<?php echo $row_incprio_lista->Inc_vDescripcion ;?>" data-xid="<?php echo $row_incprio_lista->Inc_nIdIncidente ;?>" data-xopt="3" data-xprio="<?php echo $prioridad; ?>" style="font-size:0.6rem !important;" class="border-0 btn-transition btn btn-success upd_final" data-toggle="modal" data-target="#modal_finalizar" >
                            RESUELTO <i class="fa fa-check"></i>
                        </button>
                </div>
            </li>

            <?php
                }
            ?>

        </ul>
    </div>
</div>