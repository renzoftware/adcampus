<?php
// superboot.php
// 14 octubre del 2014
// El codigo siguiente se ejecuta en todas los views y action

// echo "Hello superboot";
	// 
	// else{
		// if(isset($_GET["view"]) && isset($_SESSION['user_id'])){
		// 	echo "<script>window.location='login';</script>";
		// }
	// }
	if(isset($_GET["view"])){
		if($_GET["view"]!="login" && $_GET["view"]!="error" && $_GET["view"]!="logout"){
		  	if(!isset($_SESSION['user_id'])){
		      	echo "<script>window.location='login';</script>";
		  	}
		  	else{
			    $u = UserData::getById(Session::getUID());
  				$valida_permiso = PermisoData::ValidaPermiso($u->id, $_GET["view"]);
  				// count($valida_permiso);
  				if(count($valida_permiso)<=0){
			      	echo "<script>window.location='login';</script>";
			    }
  				// var_dump($valida_permiso);
		  	}
		}
  	}

?>