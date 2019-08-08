<?php
    $titulo = "Agregar Carátula";
    $perfil = 'usr_adm';
?>

<!DOCTYPE html>
<html lang="es">
<head>    
    <link href="style.css" rel="stylesheet">    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantastic Games - Agregar Carátula</title>

    <link rel="shortcut icon" href="imagenes/fg.ico">

    <link href="https://fonts.googleapis.com/css?family=Gugi|Michroma&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Agrego cabecera (logo y menú ) -->
    <?php 
        include("includes/cabecera_adm.html");
    ?>

    <div class="ingreso_datos">

        <h1><?php echo $titulo ?></h1>
        <br>

        <form class="formCaratula" action="subirCaratula_pr.php" method="post" name="formCaratula" enctype="multipart/form-data">
            
            <div>
                <label class="lbl_form" for="caratula">Seleccione una carátula</label>
                <br><br>
                <input type="file" class="caratula" name="caratula" id="caratula" 
                       accept=".png, .jpg, .jpeg, .webp" maxlength = 250 required />
            </div>

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