<?php
    $id_usuario	= $_POST['id_usuario'];
    $usuario    = $_POST['usuario'];
    $password   = $_POST['password'];
	$estado     = $_POST['estado'];	
	$perfil 	= 'usr_adm';
/*
    echo "GRABANDO!";
    echo "----------------------------------------------";
    echo "id_usuario:" .$id_usuario;
    echo "nombre: " . $usuario;
    echo "password: " . $password;    
    echo "estado: " . $estado;
*/
	include("includes/conexion.php");
	
	$con = "SELECT id_usuario, usuario, clave, estado
			  FROM usuario
			 WHERE usuario = '$usuario'";

	$con_ej = mysqli_query($conexion, $con);
	$cant 	= mysqli_num_rows($con_ej);
	$reg 	= mysqli_fetch_array($con_ej);

	try{
		if($con_ej == false) {
			$tipoMensaje 	= 'msj_error';
			$mensaje 		= 'Error interno SQL, no se puede gestionar el usuario';		
            header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
		}else{
			if ($id_usuario==='0'){ //usuario nuevo
				if($cant>0){
					$tipoMensaje 	= 'msj_info';
                	$mensaje 		= 'El usuario <mark>'.$usuario . '</mark> ya existe en la base!!! <br><br> Por favor agregue usuario con otro nombre';
					header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
				}else{ 
					// Insertar el usuario en la base
					// -------------------------------
					try {
						$insertar = "INSERT INTO usuario (id_usuario, usuario, clave, estado, ultlogin )
								     VALUES (NULL,'$usuario',md5($password),$estado,sysdate())";
							   
						$insertar_ej = mysqli_query($conexion, $insertar);

						if($insertar_ej === true) {
							$tipoMensaje 	= 'msj_info';
							$mensaje 		= 'El usuario <mark>'.$usuario . '</mark> se agregó a la base!!!';
							header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
						}
						else {
							$tipoMensaje	= 'msj_error';
							$mensaje 		= 'Error del tipo SQL <br> al intentar insertar el usuario <mark>'.$usuario . '</mark> en la base';
							header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
						}
					} catch (Exception $e) {					
						$mensaje = 'No se pudo agregar el usuario a la base!!!';
						$tipoMensaje = 'msj_error';
						header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
					}					
				}					
			}else{ // editar usuario
				// Actualizar el usuario en la base
				try {

					if($password==$reg['clave']){
						// La contraseña no cambió
						$actualizar = "UPDATE usuario 
								  	      SET estado = $estado 
									    WHERE id_usuario = $id_usuario";
					}else{
						$actualizar = "UPDATE usuario 
										  SET clave = md5($password),
							   				  estado = $estado 
										WHERE id_usuario = $id_usuario";

					}					

					$actualizar_ej = mysqli_query($conexion, $actualizar);

					if($actualizar_ej == true) {
						$tipoMensaje 	= 'msj_info';		
						$mensaje 		= 'El usuario <mark>'.$usuario . '</mark> se actualizó en la base!!!';
						header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
					}
					else {
						$tipoMensaje	= 'msj_error';
						$mensaje 		= 'Error del tipo SQL <br> al intentar actualizar el usuario <mark>'.$usuario . '</mark> en la base';
						header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
					}
				} catch (Exception $e) {
					$mensaje = 'No se puede actualizar el usuario en la base!!!';
					$tipoMensaje = 'msj_error';
					header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
				}
			}
		}
	}catch (Exception $e) {
		$mensaje = 'Sucedio algun tipo de error imprevisto no se pudo gestionar el usuario en la base!!!';
		$tipoMensaje = 'msj_error';
		header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
	}
?>