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

// Preparar la consulta SQL para obtener el registro de inventario por id
$stmt = $db->prepare("SELECT id, producto_id, almacen_id, cantidad_actual, cantidad_minima, cantidad_maxima, fecha_ultima_entrada, fecha_ultima_salida FROM inventario WHERE id = ?");
$stmt->bind_param('i', $obj->id);
$stmt->execute();
$stmt->bind_result($id, $producto_id, $almacen_id, $cantidad_actual, $cantidad_minima, $cantidad_maxima, $fecha_ultima_entrada, $fecha_ultima_salida);

// Obtener los resultados
if ($stmt->fetch()) {
    $resultado = [
        "id" => $id,
        "producto_id" => $producto_id,
        "almacen_id" => $almacen_id,
        "cantidad_actual" => $cantidad_actual,
        "cantidad_minima" => $cantidad_minima,
        "cantidad_maxima" => $cantidad_maxima,
        "fecha_ultima_entrada" => $fecha_ultima_entrada,
        "fecha_ultima_salida" => $fecha_ultima_salida
    ];
    echo json_encode($resultado);
} else {
    echo json_encode(["status" => "error", "message" => "No se encontró el inventario"]);
}

// Cerrar la sentencia
$stmt->close();
?>
