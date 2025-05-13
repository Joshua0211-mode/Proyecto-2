
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['direccion_id'] = $_POST['direccion_id'] ?? null;
    $_SESSION['metodo_pago'] = $_POST['metodo_pago'] ?? null;
    header("Location: ver_detalle_carrito.php");
    exit;
} else {
    header("Location: finalizar_compra.php");
    exit;
}
?>
