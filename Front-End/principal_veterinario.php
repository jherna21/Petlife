<?php include("../Back-End/seguridad.php");?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Pet Life Veterinario</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/normalize.css">
	<script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
	<script src='../js/jquery.modal.js'></script>
	<script src='../js/site.js'></script>
</head>
<body>
	<section class="centerUp">
		<h1>Veterinaria: <?php // echo $_SESSION["veterinariaActual"];?></h1>
		<h2>¡Bienvenido al sistema!</h2>
		<p>Veterinario: <?php echo $_SESSION["usuarioActual"];?> </p><br>
		<a id="a" href="nuevo_usuario.php">Nuevo Usuario</a>
		<a id="a" href="gestion_usuario.php">Gestionar usuario</a>
		<a href="../Back-End/logout.php">Salir</a>
	</section>
	
	<div class="animales">
		<IMG SRC="../img/perro-gato.png">
	</div>
</body>
</html>