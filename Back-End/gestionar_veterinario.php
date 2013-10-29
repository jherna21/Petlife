<?php
    
    include ("../Control/conexion.php");
    include("seguridad.php");

    if(!$_POST){
        exit;
    }
    $gestionador = new GestionVeterinario();
    @$accion= $_POST['action'];
    if($accion == 'buscar'){  
        $pattern = $_POST['pattern'];
        $gestionador->buscarVeterinario($pattern);                   
    }else if($accion == 'guardar'){
        $usuario = $_POST['usuario'];                        
        $correo = $_POST['correo'];
        $telefono = $_POST['estado'];
        $gestionador->guardarInfo($usuario, $correo, $estado);
    }else{
         echo"<script>alert('Error en escoger la accion');
					    window.location.href=\"../Front-End/principal_veterinario.php\"</script>";
    }

    
    class GestionVeterinario{
        
        public function buscarVeterinario($pattern){
                      
                $sql = "SELECT * FROM veterinario WHERE usuario_veterinario = '".$pattern."'";
                $result = mysql_query($sql);
                $num_results = mysql_num_rows($result);
                //echo $num_results."  ";
                if($num_results == 0){
                    echo json_encode(array('nombre'=>'No se encontró ningún veterinario con ese usuario.'));
                }
                for($i=0; $i < $num_results; $i++){
                    $veterinario = mysql_fetch_assoc($result);                                
                }                 
                echo json_encode(array('nombre'=>$veterinario['nombre_veterinario'],'apellido' => $veterinario['apellido_veterinario'],'usuario' => $veterinario['usuario_veterinario']));                
                                                        
        }
        
         public function guardarInfo($usuario, $correo, $estado){
        
            $sqlInfo = "UPDATE veterinario SET `estado_veterinario`='".$estado."' ,`correo_veterinario`='".$correo."' WHERE `usuario_veterinario`= '".$usuario."'" ;            
            $resultInfo = mysql_query($sqlInfo);                                             
            if($resultInfo){
                echo json_encode(array('respuesta'=>'Los cambios fueron guardados con éxito.'));
            }else{
                echo json_encode(array('respuesta'=>'Ningún cambio fue generado.'));
            }                                                          
        } 
        
                                 
    } 