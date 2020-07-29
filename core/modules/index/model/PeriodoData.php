<?php
class PeriodoData {
	public static $tablename = "periodo";
	function __construct(){
		$this->Per_nIdPeriodo = "";
		$this->Per_vAnual = "";
		$this->Per_cEstado = "";
	}

	public static function getPeriodoAll(){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Per_cEstado = 1 ORDER BY Per_vAnual DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0], new PeriodoData());
	}

	public static function getPeriodoActAnt(){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Date_format(STR_TO_DATE(CONCAT(Anual,'-',Mes),'%Y-%m'),'%Y-%m') <= Date_format(now(),'%Y-%m') ORDER BY IdPeriodo DESC LIMIT 2";
		$query = Executor::doit($sql);
		return Model::many($query[0], new PeriodoData());
	}

	public static function getPeriodoByIdPeriodo($idperiodo){
		$sql = "SELECT * FROM ".self::$tablename." WHERE IdPeriodo = $idperiodo";
		$query = Executor::doit($sql);
		return Model::one($query[0], new PeriodoData());
	}

	public static function getPeriodoActual(){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Anual = YEAR(NOW()) AND Mes = MONTH(NOW())";
		$query = Executor::doit($sql);
		return Model::one($query[0], new PeriodoData());
	}
}

?>