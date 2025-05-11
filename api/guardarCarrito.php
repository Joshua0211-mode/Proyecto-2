<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO carrito(producto_id,precio,cantidad,total) 
 VALUES(?,?,?,?)");
$stmt->bind_param('idid',$obj->producto_id,$obj->precio,$obj->cantidad,$obj->total);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>