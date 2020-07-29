<?php
class ProyectoData {
	public static $tablename = "proyecto";
	function __construct(){
		$this->Proy_nIdProyecto = "";
		$this->Proy_vProyecto = "";
		$this->Proy_cEstado = "";
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (Proy_vProyecto, Proy_cEstado) ";
		$sql .= "VALUE (\"$this->Proy_vProyecto\",\"$this->Proy_cEstado\")";
		return Executor::doit($sql);
	}

	public static function getProyectoAllActive(){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Proy_cEstado=1 ORDER BY Proy_nIdProyecto ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProyectoData());
	}


}

?>