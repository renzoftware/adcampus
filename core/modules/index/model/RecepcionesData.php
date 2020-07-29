<?php
class RecepcionesData {
	public static $tablename = "recepciones";
	function __construct(){
		$this->Rec_nIdRecepcion = "";
		$this->Rec_Lin_nIdLineaSol = "";
		$this->Rec_nCantRecibida = "";
		$this->Rec_dFechaContable = "";
		$this->Rec_cEstado = "";
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (Rec_Lin_nIdLineaSol, Rec_nCantRecibida, Rec_dFechaContable, Rec_cEstado) ";
		$sql .= "VALUE ($this->Rec_Lin_nIdLineaSol, $this->Rec_nCantRecibida, \"$this->Rec_dFechaContable\", 1)";
		return Executor::doit($sql);
	}

	public static function getRecepcionesByIdLineaSol($idlineasol){
		$sql = "SELECT recepciones.*
				FROM recepciones 
				WHERE recepciones.Rec_Lin_nIdLineaSol = $idlineasol AND recepciones.Rec_cEstado = 1
				ORDER BY recepciones.Rec_nIdRecepcion ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0], new RecepcionesData());
	}

	public function deleteRecepcion(){
		$sql = "UPDATE ".self::$tablename." SET Rec_cEstado = 0 WHERE Rec_nIdRecepcion = $this->Rec_nIdRecepcion";
		return Executor::doit($sql);
	}

	public static function getRecepSumCantMonto($idlineasol){
		$sql = "SELECT SUM(Rec_nCantRecibida) As cant_total
			FROM recepciones
			WHERE Rec_Lin_nIdLineaSol = {$idlineasol} AND Rec_cEstado = 1 ";
		$query = Executor::doit($sql);
		return Model::one($query[0], new RecepcionesData());
	}



}

?>