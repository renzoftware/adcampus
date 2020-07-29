<?php
class VisitaData {
	public static $tablename = "visita";
	function __construct(){
		$this->nVisIdVisita = "";
		$this->nVis_nPerIdPersona = "";
		$this->cVisRuc = "";
		$this->vVisRazonSocial = "";
		$this->vVisDireccion = "";
		$this->vVisContactoNombre = "";
		$this->cVisContactoTelefono = "";
		$this->vVisContactoEmail = "0";
		$this->vVisContactoCargo= "";
		$this->cVisOport= "";
		$this->cVisOferta= "";
		$this->nVisCant= "";
		$this->vVisObservacion= "";
		$this->vVisLong= "";
		$this->vVisLat= "";
		$this->IdPeriodo = "";
		$this->dVisFecha = "";
		$this->nVisSup= "";
		$this->cVisTipoRuc = "";
		$this->cVisOperadorCede = "";
		$this->cVisCargoFijo = "";
		$this->cVisBaseData = "";
		$this->nVisCantVisitas = "";
		$this->cVisAvance = "";
		$this->cVisEstado = "";
		
	}

	public static function getVisitaAllActive(){
		$sql = "SELECT per.cPerDni, vis.nVisSup as sup, CONCAT(vPerNombre, ' ',vPerApellidoPat) As name, vis.*, per.cPerCiudad, 
				CASE vis.cVisOport
					WHEN 1 THEN 'SI'
					WHEN 2 THEN 'NO'
					ELSE '-'
				END As op,
				CASE vis.cVisOferta
					WHEN 1 THEN 'PORT'
					WHEN 2 THEN 'ALTA'
					WHEN 3 THEN 'BAM'
					WHEN 4 THEN 'BAFI'
					WHEN 5 THEN 'VAS'
					ELSE '-'
				END As oferta,
				CASE vis.cVisTipoRuc
					WHEN 1 THEN 'RUC 10'
					WHEN 2 THEN 'RUC 20'
					ELSE ''
				END As tiporuc,
				CASE vis.cVisOperadorCede
					WHEN 1 THEN 'Movistar'
					WHEN 2 THEN 'Claro'
					WHEN 3 THEN 'Bitel'
					ELSE ''
				END As operadorcede,
				CASE vis.cVisBaseData
					WHEN 1 THEN 'Entel'
					WHEN 2 THEN 'Nuevo'
					WHEN 3 THEN 'Otro'
					ELSE ''
				END As basedata,
				CASE vis.cVisAvance
					WHEN 1 THEN '0% Cliente No Desea'
					WHEN 2 THEN '25% Presentación'
					WHEN 3 THEN '50% Evaluación de Propuesta'
					WHEN 4 THEN '75% Negociación para Cierre'
					WHEN 5 THEN '90% Si Verbal'
					WHEN 6 THEN '100% Venta Cerrada'
					ELSE ''
				END As avance

				FROM visita vis  INNER JOIN persona per ON (per.nPerIdPersona = vis.nVis_nPerIdPersona AND per.cPerCargo=5) 
				WHERE vis.cVisEstado = 1
				ORDER BY vis.dVisFecha DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new VisitaData());
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (IdCampus, IdPeriodo, SolDia, SolNroSolPS, SolNroOC, IdSubCategoria, IdActividad, SolDescripcion, SolIdProveedor, SolTipoMoneda, SolMonto, SolEstadoSol, SolAC, SolGuiaRemision, SolComentario, created_at, SolEstado) ";
		$sql .= "value ($this->IdCampus, $this->IdPeriodo, \"$this->SolDia\", \"$this->SolNroSolPS\", \"$this->SolNroOC\", $this->IdSubCategoria, $this->IdActividad, \"$this->SolDescripcion\", $this->SolIdProveedor, \"$this->SolTipoMoneda\", \"$this->SolMonto\", \"$this->SolEstadoSol\", \"$this->SolAC\", \"$this->SolGuiaRemision\", NULL, NOW(), 1)";
		
		// ACTUALIZAR STOCK
		// $sql2 = "update stock_materiales set stock=stock-1 where IdProducto=$this->type AND stock>=0";
		// Executor::doit($sql2);
		// ACTUALIZAR STOCK

