<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt = $db->prepare("SELECT proveedor_id, marca_id,nombreProveedor,nombreMarca,descripcionProducto
 FROM proveedormarca WHERE id = ?");
$stmt->bind_param('i',$obj->id);
$stmt->bind_result($proveedor_id,$marca_id,$nombreProveedor,$nombreMarca,$descripcionProducto);
$stmt->execute();
$arr = array();
if($stmt->fetch()){
$arr[] = array(
'proveedor_id' =>$proveedor_id, 
'marca_id' =>$marca_id,
'nombreProveedor' =>$nombreProveedor,
'nombreMarca' =>$nombreMarca,
'descripcionProducto' =>$descripcionProducto,
);
}
$stmt->close();
echo json_encode($arr);
?>