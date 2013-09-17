<?php
    include("../Back-End/seguridad.php");
    header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Crear nuevo usuario - Pet Life Veterinario</title>
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
        <h2>Crear nuevo usuario</h2>
        
        <section class="formRegistro">
            <form action="" method="post">
                <label class="label">Nombre: </label>
                <input type="text" class="input" name="nombre" placeholder="nombre"><br>

                <label class="label">Apellido: </label>
                <input type="text" class="input" name="apellido" placeholder="apellido"><br>

                <label class="label">Cédula: </label>
                <input type="text" class="input" name="cedula" placeholder="cédula"><br>

                <label class="label">Correo: </label>
                <input type="text" class="input" name="correo" placeholder="correo"><br>

                <label class="label">Teléfono: </label>
                <input type="text" class="input" name="telefono" placeholder="teléfono"><br>

                <label class="label">Dirección: </label>
                <input type="text" class="input" name="direccion" placeholder="dirección"><br><br>

                <div>
                    <input type="submit" class="button" value="Registrar" style="margin-left: 110px;">
                    <!--<input type="button" class="button" onclick="location.href = 'principal_veterinario.php'" value="Regresar">-->
                </div>
            </form>
        </section>
    </body>
</html>