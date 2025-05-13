
<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

$usuario_id = $_SESSION['id'];

// Obtener direcciones del usuario
$direcciones = $db->query("SELECT * FROM direcciones WHERE usuario_id = $usuario_id");
$hay_direcciones = $direcciones->num_rows > 0;

// Verificar que el carrito no esté vacío
$carrito = $db->query("SELECT COUNT(*) AS total FROM carrito WHERE usuario_id = $usuario_id");
$carrito_vacio = ($carrito->fetch_assoc()['total'] == 0);

if ($carrito_vacio) {
    echo "<div class='container mt-5'><div class='alert alert-warning'>Tu carrito está vacío. Agrega productos antes de continuar.</div></div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Finalizar Compra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>📍 Selecciona una dirección y método de pago</h2>

    <?php if (!$hay_direcciones): ?>
        <div class="alert alert-danger">No tienes direcciones guardadas. <a href="perfil.php">Agrega una aquí</a> para continuar.</div>
    <?php else: ?>
        <form method="POST" action="guardar_pago.php">
            <div class="form-group">
                <label for="direccion_id">📍 Dirección:</label>
                <select class="form-control" name="direccion_id" required>
                    <?php while ($dir = $direcciones->fetch_assoc()): ?>
                        <option value="<?= $dir['id'] ?>">
                            <?= htmlspecialchars($dir['alias']) ?> - <?= htmlspecialchars($dir['direccion']) ?> <?= $dir['principal'] ? '(Principal)' : '' ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="metodo_pago">💳 Método de pago:</label>
                <select class="form-control" name="metodo_pago" required>
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Efectivo">Efectivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Seguir comprando</button>
            <a href="carrito.php" class="btn btn-secondary ml-2">Volver al carrito</a>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
