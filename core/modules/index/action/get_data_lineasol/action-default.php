<?php
	switch ($_POST["opt"]) {
		case 'txt_title':	// Devuelve Descripcion Linea 
			$sess_linsol_id_temp = $_SESSION["linsol_id_temp"];
			$obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($sess_linsol_id_temp);
			$obj_solicitud = LineaSolicitudData::getSolicitudByIdSolicitud($obj_lineasolicitud->Lin_Sol_nIdSolicitud);
			echo "<b>".$obj_solicitud->Sol_vNroSolicitud." (Linea ".$obj_lineasolicitud->Lin_nNroLinea. "): </b>".$obj_lineasolicitud->Lin_vDescripcion;
			break;

		default:
			echo "";
			break;
	}
	
?>