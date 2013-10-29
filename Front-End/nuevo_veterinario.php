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
            <form method="post" action="../Back-End/nuevo_veterinario.php" name="nuevoUsuarioForm">
                <label class="label">Nombre: </label>
                <input type="text" class="input" name="nombre" placeholder="nombre"><br>

                <label class="label">Apellido: </label>
                <input type="text" class="input" name="apellido" placeholder="apellido"><br>   
                
                 <label class="label">Estado: </label>
                <input type="text" class="input" name="estado" placeholder="estado"><br>                  

                <label class="label">Correo: </label>
                <input type="text" class="input" name="correo" placeholder="correo"><br>

                <label class="label">Teléfono: </label>
                <input type="text" class="input" name="telefono" placeholder="teléfono"><br>

                <label class="label">Usuario: </label>
                <input type="text" class="input" name="usuario" placeholder="usuario"><br>

                <label class="label">Clave: </label>
                <input type="password" class="input" name="usuario" placeholder="usuario"><br>

                <label class="label">Veterinaria: </label>
                <input  type="text" class="input" name="veterinaria" placeholder="veterinaria"><br>

                <div>
                    <input type="submit" class="button" value="Registrar" style="margin-left: 110px;">
                    <!--<input type="button" class="button" onclick="location.href = 'principal_veterinario.php'" value="Regresar">-->
                </div>
            </form>
        </section>
    </body>
</html>