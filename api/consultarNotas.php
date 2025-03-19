<?php
error_reporting(E_ALL);
require_once 'conexion.php';

$stmt = $db->prepare("SELECT Id, IdCliente, Fecha, Folio, Subtotal, IVA, Total, Comentarios FROM notas");
$stmt->execute();
$stmt->bind_result($id, $idCliente, $fecha, $folio, $subtotal, $iva, $total, $comentarios);

$arr = array();
while ($stmt->fetch()) {
    $arr[] = [
        "Id" => $id,
        "IdCliente" => $idCliente,
        "Fecha" => $fecha,
        "Folio" => $folio,
        "Subtotal" => $subtotal,
        "IVA" => $iva,
        "Total" => $total,
        "Comentarios" => $comentarios
    ];
}
$stmt->close();
echo json_encode($arr);
?>
