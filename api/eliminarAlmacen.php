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

// Preparar la consulta SQL para eliminar un registro en la tabla almacen
$stmt = $db->prepare("DELETE FROM almacen WHERE id = ?");
$stmt->bind_param('i', $obj->id);

// Ejecutar la consulta
$stmt->execute();

// Cerrar la sentencia
$stmt->close();

// Devolver un mensaje de éxito
echo json_encode(["status" => "success", "message" => "Almacen eliminado correctamente"]);
?>
