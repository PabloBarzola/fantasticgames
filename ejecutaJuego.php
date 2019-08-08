<?php
	$nombre	= $_GET['nombre'];
	$sms	= $_GET['sms'];
?>

<!DOCTYPE HTML>
<html>
	<head>
		<!--<link rel="stylesheet" href="miracle.css" type="text/css">-->
		<link href="style.css" rel="stylesheet">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">		
	
		<title>Fantastic Game - Juego: <?php echo $nombre; ?></title> 
		<link rel="shortcut icon" href="imagenes/fg.ico">

		<script type="text/javascript" src="miracle/lib/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="miracle/lib/jquery.editable-1.3.3.min.js"></script>
		<script type="text/javascript" src="miracle/z80/z80_full.js"></script>
		<script type="text/javascript" src="miracle/z80/z80_ops_full.js"></script>
		<script type="text/javascript" src="miracle/z80/z80_dis.js"></script>
		<script type="text/javascript" src="miracle/vdp.js"></script>
		<script type="text/javascript" src="miracle/soundchip.js"></script>
		<script type="text/javascript" src="miracle/miracle.js"></script>
		<script type="text/javascript" src="miracle/debug.js"></script>
		<script type="text/javascript" src="miracle/benchmark.js"></script>
		<script type="text/javascript" src="miracle/roms.js"></script>
		<script type="text/javascript" src="miracle/main.js"></script>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="includes.js"></script> 

		<link href="https://fonts.googleapis.com/css?family=Gugi|Michroma&display=swap" rel="stylesheet">
</head>

	<script>
		$(function () {go("<?php echo $sms; ?>");});
   	</script>

	<?php
		include("includes/cabecera.html");
        include("includes/main_juego.php");
        include("includes/pie.html");
	?>

</html>