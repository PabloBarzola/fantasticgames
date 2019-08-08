<?php

    // Obtengo el perfil del usuario para definir el menu a deplegar
    // el perfil puede ser usuario comun sin loguear o usuario logueado
    // "usr_comun" o "usr_adm" 
    if (isset($_GET['perfil'])===false) $perfil='usr_comun';
    else $perfil = $_GET['perfil']; //usr_adm
    
    if (isset($_GET['idGenero'])===true && isset($_GET['titulo'])===true){
        $idGenero = $_GET['idGenero'];
        $titulo = $_GET['titulo'];
    }
    else{
        $idGenero = 1;
        $titulo = 'Juegos Destacados';
    }

    include("includes/conexion.php");

    $con = "SELECT nombre, imagen, alt, rom_sms
              FROM juego
             WHERE id_genero= " . $idGenero . " AND estado=1 ";

    $con_ej = mysqli_query($conexion, $con);

    if ($con_ej==false){
        $perfil 		= 'usr_comun';
        $tipoMensaje	= 'msj_error';    
        $mensaje        = '<mark>Problema para desplegar los juegos</mark> <br>Error interno del tipo SQL';
        header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
    }

    $con2 = "SELECT t.id_top_five id_top_five, 
                    t.id_juego id_juego, 
                    t.titulo titulo, 
                    t.leyenda leyenda,
                    j.nombre nombre, 
                    j.rom_sms rom_sms
               FROM top_five as t, juego as j
              WHERE j.id_juego = t.id_juego
              ORDER BY id_top_five ASC";

    $con2_ej = mysqli_query($conexion, $con2);

    if ($con2_ej==false){
        $perfil 		= 'usr_comun';
        $tipoMensaje	= 'msj_error';    
        $mensaje        = '<mark>Problema para desplegar TOP FIVE</mark> <br>Error interno del tipo SQL';
        header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>    
    <link href="style.css" rel="stylesheet">    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantastic Games</title>    

    <link rel="shortcut icon" href="imagenes/fg.ico">

    <link href="https://fonts.googleapis.com/css?family=Gugi|Michroma&display=swap" rel="stylesheet">
</head>

<body>   

    <?php 
        if ($perfil==='usr_comun') {            
            include("includes/cabecera.html");
            include("includes/main_usr.php");
            include("includes/pie.html");
        }            
        else {
            include("includes/cabecera_adm.html");    
        }
    ?>
    
    <script defer src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script defer src="includes.js"></script> 

</body>
</html>