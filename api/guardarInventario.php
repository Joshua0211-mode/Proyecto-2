<?php
error_reporting(E_ALL);

// Conexión a la base de datos
require_once 'conexion.php';

// Obtener los datos JSON enviados
$obj = json_decode(file_get_contents("php://input"));

// Verificar que se reciban todos los datos necesarios
if (!isset($obj->producto_id) || !isset($obj->almacen_id) || !isset($obj->cantidad_actual)) {
    echo json_encode(["status" => "error", "message" => "Faltan parámetros"]);
    exit();
}

// Preparar la consulta SQL para insertar un nuevo registro en la tabla inventario
$stmt = $db->prepare("INSERT INTO inventario (producto_id, almacen_id, cantidad_actual, cantidad_minima, cantidad_maxima, fecha_ultima_entrada, fecha_ultima_salida) VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
$stmt->bind_param('iiiii', $obj->producto_id, $obj->almacen_id, $obj->cantidad_actual, $obj->cantidad_minima, $obj->cantidad_maxima);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Inventario guardado correctamente"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al guardar el inventario"]);
}

// Cerrar la sentencia
$stmt->close();
?>
