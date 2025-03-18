<?php
error_reporting(E_ALL);

// Conexión a la base de datos
require_once 'conexion.php';

// Obtener los datos JSON enviados
$obj = json_decode(file_get_contents("php://input"));

// Verificar que se reciba el parámetro `id`
if (!isset($obj->id)) {
    echo json_encode(["status" => "error", "message" => "Falta el parámetro id"]);
    exit();
}

// Preparar la consulta SQL para eliminar el movimiento
$stmt = $db->prepare("DELETE FROM movimientoinventario WHERE id = ?");
$stmt->bind_param('i', $obj->id);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Movimiento eliminado correctamente"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al eliminar el movimiento"]);
}

$stmt->close();
?>
