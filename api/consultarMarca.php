<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt = $db->prepare("SELECT id,nombre,descripcion,pais_origen,anio_fundacion,pagina_web,logo_url,proveedor_id,fecha_creacion,fecha_modificacion
 FROM marca WHERE id = ?");
$stmt->bind_param('i',$obj->id);
$stmt->bind_result($id,$nombre,$descripcion,$pais_origen,$anio_fundacion,$pagina_web,$logo_url,$proveedor_id,$fecha_creacion,$fecha_modificacion);
$stmt->execute();
$arr = array();
if($stmt->fetch()){
$arr[] = array(
'id' =>$id, 
'nombre' =>$nombre,
'descripcion' =>$descripcion,
'pais_origen' =>$pais_origen,
'anio_fundacion' =>$anio_fundacion,
'pagina_web' =>$pagina_web,
'logo_url' =>$logo_url,
'proveedor_id' =>$proveedor_id,
'fecha_creacion' =>$fecha_creacion,
'fecha_modificacion' =>$fecha_modificacion
);
}
$stmt->close();
echo json_encode($arr);
?>