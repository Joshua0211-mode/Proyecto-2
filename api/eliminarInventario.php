<?php
error_reporting(E_ALL);

// Conexión a la base de datos
require_once 'conexion.php';

// Obtener los datos JSON enviados
$obj = json_decode(file_get_contents("php://input"));

// Verificar que se reciba el parámetro id
if (!isset($obj->id)) {
    echo json_encode(["status" => "error", "message" => "Falta el parámetro id"]);
    exit();
}

// Preparar la consulta SQL para eliminar el registro en la tabla inventario
$stmt = $db->prepare("DELETE FROM inventario WHERE id = ?");
$stmt->bind_param('i', $obj->id);

// Ejecutar la consulta
$stmt->execute();

// Cerrar la sentencia
$stmt->close();

echo json_encode(["status" => "success", "message" => "Inventario eliminado correctamente"]);
?>
