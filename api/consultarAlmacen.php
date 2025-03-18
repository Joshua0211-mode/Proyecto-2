<?php
error_reporting(E_ALL);
require_once 'conexion.php';

// Preparar la consulta SQL para obtener todos los registros de la tabla almacen
$stmt = $db->prepare("SELECT id, nombre, ubicacion, capacidad, activo FROM almacen");
$stmt->bind_result($id, $nombre, $ubicacion, $capacidad, $activo);
$stmt->execute();

$arr = array();
while ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id,
        'nombre' => $nombre,
        'ubicacion' => $ubicacion,
        'capacidad' => $capacidad,
        'activo' => $activo
    );
}

$stmt->close();
echo json_encode($arr);
?>
