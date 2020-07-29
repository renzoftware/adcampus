<?php
class PermisoData {
	public static $tablename = "permiso";
	function __construct(){
		$this->IdPermiso = "";
		$this->IdUsuario = "";
		$this->IdMenu = "";
		$this->FechaRegistro = "";
		$this->Estado = "";
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (IdUsuario, IdMenu, FechaRegistro, Estado) ";
		$sql .= "VALUE (\"$this->IdUsuario\",\"$this->IdMenu\", DATE_SUB(NOW(), INTERVAL 2 HOUR), 1)";
		return Executor::doit($sql);
	}

	public static function getAll(){
		$sql = "SELECT * FROM ".self::$tablename." 
			INNER JOIN user ON user.id = permiso.IdUsuario
			INNER JOIN menu ON menu.IdMenu = permiso.IdMenu AND menu.Estado = 1
			ORDER BY user.username";
		$query = Executor::doit($sql);
		return Model::many($query[0], new PermisoData());
	}

	public static function getById($id){
		$sql = "SELECT * FROM ".self::$tablename." WHERE IdPermiso = $id";
		$query = Executor::doit($sql);
		return Model::one($query[0], new PermisoData());
	}

	public static function getPermisoAllActiveByUsuario($idusuario){
		$sql = "SELECT p.*, m.Descripcion, m.Ruta, m.Icono FROM ".self::$tablename." p 
			INNER JOIN menu m ON m.IdMenu = p.IdMenu
			WHERE p.IdUsuario = $idusuario AND p.Estado = 1 AND m.Estado = 1
			ORDER BY m.Orden";
		$query = Executor::doit($sql);
		// var_dump($sql);
		return Model::many($query[0], new PermisoData());
	}

	public static function getPermisoByIdPermiso($idpermiso){
		$sql = "SELECT * FROM ".self::$tablename." WHERE IdPermiso = {$idpermiso}";
		$query = Executor::doit($sql);
		return Model::one($query[0], new PermisoData());
	}

	public static function ValidaPermiso($idusuario, $menu){
		$sql = "SELECT perm.* FROM ".self::$tablename." perm 
		INNER JOIN menu men ON men.IdMenu = perm.IdMenu
		WHERE men.Ruta = '{$menu}' AND IdUsuario = {$idusuario} AND perm.Estado = 1 AND men.Estado = 1";
		$query = Executor::doit($sql);
		// var_dump($sql);
		return Model::many($query[0], new PermisoData());
	}

	public static function getPermisosByWhereOffsetPage( $sWhere, $offset, $per_page){
		$sql = "SELECT permiso.*, menu.Descripcion, menu.Ruta, user.username FROM permiso
			INNER JOIN user ON user.id = permiso.IdUsuario
			INNER JOIN menu ON menu.IdMenu = permiso.IdMenu AND menu.Estado = 1
			WHERE $sWhere  LIMIT $offset, $per_page";
		$query = Executor::doit($sql);
		// var_dump($sql);
		return Model::many($query[0], new PermisoData());
	}

	public function updateEstado(){
		$sql = "UPDATE ".self::$tablename." SET Estado = \"$this->Estado\" where IdPermiso = $this->IdPermiso";
		// var_dump($sql);
		return Executor::doit($sql);
	}

}

?>