		return Executor::doit($sql);
	}

	public function update(){
		$sql = "UPDATE ".self::$tablename." SET
			SolDescripcion = \"$this->SolDescripcion\",
			SolNroOC = \"$this->SolNroOC\",
			SolDia = \"$this->SolDia\",
			IdSubCategoria = $this->IdSubCategoria,
			IdActividad = $this->IdActividad,
			SolIdProveedor = $this->SolIdProveedor,
			SolTipoMoneda = $this->SolTipoMoneda,
			SolMonto = $this->SolMonto,
			SolEstadoSol = $this->SolEstadoSol,
			SolAC = $this->SolAC,
			SolGuiaRemision = \"$this->SolGuiaRemision\",
			SolComentario = \"$this->SolComentario\"

			WHERE IdSolicitud = $this->IdSolicitud";

		return Executor::doit($sql);
	}

	public static function getSolicitudByNroSolicitudPS($nro_sol_ps){
		$sql = "SELECT * FROM solicitud where SolNroSolPS=$nro_sol_ps";
		$query = Executor::doit($sql);
		return Model::one($query[0],new VisitaData());
	}

	public static function searchSolicitudByIdSolicitud($id_solicitud){
		$sql = "SELECT * FROM solicitud where IdSolicitud=$id_solicitud";
		$query = Executor::doit($sql);
		return Model::one($query[0],new VisitaData());
	}

	public static function getSolicitudByNroOC($nro_oc){
		$sql = "SELECT * FROM solicitud where SolNroOC=$nro_oc";
		$query = Executor::doit($sql);
		return Model::one($query[0],new VisitaData());
	}

	public static function getSolicitudByIdSolicitud($id_solicitud){
		$sql = "SELECT sol.*, subcat.SubCategoria, pro.NombreProveedor, act.DescripcionActividad, per.Anual, per.Mes, act.NroActividad, cam.Nombre as NombreCampus, cuen.CtaGlobal, subcat.SubCategoria
			FROM solicitud sol
	    	INNER JOIN subcategoria subcat ON sol.IdSubCategoria = subcat.IdSubCategoria
	    	INNER JOIN cuenta cuen on subcat.IdCuenta = cuen.IdCuenta
	    	INNER JOIN actividad act ON sol.IdActividad = act.IdActividad
	    	INNER JOIN proveedor pro ON sol.SolIdProveedor = pro.IdProveedor
	    	INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
	    	INNER JOIN campus cam ON cam.IdCampus = sol.IdCampus
	    	WHERE sol.IdSolicitud = $id_solicitud";
		$query = Executor::doit($sql);
		return Model::one($query[0],new VisitaData());
	}
	
	public static function getSolicitudAllByIdCampus($idcampus){
		$sql = "SELECT sol.*, subcat.SubCategoria, pro.NombreProveedor, act.DescripcionActividad, per.Anual, per.Mes, act.NroActividad, cuen.CtaGlobal, cuen.Descripcion AS ctadesc, subcat.SubCategoria  FROM solicitud sol
	    	INNER JOIN subcategoria subcat ON sol.IdSubCategoria = subcat.IdSubCategoria
	    	INNER JOIN cuenta cuen on subcat.IdCuenta = cuen.IdCuenta
	    	INNER JOIN actividad act ON sol.IdActividad = act.IdActividad
	    	INNER JOIN proveedor pro ON sol.SolIdProveedor = pro.IdProveedor
	    	INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
	    	WHERE sol.IdCampus = $idcampus
	    	ORDER BY sol.IdPeriodo DESC, sol.SolDia DESC, sol.SolNroSolPS DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new VisitaData());
	}

		public static function getSolicitudAllByIdCampusIdPeriodo($idcampus, $idperiodo){
		$sql = "SELECT sol.*, subcat.SubCategoria, pro.NombreProveedor, act.DescripcionActividad, per.Anual, per.Mes, act.NroActividad, cuen.CtaGlobal, cuen.Descripcion AS ctadesc, subcat.SubCategoria  FROM solicitud sol
	    	INNER JOIN subcategoria subcat ON sol.IdSubCategoria = subcat.IdSubCategoria
	    	INNER JOIN cuenta cuen on subcat.IdCuenta = cuen.IdCuenta
	    	INNER JOIN actividad act ON sol.IdActividad = act.IdActividad
	    	INNER JOIN proveedor pro ON sol.SolIdProveedor = pro.IdProveedor
	    	INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
	    	WHERE sol.IdCampus = $idcampus AND per.IdPeriodo = $idperiodo
	    	ORDER BY sol.IdPeriodo DESC, sol.SolDia DESC, sol.SolNroSolPS DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new VisitaData());
	}

	public static function getSolicitudAllByAnio_IdCampus($anio, $idcampus){
		$sql = "SELECT sol.*, subcat.SubCategoria, pro.NombreProveedor, act.DescripcionActividad, per.Anual, per.Mes, act.NroActividad, cuen.CtaGlobal, subcat.SubCategoria   FROM solicitud sol
	    	INNER JOIN subcategoria subcat ON sol.IdSubCategoria = subcat.IdSubCategoria
	    	INNER JOIN cuenta cuen on subcat.IdCuenta = cuen.IdCuenta
	    	INNER JOIN actividad act ON sol.IdActividad = act.IdActividad
	    	INNER JOIN proveedor pro ON sol.SolIdProveedor = pro.IdProveedor
	    	INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
	    	WHERE sol.IdCampus = $idcampus AND per.Anual = $anio
	    	ORDER BY sol.IdPeriodo DESC, sol.SolDia DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new VisitaData());
	}

	public static function getSolicitudAllByAnio_IdCampus_EstadoSol($anio, $idcampus, $solestado){
		$sql = "SELECT sol.*, subcat.SubCategoria, pro.NombreProveedor, act.DescripcionActividad, per.Anual, per.Mes, act.NroActividad, cuen.CtaGlobal, subcat.SubCategoria FROM solicitud sol
	    	INNER JOIN subcategoria subcat ON sol.IdSubCategoria = subcat.IdSubCategoria
	    	INNER JOIN cuenta cuen on subcat.IdCuenta = cuen.IdCuenta
			INNER JOIN actividad act ON sol.IdActividad = act.IdActividad
	    	INNER JOIN proveedor pro ON sol.SolIdProveedor = pro.IdProveedor
	    	INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
	    	WHERE sol.IdCampus = $idcampus AND per.Anual = $anio AND sol.SolEstadoSol IN ($solestado)
	    	ORDER BY sol.IdPeriodo DESC, sol.SolDia DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new VisitaData());
	}

	public static function getSolicitudAllByIdPeriodo_IdCampus_EstadoSol($idperiodo, $idcampus, $solestado){
		$sql = "SELECT sol.*, subcat.SubCategoria, pro.NombreProveedor, act.DescripcionActividad, per.Anual, per.Mes, act.NroActividad, cuen.CtaGlobal, subcat.SubCategoria FROM solicitud sol
	    	INNER JOIN subcategoria subcat ON sol.IdSubCategoria = subcat.IdSubCategoria
	    	INNER JOIN cuenta cuen on subcat.IdCuenta = cuen.IdCuenta
			INNER JOIN actividad act ON sol.IdActividad = act.IdActividad
	    	INNER JOIN proveedor pro ON sol.SolIdProveedor = pro.IdProveedor
	    	INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
	    	WHERE sol.IdCampus = $idcampus AND per.IdPeriodo = $idperiodo AND sol.SolEstadoSol IN ($solestado)
	    	ORDER BY sol.IdPeriodo DESC, sol.SolDia DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new VisitaData());
	}


	public static function getSolicitudAllByIdPeriodo_IdCampus($idperiodo, $idcampus){
		$sql = "SELECT sol.*, subcat.SubCategoria, pro.NombreProveedor, act.DescripcionActividad, per.Anual, per.Mes, act.NroActividad, cuen.CtaGlobal, subcat.SubCategoria   FROM solicitud sol
	    	INNER JOIN subcategoria subcat ON sol.IdSubCategoria = subcat.IdSubCategoria
	    	INNER JOIN cuenta cuen on subcat.IdCuenta = cuen.IdCuenta
	    	INNER JOIN actividad act ON sol.IdActividad = act.IdActividad
	    	INNER JOIN proveedor pro ON sol.SolIdProveedor = pro.IdProveedor
	    	INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
	    	WHERE sol.IdCampus = $idcampus AND per.IdPeriodo = $idperiodo
	    	ORDER BY sol.IdPeriodo DESC, sol.SolDia DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new VisitaData());
	}

	public static function getTotalByAnio_IdCampus_Estado($anio, $idcampus, $estado){
		$sql = "SELECT COUNT(*) As total FROM solicitud sol
			INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
			WHERE sol.IdCampus = $idcampus AND per.Anual = $anio AND sol.SolEstadoSol = $estado";
		$query = Executor::doit($sql);
		return Model::one($query[0], new VisitaData());
	}

	public static function getTotalByAnio_IdCampus($anio, $idcampus){
		$sql = "SELECT COUNT(*) As total FROM solicitud sol
			INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
			WHERE sol.IdCampus = $idcampus AND per.Anual = $anio";
		$query = Executor::doit($sql);
		return Model::one($query[0], new VisitaData());
	}

	public static function getTotalPendByAnio_IdCampus($anio, $idcampus){
		$sql = "SELECT COUNT(*) As total FROM solicitud sol
			INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
			WHERE sol.IdCampus = $idcampus AND per.Anual = $anio AND sol.SolEstadoSol IN (3,4,5,6)";
		$query = Executor::doit($sql);
		return Model::one($query[0], new VisitaData());
	}

	public static function getTotalSinACByAnio_IdCampus($anio, $idcampus){
		$sql = "SELECT COUNT(*) As total FROM solicitud sol
			INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
			WHERE sol.IdCampus = $idcampus AND per.Anual = $anio AND sol.SolAC = 3";
		$query = Executor::doit($sql);
		return Model::one($query[0], new VisitaData());
	}


	public static function getTotalByIdPeriodo_IdCampus_Estado($idperiodo, $idcampus, $estado){
		$sql = "SELECT COUNT(*) As total FROM solicitud sol
			INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
			WHERE sol.IdCampus = $idcampus AND per.IdPeriodo = $idperiodo AND sol.SolEstadoSol = $estado";
		$query = Executor::doit($sql);
		return Model::one($query[0], new VisitaData());
	}

	public static function getTotalByIdPeriodo_IdCampus($idperiodo, $idcampus){
		$sql = "SELECT COUNT(*) As total FROM solicitud sol
			INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
			WHERE sol.IdCampus = $idcampus AND per.IdPeriodo = $idperiodo";
		$query = Executor::doit($sql);
		return Model::one($query[0], new VisitaData());
	}

	public static function getTotalPendByIdPeriodo_IdCampus($idperiodo, $idcampus){
		$sql = "SELECT COUNT(*) As total FROM solicitud sol
			INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
			WHERE sol.IdCampus = $idcampus AND per.IdPeriodo = $idperiodo AND sol.SolEstadoSol IN (3,4,5,6)";
		$query = Executor::doit($sql);
		return Model::one($query[0], new VisitaData());
	}

	public static function getTotalSinACByIdPeriodo_IdCampus($idperiodo, $idcampus){
		$sql = "SELECT COUNT(*) As total FROM solicitud sol
			INNER JOIN periodo per ON per.IdPeriodo = sol.IdPeriodo
			WHERE sol.IdCampus = $idcampus AND per.IdPeriodo = $idperiodo AND sol.SolAC = 3";
		$query = Executor::doit($sql);
		return Model::one($query[0], new VisitaData());
	}

	public static function getPtoRealByIdCampusIdPeriodoIdCuenta($idcampus, $idperiodo, $idcuenta){
		$sql = "SELECT SUM(sol.SolMonto) As total FROM solicitud sol
			INNER JOIN subcategoria subcat ON subcat.IdSubCategoria = sol.IdSubCategoria
			INNER JOIN cuenta cuen ON cuen.IdCuenta = subcat.IdCuenta
			INNER JOIN actividad act ON act.IdActividad = sol.IdActividad
			WHERE sol.IdCampus = $idcampus AND sol.IdPeriodo = $idperiodo AND cuen.IdCuenta = $idcuenta AND act.IdActividad <> 3";
		$query = Executor::doit($sql);
		return Model::one($query[0], new VisitaData());
	}

}

?>