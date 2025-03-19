<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt = $db->prepare("SELECT id,IdNota,Cantidad,IdProducto,Descripcion,PrecioUnitario,Importe
 FROM detalles WHERE id = ?");
$stmt->bind_param('i',$obj->id);
$stmt->bind_result($id,$IdNota,$Cantidad,$IdProducto,$Descripcion,$PrecioUnitario,$Importe);
$stmt->execute();
$arr = array();
if($stmt->fetch()){
$arr[] = array(
'id' =>$id, 
'IdNota' =>$IdNota,
'Cantidad' =>$Cantidad,
'IdProducto' =>$IdProducto,
'Descripcion' =>$Descripcion,
'PrecioUnitario' =>$PrecioUnitario,
'Importe' =>$Importe
);
}
$stmt->close();
echo json_encode($arr);
?>