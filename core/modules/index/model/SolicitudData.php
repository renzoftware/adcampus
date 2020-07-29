<?php
class SolicitudData {
	public static $tablename = "solicitud";
	function __construct(){
		$this->Sol_nIdSolicitud = "";
		$this->Sol_vNroSolicitud = "";
		$this->Sol_vDescripcionSol = "";
		$this->Sol_dFechaCreacion = "";
		$this->Sol_cTipoMoneda = ""; /* 1:PEN  	 2:USD*/
		$this->Sol_nTipoCambio = "";
		$this->Sol_cEstadoSol = "";
		$this->Sol_dFechaAct = "";
		$this->Sol_created_at= "";
		$this->Sol_cEstado= "";
		
	}
	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (Sol_vNroSolicitud, Sol_vDescripcionSol, Sol_dFechaCreacion, Sol_cTipoMoneda, Sol_nTipoCambio, Sol_cEstadoSol, Sol_dFechaAct, Sol_created_at, Sol_cEstado) ";
		$sql .= "value ($this->Sol_vNroSolicitud, \"$this->Sol_vDescripcionSol\", \"$this->Sol_dFechaCreacion\", \"$this->Sol_cTipoMoneda\", $this->Sol_nTipoCambio, 7, NOW(), NOW(), 1)";
		return Executor::doit($sql);
	}

	public static function getSolicitudByNroSolicitudPS($nro_sol_ps){
		$sql = "SELECT * FROM solicitud where Sol_vNroSolicitud=$nro_sol_ps";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SolicitudData());
	}

	public static function getSolicitudByIdSolicitud($id_sol){
		$sql = "SELECT * FROM solicitud where Sol_nIdSolicitud=$id_sol";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SolicitudData());
	}

	public static function getSolicitudAllActive(){
		$sql = "SELECT 
					sol.Sol_nIdSolicitud,
					sol.Sol_vNroSolicitud, 
					sol.Sol_vDescripcionSol, 
					sol.Sol_dFechaCreacion, 
					CASE sol.Sol_cTipoMoneda
						WHEN 1 THEN 'PEN'
						WHEN 2 THEN 'USD'
						ELSE '-'
					END AS moneda,
					sol.Sol_cEstadoSol,
					sol.Sol_dFechaAct,
					sol.Sol_created_at

				FROM solicitud sol 
				WHERE sol.Sol_cEstado = 1
				ORDER BY sol.Sol_vNroSolicitud DESC, sol.Sol_created_at DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0], new SolicitudData());
	}

		/* Obtiene todas las llamadas realizadas por un usuario */
	public static function getSolicitudAllActive_params($params){
		$sqlRec = "";
		$where = " WHERE sol.Sol_cEstado = 1 ";

		$columns = array( 
          0 =>'sol.Sol_vNroSolicitud',  
          1 =>'sol.Sol_vDescripcionSol', 
          2 =>'sol.Sol_dFechaCreacion', 
          3 =>'', 
          4 =>'moneda', 
          5 =>'sol.Sol_cEstadoSol', 
          6 =>'sol.Sol_created_at'
        );

		if( !empty($params['search']['value']) ) {   
          $where .=" AND ( sol.Sol_vDescripcionSol LIKE '%".$params['search']['value']."%' ";    
          $where .=" OR sol.Sol_vNroSolicitud LIKE '%".$params['search']['value']."%' ) ";
        }

        if($params['uexpl'] != ""){
        	$where .= " AND lineas_sol.Lin_UExp_nIdUnExp = " . $params['uexpl'] . " ";
        }
        if($params['proy'] != ""){
        	$where .= " AND lineas_sol.Lin_Proy_nIdProyecto  = " . $params['proy'] . " ";
        }
        if($params['dpto'] != ""){
        	$where .= " AND lineas_sol.Lin_Dpto_nIdDpto = " . $params['dpto'] . " ";
        }

		$sqlRec .=  "GROUP BY sol.Sol_nIdSolicitud  ORDER BY ". $columns[$params['order'][0]['column']]." ".$params['order'][0]['dir'].", sol.Sol_created_at DESC LIMIT ".$params['start']." ,".$params['length']." ";

		$sql = "SELECT 
					sol.Sol_nIdSolicitud,
					sol.Sol_vNroSolicitud, 
					sol.Sol_vDescripcionSol, 
					sol.Sol_dFechaCreacion, 
					CASE sol.Sol_cTipoMoneda
						WHEN 1 THEN 'PEN'
						WHEN 2 THEN 'USD'
						ELSE '-'
					END AS moneda,
					sol.Sol_cEstadoSol,
					sol.Sol_dFechaAct,
					sol.Sol_created_at
				FROM solicitud sol 
				LEFT JOIN lineas_sol ON lineas_sol.Lin_Sol_nIdSolicitud = sol.Sol_nIdSolicitud ";
		
		$sql .= $where;
		$sql .= $sqlRec;

		$query = Executor::doit($sql);
		return Model::many($query[0], new SolicitudData());
	}

	public function updateNroSolicitud(){
		$sql = "UPDATE ".self::$tablename." SET Sol_vNroSolicitud = \"$this->Sol_vNroSolicitud\" where Sol_nIdSolicitud = $this->Sol_nIdSolicitud";
		return Executor::doit($sql);
	}

	public function updateDescrSolicitud(){
		$sql = "UPDATE ".self::$tablename." SET Sol_vDescripcionSol = \"$this->Sol_vDescripcionSol\" where Sol_nIdSolicitud = $this->Sol_nIdSolicitud";
		return Executor::doit($sql);
	}

	public function updateTipoCambio(){
		$sql = "UPDATE ".self::$tablename." SET Sol_nTipoCambio = \"$this->Sol_nTipoCambio\" where Sol_nIdSolicitud = $this->Sol_nIdSolicitud";
		return Executor::doit($sql);
	}

	public function updateTipoMonedaSolicitud(){
		$tipo_cambio = ($this->Sol_cTipoMoneda==1)? "NULL": 3.33;
		$sql = "UPDATE ".self::$tablename." 
			SET Sol_cTipoMoneda = \"$this->Sol_cTipoMoneda\", 
			Sol_nTipoCambio = {$tipo_cambio}
			WHERE Sol_nIdSolicitud = $this->Sol_nIdSolicitud";
			// var_dump($sql);
		return Executor::doit($sql);
	}

	/* Obtener total de filas para Datatable */
	public static function getTotalSolicitudes($params){
		$where =" WHERE sol.Sol_cEstado = 1 ";
		if( !empty($params['search']['value']) ) {   
          $where .=" AND (sol.Sol_vDescripcionSol LIKE '%".$params['search']['value']."%' ";    
          $where .=" OR sol.Sol_vNroSolicitud LIKE '%".$params['search']['value']."%' )";
        }

        if($params['uexpl'] != ""){
        	$where .= " AND lineas_sol.Lin_UExp_nIdUnExp = " . $params['uexpl'] . " ";
        }
        if($params['proy'] != ""){
        	$where .= " AND lineas_sol.Lin_Proy_nIdProyecto  = " . $params['proy'] . " ";
        }
        if($params['dpto'] != ""){
        	$where .= " AND lineas_sol.Lin_Dpto_nIdDpto = " . $params['dpto'] . " ";
        }

		$sql = "SELECT 
					count(DISTINCT sol.Sol_nIdSolicitud) as total
				FROM solicitud sol 
				LEFT JOIN lineas_sol ON lineas_sol.Lin_Sol_nIdSolicitud = sol.Sol_nIdSolicitud ";
		$sql .= $where;

		// $sql .= " GROUP BY sol.Sol_nIdSolicitud";
		// echo " AAA ";
		// echo $sql;
		// echo " XXX ";

		$query = Executor::doit($sql);
		return Model::one($query[0], new SolicitudData());
	}

	/* Obtener el estado de solicitud según el menor valor de las lineas */
	// public function getEstadoSolicitud(){
	// 	$sql = "SELECT MIN(linsol.Lin_cEstado) as estado
	// 			FROM lineas_sol linsol
	// 			WHERE linsol.Lin_Sol_nIdSolicitud = $this->Sol_nIdSolicitud AND linsol.Lin_cEstado NOT IN (0, 6)";
	// 	$query = Executor::doit($sql);
	// 	return Model::one($query[0], new SolicitudData());
	// }

	/* Obtener el resumen de Solicitudes segun estado */
	public static function getCountSolicitudByEstado($estado){
		$sql = "SELECT COUNT(*) as total
				FROM solicitud sol
				WHERE sol.Sol_cEstadoSol = \"$estado\" AND sol.Sol_cEstado NOT IN (0)";
		$query = Executor::doit($sql);
		return Model::one($query[0], new SolicitudData());
	}

}

?>