<?php
	switch ($_POST["opt"]) {
		case 'autocomplete':	//Lista de PRoveedores
			$data = array();
			$result_proveedor = ProveedorData::getProveedorByLikeNombreProv($_POST["term"]);
			if(count($result_proveedor)>0){
				foreach($result_proveedor as $row){
					$arrayTemp = array(
						'id'=> (int)$row->Prov_nIdProveedor,
						'label' => $row->Prov_vNombreProveedor,
						'value' => $row->Prov_vNombreProveedor
					);
					array_push($data, $arrayTemp);
				}
			}
			header("Content-Type: application/json");
			print json_encode($data);
			break;

		default:
			echo "";
			break;
	}
	
?>