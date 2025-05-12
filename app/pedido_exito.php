
<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

if (!isset($_GET['pedido_id'])) {
    echo "Pedido no especificado.";
    exit;
}

$pedido_id = intval($_GET['pedido_id']);

// Obtener información del pedido
$sql = "
    SELECT p.id, p.fecha_pedido, p.total, d.direccion, d.alias, p.metodo_pago
    FROM pedidos p
    JOIN direcciones d ON p.direccion_envio_id = d.id
    WHERE p.id = $pedido_id AND p.usuario_id = {$_SESSION['id']}
    LIMIT 1
";

$result = $db->query($sql);

if ($result->num_rows === 0) {
    echo "Pedido no encontrado.";
    exit;
}

$pedido = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedido Confirmado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="alert alert-success">
        <h4 class="alert-heading">✅ ¡Tu pedido ha sido confirmado!</h4>
        <p>Gracias por tu compra, <?= htmlspecialchars($_SESSION['usuario']) ?>.</p>
    </div>

    <h5>📦 Detalles del Pedido</h5>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID del pedido:</strong> <?= $pedido['id'] ?></li>
        <li class="list-group-item"><strong>Fecha:</strong> <?= $pedido['fecha_pedido'] ?></li>
        <li class="list-group-item"><strong>Total pagado:</strong> $<?= number_format($pedido['total'], 2) ?></li>
        <li class="list-group-item"><strong>Dirección:</strong> <?= htmlspecialchars($pedido['alias']) ?> - <?= htmlspecialchars($pedido['direccion']) ?></li>
        <li class="list-group-item"><strong>Método de pago:</strong> <?= htmlspecialchars($pedido['metodo_pago']) ?></li>
    </ul>

    <a href="productos.php" class="btn btn-primary mt-4">Seguir comprando</a>
</div>
</body>
</html>
