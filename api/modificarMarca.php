<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE marca SET nombre=?,descripcion=?,pais_origen=?,año_fundacion=?,pagina_web=?,logo_url=?,proveedor_id=?	where id=?");
$stmt->bind_param('ssssssss',$obj->nombre,$obj->descripcion,$obj->pais_origen,$obj->año_fundacion,$obj->pagina_web,$obj->logo_url,$obj->proveedor_id,$obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>