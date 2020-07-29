<?php
class DptoData {
	public static $tablename = "dpto";
	function __construct(){
		$this->Dpto_nIdDpto = "";
		$this->Dpto_cDpto = "";
		$this->Dpto_cEstado = "";
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (Anual, Mes,Estado) ";
		$sql .= "VALUE (\"$this->Anual\",\"$this->Mes\",\"$this->Estado\")";
		return Executor::doit($sql);
	}

	public static function getDptoAllActive(){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Dpto_cEstado=1 ORDER BY Dpto_cDpto ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DptoData());
	}

	public static function getDptoByProyecto($idproyecto){
		$sql = "SELECT 
					dpto.Dpto_nIdDpto,
					dpto.Dpto_cDpto
				FROM dpto_proyecto
				INNER JOIN dpto  ON dpto.Dpto_nIdDpto = dpto_proyecto.DptoProy_Dpto_nIdDpto
				WHERE
					dpto_proyecto.DptoProy_cEstado=1
					AND dpto.Dpto_cEstado=1
					AND dpto_proyecto.DptoProy_Proy_nIdProyecto = $idproyecto
				ORDER BY dpto.Dpto_cDpto ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DptoData());
	}

}

?>