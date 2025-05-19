
<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

$usuario_id = $_SESSION['id'];

// Verifica que se haya guardado dirección y método de pago
if (empty($_SESSION['direccion_id']) || empty($_SESSION['metodo_pago'])) {
    echo "<div class='alert alert-danger text-center mt-5'>⚠️ Debes seleccionar una dirección y método de pago antes de continuar. <a href='finalizar_compra.php'>Hazlo aquí</a></div>";
    exit;
}

// Obtener productos del carrito
$sql = "SELECT p.nombre, c.producto_id, c.precio, c.cantidad, c.total
        FROM carrito c
        JOIN producto p ON c.producto_id = p.id
        WHERE c.usuario_id = $usuario_id";
$result = $db->query($sql);

$productos = [];
$subtotal = 0;

while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
    $subtotal += $row['total'];
}

$iva = round($subtotal * 0.16, 2);
$total = $subtotal + $iva;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Pedido en Proceso</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>📝 Detalle del Pedido en Proceso</h2>

    <?php if (empty($productos)): ?>
        <div class="alert alert-warning">Tu carrito está vacío.</div>
    <?php else: ?>
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Importe</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productos as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['nombre']) ?></td>
                    <td>$<?= number_format($item['precio'], 2) ?></td>
                    <td><?= $item['cantidad'] ?></td>
                    <td>$<?= number_format($item['total'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="3" class="text-right">Subtotal:</th>
                <td>$<?= number_format($subtotal, 2) ?></td>
            </tr>
            <tr>
                <th colspan="3" class="text-right">IVA (16%):</th>
                <td>$<?= number_format($iva, 2) ?></td>
            </tr>
            <tr>
                <th colspan="3" class="text-right">Total:</th>
                <td><strong>$<?= number_format($total, 2) ?></strong></td>
            </tr>
            </tfoot>
        </table>

        
        <form method="POST" action="procesar_pedido.php">
            <button type="submit" class="btn btn-success">Proceder al Pago</button>
            <a href="carrito.php" class="btn btn-secondary ml-2">Volver al Carrito</a>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
