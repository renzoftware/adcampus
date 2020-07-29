<?php

	$u=null;
	if(Session::getUID()!=""){
	    $u = UserData::getById(Session::getUID());
        $u_type = $u->user_type;

	    $idusuario = $u->id;


        $idincidente = $_SESSION["incid_id_temp"];
		$row_incidente = IncidentesData::getIncidenteByIdIncidente($idincidente);

        $row_usuario_asignado = UserData::getById($row_incidente->Inc_User_id);
        $row_campus = UExplData::getById($row_incidente->Inc_UExp_nIdUnExp);
        $lista_otros_campus = UExplData::getUExplOtherActive_OrderByNombre($row_incidente->Inc_UExp_nIdUnExp);
        $lista_otros_usuarios = UExpTecnicosData::getOtrosUsuariosAsigIncid_ByCampus($row_incidente->Inc_User_id, $row_incidente->Inc_UExp_nIdUnExp);
	}
	else{
	    echo "<script>window.location='index.php';</script>";
	}

    $estado_incidente = $text_estado_inc = "";
    switch ($row_incidente->Inc_cEstadoAtencion) {
        case 1: 
            $estado_incidente = "PENDIENTE"; 
            $text_estado_inc = "btn-info";
            $text_div_select_estado = '
                <button type="button" tabindex="0" class="dropdown-item upd_estado_at" data-xval="2">EN CURSO</button>
                <button type="button" tabindex="0" class="dropdown-item upd_estado_at" data-xval="3">RESUELTO</button>';
            break;

        case 2: 
            $estado_incidente = "EN CURSO";
            $text_estado_inc = "btn-primary";
            $text_div_select_estado = '
                <button type="button" tabindex="0" class="dropdown-item upd_estado_at" data-xval="1">PENDIENTE</button>
                <button type="button" tabindex="0" class="dropdown-item upd_estado_at" data-xval="3">RESUELTO</button>';
            break;

        case 3: 
            $estado_incidente = "RESUELTO";
            $text_estado_inc = "btn-success";
            $text_div_select_estado = '
                <button type="button" tabindex="0" class="dropdown-item upd_estado_at" data-xval="1">PENDIENTE</button>
                <button type="button" tabindex="0" class="dropdown-item upd_estado_at" data-xval="2">EN CURSO</button>';
            break;
    }

    $prioridad_incidente = $text_prioridad_inc = "";
    switch ($row_incidente->Inc_cPrioridad) {
        case 0: 
            $prioridad_incidente = "BAJA"; 
            $text_prioridad_inc = "btn-success";
            $text_div_select_prioridad = '
                <button type="button" tabindex="0" class="dropdown-item upd_prioridad" data-xval="1">MEDIA</button>
                <button type="button" tabindex="0" class="dropdown-item upd_prioridad" data-xval="2">ALTA</button>
                <button type="button" tabindex="0" class="dropdown-item upd_prioridad" data-xval="3">URGENTE</button>';
            break;

        case 1: 
            $prioridad_incidente = "MEDIA";
            $text_prioridad_inc = "btn-warning";
            $text_div_select_prioridad = '
                <button type="button" tabindex="0" class="dropdown-item upd_prioridad" data-xval="0">BAJA</button>
                <button type="button" tabindex="0" class="dropdown-item upd_prioridad" data-xval="2">ALTA</button>
                <button type="button" tabindex="0" class="dropdown-item upd_prioridad" data-xval="3">URGENTE</button>';
            break;

        case 2: 
            $prioridad_incidente = "ALTA";
            $text_prioridad_inc = "btn-danger";
            $text_div_select_prioridad = '
                <button type="button" tabindex="0" class="dropdown-item upd_prioridad" data-xval="0">BAJA</button>
                <button type="button" tabindex="0" class="dropdown-item upd_prioridad" data-xval="1">MEDIA</button>
                <button type="button" tabindex="0" class="dropdown-item upd_prioridad" data-xval="3">URGENTE</button>';
            break;

        case 3: 
            $prioridad_incidente = "URGENTE";
            $text_prioridad_inc = "btn-danger";
            $text_div_select_prioridad = '
                <button type="button" tabindex="0" class="dropdown-item upd_prioridad" data-xval="0">BAJA</button>
                <button type="button" tabindex="0" class="dropdown-item upd_prioridad" data-xval="1">MEDIA</button>
                <button type="button" tabindex="0" class="dropdown-item upd_prioridad" data-xval="2">ALTA</button>';
            break;
    }

    /* Foto Reporte */
    $file_reporte = $GLOBALS['ruta_base'].'img/incidentes/'.$row_incidente->Inc_nIdIncidente.'.jpg';
    $name_imagen_reporte = buscar_existe_foto($file_reporte);
    if($GLOBALS['entorno'] == "LOCAL"){
        $name_imagen_reporte = str_replace($GLOBALS['ruta_base'], "../", $name_imagen_reporte);
    }

    /* Foto Solución */
    $file_solucion = $GLOBALS['ruta_base'].'img/atenciones/'.$row_incidente->Inc_nIdIncidente.'.jpg';
    $name_imagen_solucion = buscar_existe_foto($file_solucion);
    if($GLOBALS['entorno'] == "LOCAL"){
        $name_imagen_solucion = str_replace($GLOBALS['ruta_base'], "../", $name_imagen_solucion);
    }

    /* Requiere Material */
    $material = (is_null($row_incidente->Inc_vMaterial)? "<b>NO</b>": "<b>SI</b>");

    /* Fecha Reporte */
    $fecha_formato = (is_null($row_incidente->Inc_vFechaReporte)? "Ninguno": date("d M", strtotime($row_incidente->Inc_vFechaReporte)));
    /* Fecha Solución */
    $fecha_formato2 = (is_null($row_incidente->Inc_vFechaSolucion)? "Ninguno": date("d M", strtotime($row_incidente->Inc_vFechaSolucion)));
