<?php
require("Model/class.consulta.php");

    $consulta = new Consultas();// Creación automática de una nueva clase consulta
    $stmt = $consulta->select_lista_usuarios();
    //echo json_encode($stmt);
    

if (isset($_POST['guardar'])) 
{
    $nombre = $_POST['nombre'];
	$email = $_POST['correo']; 
	$sexo = $_POST['sexo'];
	$area = $_POST['areas'];
    $descripcion = $_POST['descripcion'];
    $boletin= 0;
    if(isset($_POST['boletin'])){
        $boletin=$_POST['boletin'];
    }
    $rol = $_POST['roles'];
    
    

	// if (empty($nombre) ||
	// 	empty($email) ||
	// 	empty($sexo) ||
	// 	empty($area) ||
	// 	empty($nacionalidad) ||
	// 	empty($telefono) ||
	// 	empty($direccion) ||
	// 	empty($tipo_identificacion) ||
	// 	empty($lugar_identificacion)) {//... pero si están vacíos los campos...

	// 	$mensaje = "¡Ningún campo puede quedar vacío!";//... muestra la alerta...
	// } else {//... de lo contrario haga el ingreso de los datos
		$consulta = new Consultas();// Creación automática de una nueva clase consulta
        $consulta->insert($nombre, $email, $sexo, $area, $descripcion, $boletin,$rol);
        header("Location: ./index.php");

	
}

if(isset($_GET['del'])){
    $id=$_GET['id'];
    $consulta = new Consultas();// Creación automática de una nueva clase consulta
    $consulta->delete($id);
    header("Location: ./index.php");
}

?>