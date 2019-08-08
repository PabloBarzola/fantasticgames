<?php
    if (isset($_GET['mensaje'])===false) $mensaje = '';
    else $mensaje = $_GET['mensaje'];

    // msj_error o msj_info
    if (isset($_GET['tipo'])===false) $tipo = 'msj_info';
    else $tipo = $_GET['tipo'];

    // usr_comun o usr_adm
    if (isset($_GET['perfil'])===false) $perfil = 'usr_comun';
    else $perfil = $_GET['perfil'];
?>

<!DOCTYPE html>
<html lang="es">
<head>    
    <link href="style.css" rel="stylesheet">    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantastic Games - Mensaje</title>    
    <link rel="shortcut icon" href="imagenes/fg.ico">
    <link href="https://fonts.googleapis.com/css?family=Gugi|Michroma&display=swap" rel="stylesheet">
</head>

<body>
    <?php 
        if ($perfil==='usr_comun') include("includes/cabecera.html");
        else include("includes/cabecera_adm.html");        
    ?>

    <div class="ingreso_datos">
        <br><br><br><br>
        <h1><?php echo $mensaje ?></h1>
        <br><br><br><br>
    </div>

    <?php
        if ($perfil==='usr_comun') include("includes/pie.html");
    ?>
  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="includes.js"></script> 

</body>
</html>