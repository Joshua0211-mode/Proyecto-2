<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$stmt = $db->prepare("SELECT id,nombre,email, password, rol, status, fecha_registro FROM usuarios");
$stmt->bind_result($id,$nombre,$email,$password,$rol,$status,$fecha_registro);
$stmt->execute();
$arr = array();
while($stmt->fetch()){
$arr[] = array(
'id' =>$id, 
'nombre' =>$nombre,
'email' =>$email,
'password' =>$password,
'rol' =>$rol,
'status' =>$status,
'fecha_registro' =>$fecha_registro
);
}
$stmt->close();
echo json_encode($arr);
?>