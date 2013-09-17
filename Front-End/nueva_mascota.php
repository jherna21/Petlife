<?php
    include("../Back-End/seguridad.php");
    header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Crear nueva mascota - Pet Life Veterinario</title>
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/normalize.css">
		<script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
		<script src='../js/jquery.modal.js'></script>
		<script src='../js/site.js'></script>
    </head>
    <body>
        <div class="usuario">
            <strong><?php echo $_SESSION["usuarioActual"];?> </strong> &nbsp;
            <a href="principal_veterinario.php">inicio</a>&nbsp;
            <a href="../Back-End/logout.php">Salir </a>&nbsp;
        </div>
        <br>
        <h2>Crear nueva mascota</h2>
        
        <section class="formRegistro">
            <form action="" method="post">
                <label class="label">Nombre: </label>
                <input type="text" class="input" name="nombre" placeholder="nombre"><br>

                <label class="label">Tipo: </label>
                <input type="text" class="input" name="tipo" placeholder="tipo"><br>

                <label class="label">Raza: </label>
                <input type="text" class="input" name="raza" placeholder="raza"><br>
                                
                <label class="label">Macho: </label><br>
                <input type="radio" class="input" name="macho"><br>

                <label class="label">Hembra: </label><br>
                <input type="radio" class="input" name="hembra"><br>
                
                <label class="label">Edad: </label>
                <input type="text" class="input" name="edad" placeholder="edad"><br>

                <label class="label">Fecha de nacimiento: </label>
                <input type="text" class="input" name="fecha" placeholder="fecha de nacimiento"><br>

                <div>
                    <input type="submit" class="button" value="Agregar" style="margin-left: 110px;">
                </div>
            </form>
        </section>
    </body>
</html>