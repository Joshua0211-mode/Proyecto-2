<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO proveedor(nombre,contacto_nombre,contacto_telefono,contacto_email,direccion,pais,pagina_web,fecha_creacion,fecha_modificacion) 
 VALUES(?,?,?,?,?,?,?,NOW(),NOW())");
$stmt->bind_param('sssssss',$obj->nombre,$obj->contacto_nombre,$obj->contacto_telefono,$obj->contacto_email,$obj->direccion,$obj->pais,$obj->pagina_web);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>