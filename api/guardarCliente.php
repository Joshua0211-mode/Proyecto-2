<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO clientes( nombre,RFC,Email,Telefono,Domicilio,CodigoPostal) 
 VALUES(?,?,?,?,?,?)");
$stmt->bind_param('ssssss',$obj->nombre,$obj->RFC,$obj->Email,$obj->Telefono,$obj->Domicilio,$obj->CodigoPostal);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>