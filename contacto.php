<!DOCTYPE html>
<html lang="es">
<head>
    
    <link href="style.css" rel="stylesheet">    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantastic Games - Contacto</title>
    <link rel="shortcut icon" href="imagenes/fg.ico">
    <link href="https://fonts.googleapis.com/css?family=Gugi|Michroma&display=swap" rel="stylesheet">
</head>

<body onload="document.frmContacto.nombre.focus();">
    <!-- Agrego cabecera (logo y menú ) -->
    <?php include("includes/cabecera.html");?>

    <div class="ingreso_datos">
    
        <h1>Formulario de Contacto</h1>
        <br>
        <form action="enviar.php" method="post" name="frmContacto">
            <label>Ingresa tu nombre</label>
            <br>
            <input type="text" name="nombre" id="nombre" required>
            <br><br>            
            <label>Ingresa tu dirección de email</label>
            <br>
            <input type="email" name="email" id="email" required>
            <br><br>
            <label>Mensaje</label>
            <br>
            <textarea name="mensaje" id="mensaje" required></textarea>
            <br>
            <br>

            <label class="no">
                <input type="submit" value="Enviar" class="btn_contacto">
            </label>
            <input type="reset" value="Borrar" class="btn_contacto">

            <br><br><br><br>
        </form>
    </div>

    <!-- Agrego el pie de página -->
    <?php include("includes/pie.html");?>
  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="includes.js"></script> 

</body>
</html>