<?php
date_default_timezone_set('America/Lima');
/* Inicio Librerias para envio de EMAIL */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'librerias/PHPMailer/src/Exception.php';
require 'librerias/PHPMailer/src/PHPMailer.php';
require 'librerias/PHPMailer/src/SMTP.php';
/* Fin Librerias para envio de EMAIL */

/* Inicio Carga Archivos/Fotos */
require_once ('librerias/upload/class.upload.php');
set_time_limit(300);
ini_set ( "memory_limit", "300M");
/* Fin Carga Archivos */

if(!empty($_POST)){
	if(Session::getUID()!=""){
		switch ($_POST["opt"]) {
			case 'upd_prioridad':
				$id_incidente = $_SESSION["incid_id_temp"];
			  	$upd_prioridad = $_POST["xval"];

				$obj_incidente = IncidentesData::getIncidenteByIdIncidente($id_incidente);
				$obj_incidente->Inc_cPrioridad = $upd_prioridad;
				$obj_incidente->updatePrioridad();
				echo "1";	// Prioridad Actualizada
				break;

			/* Actualización Estado por Administrador */
			case 'upd_estado':
				$id_incidente = $_SESSION["incid_id_temp"];
			  	$upd_estado = $_POST["xval"];

				$obj_incidente = IncidentesData::getIncidenteByIdIncidente($id_incidente);
				$obj_incidente->Inc_cEstadoAtencion = $upd_estado;
				if($upd_estado==3){
					$obj_incidente->Inc_vFechaSolucion = "\"".date("Y-m-d")."\"";
				}
				else{
					$obj_incidente->Inc_vFechaSolucion = "NULL";	
				}

				$obj_incidente->updateEstadoAtencion();
				echo "1";	// Estado de Atencion Actualizado

				if($upd_estado==3){
					/* INICIO PROCEDIMIENTO PARA ENVIAR EMAIL POR ESTADO ATENDIDO */
					$prioridad_incidente = $text_prioridad_inc = "";
					switch ($obj_incidente->Inc_cPrioridad) {
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

					/* Imagen */
					$file = $GLOBALS['ruta_base'].'img/incidentes/'.$id_incidente.'.jpg';
					$name_imagen = buscar_existe_foto($file);

					$mail = new PHPMailer(true);
					$usuario = UserData::getById($obj_incidente->Inc_User_id);
					$campus = UExplData::getById($obj_incidente->Inc_UExp_nIdUnExp);
					$nro_ticket = $obj_incidente->Inc_vNroTicket;
					$descripcion = $obj_incidente->Inc_vDescripcion;
					$comentario = $obj_incidente->Inc_vComentario;
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
					 
					    $subject = "ADC - El ticket #".$obj_incidente->Inc_vNroTicket ." fue resuelto";
					    $subject = "=?UTF-8?B?".base64_encode($subject)."=?=";
					    $mail->Subject = $subject;  // Asunto del mensaje  

				        include("librerias/mail_template/template02.php");
					    $mail->Body = $body_html;    // Contenido del mensaje (acepta HTML)
					 
					    $mail->send();
					    echo '';
					} catch (Exception $e) {
					    echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
					}
					/* FIN PROCEDIMIENTO ENVIO DE EMAIL*/

				}

				break;

			case 'upd_descripcion':
				$id_incidente = $_SESSION["incid_id_temp"];
			  	$upd_descripcion = $_POST["valor"];

				$obj_incidente = IncidentesData::getIncidenteByIdIncidente($id_incidente);
				$obj_incidente->Inc_vDescripcion = $upd_descripcion;
				$obj_incidente->updateDescripcion();
				echo "1";	// Descripcion Actualizado
				break;

			case 'upd_comentario':
				$id_incidente = $_SESSION["incid_id_temp"];
			  	$upd_comentario = $_POST["valor"];

				$obj_incidente = IncidentesData::getIncidenteByIdIncidente($id_incidente);
				$obj_incidente->Inc_vComentario = $upd_comentario;
				$obj_incidente->updateComentario();
				echo "1";	// Comentario Actualizado
				break;

			case 'upd_material':
				$id_incidente = $_SESSION["incid_id_temp"];
			  	$upd_material = $_POST["valor"];

				$obj_incidente = IncidentesData::getIncidenteByIdIncidente($id_incidente);
				$obj_incidente->Inc_vMaterial = $upd_material;
				$obj_incidente->updateMaterial();
				echo "1";	// Material Actualizado
				break;

			case 'upd_freporte':
				$id_incidente = $_SESSION["incid_id_temp"];
			  	$upd_freporte = $_POST["valor"];

				$obj_incidente = IncidentesData::getIncidenteByIdIncidente($id_incidente);
				$obj_incidente->Inc_vFechaReporte = $upd_freporte;
				$obj_incidente->updateFReporte();
				echo "1";	// Fecha Reporte Actualizado
				break;

			case 'upd_fsolucion':
				$id_incidente = $_SESSION["incid_id_temp"];
			  	$upd_fsolucion = $_POST["valor"];

				$obj_incidente = IncidentesData::getIncidenteByIdIncidente($id_incidente);
				$obj_incidente->Inc_vFechaSolucion = $upd_fsolucion;
				$obj_incidente->updateFSolucion();
				echo "1";	// Fecha Solucion Actualizado
				break;
			
			case 'upd_asignado':
				$id_incidente = $_SESSION["incid_id_temp"];
			  	$upd_asignado_a = $_POST["xval"];

				$obj_incidente = IncidentesData::getIncidenteByIdIncidente($id_incidente);
				$obj_incidente->Inc_User_id = $upd_asignado_a;
				$obj_incidente->updateAsignadoA();
				echo "1";	// Usuario Asignado Actualizado

				/* INICIO PROCEDIMIENTO PARA ENVIAR EMAIL POR CAMBIO DE ASIGNACION */
				$prioridad_incidente = $text_prioridad_inc = "";
				switch ($obj_incidente->Inc_cPrioridad) {
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

				/* Imagen */
				$file = $GLOBALS['ruta_base'].'img/incidentes/'.$id_incidente.'.jpg';
				$name_imagen = buscar_existe_foto($file);

				$mail = new PHPMailer(true);
				$usuario = UserData::getById($obj_incidente->Inc_User_id);
				$campus = UExplData::getById($obj_incidente->Inc_UExp_nIdUnExp);
				$nro_ticket = $obj_incidente->Inc_vNroTicket;
				$descripcion = $obj_incidente->Inc_vDescripcion;
				$comentario = $obj_incidente->Inc_vComentario;
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
				 
				    $subject = "ADC - Se te asignó el ticket #".$nro_ticket;
				    $subject = "=?UTF-8?B?".base64_encode($subject)."=?=";
				    $mail->Subject = $subject;  // Asunto del mensaje  

				    $incidente = $obj_incidente;
			        include("librerias/mail_template/template01.php");
				    $mail->Body = $body_html;    // Contenido del mensaje (acepta HTML)
				 
				    $mail->send();
				    echo '';
				} catch (Exception $e) {
				    echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
				}
				/* FIN PROCEDIMIENTO ENVIO DE EMAIL*/
				break;

			case 'upd_campus':
				$id_incidente = $_SESSION["incid_id_temp"];
			  	$upd_campus = $_POST["xval"];

				$obj_incidente = IncidentesData::getIncidenteByIdIncidente($id_incidente);
				$obj_incidente->Inc_UExp_nIdUnExp = $upd_campus;
				$obj_incidente->updateCampus();
				echo "1";	// Campus Actualizado
				break;

			/* Actualización Estado por Técnico */
			case 'upd_encurso':
			  	$id_incidente = $_POST["txt_encurso_xid"];
			  	$upd_comentario = $_POST["txt_encurso_comentario"];
			  	$upd_material =(($_POST["txt_encurso_material"]=="" || is_null($_POST["txt_encurso_material"]))?"NULL": "\"".$_POST["txt_encurso_material"]."\"");

				$obj_incidente = IncidentesData::getIncidenteByIdIncidente($id_incidente);
				$obj_incidente->Inc_cEstadoAtencion = 2;
				$obj_incidente->Inc_vComentario = $upd_comentario;
				$obj_incidente->Inc_vMaterial = $upd_material;
					
				$result = $obj_incidente->updateEstadoAtencionAndComentarioAndMaterial();
				
				if($result)
					echo "1";
				else
					echo "2";

				break;

			/* Atendido por el técnico */
			case 'upd_atendido':
			  	$id_incidente = $_POST["txt_fin_xid"];
			  	$upd_comentario = $_POST["txt_fin_comentario"];

				$obj_incidente = IncidentesData::getIncidenteByIdIncidente($id_incidente);
				$obj_incidente->Inc_cEstadoAtencion = 3;
				$obj_incidente->Inc_vComentario = $upd_comentario;
				
				$obj_incidente->Inc_vFechaSolucion = "\"".date("Y-m-d")."\"";
				$result = $obj_incidente->updateEstadoAtencionAndComentario();
				
				// Si se ha seleccionado una imagen...
				if($_FILES["imagen"]["name"]!="" && $result){ 
				$image = new Upload($_FILES["imagen"]);
					if($image->uploaded){
						$nombre_archivo = $id_incidente;
						
						$image->file_new_name_body = $nombre_archivo;
						$image->image_resize = true;
						$image->image_ratio_pixels = 1000000;
						$image->image_convert = 'jpg';
						$image->jpeg_quality = 50;
						$image->Process("img/atenciones");

						if($image->processed){
							echo "1"; //Subida exitosa

							/* INICIO PROCEDIMIENTO PARA ENVIAR EMAIL SI ESTADO ES "ATENDIDO" */
							$prioridad_incidente = $text_prioridad_inc = "";
							switch ($obj_incidente->Inc_cPrioridad) {
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

							/* Imagen */
							$file = $GLOBALS['ruta_base'].'img/atenciones/'.$id_incidente.'.jpg';
							$name_imagen = buscar_existe_foto($file);
			                // $name_imagen = str_replace($GLOBALS['ruta_base'], "../", $name_imagen);

							$mail = new PHPMailer(true);
							$usuario = UserData::getById($obj_incidente->Inc_User_id);
							$campus = UExplData::getById($obj_incidente->Inc_UExp_nIdUnExp);
							$nro_ticket = $obj_incidente->Inc_vNroTicket;
							$descripcion = $obj_incidente->Inc_vDescripcion;
							$comentario = $obj_incidente->Inc_vComentario;
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
							 
							    $subject = "ADC - El ticket #".$obj_incidente->Inc_vNroTicket ." fue resuelto";
							    $subject = "=?UTF-8?B?".base64_encode($subject)."=?=";
							    $mail->Subject = $subject;  // Asunto del mensaje  

						        include("librerias/mail_template/template02.php");
							    $mail->Body = $body_html;    // Contenido del mensaje (acepta HTML)
							 
							    $mail->send();
							    echo '';
							} catch (Exception $e) {
							    echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
							}
							/* FIN PROCEDIMIENTO ENVIO DE EMAIL*/

						}
						else{
							echo "2"; //Error al subir la imagen
						}

					}
					else{
						echo "2";
					}
				}
				else{
					echo "2";
				}

				break;
			
			/* Técnico Asigna ticket a Proveedor */
			case 'upd_asigna_proveedor':
				$id_incidente = $_POST["xid"];
			  	// $upd_prioridad = $_POST["prio"];

				$obj_incidente = IncidentesData::getIncidenteByIdIncidente($id_incidente);
				$obj_incidente->Inc_User_id = 9;
				$obj_incidente->updateAsignarProveedor();
				echo "1";	// Se Asignación Realizada


				/* INICIO PROCEDIMIENTO PARA ENVIAR EMAIL POR CAMBIO DE ASIGNACION */
				$prioridad_incidente = $text_prioridad_inc = "";
				switch ($obj_incidente->Inc_cPrioridad) {
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

				/* Imagen */
				$file = $GLOBALS['ruta_base'].'img/incidentes/'.$id_incidente.'.jpg';
				$name_imagen = buscar_existe_foto($file);
                // $name_imagen = str_replace($GLOBALS['ruta_base'], "../", $name_imagen);

				$mail = new PHPMailer(true);
				$usuario = UserData::getById($obj_incidente->Inc_User_id);
				$campus = UExplData::getById($obj_incidente->Inc_UExp_nIdUnExp);
				$nro_ticket = $obj_incidente->Inc_vNroTicket;
				$descripcion = $obj_incidente->Inc_vDescripcion;
				$comentario = $obj_incidente->Inc_vComentario;
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
				 
				    $subject = "ADC - Se te asignó el ticket #".$nro_ticket;
				    $subject = "=?UTF-8?B?".base64_encode($subject)."=?=";
				    $mail->Subject = $subject;  // Asunto del mensaje  

				    $incidente = $obj_incidente;
			        include("librerias/mail_template/template01.php");
				    $mail->Body = $body_html;    // Contenido del mensaje (acepta HTML)
				 
				    $mail->send();
				    echo '';
				} catch (Exception $e) {
				    echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
				}
				/* FIN PROCEDIMIENTO ENVIO DE EMAIL*/

				break;

			default:
				echo "3"; //Error opt
				break;
		}
	}
	else{
		echo "2"; // No se ha logeado
	}
}
else{
	echo "0"; //Error en envio de datos POST
}

?>