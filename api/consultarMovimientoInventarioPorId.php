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

// Preparar la consulta SQL para obtener el movimiento por `id`
$stmt = $db->prepare("SELECT id, inventario_id, tipo_movimiento, cantidad, concepto, fecha_movimiento 
                      FROM movimientoinventario 
                      WHERE id = ?");
$stmt->bind_param('i', $obj->id);
$stmt->execute();
$stmt->bind_result($id, $inventario_id, $tipo_movimiento, $cantidad, $concepto, $fecha_movimiento);

// Obtener el resultado
if ($stmt->fetch()) {
    $resultado = [
        "id" => $id,
        "inventario_id" => $inventario_id,
        "tipo_movimiento" => $tipo_movimiento,
        "cantidad" => $cantidad,
        "concepto" => $concepto,
        "fecha_movimiento" => $fecha_movimiento
    ];
    echo json_encode($resultado);
} else {
    echo json_encode(["status" => "error", "message" => "No se encontró el movimiento"]);
}

$stmt->close();
?>
