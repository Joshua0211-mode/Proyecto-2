<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$stmt = $db->prepare("SELECT id,nombre,descripcion,precio,stock,fecha_creacion FROM producto");
$stmt->bind_result($id,$nombre,$descripcion,$precio,$stock,$fecha_creacion);
$stmt->execute();
$arr = array();
while($stmt->fetch()){
$arr[] = array(
'id' =>$id, 
'nombre' =>$nombre,
'descripcion' =>$descripcion,
'precio' =>$precio,
'stock' =>$stock,
'fecha_creacion' =>$fecha_creacion
);
}
$stmt->close();
echo json_encode($arr);
?>