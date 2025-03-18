<?php
error_reporting(E_ALL);

// Conexión a la base de datos
require_once 'conexion.php';

// Preparar la consulta SQL para obtener todos los registros de inventario
$stmt = $db->prepare("SELECT id, producto_id, almacen_id, cantidad_actual, cantidad_minima, cantidad_maxima, fecha_ultima_entrada, fecha_ultima_salida FROM inventario");
$stmt->bind_result($id, $producto_id, $almacen_id, $cantidad_actual, $cantidad_minima, $cantidad_maxima, $fecha_ultima_entrada, $fecha_ultima_salida);
$stmt->execute();

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
echo json_encode($arr);
?>
