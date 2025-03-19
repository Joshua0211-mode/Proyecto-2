<?php
error_reporting(E_ALL);
require_once 'conexion.php';

$obj = json_decode(file_get_contents("php://input"));

if (!isset($obj->Id)) {
    echo json_encode(["status" => "error", "message" => "Falta el parámetro Id"]);
    exit;
}

$stmt = $db->prepare("SELECT Id, IdCliente, Fecha, Folio, Subtotal, IVA, Total, Comentarios FROM notas WHERE Id = ?");
$stmt->bind_param('i', $obj->Id);
$stmt->execute();
$stmt->bind_result($id, $idCliente, $fecha, $folio, $subtotal, $iva, $total, $comentarios);

if ($stmt->fetch()) {
    $resultado = [
        "Id" => $id,
        "IdCliente" => $idCliente,
        "Fecha" => $fecha,
        "Folio" => $folio,
        "Subtotal" => $subtotal,
        "IVA" => $iva,
        "Total" => $total,
        "Comentarios" => $comentarios
    ];
    echo json_encode($resultado);
} else {
    echo json_encode(["status" => "error", "message" => "Nota no encontrada"]);
}

$stmt->close();
?>
