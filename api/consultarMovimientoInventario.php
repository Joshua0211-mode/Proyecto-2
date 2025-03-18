<?php
error_reporting(E_ALL);

// Conexión a la base de datos
require_once 'conexion.php';

// Preparar la consulta SQL para obtener todos los movimientos
$stmt = $db->prepare("SELECT id, inventario_id, tipo_movimiento, cantidad, concepto, fecha_movimiento FROM movimientoinventario");
$stmt->bind_result($id, $inventario_id, $tipo_movimiento, $cantidad, $concepto, $fecha_movimiento);
$stmt->execute();

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
    echo json_encode(["status" => "error", "message" => "No se encontraron movimientos"]);
}
?>
