<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE proveedor SET nombre=?,contacto_nombre=?,contacto_telefono=?,contacto_email=?,direccion=?,pais=?,pagina_web=?	where id=?");
$stmt->bind_param('ssssssss',$obj->nombre,$obj->contacto_nombre,$obj->contacto_telefono,$obj->contacto_email,$obj->direccion,$obj->pais,$obj->pagina_web,$obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>