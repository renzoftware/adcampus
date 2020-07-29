<?php
class OrdenCompraData {
	public static $tablename = "orden_compra";
	function __construct(){
		$this->OC_nIdOrdenCompra = "";
		$this->OC_nNroOC = "";
		$this->OC_Prov_nIdProveedor = "";
		$this->OC_cEstado = "";
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (OC_nNroOC, OC_Prov_nIdProveedor, OC_cEstado) ";
		$sql .= "VALUE (\"$this->OC_nNroOC\",\"$this->OC_Prov_nIdProveedor\", 1)";
		return Executor::doit($sql);
	}

	public static function getOrdenCompraByLikeNroOC($nrooc){
		$sql = "SELECT oc.*, prov.Prov_vNombreProveedor
				FROM orden_compra oc 
				INNER JOIN proveedor prov ON prov.Prov_nIdProveedor = oc.OC_Prov_nIdProveedor
				WHERE oc.OC_nNroOC LIKE '%$nrooc%' AND oc.OC_cEstado = 1 LIMIT 0,7";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OrdenCompraData());
	}

	public static function getOCByNroOC($nro_oc){
		$sql = "SELECT * FROM ".self::$tablename." WHERE OC_nNroOC = $nro_oc AND OC_cEstado = 1";
		$query = Executor::doit($sql);
		return Model::one($query[0], new OrdenCompraData());
	}

	public static function getOCByIdOc($id_oc){
		$sql = "SELECT * FROM ".self::$tablename." WHERE OC_nIdOrdenCompra = $id_oc";
		$query = Executor::doit($sql);
		// var_dump($sql);
		return Model::one($query[0], new OrdenCompraData());
	}

	public function updateOC_Proveedor(){
		$sql = "UPDATE orden_compra SET OC_Prov_nIdProveedor = $this->OC_Prov_nIdProveedor WHERE OC_nIdOrdenCompra = $this->OC_nIdOrdenCompra";
		return Executor::doit($sql);
	}

}

?>