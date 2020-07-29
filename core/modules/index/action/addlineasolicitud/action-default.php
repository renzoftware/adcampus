<?php
if(!empty($_POST)){		
	if($_POST["txt_idsolicitud"]!=""){
		$lineasolicitud = new LineaSolicitudData();

		$var_subtotal = $_POST["txt_lineasolsubtotal"];
		$var_sel_igv = $_POST["sel_igv"];
		$var_igv = $var_total = 0;

		if($var_sel_igv == "1"){
			$var_total = round($var_subtotal*1.18, 2);
			$var_igv = round($var_subtotal*0.18, 2);
		}
		else{
			$var_total = $var_subtotal;
			$var_igv = 0;
		}

		$lineasolicitud->Lin_Sol_nIdSolicitud = $_POST["txt_idsolicitud"];
		$lineasolicitud->Lin_nNroLinea = $_POST["txt_lineasol"];
		$lineasolicitud->Lin_SubCat_nIdSubCategoria = $_POST["txt_data_subcat"];
		$lineasolicitud->Lin_UExp_nIdUnExp = $_POST["sel_uexpl"];
		$lineasolicitud->Lin_Dpto_nIdDpto = $_POST["sel_dpto"];
		$lineasolicitud->Lin_Proy_nIdProyecto = $_POST["sel_proyecto"];
		$lineasolicitud->Lin_vDescripcion = trim(filter_var(stripslashes($_POST["txt_lineasoldescr"]), FILTER_SANITIZE_STRING));
		$lineasolicitud->Lin_nCantidad = $_POST["txt_lineasolcantidad"];
		$lineasolicitud->Lin_dSubtotal = $var_subtotal;
		$lineasolicitud->Lin_dIGV = $var_igv;
		$lineasolicitud->Lin_dTotal = $var_total;

		if($_POST["txt_idsolicitud"]!="" && $_POST["txt_data_subcat"]!=""){
			//Verificar si ya existe linea
			$lineasolicitud_search = LineaSolicitudData::getLineaSolicitudByIdSolNroLinea($_POST["txt_idsolicitud"], $_POST["txt_lineasol"]);
			if(is_null($lineasolicitud_search)){
				$lineasolicitud->add();
				$lineasolicitud->updateSolicitud_Estado();
				echo "1";	// Linea Solicitud ingresada
			}
			else{
				echo "2"; // Linea Solicitud ya existe
			}
		}
		else{
			// $lineasolicitud->add();
			echo "3";	// Fallo en registro
		}		

	}
}
else{
	echo "0"; //Error en envio de datos
}

?>