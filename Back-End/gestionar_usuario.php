<?php
    
    include ("../Control/conexion.php");
    include("seguridad.php");

    if(!$_POST){
        exit;
    }
    $gestionador = new GestionUsuario();
    @$accion= $_POST['action'];
    if($accion == 'buscar'){  
        $pattern = $_POST['pattern'];
        $gestionador->buscarUsuario($pattern);                   
    }else if($accion == 'guardar'){
        $cedula = $_POST['cedula'];                        
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $gestionador->guardarInfo($cedula, $correo, $telefono, $direccion);
    }else{
         echo"<script>alert('Error en escoger la accion');
					    window.location.href=\"../Front-End/principal_veterinario.php\"</script>";
    }

    
    class GestionUsuario{
        
        public function buscarUsuario($pattern){
                      
                $sql = "SELECT * FROM usuario_movil WHERE cedula = '".$pattern."'";
                $result = mysql_query($sql);
                $num_results = mysql_num_rows($result);
                //echo $num_results."  ";
                if($num_results == 0){
                    echo"<script>alert('No se encontró la cédula ingresada');
					    window.location.href=\"../Front-End/gestion_usuario.php\"</script>";
                }
                for($i=0; $i < $num_results; $i++){
                    $usuario = mysql_fetch_assoc($result);                                
                } 
                //echo json_encode($usuario);
                echo json_encode(array('nombre'=>$usuario['nombre_usuario'],'apellido' => $usuario['apellido_usuario'],'cedula' => $usuario['cedula']));                
                                                        
        }
        
         public function guardarInfo($cedula, $correo, $telefono, $direccion){
        
            $sqlInfo = "UPDATE usuario_movil SET `telefono_usuario`='".$telefono."',`direccion_usuario`='".$direccion."',`correo_usuario`='".$correo."' WHERE `cedula`= '".$cedula."'" ;            
            $resultInfo = mysql_query($sqlInfo);                                             
            if($resultInfo){
                echo json_encode(array('respuesta'=>'Los cambios fueron guardados con éxito.'));
            }else{
                echo json_encode(array('respuesta'=>'Ningún cambio fue generado.'));
            }                                                          
        } 
        
                                 
    }                                                 
        
         
    /*
    *                                 <<<OJO>> 
    */

    /*
    for($i=0; $i < $num_results; $i++){
    $row = mysql_fetch_assoc($result);

    $sql2 = "SELECT nombre_veterinaria FROM veterinaria
             WHERE id_veterinaria = '".$row['id_veterinaria']."'";
    $nombre_veterinaria = mysql_query($sql2);

    $num_results2 = mysql_num_rows($nombre_veterinaria);
        for($j=0; $j < $num_results2; $j++){
              $row = mysql_fetch_assoc($nombre_veterinaria);
              echo "nombre ".$row['nombre_veterinaria'];
        }
    }
    */
                  

?>

