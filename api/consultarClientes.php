<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$stmt = $db->prepare("SELECT id,nombre,RFC,Email,Telefono,Domicilio,CodigoPostal FROM clientes");
$stmt->bind_result($id,$nombre,$RFC,$Email,$Telefono,$Domicilio,$CodigoPostal);
$stmt->execute();
$arr = array();
while($stmt->fetch()){
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