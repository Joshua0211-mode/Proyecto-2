
<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

$usuario_id = $_SESSION['id'];

$direccion_id = $_POST['direccion_id'] ?? ($_SESSION['direccion_id'] ?? null);
$metodo_pago = $_POST['metodo_pago'] ?? ($_SESSION['metodo_pago'] ?? null);

if (!$direccion_id || !$metodo_pago) {
    die("Faltan datos para procesar el pedido.");
}

$direccion_id = intval($direccion_id);
$metodo_pago = $db->real_escape_string($metodo_pago);

// Obtener productos del carrito
$sql = "SELECT producto_id, precio, cantidad, total FROM carrito WHERE usuario_id = $usuario_id";
$result = $db->query($sql);

if ($result->num_rows === 0) {
    die("El carrito está vacío.");
}

$subtotal = 0;
$productos = [];

while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
    $subtotal += $row['total'];
}

$iva = round($subtotal * 0.16, 2);
$total = $subtotal + $iva;

// Insertar en tabla pedidos
$insert = $db->query("INSERT INTO pedidos (usuario_id, subtotal, iva, total, direccion_envio_id, metodo_pago)
                      VALUES ($usuario_id, $subtotal, $iva, $total, $direccion_id, '$metodo_pago')");

if (!$insert) {
    die("Error al insertar pedido: " . $db->error);
}

$pedido_id = $db->insert_id;

if (!$pedido_id) {
    die("Error: No se pudo obtener el ID del pedido.");
}

// Insertar detalles del pedido
foreach ($productos as $item) {
    $producto_id = $item['producto_id'];
    $precio = $item['precio'];
    $cantidad = $item['cantidad'];
    $importe = $item['total'];

    $db->query("INSERT INTO detalles_pedido (pedido_id, producto_id, cantidad, precio_unitario, importe)
                VALUES ($pedido_id, $producto_id, $cantidad, $precio, $importe)");
}

// Vaciar carrito
$db->query("DELETE FROM carrito WHERE usuario_id = $usuario_id");

// Redirigir a éxito con pedido_id
header("Location: pedido_exito.php?pedido_id=$pedido_id");
exit;
?>
