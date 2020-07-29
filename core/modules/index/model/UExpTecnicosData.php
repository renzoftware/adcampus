<?php
class UExpTecnicosData {
	public static $tablename = "uexp_tecnicos";
	function __construct(){
		$this->UExpTec_nId = "";
		$this->UExpTec_UExp_nIdUnExp = "";
		$this->UExpTec_User_id = "";
		$this->UExpTec_cEstado = "";
	}

	public static function getTecnicosByUExpl($u_expl){
		$sql = "SELECT 
					uexp_tecnicos.UExpTec_User_id,
					user.name,
					user.lastname
				FROM uexp_tecnicos
				INNER JOIN user ON user.id = uexp_tecnicos.UExpTec_User_id
				WHERE
					uexp_tecnicos.UExpTec_cEstado = 1
					AND user.is_active = 1
					AND uexp_tecnicos.UExpTec_UExp_nIdUnExp = $u_expl
				ORDER BY user.name ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UExpTecnicosData());
	}

	public static function getUsuariosAsigIncid(){
		$sql = "SELECT 
					*
				FROM 
					 uexp_tecnicos
				INNER JOIN user ON user.id = uexp_tecnicos.UExpTec_User_id
				WHERE 
					uexp_tecnicos.UExpTec_cEstado=1 
				GROUP BY user.id
				ORDER BY 
					user.name ASC, user.lastname ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UExpTecnicosData());
	}

	public static function getOtrosUsuariosAsigIncid_ByCampus($id_usuario_act, $id_campus){
		$sql = "SELECT 
					*
				FROM 
					 uexp_tecnicos
				INNER JOIN user ON user.id = uexp_tecnicos.UExpTec_User_id
				WHERE 
					uexp_tecnicos.UExpTec_cEstado = 1
					AND UExpTec_UExp_nIdUnExp = {$id_campus}
					AND user.id NOT IN($id_usuario_act)
				GROUP BY user.id
				ORDER BY 
					user.name ASC, user.lastname ASC"; 
		$query = Executor::doit($sql);
		return Model::many($query[0],new UExpTecnicosData());
	}

	public static function getCampus_ByUsuAsignado($id_usuario_act){
		$sql = "SELECT 
					*
				FROM 
					 uexp_tecnicos
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = uexp_tecnicos.UExpTec_UExp_nIdUnExp
				WHERE 
					uexp_tecnicos.UExpTec_cEstado = 1
					AND uexp_tecnicos.UExpTec_User_id = $id_usuario_act
				ORDER BY 
					uexp.UExp_vNombre ASC";
					// var_dump($sql);
		$query = Executor::doit($sql);
		return Model::many($query[0],new UExpTecnicosData());
	}

}

?>