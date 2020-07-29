<?php
class ProveedorData {
	public static $tablename = "proveedor";
	function __construct(){
		$this->Prov_nIdProveedor = "";
		$this->Prov_CodigoProveedor = "";
		$this->Prov_vRUC = "";
		$this->Prov_vNombreProveedor = "";
		$this->Prov_cEstado = "";
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (Anual, Mes,Estado) ";
		$sql .= "VALUE (\"$this->Anual\",\"$this->Mes\",\"$this->Estado\")";
		return Executor::doit($sql);
	}

	public static function getProveedorByLikeNombreProv($nombre_prov){
		$sql = "SELECT prov.*
				FROM proveedor prov 
				WHERE prov.Prov_vNombreProveedor LIKE '%$nombre_prov%' AND prov.Prov_cEstado = 1 LIMIT 0,7";
		$query = Executor::doit($sql);
		return Model::many($query[0], new ProveedorData());
	}

	public static function getProveedorByNombreProv($nombre_prov){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Prov_vNombreProveedor = \"{$nombre_prov}\" AND Prov_cEstado = 1";
		$query = Executor::doit($sql);
		// var_dump($query);
		return Model::one($query[0], new ProveedorData());
	}

	public static function getProveedorByIdProveedor($id_prov){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Prov_nIdProveedor = $id_prov ";
		$query = Executor::doit($sql);
		// var_dump($query);
		return Model::one($query[0], new ProveedorData());
	}

}

?>