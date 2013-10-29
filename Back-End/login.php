<?php

    include ("../Control/conexion.php");

    /* El query valida si el usuario ingresado existe en la tabla de veterinarios de la base de datos.
     * Se utiliza la función htmlentities para evitar inyecciones SQL.
     */
    $selectUsuario = mysql_query("SELECT usuario_veterinario FROM veterinario WHERE
        usuario_veterinario = '".htmlentities(isset($_POST["inpUsuario"])?$_POST["inpUsuario"]:NULL)."'");
    $numUsuario = mysql_num_rows($selectUsuario);

    /* El query valida si el usuario ingresado existe en la tabla de administradores de la base de datos.
     * Se utiliza la función htmlentities para evitar inyecciones SQL.
     */
    $selectAdmin = mysql_query("SELECT nombre_admin FROM administrador WHERE
        usuario = '".htmlentities(isset($_POST["inpAdmin"])?$_POST["inpAdmin"]:NULL)."'");
    $numAdmin = mysql_num_rows($selectAdmin);

    /* Si existe el usuario, validamos también la contraseña ingresada y el
     * estado del usuario.
     */
    if ((isset($_POST["formLoginUsuario"])?$_POST["formLoginUsuario"]:NULL) == 1) {
	    if($numUsuario != 0) {
		    $sql = "SELECT usuario_veterinario FROM veterinario WHERE estado_veterinario = 1
				    AND usuario_veterinario = '".htmlentities($_POST["inpUsuario"])."'
				    AND clave_veterinario = '".(htmlentities($_POST["inpClaveUsuario"]))."'";
		    $claveUsuario = mysql_query($sql);
		    $numClaveUsuario = mysql_num_rows($claveUsuario);

		    /* Si el usuario y clave ingresado son correctos (y el usuario está
		     * activo en la BD), creamos la sesión del mismo.
		     */
		     if($numClaveUsuario != 0){
			    session_start();
			
			    // Guardamos dos variables de sesión que nos auxiliará para saber
			    // si se está o no "logueado" un usuario.
			    $_SESSION["autentica"] = "SIP";
			    $_SESSION["usuarioActual"] = mysql_result($claveUsuario, 0, 0);
			    //Direccionamos a la página principal del veterinario.
			    header ("Location: ../Front-End/principal_veterinario.php");
		     } else {
			    echo"<script>alert('La contrase\u00f1a del usuario no es correcta');
					    window.location.href=\"../index.html\"</script>";
		     }
	    } else {
		    echo"<script>alert('Usuario o Contrase\u00f1a err\u00f3neos');
				    window.location.href=\"../index.html\"</script>";
	    }
    } else {
	    if ($_POST["formLoginAdmin"] == 2) {
		    if($numAdmin != 0) {
			    $sql = "SELECT nombre_admin FROM administrador WHERE
					    usuario = '".htmlentities($_POST["inpAdmin"])."'
					    AND clave_admin = '".(htmlentities($_POST["inpClaveAdmin"]))."'";
			    $claveAdmin = mysql_query($sql);
			    //echo " ".($sql);
			    $numClaveAdmin = mysql_num_rows($claveAdmin);

			    /* Si el usuario y clave ingresado son correctos (y el usuario está
			     * activo en la BD), creamos la sesión del mismo.
			     */
			     if($numClaveAdmin != 0){
				    session_start();
				
				    // Guardamos dos variables de sesión que nos auxiliará para saber
				    // si se está o no "logueado" un usuario.
				    $_SESSION["autentica"] = "SIP";
				    $_SESSION["usuarioActual"] = mysql_result($claveAdmin, 0, 0);
				    //Direccionamos a la página principal del administrador.
				    header ("Location: ../Front-End/principal_admin.php");
			     } else {
				    echo"<script>alert('La contrase\u00f1a del usuario no es correcta');
						    window.location.href=\"../index.html\"</script>";
			     }
		    } else {
			    echo"<script>alert('Usuario o Contrase\u00f1a err\u00f3neos');
					    window.location.href=\"../index.html\"</script>";
		    }
	    }
    }

?>