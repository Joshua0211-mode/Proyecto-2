<?php
error_reporting(E_ALL);
require_once 'conexion.php';

$obj = json_decode(file_get_contents("php://input"));

if (!isset($obj->Id, $obj->IdCliente, $obj->Fecha, $obj->Folio, $obj->Subtotal, $obj->IVA, $obj->Total)) {
    echo json_encode(["status" => "error", "message" => "Faltan datos obligatorios"]);
    exit;
}

$stmt = $db->prepare("UPDATE notas SET IdCliente=?, Fecha=?, Folio=?, Subtotal=?, IVA=?, Total=?, Comentarios=? WHERE Id=?");
$stmt->bind_param('issdddsi', $obj->IdCliente, $obj->Fecha, $obj->Folio, $obj->Subtotal, $obj->IVA, $obj->Total, $obj->Comentarios, $obj->Id);
$success = $stmt->execute();

if ($success && $stmt->affected_rows > 0) {
    echo json_encode(["status" => "success", "message" => "Nota modificada correctamente"]);
} else {
    echo json_encode(["status" => "error", "message" => "No se encontró la nota o no hubo cambios"]);
}

$stmt->close();
?>
