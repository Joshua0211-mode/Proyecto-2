<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$stmt = $db->prepare("SELECT id,nombre,contacto_nombre,contacto_telefono,contacto_email,direccion,pais,pagina_web,fecha_creacion,fecha_modificacion
 FROM proveedor");
$stmt->bind_result($id,$nombre,$contacto_nombre,$contacto_telefono,$contacto_email,$direccion,$pais,$pagina_web,$fecha_creacion,$fecha_modificacion);
$stmt->execute();
$arr = array();
while($stmt->fetch()){
$arr[] = array(
'id' =>$id, 
'nombre' =>$nombre,
'contacto_nombre' =>$contacto_nombre,
'contacto_telefono' =>$contacto_telefono,
'contacto_email' =>$contacto_email,
'direccion' =>$direccion,
'pais' =>$pais,
'pagina_web' =>$pagina_web,
'fecha_creacion' =>$fecha_creacion,
'fecha_modificacion' =>$fecha_modificacion
);
}
$stmt->close();
echo json_encode($arr);
?>