?>
   
<style type="text/css">
    /* RESPONSIVE EXAMPLE */
    .stacktable.large-only { display: table; }
    .stacktable.small-only { display: none; }

    @media (max-width: 700px) {
      .stacktable.large-only { display: none; }

      .stacktable.small-only {
        display: table;
      }

      .stacktable.small-only th{
        text-align: center !important;
      }
    }

    .ui-menu-item-wrapper{
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        color: #495057;
    }

    .div_tbl_linea_sol{
        padding-top: 0.25rem;
        font-size: 0.80rem;
    }

    .pane-center{
        z-index:inherit !important;
    }

    .ui-widget.ui-widget-content {
        /*border: 1px solid #d3d3d3;*/
        z-index: 1060;
    }

    .tachado {
        text-decoration: line-through;
    }

    /* INICIO Imágenes */
    .img-content {
        position: relative;    /* para poder posicionar el texto de forma absoluta */
        display: inline-block; /* para que solo ocupe el ancho de la imagen */
    }
    .image-area {
        height: auto;
        width: auto;
        border-radius: 10px;
        /*border-color: #6c757d;*/
        border: 3px solid #b2babb ;
    }
    .card-title {
        position: absolute;    /* posición absolute con respecto al padre */
        bottom: 0;             /* posicionada en la esquina inferior derecha */
        right: 1rem;
    }
    /* FIN Imágenes */
</style>

<div class="card-header">
    <button type="button" data-placement="bottom" class="btn-shadow mr-1 btn btn-dark">
        <b><?php echo $row_incidente->Inc_vDescripcion;?></b>
    </button>&nbsp;
   
    <div class="btn-actions-pane-right">
        <div class="badge badge-alternate" style="font-size: 15px; padding: 12px 12px;margin-right: 10px;"> Ticket Nro. <b><?php echo $row_incidente->Inc_vNroTicket;?></b></div>
    </div>

</div>

