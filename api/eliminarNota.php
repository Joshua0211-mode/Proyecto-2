<?php
error_reporting(E_ALL);
require_once 'conexion.php';

$obj = json_decode(file_get_contents("php://input"));

if (!isset($obj->Id)) {
    echo json_encode(["status" => "error", "message" => "Falta el parámetro Id"]);
    exit;
}

$idNota = intval($obj->Id);

// Primero, eliminar los detalles relacionados con la nota
$stmtDetalles = $db->prepare("DELETE FROM detalles WHERE IdNota = ?");
$stmtDetalles->bind_param('i', $idNota);
$stmtDetalles->execute();
$stmtDetalles->close();

// Luego, eliminar la nota
$stmtNota = $db->prepare("DELETE FROM notas WHERE Id = ?");
$stmtNota->bind_param('i', $idNota);
$success = $stmtNota->execute();

if ($success && $stmtNota->affected_rows > 0) {
    echo json_encode(["status" => "success", "message" => "Nota eliminada correctamente"]);
} else {
    echo json_encode(["status" => "error", "message" => "No se encontró la nota"]);
}

$stmtNota->close();
?>
