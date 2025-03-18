<?php
error_reporting(E_ALL);
require_once 'conexion.php';

// Obtener los datos JSON enviados
$obj = json_decode(file_get_contents("php://input"));

// Verificar que se reciban todos los datos necesarios
if (!isset($obj->id) || !isset($obj->nombre) || !isset($obj->ubicacion) || !isset($obj->capacidad) || !isset($obj->activo)) {
    echo json_encode(["status" => "error", "message" => "Faltan parámetros"]);
    exit();
}

// Preparar la consulta SQL para actualizar el registro en la tabla almacen
$stmt = $db->prepare("UPDATE almacen SET nombre = ?, ubicacion = ?, capacidad = ?, activo = ? WHERE id = ?");
$stmt->bind_param('ssisi', $obj->nombre, $obj->ubicacion, $obj->capacidad, $obj->activo, $obj->id);

// Ejecutar la consulta
$stmt->execute();

// Cerrar la sentencia
$stmt->close();

// Devolver un mensaje de éxito
echo json_encode(["status" => "success", "message" => "Almacen modificado correctamente"]);
?>
