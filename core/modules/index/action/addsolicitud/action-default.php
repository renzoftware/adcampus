<?php
if(!empty($_POST)){		
	if($_POST["txt_nrosol"]!=""){
		$solicitud = new SolicitudData();

		$solicitud->Sol_vNroSolicitud = $_POST["txt_nrosol"];
		$solicitud->Sol_vDescripcionSol = $_POST["txt_descripcion"];
		$solicitud->Sol_dFechaCreacion = $_POST["date_registro"];
		$solicitud->Sol_cTipoMoneda = $_POST["sel_moneda"];
		$solicitud->Sol_nTipoCambio = ($_POST["sel_moneda"]==2?3.33:"NULL");

		if($_POST["txt_nrosol"]!=""){
			//Verificar si ya existe solicitud
			$solicitud_search = SolicitudData::getSolicitudByNroSolicitudPS($_POST["txt_nrosol"]);
			if(is_null($solicitud_search)){
				$solicitud->add();
				echo "1";	// Solicitud ingresada
			}
			else{
				echo "2"; // Nro Solicitud ya existe
			}
		}
		else{
			$solicitud->add();
			echo "1";	// Solicitud ingresada
		}		

	}
}
else{
	echo "0"; //Error en envio de datos
}

?>