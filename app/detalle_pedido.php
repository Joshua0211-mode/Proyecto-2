
<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

$usuario_id = $_SESSION['id'];
$pedido_id = isset($_GET['pedido_id']) ? intval($_GET['pedido_id']) : 0;

if ($pedido_id <= 0) {
    die("ID de pedido inválido.");
}

// Obtener información del pedido
$sql = "
    SELECT p.id, p.fecha_pedido, p.estado, p.subtotal, p.iva, p.total, p.metodo_pago,
           d.alias, d.direccion, d.ciudad, d.pais, d.codigo_postal
    FROM pedidos p
    JOIN direcciones d ON p.direccion_envio_id = d.id
    WHERE p.id = $pedido_id AND p.usuario_id = $usuario_id
    LIMIT 1
";

$result = $db->query($sql);
if ($result->num_rows === 0) {
    die("Pedido no encontrado o no tienes permiso para verlo.");
}

$pedido = $result->fetch_assoc();

// Obtener productos del pedido
$productos = $db->query("
    SELECT dp.producto_id, pr.nombre, dp.cantidad, dp.precio_unitario, dp.importe
    FROM detalles_pedido dp
    JOIN producto pr ON dp.producto_id = pr.id
    WHERE dp.pedido_id = $pedido_id
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Pedido</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>📄 Detalle del Pedido #<?= $pedido['id'] ?></h2>
    <p><strong>Fecha:</strong> <?= $pedido['fecha_pedido'] ?></p>
    <p><strong>Estado:</strong> <?= ucfirst($pedido['estado']) ?></p>
    <p><strong>Método de pago:</strong> <?= $pedido['metodo_pago'] ?></p>

    <h5>📍 Dirección de envío:</h5>
    <p>
        <?= htmlspecialchars($pedido['alias']) ?> - <?= htmlspecialchars($pedido['direccion']) ?><br>
        <?= htmlspecialchars($pedido['ciudad']) ?>, <?= htmlspecialchars($pedido['pais']) ?> <?= htmlspecialchars($pedido['codigo_postal']) ?>
    </p>

    <h5>🧾 Productos del Pedido:</h5>
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Importe</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $productos->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nombre']) ?></td>
                <td><?= $row['cantidad'] ?></td>
                <td>$<?= number_format($row['precio_unitario'], 2) ?></td>
                <td>$<?= number_format($row['importe'], 2) ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="3" class="text-right">Subtotal:</th>
            <td>$<?= number_format($pedido['subtotal'], 2) ?></td>
        </tr>
        <tr>
            <th colspan="3" class="text-right">IVA:</th>
            <td>$<?= number_format($pedido['iva'], 2) ?></td>
        </tr>
        <tr>
            <th colspan="3" class="text-right">Total:</th>
            <td><strong>$<?= number_format($pedido['total'], 2) ?></strong></td>
        </tr>
        </tfoot>
    </table>

    <a href="dashboard.php" class="btn btn-primary">Volver al Panel</a>
</div>
</body>
</html>
