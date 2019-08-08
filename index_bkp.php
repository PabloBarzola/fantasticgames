<?php

    // Obtengo el perfil del usuario para definir el menu a deplegar
    // el perfil puede ser usuario comun sin loguear o usuario logueado
    // "usr_comun" o "usr_adm" 
    if (isset($_GET['perfil'])===false) $perfil='usr_comun';
    else $perfil = $_GET['perfil']; 
    
    if (isset($_GET['idGenero'])===true && isset($_GET['titulo'])===true){
        $idGenero = $_GET['idGenero'];
        $titulo = $_GET['titulo'];
    }
    else{
        $idGenero = 1;
        $titulo = 'Juegos Destacados';
    }

    include("includes/conexion.php");

    $con = "SELECT nombre, imagen, alt 
              FROM juego
             WHERE id_genero= " . $idGenero . " AND estado=1 ";

    $con_ej = mysqli_query($conexion, $con);
?>

<!DOCTYPE html>
<html lang="es">
<head>    
    <link href="style.css" rel="stylesheet">    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantastic Games</title>    
    <link href="https://fonts.googleapis.com/css?family=Gugi|Michroma&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Agrego cabecera (logo y menú ) -->

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

    <header class="subtitulos">
        <div class="subtitulo_1">
            <h1><?php echo $titulo; ?></h1>
        </div>

        <div class="subtitulo_2">
            <h1>Top Five</h1>
        </div>
    </header>
    
    <main class="cuerpo">
        <section class="cuerpo_juegos">

            <?php
                while($reg = mysqli_fetch_array($con_ej)){
                    echo "<a title='".$reg['nombre']."' href='#'>";
                    echo "<img class='c' src='imagenes/caratulas/".$reg['imagen']."' alt='".$reg['alt']."'/>";
                    echo "</a>";
                }
            ?>
        </section> <!-- cuerpo_juegos -->   

        <aside class="cuerpo_novedades">            
            <br>
            <a href="juego_AlexKidd.html" class="subtitulo_novedades">1. Alex Kidd in Miracle World (Sega, 1987)</a> 
            <br>
            <p>El primer juego de la serie Alex Kidd es probablemente el más popular y el más recordado por todos los jugadores. No en vano, hablamos de un título que venía integrado con la mayoría de las Master System, pero mentiríamos si dijésemos que solo por eso es conocido: se trata de un plataformas brillante (con ligeros toques de rol y estrategia) de gran factura técnica que era capaz de hacer frente al Super Mario Bros. de NES. Por desgracia, y como os estáis imaginando, el fontanero salió ganando, pero eso no impidió que por un tiempo el pequeño Alex fuese la mascota de la compañía.</p>

            <a href="juego_AlexKidd.html" class="subtitulo_novedades">2. Wonderboy (Sega, 1986)</a>
            <br>
            <p>Este pequeño cavernícola nos hizo pasar tardes que jamás olvidaremos mientras intentábamos salvar a su novia, y nos enseñó lo divertido que era patinar mucho antes de que conociéramos a Tony Hawk. Pese a ser un port de la versión para recreativas, el primer Wonder Boy de Master System es una auténtica joya: Niveles amplios muy diferenciados (bosques, montañas, cuevas, palacios de hielo...), power-ups (hacha de piedra para lanzar, monopatín y protección angelical) y saltos, muchos saltos. Además, esta versión incluía dos nuevos niveles que no estaban presentes en la versión original, ampliando aún más la aventura. ¡Ojo con los huevos malos!</p>

            <a href="juego_AlexKidd.html" class="subtitulo_novedades">3. Sonic the Hedgehog (Ancient, 1991)</a>
            <br>
            <p>El título de mascota de Sega le fue arrebatado a Alex Kidd casi sin darse cuenta: lo único que llegó a ver fue como una estela azul pasaba a toda velocidad frente a sus narices. Hablamos, como no podía ser de otra manera, del gran Sonic, que no contento con triunfar en Mega Drive con su primer juego, decidió pasarse a recolectar anillos también en Master System. Se trata de un port de esa primera versión, pero pese a las limitaciones técnicas en comparación con su hermana mayor, el juego sigue siendo igual de frenético y divertido. Además, los notables cambios en la música y en el diseño de los niveles hacían de esta versión en 8 bits del erizo azulado un juego prácticamente nuevo.</p>

            <a href="juego_AlexKidd.html" class="subtitulo_novedades">4. Phantasy Star (Sega RD4, 1988)</a>
            <br>
            <p>Phantasy Star fue desarrollado con la intención de crear una franquicia rolera que compitiera con el (por aquel entonces) reciente The Legend of Zelda de NES, y se podría decir que lo consiguió. Considerado por muchos como uno de los padres de los juegos de rol actuales, contaba con elementos que hoy en día son bien conocidos: perspectiva cenital para caminar por el overworld, que rompe a primera persona cuando tienen lugar los combates aleatorios que se desarrollan por turnos. Además poseía un apartado gráfico de infarto que en ocasiones simulaba un efecto 3D, algo que en aquella época nos dejó a todos con la boca abierta. Por si esto fuera poco, fue uno de los primeros videojuegos de la historia en que el protagonista principal era una mujer: Alis, la joven que se ve  envuelta en una trama de intrigas políticas y que, junto a sus compañeros de viaje, tendrá que hacer frente al estado totalitario en que se encuentra sumido el reino de Algol. Un juego gigantesco para su época.</p>

            <a href="#" class="subtitulo_novedades">5. Sonic the Hedgehog 2 (Aspect, 1992)</a>
            <br>
            <p>La primera parte de Sonic en Mega Drive fue relativamente sencilla de llevar a Master System, pero Sonic the Hedgehog 2 incorporaba semejante cantidad de añadidos tanto jugables como gráficos que era imposible recrearlo en la consola de 8 bits. Así que en lugar de un port, se optó por realizar un juego totalmente diferente de la versión original, pero igualmente divertido: cada fase nos ponía en una situación distinta, como montar en las carretillas de una mina o en ala delta, consiguiendo que avanzar por los niveles fuese una sucesión de sorpresas que nunca se hacían aburridas. Además, el apartado gráfico del juego exprimía tan al límite las características de Master System que por momentos es fácil olvidarse de que se trata de un juego de 8 bits.</p>
        </aside> <!-- cuerpo_novedades -->
    </main> <!--cuerpo -->

    <!-- Agrego el pie de página -->
    <?php 
        if ($perfil==='usr_comun') include("includes/pie.html");       
    ?>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="includes.js"></script> 

</body>
</html>