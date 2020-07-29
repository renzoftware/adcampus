<?php
if(Session::getUID()=="") {
	$user = $_POST['email'];
	$pass = sha1(md5($_POST['password']));
	// $pass = $_POST['password'];

	$base = new Database();
	$con = $base->connect();
	 $sql = "SELECT * FROM user where username = \"{$user}\" AND password= \"{$pass}\" AND is_active = 1";
	$query = $con->query($sql);
	$found = false;
	$userid = null;

	while($r = $query->fetch_array()){
		$found = true ;
		$userid = $r['id'];
	}

	if($found==true) {
		$_SESSION['user_id']=$userid ;
		print "Cargando ... $user";
		print "<script>window.location='home';</script>";
	}
	else{
		print "<script>window.location='';</script>";
	}
}
else{
	print "<script>window.location='home';</script>";
}
?>