<?php
date_default_timezone_set('America/Lima');
/* Inicio Envio EMAIL */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'librerias/PHPMailer/src/Exception.php';
require 'librerias/PHPMailer/src/PHPMailer.php';
require 'librerias/PHPMailer/src/SMTP.php';
/* Fin Envio EMAIL */

/* Inicio Carga Archivos */
require_once ('librerias/upload/class.upload.php');
set_time_limit(150);
ini_set ( "memory_limit", "200M");
/* Fin Carga Archivos */

$incidente = new IncidentesData();
$enviar_email = false;
$result = "";
header('Content-Type: text/html; charset=utf-8');
if(!empty($_POST)){		
	if($_POST["txt_new_descripcion"]!=""){

		if($_FILES["imagen"]["name"]!=""){ // Si se ha seleccionado una imagen...
			$image = new Upload($_FILES["imagen"]);
			if($image->uploaded){
				$incidente->Inc_UExp_nIdUnExp = $_POST["sel_new_uexpl"];
				$incidente->Inc_User_id = $_POST["sel_new_asignado"];
				$incidente->Inc_vDescripcion = $_POST["txt_new_descripcion"];
				$incidente->Inc_vComentario = $_POST["txt_new_comentario"];
				$incidente->Inc_vFechaReporte = $_POST["date_new_freporte"];
				$incidente->Inc_cPrioridad = $_POST["sel_new_prioridad"];

				$result = $incidente->add();

				if($result[0]){
					$nombre_archivo = $result[1];
					
					$image->file_new_name_body = $nombre_archivo;
					$image->image_resize = true;
					$image->image_ratio_pixels = 1000000;
					$image->image_convert = 'jpg';
					$image->jpeg_quality = 50;
					$image->Process("img/incidentes");

					if($image->processed){
						echo "1"; //Subida exitosa
						$enviar_email = true;
					}
					else{
						echo "2"; //Error al subir la imagen
					}
				}
				else{
					echo "3"; //Error al registrar en la BD
				}
			}
		}
		else{ //Si no se ha seleccionado alguna imagen
			$incidente->Inc_UExp_nIdUnExp = $_POST["sel_new_uexpl"];
			$incidente->Inc_User_id = $_POST["sel_new_asignado"];
			$incidente->Inc_vDescripcion = $_POST["txt_new_descripcion"];
			$incidente->Inc_vComentario = $_POST["txt_new_comentario"];
			$incidente->Inc_vFechaReporte = $_POST["date_new_freporte"];
			$incidente->Inc_cPrioridad = $_POST["sel_new_prioridad"];

			$result = $incidente->add();

			if($result[0]){
				echo "1"; // OK
				$enviar_email = true;
			}
			else{
				echo "4"; // ERROR
			}
		}
	}
	else{
		echo "0"; //Error en envio de datos
	}
}
else{
	echo "0"; //Error en envio de datos
}

/* PROCEDIMIENTO PARA ENVIAR EMAIL */
$usuario = UserData::getById($incidente->Inc_User_id);
$campus = UExplData::getById($incidente->Inc_UExp_nIdUnExp);

$prioridad_incidente = $text_prioridad_inc = "";
switch ($incidente->Inc_cPrioridad) {
    case 0: 
        $prioridad_incidente = "BAJA"; 
        $text_prioridad_inc = "#3ac47d";
      
        break;

    case 1: 
        $prioridad_incidente = "MEDIA";
        $text_prioridad_inc = "#f7b924";
        break;

    case 2: 
        $prioridad_incidente = "ALTA";
        $text_prioridad_inc = "#d92550";
        break;

    case 3: 
        $prioridad_incidente = "URGENTE";
        $text_prioridad_inc = "#d92550";
        break;
}

$file = $GLOBALS['ruta_base'].'img/incidentes/'.$result[1].'.jpg';
$name_imagen = buscar_existe_foto($file);

/* WEB INICIO */
// function check_file_exists_here($url){
//    $resultado=get_headers($url);
//    return stripos($resultado[0],"200 OK")?true:false; //check if $result[0] has 200 OK
// }

// if(check_file_exists_here($file))
//    $name_imagen = $GLOBALS['ruta_base'].'img/incidentes/'.$result[1].'.jpg';
// else
//    $name_imagen = $GLOBALS['ruta_base'].'img/incidentes/0.png';
/* WEB FIN */

/* LOCAL INICIO */
// if(file_exists($file))
//     $name_imagen = $GLOBALS['ruta_base'].'img/incidentes/'.$result[1].'.jpg'
// else
//     $name_imagen = $GLOBALS['ruta_base'].'img/incidentes/0.png';
/* LOCAL FIN */

$nro_ticket = $result[1] + 10000;

if($enviar_email){
	$mail = new PHPMailer(true);
	try {
	    // $mail->SMTPDebug = 2;  // Sacar esta línea para no mostrar salida debug
	    $mail->isSMTP();
	    $mail->Host = $GLOBALS['mail_host_smtp'];          // Host de conexión SMTP
	    $mail->SMTPAuth = true;
	    $mail->Username = $GLOBALS['mail_username_smtp'];  // Usuario SMTP
	    $mail->Password = $GLOBALS['mail_password_smtp'];  // Password SMTP
	    $mail->SMTPSecure = 'tls';                         // Activar seguridad TLS
	    $mail->Port = 587;                                 // Puerto SMTP
	    $mail->CharSet = 'UTF-8';
	    $mail->isHTML(true);
	    $mail->setFrom($GLOBALS['mail_from']);		       // Mail del remitente

	    /* ENVIAR EMAIL A: */
        $mail->addAddress($usuario->email);             // Mail del destinatario
        // $mail->addAddress('renzo.tello@upn.edu.pe');        // Mail del destinatario
	    
        /* CON COPIA A: */
        $mail->addCC('katya.baca@upn.edu.pe');      
        $mail->addCC('diana.cardenas@upn.edu.pe');
        $mail->addCC('manuel.mendoza@upn.edu.pe');
        $mail->addCC('renzo.tello@upn.edu.pe');
	 
	    $subject = "ADC - ". $usuario->name.", se te asignó el ticket #".$nro_ticket;
	    $subject = "=?UTF-8?B?".base64_encode($subject)."=?=";
	    $mail->Subject = $subject;  // Asunto del mensaje  

        include("librerias/mail_template/template01.php");
	    $mail->Body = $body_html;    // Contenido del mensaje (acepta HTML)
	    
	    // $mail->AltBody = 'Este es el contenido del mensaje en texto plano 2';    // Contenido del mensaje alternativo (texto plano)
	 
	    $mail->send();
	    echo '';
	} catch (Exception $e) {
	    echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
	}
}

?>