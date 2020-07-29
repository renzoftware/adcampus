<?php
    function formatBytes($size, $precision = 1){
        $base = log($size, 1000);
        $suffixes = array('', 'K', 'M', 'G', 'T');   

        return round(pow(1000, $base - floor($base)), $precision) .''. $suffixes[floor($base)];
    }

	$u=null;
	if(Session::getUID()!=""){
	    $u = UserData::getById(Session::getUID());
	    $idusuario = $u->id;

		// $idsolicitud = $_POST["id"];
        $idsolicitud = $_SESSION["solic_id_temp"];
		$row_solicitud = SolicitudData::getSolicitudByIdSolicitud($idsolicitud);
		
		$lista_uexpl = UExplData::getUExplAllActive();
		$lista_dpto = DptoData::getDptoAllActive();
        $lista_proyecto = ProyectoData::getProyectoAllActive();
	}
	else{
	    echo "<script>window.location='index.php';</script>";
	}

    $txt_sol_tipomoneda = ($row_solicitud->Sol_cTipoMoneda==1?"PEN":"USD");
    $txt_sol_tipomoneda_symbol = ($row_solicitud->Sol_cTipoMoneda==1?"S/.":"$");

	
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
</style>

<!-- Modal -->
<div class="container"> 
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-0" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edición de Línea</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <!-- Smart Wizard HTML -->
                    <div id="smartwizard" class="container-fluid">
                        <ul>
                            <li><a href="#step-1">Fase 1<br /><small>Ingreso</small></a></li>
                            <li><a href="#step-2">Fase 2<br /><small>Aprobado</small></a></li>
                            <li><a href="#step-3">Fase 3<br /><small>Despacho</small></a></li>
                            <li><a href="#step-4">Fase 4<br /><small>Recepciones</small></a></li>
                        </ul>

                        <div>
                            <div id="step-1" class="">
                                <form class="needs-validation was-validated" id="form_lineasol_edit_step1">
                                    <div id="form-step-1" role="form" data-toggle=""></div>
                                    <div style="float: right;" class="mt-3">
                                        <button class="mt-2 mr-1 btn btn-success" id="btn_lineasol_upd_step1" type="submit">Actualizar</button>
                                        <button class="mt-2 mr-1 btn btn-primary" id="btn_tostep2" type="button">Fase 2</button>
                                    </div>
                                </form>
                            </div>

                            <div id="step-2" class="">
                                <form class="needs-validation was-validated" id="form_lineasol_edit_step2">
                                    <div id="form-step-2" role="form" data-toggle=""></div>
                                    <div style="float: right;" class="mt-3">
                                        <button class="mt-2 mr-1 btn btn-success" id="btn_lineasol_upd_step2" type="submit">Actualizar</button>
                                        <button class="mt-2 mr-1 btn btn-danger" id="btn_faprob_delete">Eliminar F. Aprob</button>
                                        <button class="mt-2 mr-1 btn btn-primary" id="btn_tostep3"> Fase 3</button>
                                    </div>
                                </form>
                            </div>
                            <div id="step-3" class="">
                                <form class="needs-validation was-validated" id="form_lineasol_edit_step3">
                                    <div id="form-step-3" role="form" data-toggle=""></div>

                                    <div style="float: right;" class="mt-3">
                                        <button class="mt-2 mr-1 btn btn-success" id="btn_lineasol_upd_step3" type="submit">Actualizar</button>
                                        <button class="mt-2 mr-1 btn btn-danger" id="btn_oc_delete">Eliminar OC</button>
                                        <button class="mt-2 mr-1 btn btn-primary" id="btn_tostep4">Fase 4</button>
                                    </div>
                                </form>
                            </div>
                            <div id="step-4" class="">
                                <form class="needs-validation was-validated" id="form_lineasol_edit_step4">
                                    <div id="form-step-4" role="form" data-toggle=""></div>
                                    <div style="float: right;" class="mt-3">
                                        <button class="mt-2 mr-1 btn btn-success" id="btn_lineasol_upd_step4" type="submit">Agregar</button>
                                        <button class="mt-2 mr-1 btn btn-primary" id="btn_tostep5">Cerrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- </form> -->

                </div>

            </div>
        </div>
    </div>
</div>

