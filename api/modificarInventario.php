<?php
error_reporting(E_ALL);

// Conexión a la base de datos
require_once 'conexion.php';

// Obtener los datos JSON enviados
$obj = json_decode(file_get_contents("php://input"));

// Verificar que se reciban todos los datos necesarios
if (!isset($obj->id) || !isset($obj->producto_id) || !isset($obj->almacen_id) || !isset($obj->cantidad_actual)) {
    echo json_encode(["status" => "error", "message" => "Faltan parámetros"]);
    exit();
}

// Preparar la consulta SQL para actualizar un registro en la tabla inventario
$stmt = $db->prepare("UPDATE inventario SET producto_id = ?, almacen_id = ?, cantidad_actual = ?, cantidad_minima = ?, cantidad_maxima = ?, fecha_ultima_entrada = NOW() WHERE id = ?");
$stmt->bind_param('iiiiii', $obj->producto_id, $obj->almacen_id, $obj->cantidad_actual, $obj->cantidad_minima, $obj->cantidad_maxima, $obj->id);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Inventario modificado correctamente"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al modificar el inventario"]);
}

// Cerrar la sentencia
$stmt->close();
?>
