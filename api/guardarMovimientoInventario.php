<?php
error_reporting(E_ALL);

// Conexión a la base de datos
require_once 'conexion.php';

// Obtener los datos JSON enviados
$obj = json_decode(file_get_contents("php://input"));

// Verificar que se reciban los datos necesarios
if (!isset($obj->inventario_id) || !isset($obj->tipo_movimiento) || !isset($obj->cantidad)) {
    echo json_encode(["status" => "error", "message" => "Faltan parámetros"]);
    exit();
}

// Verificar que el tipo de movimiento sea válido
$tipos_movimiento_validos = ['entrada', 'salida', 'ajuste', 'devolución'];
if (!in_array($obj->tipo_movimiento, $tipos_movimiento_validos)) {
    echo json_encode(["status" => "error", "message" => "Tipo de movimiento inválido"]);
    exit();
}

// Preparar la consulta SQL para insertar el movimiento
$stmt = $db->prepare("INSERT INTO movimientoinventario (inventario_id, tipo_movimiento, cantidad, concepto, fecha_movimiento) 
                      VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('isiss', $obj->inventario_id, $obj->tipo_movimiento, $obj->cantidad, $obj->concepto, $obj->fecha_movimiento);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Movimiento registrado correctamente"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al registrar el movimiento"]);
}

$stmt->close();
?>
