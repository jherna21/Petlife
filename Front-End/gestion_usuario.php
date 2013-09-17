<?php
    include("../Back-End/seguridad.php");
    header('Content-Type: text/html; charset=utf-8'); 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Gestionar usuario - Pet Life Veterinario</title>
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
        <h2>Buscar usuario</h2><br>

        <section class="formRegistro">
            <form action="" method="post">
                <label class="label">Cédula: </label>
                <input type="text" class="input" placeholder="cédula">

                <div>
                    <input type="submit" class="button" value="Buscar" style="margin-left: 110px;">
                    <!--<input type="button" class="button" onclick="location.href = 'principal_veterinario.php'" value="Regresar">-->
                </div>
            </form>
        </section>

        <div>
            <a href="datos_usuario.php">Pepito Pérez</a>
        </div>
    </body>
</html>