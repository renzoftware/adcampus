<?php
class PmpDetalleData {
	public static $tablename = "pmp_detalle";
	function __construct(){
		$this->DetPmp_IdDetPmp = "";
		$this->DetPmp_Loc_nIdLocal  = "";
		$this->DetPmp_UMan_nIdUMan = "";
		$this->DetPmp_Per_nIdPeriodo = "";
		$this->DetPmp_nMes = "";
		$this->DetPmp_cEstado = "";
	}
	
	public function add(){
		$sql = "INSERT INTO incidentes (Inc_vNroTicket, Inc_UExp_nIdUnExp, Inc_User_id, 
					Inc_vDescripcion, Inc_vComentario, Inc_vMaterial, Inc_vFechaReporte, Inc_vFechaSolucion, Inc_cPrioridad, Inc_cEstadoAtencion, Inc_created_at, Inc_cEstado)
					VALUE (
						(CASE
						    WHEN (SELECT MAX(inc.Inc_nIdIncidente) + 10001 FROM incidentes inc) IS NOT NULL THEN (SELECT MAX(inc.Inc_nIdIncidente) + 10001 FROM incidentes inc)
						    ELSE 10001
						END ),
						$this->Inc_UExp_nIdUnExp, 
						$this->Inc_User_id,
						\"$this->Inc_vDescripcion\",
						\"$this->Inc_vComentario\",
						NULL,
						\"$this->Inc_vFechaReporte\",
						NULL,
						\"$this->Inc_cPrioridad\",
						1,
						NOW(),
						1
					)";
					// var_dump($sql);
		return Executor::doit($sql);
	}


	public static function getTotalPmp_ByIdCampusAndPeriodo($id_campus, $id_periodo){
		$sql = "SELECT 
					COUNT(IF(pmp_detalle.DetPmp_cEstado = 1, 1, NULL)) as total_realizado,
				    COUNT(IF(pmp_detalle.DetPmp_cEstado = 2 AND pmp_detalle.DetPmp_nMes >= MONTH(CURDATE()), 1, NULL)) as total_pendiente,
				    COUNT(IF(pmp_detalle.DetPmp_cEstado = 2 AND pmp_detalle.DetPmp_nMes < MONTH(CURDATE()), 1, NULL)) as total_vencidos
				FROM
					pmp_detalle
				INNER JOIN local ON local.Loc_nIdLocal = pmp_detalle.DetPmp_Loc_nIdLocal
				INNER JOIN uexp ON local.Loc_UExp_nIdUnExp = uexp.UExp_nIdUnExp
				WHERE 
					-- pmp_detalle. = 1
				    uexp.UExp_cEstado = 1
				    AND local.Loc_cEstado = 1
				    AND uexp.UExp_nIdUnExp = $id_campus
				    AND pmp_detalle.DetPmp_Per_nIdPeriodo = $id_periodo "; 

		$query = Executor::doit($sql);
		return Model::one($query[0], new PmpDetalleData());
	}

}

?>