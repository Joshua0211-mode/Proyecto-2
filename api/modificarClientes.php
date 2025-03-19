<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE clientes SET nombre=?,RFC=?,Email=?,Telefono=?,Domicilio=?,CodigoPostal=? where id=?");
$stmt->bind_param('sssssss',$obj->nombre,$obj->RFC,$obj->Email,$obj->Telefono,$obj->Doimicilio,$obj->CodigoPostal,$obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>