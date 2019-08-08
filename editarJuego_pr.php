<?php

    $id_juego       = $_POST['id_juego'];
    $nombre         = $_POST['nombre'];
    $id_genero      = $_POST['genero'];
    $rom_sms        = $_POST['rom_sms'];
    $descripcion    = $_POST['descripcion'];
    $archivoImagen  = $_POST['archivoImagen'];
    $alt            = $_POST['alt'];
    $estado         = $_POST['estado'];

	$perfil 	= 'usr_adm';
/*
    echo "GRABANDO!";
    echo "----------------------------------------------";
    echo "id_juego:" .$id_juego;
    echo "nombre: " . $nombre;
    echo "genero: " . $id_genero;
    echo "rom_sms: " . $rom_sms;
    echo "descripcion: " .$descripcion;
    echo "archivoImagen: " . $archivoImagen;
    echo "alt: ". $alt;
    echo "estado: " . $estado;
*/
	include("includes/conexion.php");
	
	$con = "SELECT id_juego
			  FROM juego
			 WHERE nombre = '$nombre'";

	$con_ej = mysqli_query($conexion, $con);
	$cant 	= mysqli_num_rows($con_ej);
	$reg 	= mysqli_fetch_array($con_ej);

	try{
		if($con_ej == false) {
			$tipoMensaje 	= 'msj_error';
			$mensaje 		= 'Error interno SQL, no se puede gestionar el juego';		
            header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
		}else{
			if ($id_juego==='0'){ //juego nuevo
				if($cant>0){
					$tipoMensaje 	= 'msj_info';
                	$mensaje 		= 'El juego <mark>'.$nombre . '</mark> ya existe en la base!!! <br><br> Por favor agregue usuario con otro nombre';
					header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
				}else{ 
					// Insertar el juego en la base
					// -------------------------------
					try {
						$insertar = "INSERT INTO juego (id_juego, nombre, id_genero, 
						rom_sms, descripcion, imagen, estado, alt) 
						VALUES(NULL, '$nombre',$id_genero,'$rom_sms','$descripcion',
						'$archivoImagen',$estado,'$alt')";
							   
						$insertar_ej = mysqli_query($conexion, $insertar);

						if($insertar_ej == true) {
							$tipoMensaje 	= 'msj_info';
							$mensaje 		= 'El juego <mark>'.$nombre . '</mark> se agregó a la base!!!';
							header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
						}
						else {
							$tipoMensaje	= 'msj_error';
							$mensaje 		= 'Error del tipo SQL <br> al intentar insertar el juego <mark>'.$nombre . '</mark> en la base';
							header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
						}
					} catch (Exception $e) {					
						$mensaje = 'No se pudo agregar el juego a la base!!!';
						$tipoMensaje = 'msj_error';
						header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
					}					
				}					
			}else{ // editar juego
				// Actualizar el juego en la base
				try {
						$actualizar = "UPDATE juego 
								  	      SET nombre = '$nombre',
											  id_genero = $id_genero,
											  rom_sms = '$rom_sms',
											  descripcion = '$descripcion',
											  imagen = '$archivoImagen',
											  estado = $estado,
											  alt = '$alt' 
									    WHERE id_juego = $id_juego";

						$actualizar_ej = mysqli_query($conexion, $actualizar);

						if($actualizar_ej == true) {
							$tipoMensaje 	= 'msj_info';		
							$mensaje 		= 'El juego <mark>'.$nombre . '</mark> se actualizó en la base!!!';
							header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
						}
						else {
							$tipoMensaje	= 'msj_error';
							$mensaje 		= 'Error del tipo SQL <br> al intentar actualizar el juego <mark>'.$nombre . '</mark> en la base';
							header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
						}
				} catch (Exception $e) {
					$mensaje = 'No se puede actualizar el juego en la base!!!';
					$tipoMensaje = 'msj_error';
					header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
				}
			}
		}
	}catch (Exception $e) {
		$mensaje = 'Sucedio algun tipo de error imprevisto no se pudo gestionar el juego en la base!!!';
		$tipoMensaje = 'msj_error';
		header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
	}

?>