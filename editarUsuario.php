<?php

    if (isset($_GET['id'])===false) {
        $id_usuario     = 0;
        $titulo         = "Agregar Usuario";
        $usuario        = '';
        $ndo            = '';
        $estado         = "<option value='1'selected>activo</option>
                           <option value='0'>inactivo</option>";
        $editUsuario    = 'required';        
    }
    else {
        $id_usuario     = $_GET['id'];
        $usuario        = $_GET['usuario'];
        $ndo            = $_GET['ndo'];

        if ($_GET['estado']=='activo'){
            $estado = "<option value='1' selected>activo</option>
                       <option value='0'>inactivo</option>";
        }else{
            $estado = "<option value='1'>activo</option>
                       <option value='0' selected>inactivo</option>";
        }

        $titulo         = "Editar Usuario";
        $editUsuario    = 'readonly';
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>    
    <link href="style.css" rel="stylesheet">    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantastic Games - Editar Usuario</title>
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

        <form class="formUsuario" action="editarUsuario_pr.php" method="post" name="frmUsuario">

            <input name="id_usuario" type = "hidden" value="<?php echo $id_usuario; ?>">

            <div>
                <label class="lbl_form" for="usuario">Nombre Usuario</label>
                <input type="text" class="usuario" name="usuario" id="usuario" 
                       maxlength = 40 minlength = 8 required <?php echo $editUsuario; ?>
                       value="<?php echo $usuario; ?>" 
                />
            </div>

            <br><br>

            <div>            
                <label class="lbl_form" for="password">Contraseña</label>
                <input type="password" class="password" name="password" id="password" 
                       maxlength = 40 minlength = 6 required value="<?php echo $ndo ?>"/>
            </div>

            <br><br>

            <div>
              <label for="estado" class="control-label">Estado</label>              
              <select id="estado" name="estado" class="btn_contacto">
                <?php echo $estado?>
              </select>             
            </div> 

            <br><br>

            <input type="submit" value="Guardar" class="btn_contacto" name="button">            
            <input type="button" name="button" value="Cancelar" class="btn_contacto" onClick="location.href='listUsuarios.php'">
            
            <br><br>            
        </form>                        
    </div>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="includes.js"></script> 

</body>
</html>