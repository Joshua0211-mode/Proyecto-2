<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt = $db->prepare("SELECT id,nombre,RFC,Email,Telefono,Domicilio,CodigoPostal
 FROM clientes WHERE id = ?");
$stmt->bind_param('i',$obj->id);
$stmt->bind_result($id,$nombre,$RFC,$Email,$Telefono,$Domicilio,$CodigoPostal);
$stmt->execute();
$arr = array();
if($stmt->fetch()){
$arr[] = array(
'id' =>$id, 
'nombre' =>$nombre,
'RFC' =>$RFC,
'Email' =>$Email,
'Telefono' =>$Telefono,
'Domicilio' =>$Domicilio,
'CodigoPostal' =>$CodigoPostal
);
}
$stmt->close();
echo json_encode($arr);
?>