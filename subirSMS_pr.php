<?php
    $folder = "sms/";
	$maxlimit = 16777216; // Máximo límite de tamaño (en bits), 1Mbyte
	$allowed_ext = ".sms";
	$overwrite = "yes";
	$match = "";

    $filesize = $_FILES['sms']['size'];
    $filename = $_FILES['sms']['name'];

	$perfil 	    = 'usr_adm';
    $tipoMensaje 	= 'msj_info'; //msj_error
    $mensaje        = '';

    if(!$filename || $filename==""){ // mira si no se ha seleccionado ningún archivo
        $tipoMensaje 	= 'msj_error';
        $mensaje        = 'Ningún archivo selecccionado para subir.';
        header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
    }
	
    if($filesize < 1){ // el archivo está vacío
        $tipoMensaje 	= 'msj_error';
        $mensaje        = 'Archivo vacío.';
        header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");	   
    }elseif($filesize > $maxlimit){ // el archivo supera el máximo
        $tipoMensaje 	= 'msj_error';
        $mensaje        = 'Este archivo supera el máximo tamaño permitido.';
        header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");	   
    }

	$file_ext = preg_split("/\./",$filename); 
	$allowed_ext = preg_split("/\,/",$allowed_ext); // verifica extension
    
    foreach($allowed_ext as $ext){
	   if($ext==$file_ext[1]) $match = "1";
	}
	if(!$match){
        $tipoMensaje 	= 'msj_error';
        $mensaje        = 'Este tipo de archivo no está permitido: '. $filename;
        header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");	   
	}
	if(isset($error)==true){        
        $tipoMensaje 	= 'msj_error';
        $mensaje        = 'Se ha producido el siguiente error al subir el archivo:'. $error;
        header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
    }else{
		// Para que no de error al intentar subir el archivo a la carpeta
		// dar permiso 777 sobre la misma		
		// sudo chmod -R 777 /opt/lampp/htdocs/TP_WEBMASTER_2019/sms
        if(move_uploaded_file($_FILES['sms']['tmp_name'], $folder.$filename)){ // Finalmente sube el archivo
            $tipoMensaje 	= 'msj_info';
            $mensaje        = 'El archivo <mark>' . $filename . '</mark> se ha subido correctamente!';
            header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
	    }else{
            $tipoMensaje 	= 'msj_error';
            $mensaje        = 'Error! Puede que el tamaño supere el máximo permitido por el servidor. Inténtelo de nuevo.';
            header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
		}
	}
?>