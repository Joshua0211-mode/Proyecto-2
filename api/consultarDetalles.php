<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$stmt = $db->prepare("SELECT id,IdNota,Cantidad,IdProducto,Descripcion,PrecioUnitario,Importe FROM detalles");
$stmt->bind_result($id,$IdNota,$Cantidad,$IdProducto,$Descripcion,$PrecioUnitario,$Importe);
$stmt->execute();
$arr = array();
while($stmt->fetch()){
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