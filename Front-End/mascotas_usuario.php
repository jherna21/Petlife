<?php
    include("../Back-End/seguridad.php");
    header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Lista de mascotas usuario - Pet Life Veterinario</title>
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
        <h2>Lista de mascotas para el usuario</h2>
        <br><br>
        <div id="contenedor-centrado" class="table">
            <table>
                <tr>
                    <td>
                        Mascota 1
                    </td>
                    <td >
                        Mascota 2
                    </td>
                    <td>
                        Mascota 3
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#">Editar datos</a>
                    </td>
                    <td>
                        <a href="#">Editar datos</a>
                    </td>
                    <td>
                        <a href="#">Editar datos</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#">Diagnóstico/Tratamiento</a>
                    </td>
                    <td>
                        <a href="#">Diagnóstico/Tratamiento</a>
                    </td>
                    <td>
                        <a href="#">Diagnóstico/Tratamiento</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#">Eliminar</a>
                    </td>
                    <td>
                        <a href="#">Eliminar</a>
                    </td>
                    <td>
                        <a href="#">Eliminar</a>
                    </td>
                </tr>
            </table>
        </div><br><br><br><br><br><br><br><br><br><br><br><br>
        
        <div>
            <form action="" method="post">
                <input type="button" class="button" onclick="location.href = 'nueva_mascota.php'" value="Nueva Mascota">
                <input type="button" class="button" onclick="location.href = 'datos_usuario.php'" value="Regresar">
            </form>
        </div>
    </body>
</html>