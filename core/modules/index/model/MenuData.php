<?php
class MenuData {
	public static $tablename = "menu";
	function __construct(){
		$this->IdMenu = "";
		$this->Descripcion = "";
		$this->Ruta = "";
		$this->Icono = "";
		$this->Orden = "";
		$this->Estado = "";
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (Descripcion, Ruta, Icono, Orden, Estado) ";
		$sql .= "VALUE (\"$this->Descripcion\",\"$this->Ruta\",\"$this->Icono\",\"$this->Orden\",\"$this->Estado\")";
		return Executor::doit($sql);
	}

	public static function getMenuAllActive(){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Estado = 1 ORDER BY Orden ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MenuData());
	}

	public static function getMenuByIdMenu($idmenu){
		$sql = "SELECT * FROM ".self::$tablename." WHERE IdMenu = $idmenu";
		$query = Executor::doit($sql);
		return Model::one($query[0],new MenuData());
	}

}

?>