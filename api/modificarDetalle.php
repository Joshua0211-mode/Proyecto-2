<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE detalles SET IdNota=?,Cantidad=?,IdProducto=?,Descripcion=?,PrecioUnitario=?,Importe=? where id=?");
$stmt->bind_param('sssssss',$obj->IdNota,$obj->Cantidad,$obj->IdProducto,$obj->Descripcion,$obj->PrecioUnitario,$obj->Importe,$obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>