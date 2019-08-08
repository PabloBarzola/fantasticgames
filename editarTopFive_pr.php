<?php

	$tfTitulo1	= $_POST['tfTitulo1'];
	$tfTitulo2  = $_POST['tfTitulo2'];
	$tfTitulo3  = $_POST['tfTitulo3'];
	$tfTitulo4  = $_POST['tfTitulo4'];
	$tfTitulo5  = $_POST['tfTitulo5'];

	$tfJuego1	= $_POST['tfJuego1'];
	$tfJuego2	= $_POST['tfJuego2'];
	$tfJuego3	= $_POST['tfJuego3'];
	$tfJuego4	= $_POST['tfJuego4'];
	$tfJuego5	= $_POST['tfJuego5'];

	$tfLeyenda1	= $_POST['tfLeyenda1'];
	$tfLeyenda2	= $_POST['tfLeyenda2'];
	$tfLeyenda3	= $_POST['tfLeyenda3'];
	$tfLeyenda4	= $_POST['tfLeyenda4'];
	$tfLeyenda5	= $_POST['tfLeyenda5'];

	$perfil 	= 'usr_adm';
/*
    echo "GRABANDO!";
	echo "----------------------------------------------";
	echo "tfTitulo1: " . $tfTitulo1;
	echo "tfTitulo2: " . $tfTitulo2;
	echo "tfTitulo3: " . $tfTitulo3;
	echo "tfTitulo4: " . $tfTitulo4; 
	echo "tfTitulo5: " . $tfTitulo5; 
	echo "<br>";
	echo "tfJuego1: " . $tfJuego1; 
	echo "tfJuego2: " . $tfJuego2; 
	echo "tfJuego3: " . $tfJuego3; 
	echo "tfJuego4: " . $tfJuego4; 
	echo "tfJuego5: " . $tfJuego5; 
	echo "<br>";
	echo "tfLeyenda1: " . $tfLeyenda1;
	echo "tfLeyenda2: " . $tfLeyenda2;
	echo "tfLeyenda3: " . $tfLeyenda3;
	echo "tfLeyenda4: " . $tfLeyenda4;
	echo "tfLeyenda5: " . $tfLeyenda5;
*/

	include("includes/conexion.php");
	
try {

	/** 1 ******************************************************************************* */
	$actualizar = "UPDATE top_five SET id_juego = $tfJuego1, titulo = '" . $tfTitulo1 . "', leyenda = '". $tfLeyenda1. "' WHERE id_top_five = 1";
	$actualizar_ej = mysqli_query($conexion, $actualizar);

	if ($actualizar_ej === false){
		$tipoMensaje	= 'msj_error';
		$mensaje 		= 'Error del tipo SQL ('. $actualizar .') <br> al intentar actualizar TOP FIVE <mark>'. $tfTitulo1 . '</mark> en la base';
		header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
	}

	/** 2 ******************************************************************************* */

	$actualizar = "UPDATE top_five SET id_juego = $tfJuego2, titulo = '" . $tfTitulo2 . "', leyenda = '" . $tfLeyenda2 . "' WHERE id_top_five = 2";
	$actualizar_ej = mysqli_query($conexion, $actualizar);

	if ($actualizar_ej === false){
		$tipoMensaje	= 'msj_error';
		$mensaje 		= 'Error del tipo SQL <br> al intentar actualizar TOP FIVE <mark>'. $tfTitulo2 . '</mark> en la base';
		header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
	}

	/** 3 ******************************************************************************* */

	$actualizar = "UPDATE top_five SET id_juego = $tfJuego3, titulo = '" . $tfTitulo3 . "', leyenda = '" . $tfLeyenda3 . "' WHERE id_top_five = 3";
	$actualizar_ej = mysqli_query($conexion, $actualizar);

	if ($actualizar_ej === false){
		$tipoMensaje	= 'msj_error';
		$mensaje 		= 'Error del tipo SQL <br> al intentar actualizar TOP FIVE <mark>'. $tfTitulo3 . '</mark> en la base';
		header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
	}

	/** 4 ******************************************************************************* */

	$actualizar = "UPDATE top_five SET id_juego = $tfJuego4, titulo = '". $tfTitulo4 . "', leyenda = '" . $tfLeyenda4 . "' WHERE id_top_five = 4";
	$actualizar_ej = mysqli_query($conexion, $actualizar);

	if ($actualizar_ej === false){
		$tipoMensaje	= 'msj_error';
		$mensaje 		= 'Error del tipo SQL <br> al intentar actualizar TOP FIVE <mark>'. $tfTitulo4 . '</mark> en la base';
		header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
	}
	/** 5 ******************************************************************************* */

	$actualizar = "UPDATE top_five SET id_juego = $tfJuego5, titulo = '" . $tfTitulo5 . "', leyenda = '" . $tfLeyenda5 . "' WHERE id_top_five = 5";
	$actualizar_ej = mysqli_query($conexion, $actualizar);

	if ($actualizar_ej === false){
		$tipoMensaje	= 'msj_error';
		$mensaje 		= 'Error del tipo SQL <br> al intentar actualizar TOP FIVE <mark>'. $tfTitulo5 . '</mark> en la base';
		header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
	}
	
	/********************************************************************************* */

	$tipoMensaje	= 'msj_info';
	$mensaje 		= '<mark>Se actualizó el TOP FIVE en la base</mark>';
	header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");

} catch (Exception $e) {
	$mensaje = 'No se puede actualizar TOP FIVE en la base!!!';
	$tipoMensaje = 'msj_error';
	header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
}

?>