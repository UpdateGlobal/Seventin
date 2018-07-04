<?php
$toEmail = "raulupdate@gmail.com";
$subject = $_POST['asunto'];
$mailHeaders = 'From: '.$_POST["email"]."\r\n".
'Reply-To: '.$_POST["email"]."\r\n" .
'X-Mailer: PHP/' . phpversion();

$nombres = isset( $_POST['nombre'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]/", "", $_POST['nombre'] ) : "";
$email = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]/", "", $_POST['email'] ) : "";
$asunto = isset( $_POST['asunto'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]/", "", $_POST['asunto'] ) : "";
$comentarios = isset( $_POST['mensaje'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['mensaje'] ) : "";

$mensaje = "Información del Contacto\n";
$mensaje .= "------------------------\n";
$mensaje .= "Nombres : ".filter_var($nombres, FILTER_SANITIZE_STRING)."\n";
$mensaje .= "Email : ".filter_var($email, FILTER_VALIDATE_EMAIL)."\n";
$mensaje .= "Asunto : ".filter_var($asunto, FILTER_SANITIZE_STRING)."\n";
$mensaje .= "Mensaje : ".filter_var($comentarios, FILTER_SANITIZE_STRING)."\n";

if(mail($toEmail, $subject, $mensaje, $mailHeaders)) {
	print "<div class='alert alert-success' role='alert'>Email Enviado Exitosamente.</div>";
} else {
	print "<div class='alert alert-danger' role='alert'>Problema al enviar el correo, intentelo m&aacute;s tarde.</div>";
}

?>