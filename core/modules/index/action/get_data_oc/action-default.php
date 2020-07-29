<?php
	switch ($_POST["opt"]) {
		case 'autocomplete':	//Lista de Órdenes de Compra
			$data = array();
			$result_ordencompra = OrdenCompraData::getOrdenCompraByLikeNroOC($_POST["term"]);
			if(count($result_ordencompra)>0){
				foreach($result_ordencompra as $row){
					$arrayTemp = array(
						'id'=> (int)$row->OC_nIdOrdenCompra,
						'label' => $row->OC_nNroOC." - ".$row->Prov_vNombreProveedor,
						'other' => $row->Prov_vNombreProveedor,
						'value' => $row->OC_nNroOC
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