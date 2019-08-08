<?php

    $genero = " <option value='1'>Destacados</option>
                <option value='2'>Acción</option>
                <option value='3'>Aventura</option>                  
                <option value='4'>Menejo</option>                  
                <option value='5'>RPG</option>                  
                <option value='6'>Disparos</option>                  
                <option value='7'>Deportes</option>";

    if (isset($_GET['id'])===false) {
        $idJuego        = 0;
        $titulo         = 'Agregar Juego';
        $nombre         = '';
        $rom_sms        = '';
        $descripcion    = '';
        $imagen         = '';
        $estado         = "<option value='1'selected>activo</option>
                           <option value='0'>inactivo</option>";
        $alt            = '';

    }
    else {
        $idJuego = $_GET['id'];
        $titulo = "Editar Juego";        
    
        include("includes/conexion.php");

        $con = "SELECT j.id_juego id_juego, j.nombre nombre, j.imagen imagen, j.alt alt, 
                       j.rom_sms rom_sms, j.descripcion descripcion,
                       ifnull(j.estado,0)=1 estado, g.nombre genero
                  FROM juego as j, genero as g
                 WHERE g.id_genero = j.id_genero             
                   AND j.id_juego = ". $idJuego;

        $con_ej = mysqli_query($conexion, $con);
        $reg = mysqli_fetch_assoc($con_ej);

        $nombre         = $reg['nombre'];

        switch ($reg['genero']) {
            case 1:
                str_replace("value='1'","value='1' selected",$genero);
                break;
            case 2:
                str_replace("value='2'","value='2' selected",$genero);
                break;
            case 3:
                str_replace("value='3'","value='3' selected",$genero);
                break;
            case 4:
                str_replace("value='4'","value='4' selected",$genero);
                break;
            case 5:
                str_replace("value='5'","value='5' selected",$genero);
                break;
            case 6:
                str_replace("value='6'","value='6' selected",$genero);
                break;
            case 7:
                str_replace("value='7'","value='7' selected",$genero);
                break;
        }

        $rom_sms        = $reg['rom_sms'];
        $descripcion    = $reg['descripcion'];
        $imagen         = $reg['imagen'];
        $alt            = $reg['alt'];

        if ($reg['estado']==1){
            $estado = "<option value='1' selected>activo</option>
                       <option value='0'>inactivo</option>";
        }else{
            $estado = "<option value='1'>activo</option>
                       <option value='0' selected>inactivo</option>";
        }

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>    
    <link href="style.css" rel="stylesheet">    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantastic Games - Editar Juego</title>    
    <link rel="shortcut icon" href="imagenes/fg.ico">
    <link href="https://fonts.googleapis.com/css?family=Gugi|Michroma&display=swap" rel="stylesheet">
</head>

<body onload="document.frmJuego.nombre.focus();">
    <!-- Agrego cabecera (logo y menú ) -->
    <?php 
        include("includes/cabecera_adm.html");
    ?>

    <div class="ingreso_datos"> 
    
        <h1><?php echo $titulo ?></h1>
        <br>

        <form class="formJuego" action="editarJuego_pr.php" method="post" name="frmJuego" enctype="multipart/form-data">

            <input name="id_juego" type = "hidden" value="<?php echo $idJuego; ?>">

            <div>
                <label class="lbl_form" for="name">Nombre</label>

                <input type="text" class="text" name="nombre" id="nombre" required
                       value="<?php echo $nombre; ?>" 
                />
            </div>

            <br>

            <div>
                <label for="genero" class="lbl_form">Genero</label>              
                <select id="genero" name="genero" class="form-control">
                    <?php echo $genero; ?>                    
                </select>  
            </div>

            <br>

            <div>
                <label class="lbl_form" for="rom_sms">ROM / SMS</label>
                <input type="text" class="rom_sms" name="rom_sms" id="rom_sms" 
                value="<?php echo $rom_sms?>" required>
            </div>

            <br>

            <div>            
                <label class="lbl_form" for="descripcion">Descripcion</label>
                <input type="text" class="descripcion" name="descripcion" id="descripcion" required 
                       value="<?php echo $descripcion; ?>" />
            </div>

            <br>


            <div>
                <label class="lbl_form" for="imagen">Imagen</label>
                <input type="text" class="imagen" name="archivoImagen" id="archivoImagen" required
                       value="<?php echo $imagen; ?>" />
            </div>

            <br>

            <div>
                <label class="lbl_form" for="alt">Descripción imagen</label>
                <input type="text" class="alt" name="alt" id="alt" required 
                        value="<?php echo $alt; ?>" />
            </div>

            <br>

            <div>
                <label for="estado" class="control-label">Estado</label>              
                <select id="estado" name="estado" class="estado">
                    <?php echo $estado;?>
              </select>             
            </div> 

            <br>

            <input type="submit" value="Guardar" class="btn_contacto" name="button">            
            <input type="button" name="button" value="Cancelar" class="btn_contacto" onClick="location.href='listJuegos.php'">
            
            <br>
            <br>
            
        </form>
                        
    </div>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="includes.js"></script> 

</body>
</html>