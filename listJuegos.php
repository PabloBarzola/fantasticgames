<?php    

    include("includes/conexion.php");

    $con = "SELECT  j.id_juego id_juego,
                    j.nombre nombre, 
                    j.imagen imagen, 
                    j.alt alt,     
                   if(ifnull(j.estado,0)=1,'activo','inactivo') estado, g.nombre genero
              FROM juego as j, genero as g
             WHERE g.id_genero = j.id_genero
             ORDER BY j.nombre ASC"; //LIMIT 0,10;

    $con_ej = mysqli_query($conexion, $con);    
?>

<!DOCTYPE html>
<html lang="es">
<head>    
    <link href="style.css" rel="stylesheet">    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantastic Games - Administrar Juegos</title>    

    <link rel="shortcut icon" href="imagenes/fg.ico">

    <link href="https://fonts.googleapis.com/css?family=Gugi|Michroma&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Agrego cabecera (logo y menú ) -->
    <?php 
        include("includes/cabecera_adm.html");
    ?>

    <header class="subtitulos">
        <div class="subtitulo_1">
            <h1>Listado de Juegos</h1>
        </div>
    </header>

    <main class="cuerpo_listado">

        <button type="button" class="btn_contacto"><a href="editarJuego.php" method="post">Nuevo Juego</a></button>
        
        <br><br>

        <table >
			<tr>
                <td>Id Juego</td>
                <td>Nombre</td>
                <td>Estado</td>
                <td>Género</td>
				<td>Imagen</td>
				<td>Acción</td>
			</tr>

		    <?php 
		        while($reg = mysqli_fetch_assoc($con_ej)){		
                    echo "<tr>";				
                        echo "<td>".$reg['id_juego']."</td>";
                        echo "<td>".$reg['nombre']."</td>";
                        echo "<td>".$reg['estado']."</td>";
                        echo "<td>".$reg['genero']."</td>";
                        echo "<td><img width=150 heigth=150 src='imagenes/caratulas/".$reg['imagen']."' alt='" .$reg['alt']."' /> </td>";
                        echo "<td>";
                        echo    "<button type='button' class='btn_contacto' src='imagenes/editar.png'><a href='editarJuego.php?id=" . $reg['id_juego'] . "' method='post'>Editar</a></button>";                        
                        echo "</td>";
                    echo "</tr>";
                }
            ?>
		</table>

<!--
        <nav class="botonera_nav">
            <ul class="botonera_pag">
                <li><a href="#"><img width=50 heigth=20 src='imagenes/flecha_anterior_3.png'alt='Página siguiente'/></a></li>
                <li><a href="#"><img width=50 heigth=20 src='imagenes/flecha_siguiente_3.png'alt='Página siguiente'/></a></li>
            </ul>
        </nav>
-->
    </main> <!--cuerpo -->    
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="includes.js"></script> 

</body>
</html>