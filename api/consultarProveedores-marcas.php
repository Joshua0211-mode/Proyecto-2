<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$stmt = $db->prepare("SELECT proveedor_id, marca_id,nombreProveedor,nombreMarca,descripcionProducto FROM proveedormarca");
$stmt->bind_result($proveedor_id,$marca_id,$nombreProveedor,$nombreMarca,$descripcionProducto);
$stmt->execute();
$arr = array();
while($stmt->fetch()){
$arr[] = array(
'proveedor_id' =>$proveedor_id, 
'marca_id' =>$marca_id,
'nombreProveedor' =>$nombreProveedor,
'nombreMarca' =>$nombreMarca,
'descripcionProducto' =>$descripcionProducto
);
}
$stmt->close();
echo json_encode($arr);
?>