<?php
    
    include ("../Control/conexion.php");
    include("seguridad.php");

    if(!$_POST){
        exit;
    }
    $gestionador = new ListarVeterinaria();
    @$accion= $_POST['action'];
    if($accion == 'listar'){          
        $gestionador->listar();                   
    }else if($accion == 'guardarVeterinario'){
        $nombre      = $_POST['nombre'];
        $apellido    = $_POST['apellido'];
        $estado      = $_POST['estado'];
        $correo      = $_POST['correo'];
        $telefono    = $_POST['telefono'];
        $usuario     = $_POST['usuario'];
        $clave       = $_POST['clave'];
        $veterinaria = $_POST['veterinaria'];
        $gestionador->guardar($nombre, $apellido, $estado, $correo, $telefono, $usuario, $clave, $veterinaria);
    }else{
        $gestionador->funcError();
    }
    
    class ListarVeterinaria{
        
        public function listar(){   
            //Realizamos la consula a la BD y verificamos resultados                
            $sql = "SELECT nombre_veterinaria FROM veterinaria WHERE telefono IS NOT NULL";
            $result = mysql_query($sql);
            $num_results = mysql_num_rows($result);            
            if($num_results == 0){
                echo json_encode(array('respuesta'=>'No existen veterinarias en la base de datos actual.'));
            }
            //Creamos el array para la respuesta y realizamos el fetch_assoc para ir haciendo push en
            //el array de la respuesta.
            $resp = array();
            for($i=0; $i < $num_results; $i++){
                $row = mysql_fetch_assoc($result); 
                array_push($resp,$row['nombre_veterinaria']);             
            } 
            //verificamos el size de la respuesta para enviarlo junto con esta por el JSON
            $size = sizeof($resp);                                                              
            echo json_encode(array('result' =>$resp, 'size' => $size));
        }

        public function funcError(){
            echo json_encode(array('respuesta'=> "ERROR"));
        }

        public function guardar($nombre, $apellido, $estado, $correo, $telefono, $usuario, $clave, $veterinaria){
            //Validamos si todos los campos fueron diligenciados y proseguimos a almacenar la info en la BD.
    
            if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["estado"]) &&
                isset($_POST["correo"]) && isset($_POST["telefono"]) && isset($_POST["usuario"]) 
                && isset($_POST["clave"]) && isset($_POST["veterinaria"])){
                                                  

            $sqlVeterinaria = "SELECT id_veterinaria FROM veterinaria WHERE nombre_veterinaria = '".$veterinaria."'";
            $findResult= mysql_query($sqlVeterinaria);
            $num_results = mysql_num_rows($findResult);
            if($num_results != 0){
                $id_veterinaria = mysql_fetch_assoc($findResult);                              

                //Query para el Insert
                $sqlInsert = "INSERT INTO `veterinario`(`id_veterinario`, `nombre_veterinario`, `correo_veterinario`, 
                        `estado_veterinario`, `apellido_veterinario`, `clave_veterinario`, `usuario_veterinario`, `id_veterinaria`) VALUES ( 
                        'NULL','"$nombre"', '"$correo"','"$estado"','"$apellido"','"$clave"','"$usuario"','".$id_veterinaria."')";
                //ejecutamos el query
                $insertResult = mysql_query($sqlInsert);  
                 
                //verificamos si fue exitoso el INSERT para continuar 
                if($insertResult){
                    //echo json_encode(array('respuesta'=>'El veterinario fue ingresado correctamente'));
                    echo json_encode(array('respuesta'=>$sqlInsert));
                }else{
                    echo json_encode(array('respuesta'=>'Hubo un error, intentelo otra vez.'));
                }
             }else{
                    echo json_encode(array('respuesta'=>'Hubo un problema con la información ingresada'));
             }           
            }else{
                    echo json_encode(array('respuesta'=>'Error, todos los campos son requeridos', 'veterinaria' => $sqlInsert));
            }
        }                            
    } 
?>


