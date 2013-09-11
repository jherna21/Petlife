<?php

include ("/../Control/conexion.php");

/* El query valida si el usuario ingresado existe en la base de datos.
 * Se utiliza la funci�n htmlentities para evitar inyecciones SQL.
 */
$selectUsuario = mysql_query("SELECT usuario FROM veterinarios WHERE
       usuario = '".htmlentities($_POST["inpUsuario"])."'");
$numUsuario = mysql_num_rows($selectUsuario);

/* Si existe el usuario, validamos tambi�n la contrase�a ingresada y el
 * estado del usuario.
 */
if($numUsuario != 0) {
	$sql = "SELECT usuario FROM veterinarios WHERE estado = 1
			AND usuario = '".htmlentities($_POST["inpUsuario"])."'
			AND clave = '".md5(htmlentities($_POST["inpClave"]))."'";
	$claveUsuario = mysql_query($sql);
	$numClaveUsuario = mysql_num_rows($claveUsuario);

	/* Si el usuario y clave ingresado son correctos (y el usuario est�
	 * activo en la BD), creamos la sesi�n del mismo.
	 */
	 if($numClaveUsuario != 0){
	 	session_start();
	 	
	 	// Guardamos dos variables de sesión que nos auxiliar� para saber
		// si se est� o no "logueado" un usuario.
		$_SESSION["autentica"] = "SIP";
		$_SESSION["usuarioActual"] = mysql_result($claveUsuario,0,0);
		//Direccionamos a nuestra p�gina principal del sistema.
		header ("Location: ../Front-End/principal_veterinario.php");
	 } else {
	 	echo"<script>alert('La contrase\u00f1a del usuario no es correcta');
	 			window.location.href=\"../Front-End/index.html\"</script>";
	 }
} else {
	echo"<script>alert('Usuario o Contrase\u00f1a err\u00f3neos');
			window.location.href=\"../Front-End/index.html\"</script>";
}

?>
