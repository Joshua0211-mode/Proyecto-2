<?php
error_reporting(E_ALL);
require_once 'conexion.php';

$obj = json_decode(file_get_contents("php://input"));

if (!isset($obj->IdCliente, $obj->Fecha, $obj->Folio, $obj->Subtotal, $obj->IVA, $obj->Total)) {
    echo json_encode(["status" => "error", "message" => "Faltan datos obligatorios"]);
    exit;
}

$stmt = $db->prepare("INSERT INTO notas (IdCliente, Fecha, Folio, Subtotal, IVA, Total, Comentarios) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('issddds', $obj->IdCliente, $obj->Fecha, $obj->Folio, $obj->Subtotal, $obj->IVA, $obj->Total, $obj->Comentarios);
$success = $stmt->execute();

if ($success) {
    echo json_encode(["status" => "success", "message" => "Nota insertada correctamente", "Id" => $stmt->insert_id]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al insertar la nota"]);
}

$stmt->close();
?>
