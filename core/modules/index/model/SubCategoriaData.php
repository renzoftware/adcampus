<?php
class SubCategoriaData {
	public static $tablename = "subcategoria";
	function __construct(){
		$this->SubCat_nIdSubCategoria = "";
		$this->SubCat_vSubCategoria = "";
		$this->SubCat_vDescripcion = "";
		$this->SubCat_Cta_nIdCuenta = "";
		$this->SubCat_cEstado = "";
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (Anual, Mes,Estado) ";
		$sql .= "VALUE (\"$this->Anual\",\"$this->Mes\",\"$this->Estado\")";
		return Executor::doit($sql);
	}

	public static function getSubCategoriaAll(){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Estado=1 ORDER BY SubCategoria, CtaGlobal";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SubCategoriaData());
	}

	public static function getSubCategoriaByLikeSubCat($subcategoria){
		$sql = "SELECT subcat.*, cuen.Cta_cGlobal, cuen.Cta_vDescripcion 
					FROM subcategoria subcat 
					INNER JOIN cuenta cuen ON cuen.Cta_nIdCuenta = subcat.SubCat_Cta_nIdCuenta
					WHERE (subcat.SubCat_vSubCategoria LIKE '%$subcategoria%' OR subcat.SubCat_vDescripcion LIKE '%$subcategoria%') AND subcat.SubCat_cEstado = 1 LIMIT 0,7";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SubCategoriaData());
	}

	public static function getSubCategoriaByIdSubCat($idsubcategoria){
		$sql = "SELECT subcat.*, cuen.Cta_cGlobal, cuen.Cta_vDescripcion 
					FROM subcategoria subcat 
					INNER JOIN cuenta cuen ON cuen.Cta_nIdCuenta = subcat.SubCat_Cta_nIdCuenta
					WHERE subcat.SubCat_nIdSubCategoria = $idsubcategoria";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SubCategoriaData());
	}

}

?>