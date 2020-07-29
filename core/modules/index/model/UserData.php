<?php
class UserData {
	public static $tablename = "user";

	function __construct(){
		$this->id = "";
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->username = "";
		$this->password = "";
		$this->is_active = "0";
		$this->is_admin = "0";
		$this->user_type = ""; /* 1:JEFE, 2:? */
		// $this->idcampus = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (name, lastname, username, password, user_type, idcampus, created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->username\",\"$this->password\",$this->user_type, $this->idcampus, $this->created_at)";
		// var_dump($sql);
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "UPDATE ".self::$tablename." set is_active='0' where id=$id";
		return Executor::doit($sql);
	}
	public function del(){
		$sql = "UPDATE ".self::$tablename." set is_active='0' where id=$this->id";
		return Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "UPDATE ".self::$tablename." SET name=\"$this->name\", lastname=\"$this->lastname\", password=\"$this->password\", user_type=\"$this->user_type\", idcampus=\"$this->idcampus\" where id=$this->id";
		return  Executor::doit($sql);
	}

	// Actualizar clave
	public function update_passwd(){
		$sql = "UPDATE ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	/* Cambia Campus - Solo Analista*/
	public function update_campus(){
		$sql = "UPDATE ".self::$tablename." set idcampus=\"$this->idcampus\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "SELECT * FROM ".self::$tablename." WHERE id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0], new UserData());
	}



	public static function getAllActive(){
		$sql = "SELECT * FROM ".self::$tablename." WHERE is_active=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getUsuariosTecnicosByCampus($idcampus){
		$sql = "select * from ".self::$tablename."  WHERE user_type IN(4, 5, 1) AND idcampus = $idcampus order by created_at desc";
		$query = Executor::doit($sql);
		// var_dump($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getUsersByWhereOffsetPage( $sWhere, $offset, $per_page){
		$sql = "SELECT * FROM user where $sWhere  LIMIT $offset, $per_page";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getAllUsuariosGestorCob(){
		$sql = "SELECT * FROM ".self::$tablename."  WHERE user_type IN(6)";
		$query = Executor::doit($sql);
		return Model::many($query[0], new UserData());
	}

}

?>