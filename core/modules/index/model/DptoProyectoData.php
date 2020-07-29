<?php
class DptoProyectoData {
	public static $tablename = "dpto_proyecto";
	function __construct(){
		$this->DptoProy_nIdDptoProyecto = "";
		$this->DptoProy_Proy_nIdProyecto = "";
		$this->DptoProy_Dpto_nIdDpto = "";
		$this->DptoProy_cEstado = "";
	}

	public static function getDptoProyBy_Proy_Dpto($proyecto, $dpto){
		$sql = "SELECT *
				FROM dpto_proyecto 
				WHERE DptoProy_Proy_nIdProyecto={$proyecto} AND DptoProy_Dpto_nIdDpto={$dpto} AND DptoProy_cEstado = 1";
		$query = Executor::doit($sql);
		// var_dump($sql);
		return Model::one($query[0],new DptoProyectoData());
	}
}

?>