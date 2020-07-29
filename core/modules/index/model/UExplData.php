<?php
class UExplData {
	public static $tablename = "uexp";
	function __construct(){
		$this->UExp_nIdUnExp = "";
		$this->UExp_cUnidadExp = "";
		$this->UExp_cSigla = "";
		$this->UExp_vNombre = "";
		$this->UExp_nIdGerente = "";
		$this->UExp_cEstado = "";
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (Anual, Mes,Estado) ";
		$sql .= "VALUE (\"$this->Anual\",\"$this->Mes\",\"$this->Estado\")";
		return Executor::doit($sql);
	}

	public static function getUExplAllActive(){
		$sql = "SELECT * FROM ".self::$tablename." WHERE UExp_cEstado=1 ORDER BY UExp_cUnidadExp ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UExplData());
	}

	public static function getUExplAllActive_ByGerenteCampus($id_usuario){
		$sql = "SELECT * FROM ".self::$tablename." WHERE UExp_cEstado = 1 AND UExp_nIdGerente = $id_usuario ORDER BY UExp_cUnidadExp ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UExplData());
	}

	public static function getUExplAllActive_OrderByNombre(){
		$sql = "SELECT * FROM ".self::$tablename." WHERE UExp_cEstado=1 ORDER BY UExp_vNombre ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UExplData());
	}

	public static function getUExplOtherActive_OrderByNombre($id_campus_act){
		$sql = "SELECT * FROM ".self::$tablename." WHERE UExp_cEstado=1 AND UExp_nIdUnExp NOT IN($id_campus_act) ORDER BY UExp_vNombre ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UExplData());
	}


	public static function getById($id){
		$sql = "SELECT * FROM ".self::$tablename." WHERE UExp_nIdUnExp = $id";
		$query = Executor::doit($sql);
		return Model::one($query[0], new UExplData());
	}

	public static function getUExplAllActive_ByRango_OrderByTotalInc($rango){
		$sql = "SELECT 
					uexp.*,
				    COUNT(incidentes.Inc_nIdIncidente) as total,
				    COUNT(IF(incidentes.Inc_cEstadoAtencion = 3, 1, NULL)) as total_solucion,
				    COUNT(IF(incidentes.Inc_cEstadoAtencion = 2, 1, NULL)) as total_encurso,
				    COUNT(IF(incidentes.Inc_cEstadoAtencion = 1, 1, NULL)) as total_pendiente
				FROM 
					uexp
				LEFT JOIN incidentes ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp AND incidentes.Inc_cEstado = 1
				    AND incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY
				GROUP BY uexp.UExp_nIdUnExp
				ORDER BY total_pendiente DESC, total_solucion DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0], new UExplData());
	}

	public static function getUExplAllActive_ByRangoAndIdGerente_OrderByTotalInc($rango, $id_gerente){
		$sql = "SELECT 
					uexp.*,
				    COUNT(incidentes.Inc_nIdIncidente) as total,
				    COUNT(IF(incidentes.Inc_cEstadoAtencion = 3, 1, NULL)) as total_solucion,
				    COUNT(IF(incidentes.Inc_cEstadoAtencion = 2, 1, NULL)) as total_encurso,
				    COUNT(IF(incidentes.Inc_cEstadoAtencion = 1, 1, NULL)) as total_pendiente
				FROM 
					uexp
				INNER JOIN incidentes ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp AND incidentes.Inc_cEstado = 1 
					AND uexp.UExp_nIdGerente = $id_gerente
				    AND incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY
				GROUP BY uexp.UExp_nIdUnExp
				ORDER BY total_pendiente DESC, total_solucion DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0], new UExplData());
	}

	

}

?>