<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO detalles( IdNota,Cantidad,IdProducto,Descripcion,PrecioUnitario,Importe) 
 VALUES(?,?,?,?,?,?)");
$stmt->bind_param('ssssss',$obj->IdNota,$obj->Cantidad,$obj->IdProducto,$obj->Descripcion,$obj->PrecioUnitario,$obj->Importe);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>