<!DOCTYPE html>
<html lang="es">
<head>
    
    <link href="style.css" rel="stylesheet">    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantastic Games - Login</title>    
    <link rel="shortcut icon" href="imagenes/fg.ico">
    <link href="https://fonts.googleapis.com/css?family=Gugi|Michroma&display=swap" rel="stylesheet">
</head>

<!--<body onload="document.frmEquipo.txtUsuario.focus();"> -->
<body onload="document.frmLogin.usuario.focus();">
    <!-- Agrego cabecera (logo y menú ) -->
    <?php include("includes/cabecera.html");?>

    <div class="ingreso_datos"> <!-- antes class="contactos"-->
    
        <h1>Ingreso modo Administrador</h1>
        <br>
        <form action="login_pr.php" method="post" name="frmLogin" autocomplete=off>
            <label>Usuario</label>
            <br>            
            <input  type="text"
                    name="usuario"
                    id="usuario"
                    maxlength = 40
                    minlength = 8 
                    required>
            <br>            
            <br>
            <label>Password</label>
            <br>
            <input  type="password"
                    name="clave"
                    id="clave"
                    maxlength = 40
                    minlength = 6 required>
            <br><br><br>
            <input type="submit" value="Entrar" class="btn_contacto" name="button">
            <br><br><br>
        </form>
    </div>

    <!-- Agrego el pie de página -->
    <?php include("includes/pie.html");?>
  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="includes.js"></script> 
    
</body>
</html>