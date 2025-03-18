<?php
error_reporting(E_ALL);

// Conexión a la base de datos
require_once 'conexion.php';

// Obtener los datos JSON enviados
$obj = json_decode(file_get_contents("php://input"));

// Verificar que se reciba el parámetro `inventario_id`
if (!isset($obj->inventario_id)) {
    echo json_encode(["status" => "error", "message" => "Falta el parámetro inventario_id"]);
    exit();
}

// Preparar la consulta SQL para obtener los movimientos por `inventario_id`
$stmt = $db->prepare("SELECT id, inventario_id, tipo_movimiento, cantidad, concepto, fecha_movimiento 
                      FROM movimientoinventario 
                      WHERE inventario_id = ?");
$stmt->bind_param('i', $obj->inventario_id);
$stmt->execute();
$stmt->bind_result($id, $inventario_id, $tipo_movimiento, $cantidad, $concepto, $fecha_movimiento);

// Obtener los resultados
$arr = array();
while ($stmt->fetch()) {
    $arr[] = array(
        "id" => $id,
        "inventario_id" => $inventario_id,
        "tipo_movimiento" => $tipo_movimiento,
        "cantidad" => $cantidad,
        "concepto" => $concepto,
        "fecha_movimiento" => $fecha_movimiento
    );
}

$stmt->close();

// Si se encontraron movimientos, devolverlos; si no, devolver un mensaje de error
if (!empty($arr)) {
    echo json_encode($arr);
} else {
    echo json_encode(["status" => "error", "message" => "No se encontraron movimientos para este inventario"]);
}
?>
