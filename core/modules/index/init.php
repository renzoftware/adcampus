<?php
/// en caso de que el parametro action este definido evitamos que se muestre
/// el layout por defecto y ejecutamos el action sin mostrar nada de vista
// print_r($_GET);
date_default_timezone_set("America/Lima");

$GLOBALS['entorno']='LOCAL';  // LOCAL O WEB

if($GLOBALS['entorno'] == "LOCAL")
	$GLOBALS['ruta_base']='C:/xampp/htdocs/renzot/'; /* LOCAL */
else
	$GLOBALS['ruta_base']='https://www.adcampus.online/'; /* WEB */


$GLOBALS['mail_host_smtp']='smtp.office365.com';
$GLOBALS['mail_username_smtp']='renzo.tello@upn.edu.pe';
$GLOBALS['mail_password_smtp']='Peru2025'; 
$GLOBALS['mail_from']='renzo.tello@upn.edu.pe'; 

if(!isset($_GET["action"])){
//	Bootload::load("default");
	Module::loadLayout("login");
}else{
	Action::load($_GET["action"]);
}

/* Funcion necesaria para validar si existe archivo en PAGINA WEB. Se utiliza cuando ya esté cargada la pagina en el servidor */
function check_file_exists_here($url){
   $resultado=get_headers($url);
   return stripos($resultado[0],"200 OK")?true:false; //check if $result[0] has 200 OK
}
/* Funcion necesaria para buscar archivo en el servidor web o local, según variable global */
function buscar_existe_foto($file_url){
	if($GLOBALS['entorno'] == "LOCAL"){
		if(file_exists($file_url))
		    $name_imagen = $file_url;
		else
		    $name_imagen = $GLOBALS['ruta_base'].'img/incidentes/0.png';
	}
	else if ($GLOBALS['entorno'] == "WEB") {
		if(check_file_exists_here($file_url))
		   $name_imagen = $file_url;
		else
		   $name_imagen = $GLOBALS['ruta_base'].'img/incidentes/0.png';
	}
	else{
		$name_imagen = NULL;
	}
   	return $name_imagen; //check if $result[0] has 200 OK
}

/* Función que retorna el tiempo que ha transcurrido de una determinada fecha */
function ago($tm,$rcs = 0) {
     $cur_tm = time()-(8*60*60); 
     $dif = $cur_tm-$tm;
     $pds = array('segundo','minuto','hora','dia','semana','mes','año','decada');
     $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
     for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

     $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
     if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
     return "Hace ".$x;
}

/* Funcion que convierte la primera letra de cada palabra en mayúscula (Tipo Nombre Apellido) */
function ucname($string) {
        $string =ucwords(strtolower($string));

        foreach (array('-', '\'') as $delimiter) {
          if (strpos($string, $delimiter)!==false) {
            $string =implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
          }
        }
        return $string;
    }

?>