<?php
if(!empty($_POST)){
	if(Session::getUID()!=""){
		switch ($_POST["opt"]) {
			case 'upd_sol_nro':
				$id_solicitud = $_POST["id"];
			  	$nro_solicitud_edit = $_POST["valor"];

				$solicitud_search = SolicitudData::getSolicitudByNroSolicitudPS($nro_solicitud_edit);

				if(is_null($solicitud_search)){
					$obj_solicitud = SolicitudData::getSolicitudByIdSolicitud($id_solicitud);
					$obj_solicitud->Sol_vNroSolicitud = $nro_solicitud_edit;
					$obj_solicitud->updateNroSolicitud();
					echo "1";	// Solicitud Editada
				}
				else{
					echo "4"; // Nro Solicitud ya existe
				}
				break;

			case 'upd_sol_tcamb':
				$id_solicitud = $_POST["id"];
			  	$tipocamb_solicitud_edit = $_POST["valor"];

				$obj_solicitud = SolicitudData::getSolicitudByIdSolicitud($id_solicitud);
				$obj_solicitud->Sol_nTipoCambio = $tipocamb_solicitud_edit;
				$obj_solicitud->updateTipoCambio();
				echo "1";	// Tipo Cambio Editado
				break;

			case 'upd_sol_descr':
				$id_solicitud = $_POST["id"];
			  	$descr_solicitud_edit = $_POST["valor"];

				$obj_solicitud = SolicitudData::getSolicitudByIdSolicitud($id_solicitud);
				$obj_solicitud->Sol_vDescripcionSol = $descr_solicitud_edit;
				$obj_solicitud->updateDescrSolicitud();
				echo "1";	// Descripcion Editada
				break;

			case 'upd_sol_moneda':
				$id_solicitud = $_POST["id"];
			  	$moneda_solicitud_edit = $_POST["valor"];

				$obj_solicitud = SolicitudData::getSolicitudByIdSolicitud($id_solicitud);
				$obj_solicitud->Sol_cTipoMoneda = $moneda_solicitud_edit;
				$obj_solicitud->updateTipoMonedaSolicitud();
				echo "1";	// Descripcion Editada
				break;
			
			case 'del_sol_faprob': /* Elimar Fecha Aprobación de la Linea */
				$sess_linsol_id_temp = $_SESSION["linsol_id_temp"];
				$obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($sess_linsol_id_temp);
				
				/* Validar si existen Orden Asignada */
				if (is_null($obj_lineasolicitud->Lin_OC_nIdOrdenCompra)) {
					$obj_lineasolicitud->deleteFechaAprob();
					$obj_lineasolicitud->updateStatus(1);
					$obj_lineasolicitud->updateSolicitud_Estado();
					echo "1";	// Fecha aprob. eliminada
				}
				else{
					echo "2"; // No se puede eliminar la Fecha porque cuenta con OC asignada
				}				
				break;

			case 'del_sol_oc': /* Elimar OC de la Linea */
				$sess_linsol_id_temp = $_SESSION["linsol_id_temp"];
				
				$obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($sess_linsol_id_temp);
				
				/* Validar si existen Recepciones */
				$array_estados = array(4, 5);
				if (in_array($obj_lineasolicitud->Lin_cEstado, $array_estados)) {
					echo "2";	// No se puede eliminar la OC porque existen recepciones
				}
				else{
					$obj_lineasolicitud->deleteOrdenCompra();
					$obj_lineasolicitud->updateStatus(2);
					$obj_lineasolicitud->updateSolicitud_Estado();
					echo "1";	// OC Eliminada
				}

				break;

			case 'step1': /* Paso 1 -  Ingresado */
				$obj_lineasolicitud = new LineaSolicitudData();
				$sess_linsol_id_temp = $_SESSION["linsol_id_temp"];
				
				$var_subtotal = $_POST["txt_linsol_edit_subtotal"];
				$var_sel_igv = $_POST["sel_linsol_edit_igv"];
				$var_igv = $var_total = 0;

				if($var_sel_igv == "1"){
					$var_total = round($var_subtotal*1.18, 2);
					$var_igv = round($var_subtotal*0.18, 2);
				}
				else{
					$var_total = $var_subtotal;
					$var_igv = 0;
				}
				
				$obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($sess_linsol_id_temp);

				$obj_lineasolicitud->Lin_vDescripcion = trim(filter_var(stripslashes($_POST["txt_linsol_edit_descr"]), FILTER_SANITIZE_STRING));
				$obj_lineasolicitud->Lin_nNroLinea = $_POST["txt_linsol_edit_linea"];
				$obj_lineasolicitud->Lin_SubCat_nIdSubCategoria = $_POST["txt_linsol_edit_subcat_data"];
				$obj_lineasolicitud->Lin_UExp_nIdUnExp = $_POST["sel_linsol_edit_uexpl"];
				$obj_lineasolicitud->Lin_Dpto_nIdDpto = $_POST["sel_linsol_edit_dpto"];
				$obj_lineasolicitud->Lin_Proy_nIdProyecto = $_POST["sel_linsol_edit_proyecto"];
				$obj_lineasolicitud->Lin_nCantidad = $_POST["txt_linsol_edit_cant"];
				$obj_lineasolicitud->Lin_dSubtotal = $var_subtotal;
				$obj_lineasolicitud->Lin_dIGV = $var_igv;
				$obj_lineasolicitud->Lin_dTotal = $var_total;

				/* Validar si existe el nro de linea en otra solicitud */
				$result_valida_nrolinea = LineaSolicitudData::getLinSolByIdSolicitudAndNroLinea($obj_lineasolicitud->Lin_Sol_nIdSolicitud, $_POST["txt_linsol_edit_linea"]);

				if(!is_null($result_valida_nrolinea)){
					if($result_valida_nrolinea->Lin_nIdLineaSol != $sess_linsol_id_temp){ /* Si el nro de linea a actualizar NO es el mismo que se edita */
						echo "2"; // Nro Linea ya existe
						break;
					}
				}

				/* Verificar cantidad/monto recepcionado con lo ingresado */
				$result_suma_cant = RecepcionesData::getRecepSumCantMonto($sess_linsol_id_temp);
				$result_suma_cant = (is_null($result_suma_cant->cant_total)?0:$result_suma_cant->cant_total);

				$var_suma_cant_monto = ($obj_lineasolicitud->Lin_cTipoRecepcion==1?$_POST["txt_linsol_edit_cant"]:$var_total);

				/* Validamos en que estado se encuentra la solicitud a editar */
				switch ($obj_lineasolicitud->Lin_cEstado) {
					case 4: /* Recepcion PARCIAL */
						if($var_suma_cant_monto == $result_suma_cant){
							/* Actualizamos linea y el estado de la linea porque la Cantidad/Monto ingresado es igual a lo actualmente recepcionado */
							$obj_lineasolicitud->update_step1();
							$obj_lineasolicitud->updateStatus(5);
							$obj_lineasolicitud->updateSolicitud_Estado();
							echo "1"; /* Linea Actualizada */
						}
						else if($var_suma_cant_monto > $result_suma_cant){
							/* Solo actualizamos la linea, pues la Cantidad/Monto ingresado es mayor que lo parcialmente recepcionado, se mantiene en el estado actual (Recepcion parcial)*/
							$obj_lineasolicitud->update_step1();
							echo "1";  /* Linea Actualizada */
						}
						else{
							echo "3"; /* Cantidad/Monto ingresado es menor a lo actualmente recepcionado */
						}
						break;

					case 5: /* Recepcion TOTAL */
						if($var_suma_cant_monto == $result_suma_cant){
							$obj_lineasolicitud->update_step1();
							echo "1"; /* Linea Actualizada */
						}
						else if($var_suma_cant_monto < $result_suma_cant){
							echo "3"; /* Cantidad/Monto ingresado es menor a lo actualmente recepcionado */
						}
						else{
							/* Se actualiza y modifica estado a Recepcion Parcial */
							$obj_lineasolicitud->update_step1();
							$obj_lineasolicitud->updateStatus(4);
							$obj_lineasolicitud->updateSolicitud_Estado();
							echo "1"; /* Linea Actualizada */
						}
						break;

					default:
						$obj_lineasolicitud->update_step1();
						echo "1"; /* Linea Actualizada */
						break;
				}

				break;

			case 'step2': /* Paso 2 - Aprobado */
				$sess_linsol_id_temp = $_SESSION["linsol_id_temp"];

				$date_linsol_faprob = $_POST["date_linsol_faprob"];
				
				$obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($sess_linsol_id_temp);

				$obj_lineasolicitud->Lin_dFechaAprob = $date_linsol_faprob;
				$obj_lineasolicitud->update_step2();

				/* Validar si existen OC asignada */
				// $result_buscaRecep = RecepcionesData::getRecepcionesByIdLineaSol($sess_linsol_id_temp);
				if(is_null($obj_lineasolicitud->Lin_OC_nIdOrdenCompra)){
					$obj_lineasolicitud->updateStatus(2);
					$obj_lineasolicitud->updateSolicitud_Estado();
				}

				echo "1";	// Paso 2 OK
				break;

			case 'step3': /* Paso 3 - Orden de Compra */
				$sess_linsol_id_temp = $_SESSION["linsol_id_temp"];

				$linsol_edit_oc = $_POST["txt_linsol_edit_oc"];
				$linsol_edit_oc_id = $_POST["txt_linsol_edit_oc_data"];
				$linsol_edit_proveedor = $_POST["txt_linsol_edit_proveedor"];
				$linsol_edit_proveedor_id = $_POST["txt_linsol_edit_proveedor_data"];
				
				// Validar si existe el Nro de Orden de Compra ingresado
				$result_buscaOC = OrdenCompraData::getOCByNroOC($linsol_edit_oc);
				
				/* Validar si existe el Nombre del Proveedor */
				$result_buscaProv = ProveedorData::getProveedorByNombreProv($linsol_edit_proveedor);

				// $obj_lineasolicitud = new LineaSolicitudData();
				$obj_ordencompra = new OrdenCompraData();
				$obj_proveedor = new ProveedorData();

				$obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($sess_linsol_id_temp);

				/* Si no existe el Nro de OC, se registra y vincula a la línea */
				if(is_null($result_buscaOC)){ 
					if(is_null($result_buscaProv)){
						echo "2"; // No se encontró el proveedor
					}
					else{
					   	/* Registrar y obtener ID ingresado */
						$obj_ordencompra->OC_nNroOC = $linsol_edit_oc;
						$obj_ordencompra->OC_Prov_nIdProveedor = $result_buscaProv->Prov_nIdProveedor;
						$result_oc_add = $obj_ordencompra->add();
					   	$oc_id = $result_oc_add[1];
					   	
					   	$obj_lineasolicitud->Lin_OC_nIdOrdenCompra = $oc_id ;
					   	$obj_lineasolicitud->updateOrdenCompra();
						
						$obj_lineasolicitud->updateStatus(3);
						$obj_lineasolicitud->updateSolicitud_Estado();
					   	echo "1"; /* Se registró la OC y actualizó la linea */
					}
				}
				/* Si existe el Nro OC, se verifica si es el mismo proveedor y vincula a la Linea */
				else{					
					/* Validar si existe el Nombre del Proveedor */
					if(is_null($result_buscaProv)){
						echo "2"; // No se encontró el proveedor
					}
					else{
						/* Actualizamos proveedor en OC */
						$obj_ordencompra->OC_nIdOrdenCompra = $result_buscaOC->OC_nIdOrdenCompra;
						$obj_ordencompra->OC_Prov_nIdProveedor = $result_buscaProv->Prov_nIdProveedor;
						$obj_ordencompra->updateOC_Proveedor();

						/* Vinculamos OC a la Linea de la Solicitud */
						$obj_lineasolicitud->Lin_OC_nIdOrdenCompra = $result_buscaOC->OC_nIdOrdenCompra;
						$obj_lineasolicitud->updateOrdenCompra();
						
						/* Validar si existen recepciones registradas */
						$result_buscaRecep = RecepcionesData::getRecepcionesByIdLineaSol($sess_linsol_id_temp);
						if(count($result_buscaRecep)<=0){
							$obj_lineasolicitud->updateStatus(3);
						}

						$obj_lineasolicitud->updateSolicitud_Estado();
						echo "1"; /* Se actualizó la OC de la linea */
					}
				}
				break;

			case 'step4': /* Paso 4 - Agregar Recepciones */
				$sess_linsol_id_temp = $_SESSION["linsol_id_temp"];

				$var_valid_cant = true;
				$var_valid_tiporecep = true;
				
				$linsol_edit_tiporecep = $_POST["sel_linsol_edit_tiporecep"];
				$recep_add_cant_recib = $_POST["txt_recep_add_cant_recib"];
				$recep_add_fcontable = $_POST["date_recep_add_fcontable"];
				
				/* Variables para verificar monto/cantidad de Linea*/
				$obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($sess_linsol_id_temp);
				$var_recep_tiporecep = $obj_lineasolicitud->Lin_cTipoRecepcion;
				$var_recep_cantidad = $obj_lineasolicitud->Lin_nCantidad;
				$var_recep_montototal = $obj_lineasolicitud->Lin_dTotal;

				/* Obtenemos suma de montos/cantidades recepcionados */
				$result_suma_cant = RecepcionesData::getRecepSumCantMonto($sess_linsol_id_temp);

				$db_suma_cant = 0;
				if(is_null($result_suma_cant)){
					$db_suma_cant = 0;
				}
				else{
					if(is_null($result_suma_cant->cant_total) || $result_suma_cant->cant_total == 0){
						$db_suma_cant = 0;
					}
					else{
						$db_suma_cant = $result_suma_cant->cant_total;
					}
				}

				$temp_suma = $db_suma_cant + $recep_add_cant_recib;

				/* Caso según tipo recepcion registrada actualmente*/
				switch ($var_recep_tiporecep) {
					case 1: /* Suma por CANTIDAD */
						if($linsol_edit_tiporecep == 1){ /* Si POST Tipo Recepcion es CANTIDAD*/
							if($var_recep_cantidad > $temp_suma){
								$var_valid_cant = true;
								/* Cambiar estado a recepcion parcial */
								$obj_lineasolicitud->updateStatus(4);
							}
							else if($var_recep_cantidad == $temp_suma){
								$var_valid_cant = true;
								/* Cambiar estado a recepcion total */
								$obj_lineasolicitud->updateStatus(5);
							}
							else{
								$var_valid_cant = false;
							}
						}
						else if($linsol_edit_tiporecep == 2){ /* Si POST Tipo Recepcion es MONTO*/
							if($var_recep_montototal > $temp_suma){
								$var_valid_cant = true;
								/* Cambiar estado a recepcion parcial */
								$obj_lineasolicitud->updateStatus(4);
							}
							else if($var_recep_montototal == $temp_suma){
								$var_valid_cant = true;
								/* Cambiar estado a recepcion total */
								$obj_lineasolicitud->updateStatus(5);
							}
							else{
								$var_valid_cant = false;
							}
						}
						break;
					
					case 2: /* Suma por MONTO */
						if($linsol_edit_tiporecep == 2){ /* Si POST Tipo Recepcion es MONTO*/
							if($var_recep_montototal > $temp_suma){
								$var_valid_cant = true;
								/* Cambiar estado a recepcion parcial */
								$obj_lineasolicitud->updateStatus(4);
							}
							else if($var_recep_montototal == $temp_suma){
								$var_valid_cant = true;
								/* Cambiar estado a recepcion total */
								$obj_lineasolicitud->updateStatus(5);
							}
							else{
								$var_valid_cant = false;
							}
						}
						else if($linsol_edit_tiporecep == 1){ /* Si POST Tipo Recepcion es CANTIDAD*/
							if($var_recep_cantidad > $temp_suma){
								$var_valid_cant = true;
								/* Cambiar estado a recepcion parcial */
								$obj_lineasolicitud->updateStatus(4);
							}
							else if($var_recep_cantidad == $temp_suma){
								$var_valid_cant = true;
								/* Cambiar estado a recepcion total */
								$obj_lineasolicitud->updateStatus(5);
							}
							else{
								$var_valid_cant = false;
							}
						}
						break;
				}
				
				if($var_valid_cant){
					$obj_lineasolicitud->Lin_cTipoRecepcion = $linsol_edit_tiporecep;
					$obj_lineasolicitud->update_TipoRecepcion();
					$obj_lineasolicitud->updateSolicitud_Estado();

					/* Registrar recepcion */
					$obj_recepcion = new RecepcionesData();
					$obj_recepcion->Rec_Lin_nIdLineaSol = $sess_linsol_id_temp;
					$obj_recepcion->Rec_nCantRecibida = $recep_add_cant_recib;
					$obj_recepcion->Rec_dFechaContable = $recep_add_fcontable;
					$obj_recepcion->add();

					echo "1";
				}
				else{

					echo "2"; /* No se pudo registrar - Verificar Cantidad */
				}
				break;

			case 'del_recep': /* Eliminar Recepción */
				$recep_id = $_POST["id"];
				$sess_linsol_id_temp = $_SESSION["linsol_id_temp"];
				$obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($sess_linsol_id_temp);

				$obj_recepcion = new RecepcionesData();
				$obj_recepcion->Rec_nIdRecepcion = $recep_id;
				$obj_recepcion->deleteRecepcion();

				$result_lista_recepciones = RecepcionesData::getRecepcionesByIdLineaSol($sess_linsol_id_temp);

				if(count($result_lista_recepciones)<=0){
                	$obj_lineasolicitud->updateStatus(3);
                	$obj_lineasolicitud->updateSolicitud_Estado();
              	}
              	else{
                	$obj_lineasolicitud->updateStatus(4);
                	$obj_lineasolicitud->updateSolicitud_Estado();
              	}

				echo "1";
				break;

			case 'del_linsol': /* Eliminar Linea */
				// $recep_id = $_POST["id"];
				$linsol_id = $_POST["id"];
	
				$obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($linsol_id);
                $obj_lineasolicitud->updateStatus(6);
                $obj_lineasolicitud->updateSolicitud_Estado();

				echo "1";
				break;
			
			default:
				echo "3"; //Error opt
				break;
		}
	}
	else{
		echo "2"; // No se ha logeado
	}
}
else{
	echo "0"; //Error en envio de datos POST
}

?>