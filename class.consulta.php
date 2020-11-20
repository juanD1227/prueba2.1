<?php 

require_once('class.conexion.php');

class Consultas
{
        //Inserción de un nuevo Empleado
            public function insert($nombre, $email, $sexo, $area, $descripcion, $boletin, $roles){
                $modelo = new Conexion();
                $conexion = $modelo->get_Conexion();
                try{
                    $sql = "INSERT INTO `empleados` (`nombre`, `email`, `sexo`, `area_id`,`boletin`,`descripcion`) VALUES (:nombre, :email, :sexo, :area_id, :boletin, :descripcion)";
                    $stmt = $conexion->prepare($sql);
                    $stmt->bindParam(':nombre', $nombre);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':sexo', $sexo);
                    $stmt->bindParam(':area_id', $area);
                    $stmt->bindParam(':boletin', $boletin);
                    $stmt->bindParam(':descripcion', $descripcion);
                    $stmt->execute();

                    echo "se inserto";
                }
                catch (Exception $e){
                    return $e->getMessage();
                                        echo "se inserto";

                }
                            
                 $sql2 = "SELECT id FROM empleados WHERE id = (SELECT MAX(id) FROM empleados)";
                $stmt2 = $conexion->prepare($sql2);
                $stmt2->execute();
                while ($select = $stmt2->fetch()) {
                    $user = $select;
                }
                $id_empleado = $user['id'];
                
                
                
                try{
                    $sql3 = "INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES (:id_empleado, :rol_id)";
                    $stmt3 = $conexion->prepare($sql3);
                    $stmt3->bindParam(':id_empleado', $id_empleado);
                    $stmt3->bindParam(':rol_id', $roles);
                    $stmt3->execute();
                    return true;
                }
                catch (Exception $e){
                    return $e->getMessage();
                } 
            }
        
        //Select para listar la tabla de los usuarios (No muestra información del Admin)
            public function select_lista_usuarios(){
                $modelo = new Conexion();
                $conexion = $modelo->get_conexion();
                //$sql = "SELECT * FROM user WHERE rol <> 'admin'";
                $sql = "SELECT * FROM empleados INNER JOIN areas ON areas.id = empleados.area_id";
                $stmt = $conexion->prepare($sql);
                $stmt->execute();
                while ($select = $stmt->fetch()) {
                    $user[] = $select;
                }
                return $user;
            }
        
            public function delete($id){
                $modelo = new Conexion();
                $conexion = $modelo->get_conexion();
                $sql = "DELETE FROM empleados WHERE id = :id";
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':id', $id);
                if (!$stmt) {
                    return "El registro no ha podido ser eliminado!!";
                }else{
                    $stmt->execute();
                    return "Registro eliminado correctamente";
                }
            }
            
 }

?>