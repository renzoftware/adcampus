<?php
	switch ($_POST["opt"]) {
		case 'autocomplete':	//Lista de Sub Categorias
			$data = array();
			$result_subcategoria = SubCategoriaData::getSubCategoriaByLikeSubCat($_POST["term"]);
			if(count($result_subcategoria)>0){
				foreach($result_subcategoria as $row){
					$arrayTemp = array(
						'id'=> (int)$row->SubCat_nIdSubCategoria,
						'label' => $row->SubCat_vSubCategoria." ".$row->SubCat_vDescripcion." [Cta: ".$row->Cta_cGlobal." ".$row->Cta_vDescripcion."]",
						'value' => $row->SubCat_vSubCategoria." ".$row->SubCat_vDescripcion." [Cta: ".$row->Cta_cGlobal." ".$row->Cta_vDescripcion."]");
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