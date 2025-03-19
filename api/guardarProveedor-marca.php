<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO proveedormarca(proveedor_id,marca_id,nombreProveedor,nombreMarca,descripcionProducto) 
 VALUES(?,?,?,?,?)");
$stmt->bind_param('iisss',$obj->proveedor_id,$obj->marca_id,$obj->nombreProveedor,$obj->nombreMarca,$obj->descripcionProducto);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>