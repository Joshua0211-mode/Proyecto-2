
<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

$usuario_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['direccion_id']) || empty($_POST['metodo_pago'])) {
    die("Datos incompletos.");
}

$direccion_id = intval($_POST['direccion_id']);
$metodo_pago = $db->real_escape_string($_POST['metodo_pago']);

// Obtener los productos del carrito
$carrito = $db->query("
    SELECT producto_id, precio, cantidad, total
    FROM carrito
    WHERE usuario_id = $usuario_id
");

if ($carrito->num_rows === 0) {
    die("El carrito está vacío.");
}

$subtotal = 0;
$productos = [];

while ($item = $carrito->fetch_assoc()) {
    $subtotal += $item['total'];
    $productos[] = $item;
}

$iva = round($subtotal * 0.16, 2);
$total = $subtotal + $iva;

// Insertar pedido
$db->query("
    INSERT INTO pedidos (usuario_id, subtotal, iva, total, direccion_envio_id, metodo_pago)
    VALUES ($usuario_id, $subtotal, $iva, $total, $direccion_id, '$metodo_pago')
");

$pedido_id = $db->insert_id;

// Insertar detalles del pedido
foreach ($productos as $prod) {
    $db->query("
        INSERT INTO detalles_pedido (pedido_id, producto_id, cantidad, precio_unitario, importe)
        VALUES ($pedido_id, {$prod['producto_id']}, {$prod['cantidad']}, {$prod['precio']}, {$prod['total']})
    ");
}

// Vaciar carrito
$db->query("DELETE FROM carrito WHERE usuario_id = $usuario_id");

header("Location: pedido_exito.php?pedido_id=$pedido_id");
exit;
?>
