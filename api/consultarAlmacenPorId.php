<?php
error_reporting(E_ALL);
require_once 'conexion.php';

// Obtener los datos JSON enviados
$obj = json_decode(file_get_contents("php://input"));

// Verificar que se reciba el id
if (!isset($obj->id)) {
    echo json_encode(["status" => "error", "message" => "Faltan parámetros"]);
    exit();
}

// Preparar la consulta SQL para obtener un registro por id
$stmt = $db->prepare("SELECT id, nombre, ubicacion, capacidad, activo FROM almacen WHERE id = ?");
$stmt->bind_param('i', $obj->id);
$stmt->execute();
$stmt->bind_result($id, $nombre, $ubicacion, $capacidad, $activo);

if ($stmt->fetch()) {
    $resultado = [
        "id" => $id,
        "nombre" => $nombre,
        "ubicacion" => $ubicacion,
        "capacidad" => $capacidad,
        "activo" => $activo
    ];
    echo json_encode($resultado);
} else {
    echo json_encode(["status" => "error", "message" => "No se encontró el almacén"]);
}

// Cerrar la sentencia
$stmt->close();
?>
