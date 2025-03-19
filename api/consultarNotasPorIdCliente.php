<?php
error_reporting(E_ALL);
require_once 'conexion.php';

$obj = json_decode(file_get_contents("php://input"));

if (!isset($obj->IdCliente)) {
    echo json_encode(["status" => "error", "message" => "Falta el IdCliente"]);
    exit;
}

$stmt = $db->prepare("SELECT Id, IdCliente, Fecha, Folio, Subtotal, IVA, Total, Comentarios FROM notas WHERE IdCliente = ?");
$stmt->bind_param('i', $obj->IdCliente);
$stmt->execute();
$stmt->bind_result($Id, $IdCliente, $Fecha, $Folio, $Subtotal, $IVA, $Total, $Comentarios);

$arr = array();
while ($stmt->fetch()) {
    $arr[] = array(
        'Id' => $Id,
        'IdCliente' => $IdCliente,
        'Fecha' => $Fecha,
        'Folio' => $Folio,
        'Subtotal' => $Subtotal,
        'IVA' => $IVA,
        'Total' => $Total,
        'Comentarios' => $Comentarios
    );
}

$stmt->close();
echo json_encode($arr);
?>
