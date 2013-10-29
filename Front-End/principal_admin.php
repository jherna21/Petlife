<?php include("../Back-End/seguridad.php"); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Pet Life Administrador</title>
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/normalize.css">
		<script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
		<script src='../js/jquery.modal.js'></script>
		<script src='../js/site.js'></script>
	</head>
	<body>
		<section class="centerUp">
			<h1>Administradores PetLife: <?php // echo $_SESSION["veterinariaActual"];?></h1>
			<h2>Bienvenido al sistema!</h2>
			<p>Administrador: <strong><?php echo $_SESSION["usuarioActual"];?> </strong></p><br>
			<a id="a" href="nuevo_usuario.php">Nueva Veterinaria</a>
			<a id="a" href="gestion_veterinaria.php">Gestionar Veterinaria</a>
            <a id="a" href="nuevo_veterinario.php">Nuevo Veterinario</a>
			<a id="a" href="gestion_veterinario.php">Gestionar Veterinario</a>
			<a href="../Back-End/logout.php">Salir</a>
		</section>
		
		<div class="animales">
			<img SRC="../img/perro-gato.png" alt="La imágen no se pudo cargar">
		</div>
	</body>
</html>
