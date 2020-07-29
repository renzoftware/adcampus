<?php
class UMantData {
	public static $tablename = "pmp_umant";
	function __construct(){
		$this->UMan_nIdUMan = "";
		$this->UMan_Esp_nIdEspecialidad = "";
		$this->UMan_vDescripcion = "";
		$this->UMan_nFrecuencia = "";
		$this->UMan_cEstado = "";
	}

	public static function getUMantPMPAllActive(){
		$sql = "SELECT
					* 
					FROM 
						pmp_umant
					INNER JOIN  pmp_especialidad ON pmp_especialidad.Esp_nIdEspecialidad = pmp_umant.UMan_Esp_nIdEspecialidad
					WHERE 
						UMan_cEstado=1 AND UMan_Esp_nIdEspecialidad <> 7
					ORDER BY 
						UMan_nIdUMan ASC";
		$query = Executor::doit($sql);

		return Model::many($query[0], new UMantData());
	}

	public static function getUMantPMP_ByLocal_UMant_Periodo_Mes($idlocal, $idumant, $idperiodo, $mes){
		$sql = "SELECT
					* 
				FROM 
					pmp_detalle
				INNER JOIN pmp_umant ON pmp_umant.UMan_nIdUMan = pmp_detalle.DetPmp_UMan_nIdUMan 
				WHERE 
					pmp_detalle.DetPmp_Loc_nIdLocal = $idlocal
				    AND pmp_detalle.DetPmp_Per_nIdPeriodo = $idperiodo 
				    AND pmp_detalle.DetPmp_UMan_nIdUMan = $idumant
				    AND pmp_detalle.DetPmp_nMes = $mes ";
		$query = Executor::doit($sql);

		return Model::one($query[0], new UMantData());
	}

	public static function getUMantGENAllActive(){
		$sql = "SELECT
					* 
					FROM 
						pmp_umant
					INNER JOIN  pmp_especialidad ON pmp_especialidad.Esp_nIdEspecialidad = pmp_umant.UMan_Esp_nIdEspecialidad
					WHERE 
						UMan_cEstado=1 AND UMan_Esp_nIdEspecialidad = 7
					ORDER BY 
						UMan_nIdUMan ASC";
		$query = Executor::doit($sql);

		return Model::many($query[0], new UMantData());
	}
	

}

?>