<div class="card-body">
    <div class="form-row">
        <div class="col-md-4">
            <!-- Foto Reporte -->
            <div class="position-relative form-group text-center">
                <span class="clearfix"></span>                            
                <div class="image-area">
                    <img width="200px" src="<?php echo $name_imagen_reporte; ?>" alt="" class="img-fluid rounded shadow-sm d-block" data-action="zoom">
                    <div class="card-title"><div class="badge badge-info">FOTO REPORTE</div></div>
                </div>
            </div>

            <!-- Foto Solucion -->
            <div class="position-relative form-group text-center">
                <span class="clearfix"></span>                            
                <div class=" image-area">
                    <img width="200px" src="<?php echo $name_imagen_solucion; ?>" alt="" class="img-fluid rounded shadow-sm d-block" data-action="zoom">
                    <div class="card-title"><div class="badge badge-danger">FOTO SOLUCIÓN</div></div>
                </div>
            </div>

        </div>

        <div class="col-md-8">

            <div class="form-row">
                <!-- Asignado a -->
                <div class="col-md-12 col-xl-12">
                    <div class="card mb-1 widget-content text-white bg-secondary">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Asignado a</div>
                                </div>

                                <div class="widget-content-right">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn dropdown-toggle">
                                           <img class="rounded-circle" src="../img/avatars/<?php echo $row_incidente->Inc_User_id; ?>.jpg" alt="" width="40">
                                        </a>
                                    
                                    <?php if($u_type=="1"){ ?>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(55px, 45px, 0px);">
                                            <span   tabindex="0" class="dropdown-item">Asignar a:</span>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                                <?php
                                                foreach ($lista_otros_usuarios as $row_usuario) {
                                                ?>
                                                <button type="button" tabindex="0" class="dropdown-item upd_asignado_a" data-xval="<?php echo $row_usuario->id; ?>">
                                                    <?php echo $row_usuario->name ." ". $row_usuario->lastname ; ?>
                                                </button>
                                                <?php
                                                }
                                                ?>
                                        </div>
                                    <?php } ?>
                                    
                                    </div>
                                </div>

                                <div class="widget-content-right">
                                   <div class="widget-heading">
                                        <?php 
                                            echo $row_usuario_asignado->name." ".$row_usuario_asignado->lastname;
                                        ?>
                                    </div>
                                    <div class="widget-subheading opacity-7"> <?php 
                                            echo $row_usuario_asignado->email;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-row">
                <!-- Campus -->
                <div class="col-md-12 col-xl-6">
                    <div class="card mb-1 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Campus</div>
                                </div>

                                <div class="widget-content-right">
                                    <div class="widget-numbers ">
                                        <div class="mr-2 btn-group">
                                            <button class="btn btn-light btn-lg">
                                                <b><?php echo $row_campus->UExp_vNombre;?></b>
                                            </button>

                                        <?php
                                        if($u_type=="1"){
                                        ?>
                                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="dropdown-toggle-split dropdown-toggle btn btn-light ">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>

                                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(70px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <?php
                                                foreach ($lista_otros_campus as $row_campus) {
                                                ?>
                                                <button type="button" tabindex="0" class="dropdown-item upd_campus" data-xval="<?php echo $row_campus->UExp_nIdUnExp; ?>">
                                                    <?php echo $row_campus->UExp_vNombre; ?>
                                                </button>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Descripcion -->
                <div class="col-md-12 col-xl-6">
                    <div class="card mb-1 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Descripción</div>
                                    <div class="widget-subheading">Tarea/Inc</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-subheading ml-4">
                                        <?php echo $row_incidente->Inc_vDescripcion;?>
                                    
                                    <?php if($u_type=="1"){ ?>
                                        <button type="button" class="btn p-0 upd_descripcion" data-xvalue="<?php echo $row_incidente->Inc_vDescripcion; ?>" data-toggle="tooltip" data-placement="top" title="Editar">
                                                <i class="fa fa-edit"></i>
                                        </button>
                                    <?php } ?>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-row">
                <!-- Prioridad -->
                <div class="col-md-12 col-xl-6">
                    <div class="card mb-1 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Prioridad</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers ">
                                        <div class="mr-2 btn-group">
                                            <button class="btn <?php echo $text_prioridad_inc; ?>  btn-lg">
                                                <b><?php echo $prioridad_incidente;?></b>
                                            </button>
                                        <?php if($u_type=="1"){ ?>
                                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="dropdown-toggle-split dropdown-toggle btn <?php echo $text_prioridad_inc; ?> ">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>

                                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(70px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <?php
                                                    echo $text_div_select_prioridad;
                                                ?>
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Estado -->
                <div class="col-md-12 col-xl-6">
                    <div class="card mb-1 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Estado</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers ">
                                        <div class="mr-2 btn-group">
                                            <button class="btn <?php echo $text_estado_inc; ?>  btn-lg">
                                                <b><?php echo $estado_incidente;?></b>
                                            </button>
                                        <?php if($u_type=="1"){ ?>
                                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="dropdown-toggle-split dropdown-toggle btn <?php echo $text_estado_inc; ?> ">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>

                                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(70px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <?php
                                                    echo $text_div_select_estado;
                                                ?>
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="form-row">
                <!-- Comentario -->
                <div class="col-md-12 col-xl-6">
                    <div class="card mb-1 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Comentario</div>
                                    <div class="widget-subheading">Obs.</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-subheading ml-4">
                                        <?php echo $row_incidente->Inc_vComentario;?>
                                    
                                    <?php if($u_type=="1"){ ?>
                                        <button type="button" class="btn p-0 upd_comentario" data-xvalue="<?php echo $row_incidente->Inc_vComentario; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    <?php } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material -->
                <div class="col-md-12 col-xl-6">
                    <div class="card mb-1 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">¿Req. Material?</div>
                                    <div class="widget-subheading"><?php echo $material;?></div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-subheading ml-4">
                                        <?php echo $row_incidente->Inc_vMaterial;?>
                                    
                                    <?php if($u_type=="1"){ ?>
                                        <button type="button" class="btn p-0 upd_material" data-xvalue="<?php echo $row_incidente->Inc_vMaterial; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    <?php } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-row">
                <!-- Fecha Reporte -->
                <div class="col-md-12 col-xl-6">
                    <div class="card mb-1 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">F. Reporte</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers ">
                                        <div class="mr-2 btn-group">
                                            <button class="btn btn-light btn-lg">
                                                <b><?php echo $fecha_formato; ?></b>
                                            </button>

                                        <?php if($u_type=="1"){ ?>
                                            <button type="button" aria-haspopup="true" aria-expanded="false"  data-xvalue="<?php echo $row_incidente->Inc_vFechaReporte; ?>" data-toggle="dropdown" class=" fa fa-edit btn btn-light upd_freporte">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                        <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Fecha Solución -->
                <div class="col-md-12 col-xl-6">
                    <div class="card mb-1 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">F. Solución</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers ">
                                        <div class="mr-2 btn-group">
                                            <button class="btn btn-light btn-lg">
                                                <b><?php echo $fecha_formato2; ?></b>
                                            </button>
                                            <?php
                                            if($row_incidente->Inc_cEstadoAtencion==3){
                                            ?>
                                            <button type="button" aria-haspopup="true" aria-expanded="false"  data-xvalue="<?php echo $row_incidente->Inc_vFechaSolucion; ?>" data-toggle="dropdown" class=" fa fa-edit btn btn-light upd_fsolucion">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </div> 
         
    </div>
</div>
