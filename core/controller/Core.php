<?php

// date_default_timezone_set('America/Lima');
// 14 de Abril del 2014
// Core.php
// @brief obtiene las configuraciones, muestra y carga los contenidos necesarios.

define('METHOD','AES-256-CBC');
define('SECRET_KEY','$renzot@2018@');
define('SECRET_IV','232853');

class Core {

	public static function includeCSS(){
		$path = "res/css/";
		$handle=opendir($path);
		if($handle){
			while (false !== ($entry = readdir($handle)))  {
				if($entry!="." && $entry!=".."){
					$fullpath = $path.$entry;
				if(!is_dir($fullpath)){
						echo "<link rel='stylesheet' type='text/css' href='".$fullpath."' />";

					}
				}
			}
		closedir($handle);
		}

	}

	public static function redir($url){
		echo "<script>window.location='".$url."';</script>";
	}

	public static function alert($url){
		echo "<script>alert('".$url."');</script>";
	}

	public static function includeJS(){
		$path = "res/js/";
		$handle=opendir($path);
		if($handle){
			while (false !== ($entry = readdir($handle)))  {
				if($entry!="." && $entry!=".."){
					$fullpath = $path.$entry;
				if(!is_dir($fullpath)){
						echo "<script type='text/javascript' src='".$fullpath."'></script>";

					}
				}
			}
		closedir($handle);
		}

	}

	public static function encryption($string){
		$output = FALSE;
		$key = hash('sha256', SECRET_KEY);
		$iv = substr(hash('sha256', SECRET_IV), 0, 16);
		$output = openssl_encrypt($string, METHOD, $key, 0, $iv);
		$output = base64_encode($output);
		
		return $output;
	}
	public static function decryption($string){
		$key = hash('sha256', SECRET_KEY);
		$iv = substr(hash('sha256', SECRET_IV), 0, 16);
		$output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
		
		return $output;
	}

	public static function validar_fecha_espanol($fecha){
    	$valores = explode('-', $fecha);
	    if(count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])){
	      return true;
	      }
	    return false;
  	}

	public static function _ago($tm,$rcs = 0) {
	     $cur_tm = time()-(6*60*60); $dif = $cur_tm-$tm;
	     $pds = array('segundo','minuto','hora','dia','semana','mes','año','decada');
	     $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
	     for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

	     $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
	     if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
	     return "Hace ".$x;
  	}

  	public static function paginate($page, $tpages, $adjacents) {
	$prevlabel = "&lsaquo; Anterior";
	$nextlabel = "Siguiente &rsaquo;";
	$out = '<ul class="pagination   pull-right">';
	
	// previous label

	if($page==1) {
		$out.= "<li class='page-item disabled'><a>$prevlabel</a></li>";
	} else if($page==2) {
		$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(1)'>$prevlabel</a></li>";
	}else {
		$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(".($page-1).")'>$prevlabel</a></li>";

	}
	
	// first label
	if($page>($adjacents+1)) {
		$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(1)'>1</a></li>";
	}
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li class='page-item'><a>...</a></li>";
	}

	// pages

	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class='active page-item'><a>$i</a></li>";
		}else if($i==1) {
			$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(1)'>$i</a></li>";
		}else {
			$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(".$i.")'>$i</a></li>";
		}
	}

	// interval

	if($page<($tpages-$adjacents-1)) {
		$out.= "<li class='page-item'><a>...</a></li>";
	}

	// last

	if($page<($tpages-$adjacents)) {
		$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load($tpages)'>$tpages</a></li>";
	}

	// next

	if($page<$tpages) {
		$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(".($page+1).")'>$nextlabel</a></li>";
	}else {
		$out.= "<li class='disabled page-item'><a>$nextlabel</a></li>";
	}
	
	$out.= "</ul>";
	return $out;
}

}



?>