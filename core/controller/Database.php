<?php
class Database {
	public static $db;
	public static $con;
	function __construct(){
		$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="adcampus";
		// $this->user="c1850284_upn";$this->pass="veRU55tabo";$this->host="localhost";$this->ddbb="c1850284_upn";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		$con->set_charset("utf8");
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>
