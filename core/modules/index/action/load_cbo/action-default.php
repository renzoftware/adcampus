<?php
	switch ($_POST["opt"]) {
		case 'uexpl':
		    $lista_uexpl = UExplData::getUExplAllActive();
			echo "<option value=\"\"> -U. Expl- </option>";
            foreach ($lista_uexpl as $row_uexpl) {
            	echo "<option value=".$row_uexpl->UExp_nIdUnExp."\">". $row_uexpl->UExp_cUnidadExp . " " . $row_uexpl->UExp_cSigla . "</option>";
            }
			break;

		case 'dpto':
			if(is_null($_POST["proy"]) || $_POST["proy"]==""){
				echo "A";
				echo "<option value=\"\"> -Dpto- </option>";
			}
			else{
				echo "B";
				$var_id_proyecto = $_POST["proy"];
    			$lista_dpto = DptoData::getDptoByProyecto($var_id_proyecto);
				echo "<option value=\"\"> -Dpto- </option>";
            	foreach ($lista_dpto as $row_dpto) {
            		echo "<option value=\"$row_dpto->Dpto_nIdDpto\">$row_dpto->Dpto_cDpto</option>";
            	}
        	}
			break;

		case 'dpto_edit':
			$var_id_proyecto = $_POST["proy"];
			$var_id_dpto = $_POST["xid"];
    		$lista_dpto = DptoData::getDptoByProyecto($var_id_proyecto);
			echo "<option value=\"\"> -Dpto- </option>";
            foreach ($lista_dpto as $row_dpto) {
            	$temp_selected_dpto = ($var_id_dpto==$row_dpto->Dpto_nIdDpto?"selected":"");
            	echo "<option value=\" $row_dpto->Dpto_nIdDpto\"  $temp_selected_dpto > $row_dpto->Dpto_cDpto </option>";
            }
			break;

		case 'uexpl_tecn':
			$var_uexpl = $_POST["uexpl"];
    		$lista_tec_uexpl = UExpTecnicosData::getTecnicosByUExpl($var_uexpl);
			echo "<option value=\"\"> -Seleccionar- </option>";
            foreach ($lista_tec_uexpl as $row_tec_uexpl) {
            	echo "<option value=\"". $row_tec_uexpl->UExpTec_User_id."\" > ".$row_tec_uexpl->name ." " . $row_tec_uexpl->lastname .  "</option>";
            }
			break;

		case 'periodo':
		    $lista_periodo = PeriodoData::getPeriodoAll();
			$hoy = date("Y");   
            foreach ($lista_periodo as $row_periodo) {
				$selected = ($hoy==($row_periodo->Per_vAnual)) ? "selected='selected'" : "" ; 
			?>
				<option value="<?php echo $row_periodo->Per_nIdPeriodo; ?>" <?php echo $selected; ?> > <?php echo $periodo->Per_vAnual ;?> </option>
			<?php
            }
			break;

		
		default:
			# code...
			break;
	}
	
?>