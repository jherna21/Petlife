<?php
	
	include ("conexion.php");
	
	if(isset($_GET['user']) && isset($_GET['password'])) {

		/* soak in the passed variable or set our own */
		$format = strtolower(isset($_GET['format'])?$_GET['format']:NULL) == 'json' ? 'json' : 'xml';
		$user_name = $_GET['user'];
		$user_pass = $_GET['password'];

		/* Obtiene datos de la base de datos */
		$query = "SELECT * FROM administrador WHERE usuario = '".htmlentities($user_name)."' AND
				clave = '".md5(htmlentities($user_pass))."'";
		$result = mysql_query($query, $connection) or die('Errant query:  '.$query);

		/* Crea un arreglo principal de los registros */
		$posts = array();
		if(mysql_num_rows($result)) {
			while($post = mysql_fetch_assoc($result)) {
				$posts[] = array('post' => $post);
			}
		}
		
		/* Formato de salida necesario */
		if($format == 'json') {
			header('Content-type: application/json');
			echo json_encode(array('posts' => $posts));
		}
		else {
			header('Content-type: text/xml');
			echo '<posts>';
			foreach($posts as $index => $post) {
				if(is_array($post)) {
					foreach($post as $key => $value) {
						echo '<', $key, '>';
						if(is_array($value)) {
							foreach($value as $tag => $val) {
								echo '<', $tag, '>', htmlentities($val), '</', $tag, '>';
							}
						}
						echo '</', $key, '>';
					}
				}
			}
			echo '</posts>';
		}

		/* Desconexion de la base de datos */
		@mysql_close($connection);
	} 
?>
