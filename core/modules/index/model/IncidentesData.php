<?php
class IncidentesData {
	public static $tablename = "incidentes";
	function __construct(){
		$this->Inc_nIdIncidente = "";
		$this->Inc_vNroTicket  = "";
		$this->Inc_UExp_nIdUnExp = "";
		$this->Inc_User_id = "";
		$this->Inc_vDescripcion = "";
		$this->Inc_vComentario = "";
		$this->Inc_vMaterial = "";
		$this->Inc_vFechaReporte = "";
		$this->Inc_vFechaSolucion = "";
		$this->Inc_cPrioridad = ""; /* 0:Bajo, 1:Medio, 2:Alto, 3:Urgente */
		$this->Inc_cEstadoAtencion= ""; /* 1:Pendiente, 2:En Curso, 3:Resuelto */
		$this->Inc_created_at= "";
		$this->Inc_cEstado= ""; /* 0:Eliminado, 1:Activo */
		
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

	public static function getIncidentesAllActive_params($params){
		$sqlRec = "";
		$where = " WHERE inc.Inc_cEstado = 1 ";

		$columns = array( 
          0 =>'inc.Inc_vNroTicket',  
          1 =>'uexp.UExp_cSigla',  
          2 =>'inc.Inc_vDescripcion',  
          3 =>'user.name',  
          4 =>'user.lastname',  
          5 =>'inc.Inc_cPrioridad',  
          6 =>'inc.Inc_vFechaReporte',  
          7 =>'inc.Inc_vFechaSolucion',  
          8 =>'inc.Inc_vComentario',  
          9 =>'inc.Inc_cEstadoAtencion',  
        );

		if( !empty($params['search']['value']) ) {   
          $where .=" AND ( inc.Inc_vDescripcion LIKE '%".$params['search']['value']."%' ";    
          $where .=" OR inc.Inc_vComentario LIKE '%".$params['search']['value']."%' ";
          $where .=" OR inc.Inc_vNroTicket LIKE '%".$params['search']['value']."%' ) ";
        }

        if($params['uexpl'] != ""){
        	$where .= " AND uexp.UExp_nIdUnExp = " . $params['uexpl'] . " ";
        }
        if($params['uasig'] != ""){
        	$where .= " AND user.id  = " . $params['uasig'] . " ";
        }
        if($params['prio'] != ""){
        	$where .= " AND inc.Inc_cPrioridad = " . $params['prio'] . " ";
        }
        if($params['estado'] != ""){
        	$where .= " AND inc.Inc_cEstadoAtencion = " . $params['estado'] . " ";
        }
        if($params['material'] != ""){
        	switch ($params['material']) {
        		case 0: /* NO */
        			$where .= " AND inc.Inc_vMaterial IS NULL ";
        			break;

        		case 1: /* SI */
        			$where .= " AND inc.Inc_vMaterial IS NOT NULL ";
        			break;
        		
        		default: 
        			$where .= "  ";
        			break;
        	}

        }

		$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]." ".$params['order'][0]['dir'].", inc.Inc_cPrioridad DESC, inc.Inc_vFechaReporte DESC  LIMIT ".$params['start']." ,".$params['length']." ";

		$sql = "SELECT 
					inc.Inc_nIdIncidente,
					inc.Inc_vNroTicket,
					uexp.UExp_cSigla,
					inc.Inc_vDescripcion,
					user.name,
					user.lastname,
					inc.Inc_cPrioridad,
					inc.Inc_vFechaReporte,
					inc.Inc_vFechaSolucion,
					inc.Inc_vComentario,
					inc.Inc_cEstadoAtencion
				FROM incidentes inc 
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = inc.Inc_UExp_nIdUnExp
				INNER JOIN user ON user.id = inc.Inc_User_id
				";
		
		$sql .= $where;
		$sql .= $sqlRec;


		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	public static function getIncidentesAllActiveByIdGerente_params($params, $id_gerente){
		$sqlRec = "";
		$where = " WHERE inc.Inc_cEstado = 1 AND uexp.UExp_nIdGerente = {$id_gerente} ";

		$columns = array( 
          0 =>'inc.Inc_vNroTicket',  
          1 =>'uexp.UExp_cSigla',  
          2 =>'inc.Inc_vDescripcion',  
          3 =>'user.name',  
          4 =>'user.lastname',  
          5 =>'inc.Inc_cPrioridad',  
          6 =>'inc.Inc_vFechaReporte',  
          7 =>'inc.Inc_vFechaSolucion',  
          8 =>'inc.Inc_vComentario',  
          9 =>'inc.Inc_cEstadoAtencion',  
        );

		if( !empty($params['search']['value']) ) {   
          $where .=" AND ( inc.Inc_vDescripcion LIKE '%".$params['search']['value']."%' ";    
          $where .=" OR inc.Inc_vComentario LIKE '%".$params['search']['value']."%' ";
          $where .=" OR inc.Inc_vNroTicket LIKE '%".$params['search']['value']."%' ) ";
        }

        if($params['uexpl'] != ""){
        	$where .= " AND uexp.UExp_nIdUnExp = " . $params['uexpl'] . " ";
        }
        if($params['uasig'] != ""){
        	$where .= " AND user.id  = " . $params['uasig'] . " ";
        }
        if($params['prio'] != ""){
        	$where .= " AND inc.Inc_cPrioridad = " . $params['prio'] . " ";
        }
        if($params['estado'] != ""){
        	$where .= " AND inc.Inc_cEstadoAtencion = " . $params['estado'] . " ";
        }

		$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]." ".$params['order'][0]['dir'].", inc.Inc_cPrioridad DESC, inc.Inc_vFechaReporte DESC  LIMIT ".$params['start']." ,".$params['length']." ";

		$sql = "SELECT 
					inc.Inc_nIdIncidente,
					inc.Inc_vNroTicket,
					uexp.UExp_cSigla,
					inc.Inc_vDescripcion,
					user.name,
					user.lastname,
					inc.Inc_cPrioridad,
					inc.Inc_vFechaReporte,
					inc.Inc_vFechaSolucion,
					inc.Inc_vComentario,
					inc.Inc_cEstadoAtencion
				FROM incidentes inc 
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = inc.Inc_UExp_nIdUnExp
				INNER JOIN user ON user.id = inc.Inc_User_id
				";
		
		$sql .= $where;
		$sql .= $sqlRec;


		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	/* Obtener total de filas para Datatable */
	public static function getTotalIncidentes($params){
		$where =" WHERE inc.Inc_cEstado = 1 ";
		if( !empty($params['search']['value']) ) {   
          $where .=" AND ( inc.Inc_vDescripcion LIKE '%".$params['search']['value']."%' ";    
          $where .=" OR inc.Inc_vComentario LIKE '%".$params['search']['value']."%' ";
          $where .=" OR inc.Inc_vNroTicket LIKE '%".$params['search']['value']."%' ) ";
        }

        if($params['uexpl'] != ""){
        	$where .= " AND uexp.UExp_nIdUnExp = " . $params['uexpl'] . " ";
        }
        if($params['uasig'] != ""){
        	$where .= " AND user.id  = " . $params['uasig'] . " ";
        }
        if($params['prio'] != ""){
        	$where .= " AND inc.Inc_cPrioridad = " . $params['prio'] . " ";
        }
        if($params['estado'] != ""){
        	$where .= " AND inc.Inc_cEstadoAtencion = " . $params['estado'] . " ";
        }
        if($params['material'] != ""){
        	switch ($params['material']) {
        		case 0: /* NO */
        			$where .= " AND inc.Inc_vMaterial IS NULL ";
        			break;

        		case 1: /* SI */
        			$where .= " AND inc.Inc_vMaterial IS NOT NULL ";
        			break;
        		
        		default: 
        			$where .= "  ";
        			break;
        	}

        }

		$sql = "SELECT 
					count(inc.Inc_vDescripcion) as total
				FROM incidentes inc 
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = inc.Inc_UExp_nIdUnExp
				INNER JOIN user ON user.id = inc.Inc_User_id ";
		$sql .= $where;

		$query = Executor::doit($sql);
		return Model::one($query[0], new SolicitudData());
	}

	/* Obtener total de filas para Datatable LISTA GERENTE */
	public static function getTotalIncidentesByIdGerente($params, $id_gerente){
		$where =" WHERE inc.Inc_cEstado = 1 AND uexp.UExp_nIdGerente = {$id_gerente} ";
		if( !empty($params['search']['value']) ) {   
          $where .=" AND ( inc.Inc_vDescripcion LIKE '%".$params['search']['value']."%' ";    
          $where .=" OR inc.Inc_vComentario LIKE '%".$params['search']['value']."%' ";
          $where .=" OR inc.Inc_vNroTicket LIKE '%".$params['search']['value']."%' ) ";
        }

        if($params['uexpl'] != ""){
        	$where .= " AND uexp.UExp_nIdUnExp = " . $params['uexpl'] . " ";
        }
        if($params['uasig'] != ""){
        	$where .= " AND user.id  = " . $params['uasig'] . " ";
        }
        if($params['prio'] != ""){
        	$where .= " AND inc.Inc_cPrioridad = " . $params['prio'] . " ";
        }
        if($params['estado'] != ""){
        	$where .= " AND inc.Inc_cEstadoAtencion = " . $params['estado'] . " ";
        }

		$sql = "SELECT 
					count(inc.Inc_vDescripcion) as total
				FROM incidentes inc 
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = inc.Inc_UExp_nIdUnExp
				INNER JOIN user ON user.id = inc.Inc_User_id ";
		$sql .= $where;

		$query = Executor::doit($sql);
		return Model::one($query[0], new SolicitudData());
	}

	public static function getIncidenteByIdIncidente($id_incidente){
		$sql = "SELECT * FROM incidentes where Inc_nIdIncidente=$id_incidente";
		$query = Executor::doit($sql);
		return Model::one($query[0], new IncidentesData());
	}

	public function updatePrioridad(){
		$sql = "UPDATE ".self::$tablename." SET Inc_cPrioridad = \"$this->Inc_cPrioridad\" WHERE Inc_nIdIncidente = $this->Inc_nIdIncidente";
		return Executor::doit($sql);
	}

	public function updateEstadoAtencion(){
		$sql = "UPDATE ".self::$tablename." 
					SET 
						Inc_cEstadoAtencion = \"$this->Inc_cEstadoAtencion\",
						Inc_vFechaSolucion = {$this->Inc_vFechaSolucion} 
					WHERE Inc_nIdIncidente = $this->Inc_nIdIncidente";
		return Executor::doit($sql);
	}

	public function updateEstadoAtencionAndComentario(){
		$sql = "UPDATE ".self::$tablename." 
					SET 
						Inc_cEstadoAtencion = \"$this->Inc_cEstadoAtencion\",
						Inc_vComentario = \"$this->Inc_vComentario\",
						Inc_vFechaSolucion = {$this->Inc_vFechaSolucion} 
					WHERE Inc_nIdIncidente = $this->Inc_nIdIncidente";
		return Executor::doit($sql);
	}

	public function updateEstadoAtencionAndComentarioAndMaterial(){
		$sql = "UPDATE ".self::$tablename." 
					SET 
						Inc_cEstadoAtencion = \"$this->Inc_cEstadoAtencion\",
						Inc_vComentario = \"$this->Inc_vComentario\",
						Inc_vMaterial = {$this->Inc_vMaterial}
					WHERE Inc_nIdIncidente = $this->Inc_nIdIncidente";
		return Executor::doit($sql);
	}

	public function updateDescripcion(){
		$sql = "UPDATE ".self::$tablename." SET Inc_vDescripcion = \"$this->Inc_vDescripcion\" WHERE Inc_nIdIncidente = $this->Inc_nIdIncidente";
		return Executor::doit($sql);
	}

	public function updateComentario(){
		$sql = "UPDATE ".self::$tablename." SET Inc_vComentario = \"$this->Inc_vComentario\" WHERE Inc_nIdIncidente = $this->Inc_nIdIncidente";
		return Executor::doit($sql);
	}

	public function updateMaterial(){
		$sql = "UPDATE ".self::$tablename." SET Inc_vMaterial = \"$this->Inc_vMaterial\" WHERE Inc_nIdIncidente = $this->Inc_nIdIncidente";
		return Executor::doit($sql);
	}

	public function updateAsignadoA(){
		$sql = "UPDATE ".self::$tablename." SET Inc_User_id = \"$this->Inc_User_id\" WHERE Inc_nIdIncidente = $this->Inc_nIdIncidente";
		return Executor::doit($sql);
	}


	public function updateAsignarProveedor(){
		$sql = "UPDATE ".self::$tablename." 
					SET 
						Inc_User_id = {$this->Inc_User_id} 
					WHERE Inc_nIdIncidente = $this->Inc_nIdIncidente";
		return Executor::doit($sql);
	}

	public function updateCampus(){
		$sql = "UPDATE ".self::$tablename." SET Inc_UExp_nIdUnExp = \"$this->Inc_UExp_nIdUnExp\", Inc_User_id = 1 WHERE Inc_nIdIncidente = $this->Inc_nIdIncidente";
		return Executor::doit($sql);
	}

	public function updateFSolucion(){
		$sql = "UPDATE ".self::$tablename." SET Inc_vFechaSolucion = \"$this->Inc_vFechaSolucion\" WHERE Inc_nIdIncidente = $this->Inc_nIdIncidente";
		return Executor::doit($sql);
	}	

	public function updateFReporte(){
		$sql = "UPDATE ".self::$tablename." SET Inc_vFechaReporte = \"$this->Inc_vFechaReporte\" WHERE Inc_nIdIncidente = $this->Inc_nIdIncidente";
		return Executor::doit($sql);
	}

	public static function getTotalIncPrio_ByIdUsuAndIdCampus($id_usuario, $id_campus){
		if($id_campus == ""){
			$where = "";
		}
		else{
			$where = "AND incidentes.Inc_UExp_nIdUnExp = {$id_campus} ";
		}
		$sql = "SELECT 
					COUNT(*) as cont,
					incidentes.Inc_cEstadoAtencion,
					SUM(CASE 
				     	WHEN incidentes.Inc_vFechaReporte = CURDATE() AND incidentes.Inc_cPrioridad = 0 THEN 1
				        ELSE 0
				    END) as tot_baja_hoy,
				    SUM(CASE 
				     	WHEN incidentes.Inc_vFechaReporte = CURDATE() AND incidentes.Inc_cPrioridad = 1 THEN 1
				        ELSE 0
				    END) as tot_media_hoy,
				    SUM(CASE 
				     	WHEN incidentes.Inc_vFechaReporte = CURDATE() AND incidentes.Inc_cPrioridad = 2 THEN 1
				        ELSE 0
				    END) as tot_alta_hoy,
				    SUM(CASE 
				     	WHEN incidentes.Inc_vFechaReporte = CURDATE() AND incidentes.Inc_cPrioridad = 3 THEN 1
				        ELSE 0
				    END) as tot_urgente_hoy,

				    SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 0 THEN 1
				        ELSE 0
				     END) as tot_baja,
				     SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 1 THEN 1
				        ELSE 0
				     END) as tot_media,
				     SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 2 THEN 1
				        ELSE 0
				     END) as tot_alta,
				     SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 3 THEN 1
				        ELSE 0
				     END) as tot_urgente
				FROM incidentes 
				WHERE incidentes.Inc_User_id = {$id_usuario}
					AND incidentes.Inc_cEstado = 1 
					AND incidentes.Inc_cEstadoAtencion IN (1, 2) " . $where; 

		$query = Executor::doit($sql);
		return Model::one($query[0], new IncidentesData());
	}

	public static function getListaIncPrio_ByIdUsuAndIdCampusAndPrio($id_usuario, $id_campus, $prioridad){
		$where = "";
		if($id_campus != ""){
			$where .= "AND incidentes.Inc_UExp_nIdUnExp = {$id_campus} ";
		}
		$sql = "SELECT 
					*
				FROM incidentes 
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp
				WHERE incidentes.Inc_User_id = {$id_usuario}
					AND incidentes.Inc_cEstado = 1 
					AND incidentes.Inc_cEstadoAtencion IN (1, 2)
					AND incidentes.Inc_cPrioridad = $prioridad " . $where ." ORDER BY incidentes.Inc_vFechaReporte ASC "; 

		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}


	public static function getListaIncPrio_ByIdCampusAndPrioAndRango($id_campus, $prioridad, $rango){
		$sql = "SELECT 
					*
				FROM incidentes 
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp
				WHERE incidentes.Inc_UExp_nIdUnExp = {$id_campus}
					AND incidentes.Inc_cEstado = 1 
					AND incidentes.Inc_cPrioridad = $prioridad
					AND incidentes.Inc_cEstadoAtencion IN (1, 2)
					AND incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY  
					ORDER BY incidentes.Inc_vFechaReporte ASC "; 
					// var_dump($sql);
		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	public static function getListaIncEstado_ByEstadoRango($estado, $rango){
		$sql = "SELECT 
					*
				FROM incidentes 
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp
				WHERE incidentes.Inc_cEstado = 1 
					AND incidentes.Inc_cEstadoAtencion = $estado
					AND incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY  
					ORDER BY incidentes.Inc_vFechaReporte DESC "; 
					// var_dump($sql);
		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	public static function getListaInc_ByIdCampusAndRango($id_campus, $rango){
		$sql = "SELECT 
					incidentes.Inc_nIdIncidente,
				    incidentes.Inc_UExp_nIdUnExp,
				    incidentes.Inc_cPrioridad,
				    incidentes.Inc_cEstadoAtencion,
				    incidentes.Inc_vFechaReporte,  
				   	uexp.UExp_nIdUnExp,
				    CURDATE() - INTERVAL 7 DAY
				FROM 
					incidentes 
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp

				WHERE 
					uexp.UExp_nIdUnExp = {$id_campus}
				    AND incidentes.Inc_cEstado = 1
				    AND incidentes.Inc_cEstadoAtencion NOT IN (3)
				    AND incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY"; 

		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	public static function getTotalIncCampusPrioridad_ByRango($rango){
		$sql = "SELECT 
					uexp.UExp_nIdUnExp,
                    uexp.UExp_vNombre,
					SUM(1) as total,
	                SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 0 THEN 1
				        ELSE 0
				    END) as tot_baja,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 1 THEN 1
				        ELSE 0
				    END) as tot_media,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 2 THEN 1
				        ELSE 0
				    END) as tot_alta,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 3 THEN 1
				        ELSE 0
				    END) as tot_urgente
				FROM 
					incidentes 
				RIGHT JOIN uexp ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp 
                					AND incidentes.Inc_cEstado = 1 
                					AND incidentes.Inc_cEstadoAtencion NOT IN (3)
                                    AND incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY
				GROUP BY 
                	uexp.UExp_nIdUnExp"; 

		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	public static function getTotalIncCampusPrioridad_ByRangoIdGerente($rango, $id_gerente){
		$sql = "SELECT 
					uexp.UExp_nIdUnExp,
                    uexp.UExp_vNombre,
					SUM(1) as total,
	                SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 0 THEN 1
				        ELSE 0
				    END) as tot_baja,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 1 THEN 1
				        ELSE 0
				    END) as tot_media,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 2 THEN 1
				        ELSE 0
				    END) as tot_alta,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 3 THEN 1
				        ELSE 0
				    END) as tot_urgente
				FROM 
					incidentes 
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp 
									AND uexp.UExp_nIdGerente = $id_gerente
                					AND incidentes.Inc_cEstado = 1 
                					AND incidentes.Inc_cEstadoAtencion NOT IN (3)
                                    AND incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY
				GROUP BY 
                	uexp.UExp_nIdUnExp"; 

		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	public static function getTotalIncCampusPrioridad_ByRangoAndIgGerente($rango, $id_gerente){
		$sql = "SELECT 
					uexp.UExp_nIdUnExp,
                    uexp.UExp_vNombre,
					SUM(1) as total,
	                SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 0 THEN 1
				        ELSE 0
				    END) as tot_baja,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 1 THEN 1
				        ELSE 0
				    END) as tot_media,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 2 THEN 1
				        ELSE 0
				    END) as tot_alta,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cPrioridad = 3 THEN 1
				        ELSE 0
				    END) as tot_urgente
				FROM 
					incidentes 
				RIGHT JOIN uexp ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp 
									AND uexp.UExp_nIdGerente = $id_gerente
                					AND incidentes.Inc_cEstado = 1 
                					AND incidentes.Inc_cEstadoAtencion NOT IN (3)
                                    AND incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY
				GROUP BY 
                	uexp.UExp_nIdUnExp"; 

		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	public static function getTotalIncCampusEstado_ByRango($rango){
		$sql = "SELECT 
					uexp.UExp_nIdUnExp,
                    uexp.UExp_vNombre,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cEstadoAtencion = 1 THEN 1
				        ELSE 0
				    END) as tot_pendiente,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cEstadoAtencion = 2 THEN 1
				        ELSE 0
				    END) as tot_encurso,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cEstadoAtencion = 3 THEN 1
				        ELSE 0
				    END) as tot_solucionado
				FROM 
					incidentes 
				RIGHT JOIN uexp ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp 
                					AND incidentes.Inc_cEstado = 1 
                                    AND  incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY
				GROUP BY 
                	uexp.UExp_nIdUnExp"; 

		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	public static function getTotalIncCampusEstado_ByRangoAndIdGerente($rango, $id_gerente){
		$sql = "SELECT 
					uexp.UExp_nIdUnExp,
                    uexp.UExp_vNombre,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cEstadoAtencion = 1 THEN 1
				        ELSE 0
				    END) as tot_pendiente,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cEstadoAtencion = 2 THEN 1
				        ELSE 0
				    END) as tot_encurso,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cEstadoAtencion = 3 THEN 1
				        ELSE 0
				    END) as tot_solucionado
				FROM 
					incidentes 
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp 
									AND uexp.UExp_nIdGerente = $id_gerente
                					AND incidentes.Inc_cEstado = 1 
                                    AND  incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY
				GROUP BY 
                	uexp.UExp_nIdUnExp"; 

		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	public static function getTotalIncCampusEstado_ByRangoAndGerente($rango, $id_gerente){
		$sql = "SELECT 
					uexp.UExp_nIdUnExp,
                    uexp.UExp_vNombre,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cEstadoAtencion = 1 THEN 1
				        ELSE 0
				    END) as tot_pendiente,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cEstadoAtencion = 2 THEN 1
				        ELSE 0
				    END) as tot_encurso,
				    SUM(CASE 
				     	WHEN incidentes.Inc_cEstadoAtencion = 3 THEN 1
				        ELSE 0
				    END) as tot_solucionado
				FROM 
					incidentes 
				RIGHT JOIN uexp ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp 
                					AND incidentes.Inc_cEstado = 1 
                					AND uexp.UExp_nIdGerente = $id_gerente
                                    AND  incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY
				GROUP BY 
                	uexp.UExp_nIdUnExp"; 

		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	public static function getUsuariosAllActive_ByRango_OrderByTotalInc($rango){
		$sql = "SELECT DISTINCT
					uexp_tecnicos.UExpTec_User_id,
				    COUNT(incidentes.Inc_nIdIncidente) as total,
				    COUNT(IF(incidentes.Inc_cEstadoAtencion = 3, 1, NULL)) as total_solucion,
				    COUNT(IF(incidentes.Inc_cEstadoAtencion = 2, 1, NULL)) as total_encurso,
				    COUNT(IF(incidentes.Inc_cEstadoAtencion = 1, 1, NULL)) as total_pendiente
				FROM 
					uexp_tecnicos
				LEFT JOIN incidentes ON uexp_tecnicos.UExpTec_User_id = incidentes.Inc_User_id AND incidentes.Inc_cEstado = 1
				    AND incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY
				GROUP BY incidentes.Inc_User_id, uexp_tecnicos.UExpTec_nId
				ORDER BY total_pendiente DESC, total_solucion DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0], new UExplData());
	}

	public static function getListaIncPend_ByIdUsuarioAsignadoAndRango($id_usuario_asig, $rango){
		$sql = "SELECT 
					incidentes.Inc_nIdIncidente,
				    incidentes.Inc_UExp_nIdUnExp,
				    incidentes.Inc_cPrioridad,
				    incidentes.Inc_cEstadoAtencion,
				    incidentes.Inc_vFechaReporte,  
				   	uexp.UExp_nIdUnExp,
				    CURDATE() - INTERVAL 7 DAY
				FROM 
					incidentes 
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp

				WHERE 
					incidentes.Inc_User_id = {$id_usuario_asig}
				    AND incidentes.Inc_cEstado = 1
				    AND incidentes.Inc_cEstadoAtencion NOT IN (3)
				    AND incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY"; 

		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	public static function getListaIncPrio_ByIdUsuarioAndPrioAndRango($id_usuario, $prioridad, $rango){
		$sql = "SELECT 
					*
				FROM incidentes 
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = incidentes.Inc_UExp_nIdUnExp
				WHERE incidentes.Inc_User_id = {$id_usuario}
					AND incidentes.Inc_cEstado = 1 
					AND incidentes.Inc_cPrioridad = $prioridad
					AND incidentes.Inc_cEstadoAtencion IN (1, 2)
					AND incidentes.Inc_vFechaReporte >= CURDATE() - INTERVAL {$rango} DAY  
					ORDER BY incidentes.Inc_vFechaReporte ASC "; 
					// var_dump($sql);
		$query = Executor::doit($sql);
		return Model::many($query[0], new IncidentesData());
	}

	public static function getTotalIncPendAndResu_ByInterval($rango){
		$sql = "SELECT 
				     SUM(CASE 
				     	WHEN incidentes.Inc_vFechaSolucion IS NULL OR incidentes.Inc_vFechaSolucion >= CURDATE() - INTERVAL {$rango} DAY  THEN 1
				        ELSE 0
				    END) as tot_pendientes,
                    
                    SUM(CASE 
				     	WHEN incidentes.Inc_vFechaSolucion = CURDATE() - INTERVAL {$rango} DAY  THEN 1
				        ELSE 0
				    END) as tot_resueltos
				FROM 
					incidentes 
				WHERE incidentes.Inc_cEstado = 1 
                	AND incidentes.Inc_vFechaReporte <= CURDATE() - INTERVAL {$rango} DAY"; 

		$query = Executor::doit($sql);
		return Model::one($query[0], new IncidentesData());
	}

}

?>