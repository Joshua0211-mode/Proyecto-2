<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO proveedormarca(proovedor_id,marca_id) 
 VALUES(?,?)");
$stmt->bind_param('ss',$obj->proveedor_id,$obj->marca_id);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>