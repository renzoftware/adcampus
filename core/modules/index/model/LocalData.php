<?php
class LocalData {
	public static $tablename = "local";
	function __construct(){
		$this->Loc_nIdLocal = "";
		$this->Loc_vNombreLocal = "";
		$this->Loc_UExp_nIdUnExp = "";
		$this->Loc_cEstado = "";
	}

	public static function getLocalAllActive_ByCampus($u_exp){
		$sql = "SELECT
					* 
					FROM 
						local
					WHERE 
						Loc_UExp_nIdUnExp = $u_exp ";
		$query = Executor::doit($sql);

		return Model::many($query[0], new LocalData());
	}

	public static function getLocalAllActive(){
		$sql = "SELECT
					* 
					FROM 
						local
					INNER JOIN uexp ON uexp.UExp_nIdUnExp = local.Loc_UExp_nIdUnExp
					WHERE 
						local.Loc_cEstado = 1 ";
		$query = Executor::doit($sql);

		return Model::many($query[0], new LocalData());
	}
	

}

?>