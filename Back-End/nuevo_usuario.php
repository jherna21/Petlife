<?php
     include ("../Control/conexion.php");
     include("seguridad.php");

     //Validamos si todos los campos fueron diligenciados y proseguimos a almacenar la info en la BD.
         
     if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["telefono"]) &&
        isset($_POST["correo"]) && isset($_POST["direccion"]) ){

            $usuarioActual = $_SESSION["usuarioActual"];           
            
            //consultamos el id de la veterinaria asociada al veterinario que esta en sesión actualmente.            
            $sql="SELECT id_veterinaria FROM veterinario
             WHERE usuario_veterinario = '".$usuarioActual."'";            
            $result = mysql_query($sql);              
            
            $num_results = mysql_num_rows($result);
            
            if($num_results != 0){
                //Sacamos el id_veterinaria de la consulta pasada.
                $row = mysql_fetch_assoc($result);
                $id_veterinaria = $row['id_veterinaria'];                                    
                
                //sacamos la fecha actual para ingresarla al query.
                $fechaActual = mktime(0,0,0,date("m"),date("d"),date("Y"));
                $fechaActual = date("Y-m-d", $fechaActual);

                //fecha de expiración, sumandole un año a la actual.
                $fechaExp = mktime(0,0,0,date("m"),date("d"),date("Y")+1);
                $fechaExp = date("Y-m-d", $fechaExp);

                //Query para el Insert
                $sqlInsert = "INSERT INTO usuario_movil (`id_usuario`, `date_fecha_afiliacion`, `date_duracion_licencia`,
                 `telefono_usuario`, `direccion_usuario`, `nombre_usuario`, `apellido_usuario`, `id_veterinaria`, `cedula`) 
                 VALUES ( 'NULL','".$fechaActual."', '".$fechaExp."','".(htmlentities($_POST["telefono"]))."',
                          '".(htmlentities($_POST["direccion"]))."', '".(htmlentities($_POST["nombre"]))."',
                          '".(htmlentities($_POST["apellido"]))."','".$id_veterinaria."', '".(htmlentities($_POST["cedula"]))."')";                

                //ejecutamos el query
                $insertResult = mysql_query( $sqlInsert);                
                
                //verificamos si fue exitoso el INSERT para continuar 
                if($insertResult){
                    echo"<script>alert('Los datos fueron guardados.');
					    window.location.href=\"../Front-End/principal_veterinario.php\"</script>";
                }else{
                    echo"<script>alert('Hubo un error, intentelo de nuevo.');
					    window.location.href=\"../Front-End/principal_veterinario.php\"</script>";
                }
                

            }else{
                echo"<script>alert('Error. La consulta no generó ningún resultado');</script>";
            }                            
        }else{
            echo"<script>alert('Todos los campos son requeridos para continuar.');
					    window.location.href=\"../Front-End/principal_veterinario.php\"</script>";
        }      
?>

