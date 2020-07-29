<?php
class PersonData {
	public static $tablename = "person";
	function __construct(){
		$this->title = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name,lastname,dni,phone,email,user_id,created_at,c1_fullname,c1_address,c1_phone,c1_note) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->dni\",\"$this->phone\",\"$this->email\",$this->user_id,$this->created_at,\"$this->c1_fullname\",\"$this->c1_address\",\"$this->c1_phone\",\"$this->c1_note\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "update ".self::$tablename." set is_active='0' where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto PersonData previamente utilizamos el contexto
	public function update_active(){
		$sql = "update ".self::$tablename." set last_active_at=NOW() where id=$this->id";
		Executor::doit($sql);
	}


	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",dni=\"$this->dni\",phone=\"$this->phone\",email=\"$this->email\",c1_fullname=\"$this->c1_fullname\",c1_address=\"$this->c1_address\",c1_phone=\"$this->c1_phone\",c1_note=\"$this->c1_note\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PersonData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by lastname, name asc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}

	// RENZOT >>
	public static function getAllActive(){
		$sql = "SELECT p.*, h.IdHorario FROM ".self::$tablename." p INNER JOIN horarios h ON h.Horario = p.c1_note AND h.Estado = 1 AND h.Tipo = 1 WHERE p.is_active=1 order by p.c1_fullname, p.lastname, p.name asc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}
	// << RENZOT


	public static function getAllUnActive(){
		$sql = "select * from client where last_active_at<=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}


	public function getUnreads(){ return MessageData::getUnreadsByClientId($this->id); }


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or email like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}


}

?>