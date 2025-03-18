<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt = $db->prepare("SELECT proveedor_id, marca_id
 FROM proveedormarca WHERE id = ?");
$stmt->bind_param('i',$obj->id);
$stmt->bind_result($proveedor_id,$marca_id);
$stmt->execute();
$arr = array();
if($stmt->fetch()){
$arr[] = array(
'proveedor_id' =>$proveedor_id, 
'marca_id' =>$marca_id
);
}
$stmt->close();
echo json_encode($arr);
?>