<div class="card-header">
    <button type="button" data-placement="bottom" class="btn-shadow mr-1 btn btn-dark">
        <b><?php echo $row_solicitud->Sol_vDescripcionSol;?></b>
    </button>&nbsp;
    <button type="button" class="btn p-0 func_edit_sol_descripcion" data-xid="<?php echo $idsolicitud;?>" data-xvalue="<?php echo $row_solicitud->Sol_vDescripcionSol;?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></button>
    <div class="btn-actions-pane-right">
        <div role="group" class="btn-group-sm btn-group">
            <button type="button" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark addlineasol">
                Añadir Linea&nbsp;<i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-1 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Nro Solicitud <button type="button" class="btn p-0 func_edit_sol_nrosol" data-xid="<?php echo $idsolicitud;?>" data-xvalue="<?php echo $row_solicitud->Sol_vNroSolicitud;?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></button></div>
                            <div class="widget-subheading">&nbsp;</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-dark"><?php echo $row_solicitud->Sol_vNroSolicitud;?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-1 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <?php
                                $temp_row_linsol = LineaSolicitudData::getMontoTotalSolByIdSolicitud($idsolicitud);
                                $temp_var_montototal = "0.00";
                                if(is_null($temp_row_linsol)){
                                    $temp_var_montototal = "0.00";
                                }
                                else{
                                    $temp_var_montototal = (is_null($temp_row_linsol->monto_total)?"0.00":$temp_row_linsol->monto_total);
                                }
                            ?>
                            <div class="widget-heading">Monto Total</div>
                            <div class="widget-subheading">Moneda: <b><?php echo $txt_sol_tipomoneda;?> &nbsp;</b><button type="button" class="btn p-0 func_edit_sol_moneda" data-xid="<?php echo $idsolicitud;?>" data-xvalue="<?php echo $row_solicitud->Sol_vNroSolicitud;?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></button></div>
                            <?php
                                if(!is_null($row_solicitud->Sol_nTipoCambio)){
                            ?>
                            <div class="widget-subheading">T. Cambio: <?php echo $row_solicitud->Sol_nTipoCambio;?> <button type="button" class="btn p-0 func_edit_sol_tipo_cambio" data-xid="<?php echo $idsolicitud;?>" data-xvalue="<?php echo $row_solicitud->Sol_nTipoCambio;?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></button></div>
                            <?php 
                                }
                            ?>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><?php echo $txt_sol_tipomoneda_symbol; ?> <?php echo formatBytes($temp_var_montototal); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-1 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <?php
                                $var_sol_fechaAct = date("d M", strtotime($row_solicitud->Sol_dFechaAct));

                                $estadosol = $badge = "";

                                $css_estado = "";
                                $txt_estadosol_sigla = "";
                                $txt_estadosol = "";
                                
                                switch ($row_solicitud->Sol_cEstadoSol) {
                                    case 1:
                                        $css_estado = "text-info"; 
                                        $txt_estadosol_sigla = "ING"; 
                                        $txt_estadosol = "INGRESADO"; 
                                        $badge = "badge-info";
                                        break;
                                    case 2:
                                        $css_estado = "text-primary"; 
                                        $txt_estadosol_sigla = "APR";
                                        $txt_estadosol = "APROBADO";
                                        $badge = "badge-primary";
                                        break;
                                    case 3:
                                        $css_estado = "text-success"; 
                                        $txt_estadosol_sigla = "DES-";
                                        $txt_estadosol = "DESPACHADO";
                                        $badge = "badge-success";
                                        break;
                                    case 4:                                     
                                        $css_estado = "text-warning"; 
                                        $txt_estadosol_sigla = "DES";
                                        $txt_estadosol = "RECEP. PARCIAL";
                                        $badge = "badge-warning";
                                        break;
                                    case 5:                                    
                                        $css_estado = "text-alternate"; 
                                        $txt_estadosol_sigla = "REC-";
                                        $txt_estadosol = "RECEP. TOTAL";
                                        $badge = "badge-alternate";
                                        break;
                                    case 6:
                                        $css_estado = "text-dark"; 
                                        $txt_estadosol_sigla = "REC";
                                        $txt_estadosol = "CANC/RECH";
                                        $badge = "badge-dark";
                                        break;
                                    case 7:
                                        $css_estado = "text-secondary"; 
                                        $txt_estadosol_sigla = "SINL";
                                        $txt_estadosol = "SIN LINEAS";
                                        $badge = "badge-secondary";
                                        break;
                                    default: 
                                        $txt_estadosol_sigla = "";
                                        break;
                                }

                            ?>

                            <div class="widget-heading">Estado:</div>
                            <div class="widget-subheading">Ult. Act.: <?php echo $var_sol_fechaAct; ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers <?php echo $css_estado;?>"><?php echo $txt_estadosol;?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div  style="text-align: center; margin-bottom: 15px;">
    </div>

    <!-- DIV Agregar Linea -->
    <div class="main-card mb-3 card" id="div_addlineasolicitud">
        <div class="card-body">
            <h5 class="card-title">Agregar Línea</h5>
            <form class="needs-validation was-validated" data-xid="<?php echo $idsolicitud; ?>" id="form_lineasol_add">
                <div class="form-row">
                    <div class="col-md-1">
                        <div class="position-relative form-group">
                            <label for="txt_lineasol" class=""> Linea</label>
                            <input name="txt_lineasol" id="txt_lineasol" type="number" class="form-control" min=1 max=50 maxlength="2" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                        </div>
                    </div>
                    <div class="col-md-11">
                        <div class="position-relative form-group">
                            <label for="txt_lineasoldescr" class=""> Descripción</label>
                            <input name="txt_lineasoldescr" id="txt_lineasoldescr" type="text" class="form-control" maxlength="80" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="txt_lineasolcantidad" class=""> Cantidad</label>
                            <input name="txt_lineasolcantidad" id="txt_lineasolcantidad" type="number" min=1 max=99999 class="form-control" maxlength="5" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="position-relative form-group">
                            <label for="txt_subcat" class="">Sub Categoria</label>
                            <input name="txt_subcat" id="txt_subcat" type="text" class="form-control" maxlength="40" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required="">
                            
                            <input name="txt_data_subcat" id="txt_data_subcat" type="hidden" >
                        </div>
                    </div>
                </div>    

                <div class="form-row">
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="sel_uexpl" class="">U. Expl.</label>
                            <select name="sel_uexpl" id="sel_uexpl" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                                <option value=""> --- </option>
                            <?php
                                foreach ($lista_uexpl as $row_uexpl) {
                            ?>
                                <option value="<?php echo $row_uexpl->UExp_nIdUnExp?>"><?php echo $row_uexpl->UExp_cUnidadExp . " " . $row_uexpl->UExp_cSigla ;?></option>
                            <?php
                                    
                                }
                            ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="sel_proyecto" class="">Proyecto</label>
                            <select name="sel_proyecto" id="sel_proyecto" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                                <option value=""> --- </option>
                            <?php
                                foreach ($lista_proyecto as $row_proyecto) {
                            ?>
                                <option value="<?php echo $row_proyecto->Proy_nIdProyecto; ?>"><?php echo $row_proyecto->Proy_vProyecto;?></option>
                            <?php
                                    
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    

                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="sel_dpto" class="">Dpto.</label>
                            <select name="sel_dpto" id="sel_dpto" class="custom-select" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                                <option value=""> --- </option>
                            </select>
                        </div>
                    </div>

                    
                	<div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="txt_lineasolsubtotal" class=""> SubTotal</label>
                            <input name="txt_lineasolsubtotal" id="txt_lineasolsubtotal" type="number" step="any" min=0.00 class="form-control" maxlength="10" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" placeholder="<?php echo $txt_sol_tipomoneda_symbol . " " . $txt_sol_tipomoneda ; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="sel_igv" class="">IGV</label>
                            <select name="sel_igv" id="sel_igv" class="custom-select" >
                                <option value="1">18%</option>
                            	<option value="0">0%</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="txt_lineasoltotal" class=""> TOTAL</label>
                            <input name="txt_lineasoltotal" id="txt_lineasoltotal" type="text" class="form-control" maxlength="10" disabled placeholder="<?php echo $txt_sol_tipomoneda_symbol . " " . $txt_sol_tipomoneda ; ?>" required>
                        </div>
                    </div>
                </div>
                
                <button class="mt-2 btn btn-success" id="btn_add_lineasol"  type="submit">Registrar</button>
                <button class="mt-2 btn btn-danger" id="btn_close_addlineasol">Cerrar</button>
                <input name="txt_idsolicitud" id="txt_idsolicitud" type="hidden" value="<?php echo $idsolicitud; ?>" >
            </form>
        </div>
    </div>

    <!-- DIV Lineas -->
    <div class="card-body div_tbl_linea_sol">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <!-- <div class="card-header">
                        <button type="button" data-placement="bottom" class="btn-shadow mr-1 btn btn-dark">
                            <?php echo $row_solicitud->Sol_vDescripcionSol;?>
                        </button>&nbsp;
                        <button type="button" class="btn p-0 func_edit_sol_descripcion" data-xid="<?php echo $idsolicitud;?>" data-xvalue="<?php echo $row_solicitud->Sol_vDescripcionSol;?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></button>
                        <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <button type="button" data-placement="bottom" class="btn-shadow mr-3 btn btn-secondary addlineasol">
                                    Añadir Linea&nbsp;<i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div> -->

                    <div class="card-header">
                        Detalle Líneas
                    </div>

                    <?php
                        $result_lineassol = LineaSolicitudData::getLineasSolicitudByIdSolicitud($idsolicitud);
                    ?>
                    <style type="text/css">
                        @media screen and (max-width: 1225px) and (min-width: 1045px) {
                            .priority-5{
                                    display:none;
                            }
                        }
                        
                        @media screen and (max-width: 1045px) and (min-width: 835px) {
                            .priority-5{
                                    display:none;
                            }
                            .priority-4{
                                    display:none;
                            }
                        }
                        
                        @media screen and (max-width: 768px) and (min-width: 300px) {
                            .priority-5{
                                    display:none;
                            }
                            .priority-4{
                                    display:none;
                            }
                            .priority-3{
                                    display:none;
                            }
                        }
                        
                        @media screen and (max-width: 300px) {
                            .priority-5{
                                    display:none;
                            }
                            .priority-4{
                                    display:none;
                            }
                            .priority-3{
                                    display:none;
                            }
                            .priority-2{
                                    display:none;
                            }
                        }
                    </style>

                    <div class="table-responsive pl-3 pr-3">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tbl_linea_sol">
                            <thead>
                            <tr>
                                <th class="text-center priority-1">Ln</th>
                                <th class="text-center priority-2">SubCat-Cta</th>
                                <th class="text-center priority-3">U.Exp-Dpto</th>
                                <th class="priority-4" style="width: 400px;">Descripcion</th>
                                <th class="text-center priority-5">Cant</th>
                                <th class="text-center priority-5">SubTotal</th>
                                <th class="text-center priority-5">IGV</th>
                                <th class="text-center hidden-md">Total</th>
                                <th class="text-center">F.Aprob.</th>
                                <th class="text-center">OC</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">*</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(count($result_lineassol)<=0){
                            ?>
                                    <tr>
                                        <td colspan="14">No se encontraron lineas registradas.</td>
                                    </tr>
                            <?php
                                }
                                else{
                                    $cont = 1;
                                    foreach($result_lineassol as $linea_solicitud) {
                                        $cont++;
                                        $transf = strtotime($linea_solicitud->Lin_dFechaAprob);    
                                        $var_lineasol_fechaaprob = date("d/m", $transf);
                                        $var_lineasol_id = $linea_solicitud->Lin_nIdLineaSol;

                                        $var_css_tachado = "";
                                        $var_btn_delete = "";
                                        $var_lineasol_estado = "";
                                        $var_lineasol_proveedor = "<i>-<i>";

                                        /* Verifica si cuenta con OC y busca proveedor */
                                        $array_status_prov = array(3, 4, 5); 
                                        if(in_array($linea_solicitud->Lin_cEstado, $array_status_prov)) {
                                            $temp_obj_oc = OrdenCompraData::getOCByIdOc($linea_solicitud->Lin_OC_nIdOrdenCompra);
                                            $temp_onj_prov = ProveedorData::getProveedorByIdProveedor($temp_obj_oc->OC_Prov_nIdProveedor);
                                            $var_lineasol_proveedor = $temp_onj_prov->Prov_vNombreProveedor;
                                        }   

                                        /* Texto para Estado */
                                        switch ($linea_solicitud->Lin_cEstado) {
                                            case 1: 
                                                $var_lineasol_estado = "Ingresado"; 
                                                $badge = "badge-info";
                                                $var_btn_delete = "<button type=\"button\" class=\"btn p-0 func_del_linsol\" data-xvalue=\"$linea_solicitud->Lin_nNroLinea\"  data-xid=\"$var_lineasol_id\"><i class=\"fa fa-trash\"></i></button>";
                                                break;
                                            case 2: 
                                                $var_lineasol_estado = "Aprobado";
                                                $badge = "badge-primary";
                                                $var_btn_delete = "<button type=\"button\" class=\"btn p-0 func_del_linsol\" data-xvalue=\"$linea_solicitud->Lin_nNroLinea\"  data-xid=\"$var_lineasol_id\"><i class=\"fa fa-trash\"></i></button>";
                                                break;
                                            case 3: 
                                                $var_lineasol_estado = "Despachado";
                                                $badge = "badge-success";
                                                break;
                                            case 4:
                                                $var_lineasol_estado = "Rec. Parcial";
                                                $badge = "badge-warning";
                                                break;
                                            case 5:
                                                $var_lineasol_estado = "Rec. Total";
                                                $badge = "badge-alternate";
                                                break;
                                            case 6:
                                                $var_lineasol_estado = "Cancelado";
                                                $var_css_tachado = "tachado";
                                                $badge = "badge-dark";
                                                break;
                                            default: 
                                                $var_lineasol_estado = "";
                                                break;
                                        }
                                        
                                        $fecha_formato = (is_null($linea_solicitud->Lin_dFechaAprob)? "<button class=\"pt-0 pb-0 border-0 btn-transition btn btn-danger\">Pend. </button>": date("d M", strtotime($linea_solicitud->Lin_dFechaAprob)));

                                        $func_fechaAprob = "<a class=\"btn\" >".$fecha_formato."</a>" ;
                            ?>

                                        <tr class=" <?php echo $var_css_tachado; ?>">
                                            <td class="text-center priority-1"><?php echo $linea_solicitud->Lin_nNroLinea;?></td>
                                            <td class="text-center priority-2">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">
                                                                <?php echo $linea_solicitud->SubCat_vSubCategoria;?>
                                                            </div>
                                                            <div class="widget-subheading opacity-7">   <?php echo $linea_solicitud->Cta_cGlobal;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- <td class="text-center"><?php echo $linea_solicitud->Cta_cGlobal;?></td> -->
                                            <td class="text-center priority-3">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">
                                                                <?php echo $linea_solicitud->UExp_cUnidadExp;?>
                                                            </div>
                                                            <div class="widget-subheading opacity-7">
                                                                <?php echo $linea_solicitud->Dpto_cDpto;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>        
                                            </td>
                                            <!-- <td class="text-center"><?php echo $linea_solicitud->Dpto_cDpto;?></td> -->
                                            <td class="priority-4">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">
                                                                <?php echo $linea_solicitud->Lin_vDescripcion; ?></div>
                                                            <div class="widget-subheading opacity-7"><?php echo $var_lineasol_proveedor; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center priority-5"><?php echo $linea_solicitud->Lin_nCantidad; ?></td>
                                            <td class="text-right priority-5"><?php echo $linea_solicitud->Lin_dSubtotal; ?></td>
                                            <td class="text-right priority-5"><?php echo $linea_solicitud->Lin_dIGV; ?></td>

                                            <td class="text-right hidden-md"><?php echo $linea_solicitud->Lin_dTotal; ?></td>

                                            <td class="text-center"><?php echo ($linea_solicitud->Lin_cEstado==6)?"&nbsp;":$func_fechaAprob; ?></td>
                                            <!-- <td class="text-center d-none d-sm-block">Madrid</td> -->
                                            <td class="text-center">
                                                <?php
                                                if($linea_solicitud->Lin_cEstado==6){
                                                    echo "&nbsp;";
                                                }
                                                else{
                                                    if(is_null($linea_solicitud->Lin_OC_nIdOrdenCompra)){
                                                        echo '<a class="badge"> - </a>';
                                                    }
                                                    else{
                                                        $obj_OC = OrdenCompraData::getOCByIdOc($linea_solicitud->Lin_OC_nIdOrdenCompra);
                                                        echo '<a class="badge badge-info" style="color:#fff">'.$obj_OC->OC_nNroOC.'</a>';
                                                        // echo '<div class="badge badge-success">'.$obj_OC->OC_nNroOC.'</div>';
                                                    }
                                                }
                                                ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <div class="badge <?php echo $badge; ?>"><?php echo $var_lineasol_estado;?></div>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn p-0 pr-2 func_edit_linsol"  data-xid="<?php echo $var_lineasol_id;?>"><i class="fa fa-edit"></i></button><?php echo $var_btn_delete; ?>
                                            </td>
                                        </tr>
                            <?php
                                    }
                            }
                            ?>
                            
                            </tbody>
                        </table>
                    </div>

                    <div class="d-block text-center card-footer">
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Click to launch Smart Wizard modal</button> -->
                         
                        <!-- <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button> -->
                        <!-- <button class="btn-wide btn btn-success">Save</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</div>

