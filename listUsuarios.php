<?php    

    include("includes/conexion.php");

    $con = "SELECT id_usuario, 
                   usuario,
                   clave ndo,
                   ultLogin,                    
                   if(ifnull(estado,0)=1,'activo','inactivo') estado
              FROM usuario
             ORDER BY usuario asc";

    $con_ej = mysqli_query($conexion, $con);    
?>

<!DOCTYPE html>
<html lang="es">
<head>    
    <link href="style.css" rel="stylesheet">    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantastic Games - Administrar Usuarios</title>     
    
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
            <h1>Listado de Usuarios</h1>
        </div>
    </header>

    <main class="cuerpo_listado">

        <button type="button" class="btn_contacto" ><a href="editarUsuario.php" method="post">Nuevo Usuario</a></button>

        <br><br>

        <table >
			<tr>
                <td>id Usuario</td>
                <td>Usuario</td>
                <td>Estado</td>
                <td>Fecha último Login</td>
				<td>Acción</td>
			</tr>

		    <?php 
		        while($reg = mysqli_fetch_assoc($con_ej)){
		
                    echo "<tr>";				
                        echo "<td>".$reg['id_usuario']."</td>";
                        echo "<td>".$reg['usuario']."</td>";
                        echo "<td>".$reg['estado']."</td>";
                        echo "<td>".$reg['ultLogin']."</td>";                        
                        echo "<td>";
                        echo    "<button type='button' class='btn_contacto' src='imagenes/editar.png'><a href='editarUsuario.php?id=" . $reg['id_usuario'] . "&usuario=" . $reg['usuario']."&ndo=" . $reg['ndo']."&estado=" .$reg['estado']."'>Editar</a></button>";
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