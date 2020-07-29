<?php
class LineaSolicitudData {
	public static $tablename = "lineas_sol";
	function __construct(){
		$this->Lin_nIdLineaSol = "";
		$this->Lin_Sol_nIdSolicitud = "";
		$this->Lin_nNroLinea = "";
		$this->Lin_SubCat_nIdSubCategoria = "";
		$this->Lin_UExp_nIdUnExp = "";
		$this->Lin_Dpto_nIdDpto = "";
		$this->Lin_Proy_nIdProyecto = "";
		$this->Lin_vDescripcion = "";
		$this->Lin_nCantidad = "";
		$this->Lin_dSubtotal = "";
		$this->Lin_dIGV = "";
		$this->Lin_dTotal = "";
		$this->Lin_dFechaAprob = "";
		$this->Lin_OC_nIdOrdenCompra = "";
		$this->Lin_cTipoRecepcion = "";
		$this->Lin_cEstado= ""; 
			/* 	1: Ingresado; 		2: Aprobado; 		3: Despachado; 
				4: Rec. Parcial; 	5: Rec. Total; 		6: Cancelado";*/
		
	}
	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (Lin_Sol_nIdSolicitud, Lin_nNroLinea, Lin_SubCat_nIdSubCategoria, Lin_UExp_nIdUnExp, Lin_Dpto_nIdDpto, Lin_Proy_nIdProyecto, Lin_vDescripcion, Lin_nCantidad, Lin_dSubtotal, Lin_dIGV, Lin_dTotal, Lin_dFechaAprob, Lin_OC_nIdOrdenCompra, Lin_cTipoRecepcion, Lin_cEstado ) ";
		$sql .= "value ($this->Lin_Sol_nIdSolicitud, $this->Lin_nNroLinea, \"$this->Lin_SubCat_nIdSubCategoria\", \"$this->Lin_UExp_nIdUnExp\", \"$this->Lin_Dpto_nIdDpto\",  \"$this->Lin_Proy_nIdProyecto\", \"$this->Lin_vDescripcion\", $this->Lin_nCantidad, $this->Lin_dSubtotal, $this->Lin_dIGV, $this->Lin_dTotal, NULL, NULL, 1, 1 )";
		$this->updateSolicitud_FechaActualizacion();
		return Executor::doit($sql);
	}

	public static function getLineasSolicitudByIdSolicitud($idsolicitud){
		$sql = "SELECT lineas_sol.*, dpto.Dpto_cDpto, uexp.UExp_cUnidadExp, subcategoria.SubCat_vSubCategoria, cuenta.Cta_cGlobal 
				FROM lineas_sol 
				INNER JOIN subcategoria ON subcategoria.SubCat_nIdSubCategoria = lineas_sol.Lin_SubCat_nIdSubCategoria
				LEFT JOIN cuenta ON cuenta.Cta_nIdCuenta = subcategoria.SubCat_Cta_nIdCuenta
				INNER JOIN uexp ON uexp.UExp_nIdUnExp = lineas_sol.Lin_UExp_nIdUnExp
				INNER JOIN dpto ON dpto.Dpto_nIdDpto = lineas_sol.Lin_Dpto_nIdDpto
				WHERE lineas_sol.Lin_Sol_nIdSolicitud=$idsolicitud AND lineas_sol.Lin_cEstado <> 0
				ORDER BY lineas_sol.Lin_nNroLinea ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0], new LineaSolicitudData());
	}

	public static function getLineaSolicitudByIdSolNroLinea($idsolicitud, $nrolinea){
		$sql = "SELECT * FROM lineas_sol where Lin_Sol_nIdSolicitud = $idsolicitud AND Lin_nNroLinea = $nrolinea AND Lin_cEstado <> 0";
		$query = Executor::doit($sql);
		return Model::one($query[0], new SolicitudData());
	}

	public static function getSolicitudByIdSolicitud($id_sol){
		$sql = "SELECT * FROM solicitud where Sol_nIdSolicitud=$id_sol";
		$query = Executor::doit($sql);
		return Model::one($query[0],new LineaSolicitudData());
	}

	public static function getLineaSolicitudByIdLineaSolicitud($id_linea_sol){
		$sql = "SELECT * FROM lineas_sol WHERE Lin_nIdLineaSol=$id_linea_sol";
		$query = Executor::doit($sql);
		return Model::one($query[0],new LineaSolicitudData());
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
					sol.Sol_cActa,
					sol.Sol_created_at

				FROM solicitud sol 
				WHERE sol.Sol_cEstado = 1
				ORDER BY sol.Sol_created_at DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0], new LineaSolicitudData());
	}

	public function update_step1(){
		$sql = "UPDATE ".self::$tablename." SET 
			Lin_vDescripcion = \"$this->Lin_vDescripcion\",
			Lin_nNroLinea = \"$this->Lin_nNroLinea\",
			Lin_SubCat_nIdSubCategoria = $this->Lin_SubCat_nIdSubCategoria,
			Lin_UExp_nIdUnExp = $this->Lin_UExp_nIdUnExp,
			Lin_Dpto_nIdDpto = $this->Lin_Dpto_nIdDpto,
			Lin_Proy_nIdProyecto = $this->Lin_Proy_nIdProyecto,
			Lin_nCantidad = $this->Lin_nCantidad,
			Lin_dSubtotal = $this->Lin_dSubtotal,
			Lin_dIGV = $this->Lin_dIGV,
			Lin_dTotal = $this->Lin_dTotal
			WHERE Lin_nIdLineaSol = $this->Lin_nIdLineaSol";
		$this->updateSolicitud_FechaActualizacion();
		return Executor::doit($sql);
	}

	public function update_step2(){
		$sql = "UPDATE ".self::$tablename." SET Lin_dFechaAprob = \"$this->Lin_dFechaAprob\" WHERE Lin_nIdLineaSol = $this->Lin_nIdLineaSol";
		$this->updateSolicitud_FechaActualizacion();
		return Executor::doit($sql);
	}

	public function update_TipoRecepcion(){
		$sql = "UPDATE ".self::$tablename." SET Lin_cTipoRecepcion = \"$this->Lin_cTipoRecepcion\"  WHERE Lin_nIdLineaSol = $this->Lin_nIdLineaSol";
		$this->updateSolicitud_FechaActualizacion();
		return Executor::doit($sql);
	}

	public static function getLinSolByIdSolicitudAndNroLinea($idsolicitud, $nrolinea){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Lin_Sol_nIdSolicitud={$idsolicitud} AND Lin_nNroLinea=$nrolinea AND Lin_cEstado <> 0";
		$query = Executor::doit($sql);
		return Model::one($query[0],new LineaSolicitudData());
	}

	public function updateOrdenCompra(){
		$sql = "UPDATE ".self::$tablename." SET Lin_OC_nIdOrdenCompra = $this->Lin_OC_nIdOrdenCompra WHERE Lin_nIdLineaSol = $this->Lin_nIdLineaSol";
		$this->updateSolicitud_FechaActualizacion();
		return Executor::doit($sql);
	}

	public function updateStatus($estado){
		$sql = "UPDATE ".self::$tablename." SET Lin_cEstado = $estado
			WHERE Lin_nIdLineaSol = $this->Lin_nIdLineaSol";
		$this->updateSolicitud_FechaActualizacion();
		return Executor::doit($sql);
	}

	public function deleteOrdenCompra(){
		$sql = "UPDATE ".self::$tablename." SET Lin_OC_nIdOrdenCompra = NULL WHERE Lin_nIdLineaSol = $this->Lin_nIdLineaSol";
		$this->updateSolicitud_FechaActualizacion();
		return Executor::doit($sql);
	}

	public static function getMontoTotalSolByIdSolicitud($idsolicitud){
		$sql = "SELECT SUM(Lin_dTotal) as monto_total
			FROM ".self::$tablename." 
			WHERE Lin_Sol_nIdSolicitud={$idsolicitud} AND Lin_cEstado NOT IN(0, 6)";
		$query = Executor::doit($sql);
		return Model::one($query[0],new LineaSolicitudData());
	}

	public function deleteFechaAprob(){
		$sql = "UPDATE ".self::$tablename." SET Lin_dFechaAprob = NULL WHERE Lin_nIdLineaSol = $this->Lin_nIdLineaSol";
		$this->updateSolicitud_FechaActualizacion();
		return Executor::doit($sql);
	}

	public function updateSolicitud_FechaActualizacion(){
		// $hoy = date("Y-m-d"); 
		$sql = "UPDATE solicitud SET Sol_dFechaAct = DATE(NOW()) where Sol_nIdSolicitud = $this->Lin_Sol_nIdSolicitud";
		return Executor::doit($sql);
	}
	public function updateSolicitud_Estado(){ 
		$sql = "UPDATE solicitud 
			SET Sol_cEstadoSol = (
				SELECT IFNULL(MIN(linsol.Lin_cEstado), 7) as Sol_cEstadoSol
				FROM lineas_sol linsol
				WHERE linsol.Lin_Sol_nIdSolicitud = $this->Lin_Sol_nIdSolicitud AND linsol.Lin_cEstado NOT IN (0)
			)
			WHERE Sol_nIdSolicitud = $this->Lin_Sol_nIdSolicitud ";
		return Executor::doit($sql);
	}

	public static function getLinSolGroupCuentaByProyectoAndUexpAndDpto($id_proyecto, $unid_exp, $dpto){
		$sql = "SELECT 
					cuenta.Cta_nIdCuenta,
					cuenta.Cta_cGlobal,
					cuenta.Cta_vDescripcion,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 1 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 1 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 1 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 1 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as ene,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 2 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 2 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 2 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 2 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as feb,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 3 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 3 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 3 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 3 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as mar,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 4 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 4 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 4 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 4 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as abr,
				   	SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 5 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 5 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 5 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 5 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as may,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 6 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 6 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 6 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 6 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as jun,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 7 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 7 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 7 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 7 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as jul,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 8 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 8 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 8 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 8 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as ago,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 9 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 9 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 9 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 9 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as sept,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 10 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 10 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 10 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 10 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as oct,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 11 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 11 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 11 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 11 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as nov,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 12 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 12 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 12 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 12 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as dic
				FROM lineas_sol
				INNER JOIN solicitud ON solicitud.Sol_nIdSolicitud = lineas_sol.Lin_Sol_nIdSolicitud
				INNER JOIN recepciones ON recepciones.Rec_Lin_nIdLineaSol = lineas_sol.Lin_nIdLineaSol
				INNER JOIN subcategoria ON subcategoria.SubCat_nIdSubCategoria = lineas_sol.Lin_SubCat_nIdSubCategoria
				INNER JOIN cuenta ON cuenta.Cta_nIdCuenta = subcategoria.SubCat_Cta_nIdCuenta
				WHERE 
					lineas_sol.Lin_Proy_nIdProyecto = $id_proyecto
					AND lineas_sol.Lin_UExp_nIdUnExp = $unid_exp
					AND lineas_sol.Lin_Dpto_nIdDpto = $dpto
				    -- AND cuenta.Cta_nIdCuenta = 93
				    -- AND MONTH(recepciones.Rec_dFechaContable) = 2
				    AND recepciones.Rec_cEstado = 1
				    AND lineas_sol.Lin_cEstado IN (4, 5)
				GROUP BY 
					cuenta.Cta_cGlobal,
				    lineas_sol.Lin_UExp_nIdUnExp
				ORDER BY 
					cuenta.Cta_cGlobal ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0], new LineaSolicitudData());
	}

	public static function getSumLinSolGroupSubCatByProyectoAndUexpAndDptoAndCta($id_proyecto, $unid_exp, $dpto, $id_cuenta){
		$sql = "SELECT 
					subcategoria.SubCat_nIdSubCategoria,
					subcategoria.SubCat_vSubCategoria,
					subcategoria.SubCat_vDescripcion,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 1 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 1 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 1 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 1 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as ene,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 2 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 2 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 2 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 2 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as feb,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 3 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 3 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 3 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 3 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as mar,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 4 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 4 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 4 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 4 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as abr,
				   	SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 5 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 5 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 5 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 5 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as may,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 6 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 6 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 6 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 6 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as jun,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 7 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 7 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 7 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 7 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as jul,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 8 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 8 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 8 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 8 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as ago,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 9 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 9 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 9 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 9 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as sept,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 10 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 10 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 10 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 10 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as oct,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 11 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 11 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 11 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 11 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as nov,
				    SUM(CASE
				        WHEN MONTH(recepciones.Rec_dFechaContable) = 12 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 12 AND solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 12 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN MONTH(recepciones.Rec_dFechaContable) = 12 AND solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as dic,
				    SUM(CASE
				    	WHEN solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as sum2
				FROM lineas_sol
				INNER JOIN solicitud ON solicitud.Sol_nIdSolicitud = lineas_sol.Lin_Sol_nIdSolicitud
				INNER JOIN recepciones ON recepciones.Rec_Lin_nIdLineaSol = lineas_sol.Lin_nIdLineaSol
				INNER JOIN subcategoria ON subcategoria.SubCat_nIdSubCategoria = lineas_sol.Lin_SubCat_nIdSubCategoria
				INNER JOIN cuenta ON cuenta.Cta_nIdCuenta = subcategoria.SubCat_Cta_nIdCuenta
				WHERE 
					lineas_sol.Lin_Proy_nIdProyecto = $id_proyecto
					AND lineas_sol.Lin_UExp_nIdUnExp = $unid_exp
					AND lineas_sol.Lin_Dpto_nIdDpto = $dpto
				    AND cuenta.Cta_nIdCuenta = $id_cuenta
				    AND recepciones.Rec_cEstado = 1
				    AND lineas_sol.Lin_cEstado IN (4, 5)
				GROUP BY 
					subcategoria.SubCat_nIdSubCategoria,
				    lineas_sol.Lin_UExp_nIdUnExp
				ORDER BY 
					subcategoria.SubCat_vSubCategoria ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0], new LineaSolicitudData());
	}
	
	public static function getDetalleLinSolBy_Proyecto_Uexp_Dpto_Subcat_Mes($id_proyecto, $unid_exp, $dpto, $subcat, $mes){
		$sql = "SELECT 
				    lineas_sol.Lin_nIdLineaSol,
                    lineas_sol.Lin_Sol_nIdSolicitud,
                    lineas_sol.Lin_nNroLinea,
                    lineas_sol.Lin_vDescripcion,
                    solicitud.Sol_cTipoMoneda,
                    solicitud.Sol_nTipoCambio,
                    orden_compra.OC_nNroOC,
					SUM(CASE
				        WHEN solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida
				        ELSE 
				        	CASE WHEN solicitud.Sol_cTipoMoneda = 1 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida
				        	ELSE 
				        		CASE WHEN solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 1 THEN (lineas_sol.Lin_dTotal / lineas_sol.Lin_nCantidad) * recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio
				        		ELSE 
				        			CASE WHEN solicitud.Sol_cTipoMoneda = 2 AND lineas_sol.Lin_cTipoRecepcion = 2 THEN recepciones.Rec_nCantRecibida * solicitud.Sol_nTipoCambio 
				        			ELSE 0 
				        			END
				        		END
				        	END
				    	END) as total
				FROM lineas_sol 
				INNER JOIN orden_compra ON orden_compra.OC_nIdOrdenCompra = lineas_sol.Lin_OC_nIdOrdenCompra
				INNER JOIN solicitud ON solicitud.Sol_nIdSolicitud = lineas_sol.Lin_Sol_nIdSolicitud
				INNER JOIN recepciones ON recepciones.Rec_Lin_nIdLineaSol = lineas_sol.Lin_nIdLineaSol
				INNER JOIN subcategoria ON subcategoria.SubCat_nIdSubCategoria = lineas_sol.Lin_SubCat_nIdSubCategoria
				INNER JOIN cuenta ON cuenta.Cta_nIdCuenta = subcategoria.SubCat_Cta_nIdCuenta
				WHERE 
					lineas_sol.Lin_Proy_nIdProyecto = $id_proyecto
					AND lineas_sol.Lin_UExp_nIdUnExp = $unid_exp
					AND lineas_sol.Lin_Dpto_nIdDpto = $dpto
				    AND subcategoria.SubCat_nIdSubCategoria = $subcat
				    AND recepciones.Rec_cEstado = 1
                    AND MONTH(recepciones.Rec_dFechaContable) = $mes
				    AND lineas_sol.Lin_cEstado IN (4, 5)
				GROUP BY
                	lineas_sol.Lin_nIdLineaSol
				ORDER BY 
					total DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0], new LineaSolicitudData());
	}

	public static function getLinOCPendBy_Uexp_Proyecto_Estado($unid_exp, $id_proyecto, $id_dpto, $lin_estado){
		$where = " lineas_sol.Lin_cEstado IN ({$lin_estado})
					AND lineas_sol.Lin_UExp_nIdUnExp = {$unid_exp}
					AND lineas_sol.Lin_Proy_nIdProyecto = {$id_proyecto} ";
		if($id_dpto!=""){
			$where .= "AND dpto.Dpto_nIdDpto = {$id_dpto}";
		}

		$sql = "SELECT *
				FROM solicitud
				INNER JOIN lineas_sol ON lineas_sol.Lin_Sol_nIdSolicitud = solicitud.Sol_nIdSolicitud
				INNER JOIN orden_compra ON orden_compra.OC_nIdOrdenCompra = lineas_sol.Lin_OC_nIdOrdenCompra
				INNER JOIN proveedor ON proveedor.Prov_nIdProveedor = orden_compra.OC_Prov_nIdProveedor
				INNER JOIN proyecto ON proyecto.Proy_nIdProyecto = lineas_sol.Lin_Proy_nIdProyecto
				INNER JOIN dpto ON dpto.Dpto_nIdDpto = lineas_sol.Lin_Dpto_nIdDpto 
				WHERE {$where} 
				GROUP BY lineas_sol.Lin_nIdLineaSol

				ORDER BY 
					orden_compra.OC_nNroOC, 
					lineas_sol.Lin_nNroLinea";
		$query = Executor::doit($sql);
		return Model::many($query[0], new LineaSolicitudData());
	}

}

?>