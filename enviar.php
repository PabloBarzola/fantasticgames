<?php
    //use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\Exception;
    
    require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';    
    require '/usr/share/php/libphp-phpmailer/PHPMailerAutoload.php';

    $nombre     = $_POST['nombre'];
    $email      = $_POST['email'];
    $mensaje    = $_POST['mensaje'];

    $correo     = "De: $nombre \n";
    $correo     .= "Correo: $email \n";
    $correo     .= "Mensaje: $mensaje";

    $destino    = "z80max300@hotmail.com";
    $asunto     = "Contacto de fantasticgames";
    $mail       = new PHPMailer(true); 

	$perfil 	= 'usr_comun';
    
    try {
        //Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;

        //No ovidarme de obtener esta info de la base mysql!
        $mail->Username = 'z80max300@hotmail.com';
        $mail->Password = 'cxcxcxcxcxcx';
        
        $mail->SMTPSecure = 'STARTTLS';
        $mail->Port = 587;
     
        $mail->setFrom($destino);
        $mail->addAddress($destino);
       
        //$mail->addReplyTo('noreply@example.com', 'noreply');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
     
        //Attachments
        //$mail->addAttachment('/backup/myfile.tar.gz');
     
        //Cuerpo del mensaje
        $mail->isHTML(false); 

        $mail->Subject = $asunto;
        $mail->Body    = $correo;
     
        $mail->send();
        
        $tipoMensaje 	= 'msj_info';
        $mensaje 		= 'El mensaje se envio correctamente!!!';
        header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
    } catch (Exception $e) {
        $tipoMensaje 	= 'msj_error';
        $mensaje 		= 'No se pudo enviar el mensaje!!!';
        header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
    }
?>
