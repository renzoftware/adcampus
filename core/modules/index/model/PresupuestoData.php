<?php
class PresupuestoData {
	public static $tablename = "presupuesto";
	function __construct(){
		$this->Pres_nIdPresupuesto = "";
		$this->Pres_UExp_nIdUnExp = "";
		$this->Pres_DptoProy_nIdDptoProyecto = "";
		$this->Pres_Cta_nIdCuenta = "";
		$this->Pres_nMes = "";
		$this->Pres_nMonto = "";
		$this->Pres_cEstado = "";
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (Proy_vProyecto, Proy_cEstado) ";
		$sql .= "VALUE (\"$this->Proy_vProyecto\",\"$this->Proy_cEstado\")";
		return Executor::doit($sql);
	}

	public static function getPresupBy_UExp_DptoProy_Cta_Mes($uexp, $dptoproy, $cuenta, $mes){
		$sql = "SELECT Pres_nMonto
				FROM presupuesto
				WHERE 
					Pres_UExp_nIdUnExp = $uexp 
					AND Pres_DptoProy_nIdDptoProyecto = $dptoproy 
					AND Pres_Cta_nIdCuenta = $cuenta 
					AND Pres_nMes = $mes 
					AND Pres_cEstado = 1 ";
		// var_dump($sql);					
		$query = Executor::doit($sql);
		return Model::one($query[0],new PresupuestoData());
	}


}

?>