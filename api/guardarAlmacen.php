<?php
error_reporting(E_ALL);
require_once 'conexion.php';

// Obtener los datos JSON enviados
$obj = json_decode(file_get_contents("php://input"));

// Verificar que se reciban todos los datos necesarios
if (!isset($obj->nombre) || !isset($obj->ubicacion) || !isset($obj->capacidad) || !isset($obj->activo)) {
    echo json_encode(["status" => "error", "message" => "Faltan parámetros"]);
    exit();
}

// Preparar la consulta SQL para insertar un nuevo registro en la tabla almacen
$stmt = $db->prepare("INSERT INTO almacen (nombre, ubicacion, capacidad, activo) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssis', $obj->nombre, $obj->ubicacion, $obj->capacidad, $obj->activo);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Almacen guardado correctamente"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al guardar el almacen"]);
}

// Cerrar la sentencia
$stmt->close();
?>
