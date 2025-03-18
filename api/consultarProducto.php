<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt = $db->prepare("SELECT id,nombre,descripcion,precio,stock,fecha_creacion FROM producto WHERE id = ?");
$stmt->bind_param('i',$obj->id);
$stmt->bind_result($id,$nombre,$descripcion,$precio,$stock,$fecha_creacion);
$stmt->execute();
$arr = array();
if($stmt->fetch()){
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