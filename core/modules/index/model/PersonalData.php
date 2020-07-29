<?php
class PersonalData {
	public static $tablename = "personal";
	function __construct(){
		$this->IdPersonal = "";
		$this->Dni = "";
		$this->Nombres = "";
		$this->ApPaterno = "";
		$this->ApMaterno = "";
		$this->IdServicio = "";
		$this->Estado = "";
	}

	public static function getPersonalById($IdPersonal){
		$sql = "SELECT * FROM ".self::$tablename." WHERE IdPersonal = $IdPersonal AND Estado = 1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PersonalData());
	}

	public static function getPersonalCbo(){
		$sql = "SELECT p.*, s.NombreServicio FROM ".self::$tablename." p
			INNER JOIN servicio s ON s.IdServicio = p.IdServicio
		 	WHERE p.Estado=1 ORDER BY ApPaterno ASC, ApMaterno ASC, Nombres ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonalData());
	}
}

?>