<?php
	// 0. Recibir los datos del formulario
	$usuario 		= $_POST['usuario'];
	$clave 			= md5($_POST['clave']);

	$perfil 		= 'usr_comun';
	$tipoMensaje	= 'msj_error';

	// 1. Conectarse a la BD
	include("includes/conexion.php");

	// 2.Crear la consulta
	$select = "SELECT id_usuario id_usuario
				 FROM usuario 
	   			WHERE usuario = '$usuario'
				  AND clave = '$clave'";

	// 3.Ejecutar la consulta
	$select_ej = mysqli_query($conexion, $select);

	   // 4.Preguntar si todo anduvo bien
   if($select_ej == false) {
		$mensaje = '<mark>Problema para ingresar al sistema</mark> <br>Error interno del tipo SQL';
		header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
   }
   else {            
	   $cant = mysqli_num_rows($select_ej);

	   if ($cant==0){
		   	//echo "Usuario o contraseña erronea";
			$mensaje = 'Usuario o Password incorrectos!!!';						
        	header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
	   }
	   else{		   
		   	$reg = mysqli_fetch_array($select_ej);
			
			// Audito el ingreso del usuario
			$ag = "UPDATE usuario
			          SET ultLogin=curtime()
					WHERE id_usuario = $reg[id_usuario]";

			$ej = mysqli_query($conexion, $ag);
	   	
//			session_start();
//			$_SESSION['id'] = $reg['id_usuario'];
			//echo $_SESSION['id'];

			$mensaje 		= 'Bienvenido <mark>'. $usuario .'</mark>';
			$tipoMensaje	= 'msj_info';
			$perfil 		= 'usr_adm';

			header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
	   }
   }

?>