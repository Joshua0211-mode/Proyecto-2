<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO marca(nombre,descripcion,pais_origen,año_fundacion,pagina_web,logo_url,proveedor_id,fecha_creacion,fecha_modificacion) 
 VALUES(?,?,?,?,?,?,?,NOW(),NOW())");
$stmt->bind_param('sssssss',$obj->nombre,$obj->descripcion,$obj->pais_origen,$obj->año_fundacion,$obj->pagina_web,$obj->logo_url,$obj->proveedor_id);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>