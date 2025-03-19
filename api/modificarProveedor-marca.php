<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE proveedormarca SET proveedor_id=?, marca_id=?, nombreProveedor=?, nombreMarca=?, descripcionProducto=?	where id=?");
$stmt->bind_param('iissss',$obj->proveedor_id,$obj->marca_id,$obj->nombreProveedor,$obj->nombreMarca,$obj->descripcionProducto,$obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>