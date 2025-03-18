<?php
error_reporting(E_ALL);

// Conexión a la base de datos
require_once 'conexion.php';

// Obtener los datos JSON enviados
$obj = json_decode(file_get_contents("php://input"));

// Verificar que se reciban los parámetros necesarios
if (!isset($obj->producto_id) || !isset($obj->almacen_id)) {
    echo json_encode(["status" => "error", "message" => "Faltan parámetros"]);
    exit();
}

// Preparar la consulta SQL para obtener el inventario por producto_id y almacen_id
$stmt = $db->prepare("SELECT id, producto_id, almacen_id, cantidad_actual, cantidad_minima, cantidad_maxima, fecha_ultima_entrada, fecha_ultima_salida 
                      FROM inventario 
                      WHERE producto_id = ? AND almacen_id = ?");
$stmt->bind_param('ii', $obj->producto_id, $obj->almacen_id);
$stmt->execute();
$stmt->bind_result($id, $producto_id, $almacen_id, $cantidad_actual, $cantidad_minima, $cantidad_maxima, $fecha_ultima_entrada, $fecha_ultima_salida);

// Obtener los resultados
$arr = array();
while ($stmt->fetch()) {
    $arr[] = array(
        "id" => $id,
        "producto_id" => $producto_id,
        "almacen_id" => $almacen_id,
        "cantidad_actual" => $cantidad_actual,
        "cantidad_minima" => $cantidad_minima,
        "cantidad_maxima" => $cantidad_maxima,
        "fecha_ultima_entrada" => $fecha_ultima_entrada,
        "fecha_ultima_salida" => $fecha_ultima_salida
    );
}

$stmt->close();

// Si se encontró algún registro, devolverlo; si no, devolver un mensaje de error
if (!empty($arr)) {
    echo json_encode($arr);
} else {
    echo json_encode(["status" => "error", "message" => "No se encontró el inventario para los parámetros proporcionados"]);
}
?>
