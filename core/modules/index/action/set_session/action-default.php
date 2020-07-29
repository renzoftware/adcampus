<?php
if(!empty($_POST)){
	$val_opt = $_POST['option'];
	$val_value = $_POST['value'];

	switch ($val_opt) {
	    case 1: /* Id Linea Solicitud */
	        $_SESSION['linsol_id_temp'] = $val_value;
	        echo "1";
	        break;

	    case 2: /* Id Solicitud */
	        $_SESSION['solic_id_temp'] = $val_value;
	        echo "1";
	        break;

	    case 3: /* Id Incidente */
	        $_SESSION['incid_id_temp'] = $val_value;
	        echo "1";
	        break;
	}
}
else{
	echo "0"; //Error en envio de datos POST
}

?>