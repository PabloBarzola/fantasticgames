<?php
    $titulo = "Editar Top Five";
    $perfil = 'usr_adm';
    
    include("includes/conexion.php");

    $con = "SELECT t.id_top_five id_top_five, 
                    t.id_juego id_juego, 
                    t.titulo titulo, 
                    t.leyenda leyenda,
                    j.nombre nombre, 
                    j.rom_sms rom_sms
               FROM top_five as t, juego as j
              WHERE j.id_juego = t.id_juego
              ORDER BY t.id_top_five ASC";
    
    $con_ej = mysqli_query($conexion, $con);

    if ($con_ej==false){
        $perfil 		= 'usr_adm';
        $tipoMensaje	= 'msj_error';    
        $mensaje        = '<mark>Problema para desplegar TOP FIVE</mark> <br>Error interno del tipo SQL';
        header("location: despliegaMensaje.php?mensaje=$mensaje&tipo=$tipoMensaje&perfil=$perfil");
    }

    $con2 = "SELECT id_juego, nombre
               FROM juego            
              ORDER BY nombre ASC";

    $con2_ej = mysqli_query($conexion, $con2);

    if ($con2_ej==false){
        $perfil 		= 'usr_adm';
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
    <title>Fantastic Games - Editar Top Five</title>
    <link rel="shortcut icon" href="imagenes/fg.ico">
    <link href="https://fonts.googleapis.com/css?family=Gugi|Michroma&display=swap" rel="stylesheet">
</head>

<body onload="document.frmUsuario.usuario.focus();">
    <!-- Agrego cabecera (logo y menú ) -->
    <?php 
        include("includes/cabecera_adm.html");
    ?>

    <div class="ingreso_datos">

        <h1><?php echo $titulo ?></h1>
        <br>
        <form class="formTopFive" action="editarTopFive_pr.php" method="post" name="frmTopFive">

            <?php

                $cont = 1;

                while($reg = mysqli_fetch_array($con_ej)){
                    echo "<br>";
                    echo "<div>";
                    echo "<label class='lbl_form' for='tfTitulo".$cont."'>Titulo ".$cont."</label>";
                    echo "<input type='text' class='tfTitulo".$cont."' name='tfTitulo".$cont."' id='tfTitulo".$cont."' required
                                value='".$reg['titulo']."' />";
                    echo "</div>";
                    echo "<br>";                    
                    /************************************************************/
                    echo "<div>";
                    echo "<label class='lbl_form' for='tfJuego".$cont."'>Juego ".$cont."</label>";
                    echo "<select id='tfJuego".$cont."' name='tfJuego".$cont."' class='tfJuego".$cont."'>";
                    $con2_ej = mysqli_query($conexion, $con2);
                    while($reg2 = mysqli_fetch_array($con2_ej)){

                        if ($reg2['id_juego']==$reg['id_juego']){
                            $seleccionado='selected';
                        }else{
                            $seleccionado='';
                        }

                        echo "<option value='" . $reg2['id_juego'] . "'". $seleccionado. ">". $reg2['nombre'] ."</option>";
                    }
                    mysqli_free_result($con2_ej);
                    echo "</select>";
                    echo "</div>";                    
                    echo "<br>";
                    /************************************************************/
                    echo "<div>";
                    echo "<label class='lbl_form' for='tfLeyenda".$cont."'>Leyenda ".$cont."</label>";
                    echo "<textarea name='tfLeyenda".$cont."' cols='40' rows='15'>".$reg['leyenda']."</textarea>";
                    echo "</div>";
                    echo "<br>";
                    echo "<hr>";
                    $cont++;               
                }
            ?>

            <br><br>

            <input type="submit" value="Guardar" class="btn_contacto" name="button">            
            <input type="button" name="button" value="Cancelar" class="btn_contacto" onClick="location.href='despliegaMensaje.php?perfil=<?php echo $perfil;?>'">
            
            <br><br>            
        </form>                        
    </div>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="includes.js"></script> 

</body>
</html>