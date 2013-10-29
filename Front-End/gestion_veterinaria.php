<?php
    include("../Back-End/seguridad.php");
    header('Content-Type: text/html; charset=utf-8'); 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Gestionar Veterinaria - Pet Life Administrador</title>
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/normalize.css">
		<script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
		<script src='../js/jquery.modal.js'></script>
		<script src='../js/site.js'></script>   
        <script src="../js/gestion_usuario.js" type="text/javascript"></script>     
    </head>
    <body>
        <div class="usuario">
            <strong><?php echo $_SESSION["usuarioActual"];?> </strong> &nbsp;
            <a href="principal_admin.php">inicio</a>&nbsp;
            <a href="../Back-End/logout.php">Salir </a>&nbsp;
            
        </div>
        <br>
        <h2>Buscar usuario</h2><br>

        <section class="formRegistro">
            <form  method="post">
                <label class="label">Nombre Veterinaria: </label>
                <input type="text" class="input" placeholder="nombre" id="pattern">

                <div>
                    <input id="btnBuscar" type="button" value="Buscar" class="button" style="margin-left: 110px;">
                    <!--<input type="button" class="button" onclick="location.href = 'principal_veterinario.php'" value="Regresar">-->
                </div>
            </form>
        </section>                
        <section id="result"> 
        </section>                 
        <section id="info" class="formRegistro" hidden> 
            <form method="post">                                
                <label class="label">Dirección: </label>
                <input type="text" class="input" id="direccion" placeholder="direccion"><br>

                <label class="label">Teléfono: </label>
                <input type="text" class="input" id="telefono" placeholder="teléfono"><br>
                
                <div>
                    <input id ="btnGuardar" type="button" class="button" value="Guardar" style="margin-left: 110px;">
                    <!--<input type="button" class="button" onclick="location.href = 'principal_veterinario.php'" value="Regresar">-->
                </div>
            </form>
        </section>      
        <section id="respuesta">
        </section>                    
    </body>
</html>