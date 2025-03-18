<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO producto(nombre,descripcion,precio,stock,fecha_creacion) 
 VALUES(?,?,?,?,NOW())");
$stmt->bind_param('ssss',$obj->nombre,$obj->descripcion,$obj->precio,$obj->stock);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>