<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Carrito</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Supermercado D&J</title>
  <!-- Bootstrap CSS -->
  <link rel="icon" type="image/png" href="./img/ITSAV.png" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- IMPORTANTE: Cargar jQuery antes de Angular -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Angular después de jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

  <!-- Inicializar la app Angular -->
  <script>
    // Definir el módulo de la aplicación Angular
    angular.module('app', []);
  </script>
</head>
<header class="sticky-header">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <!-- Logo y menú hamburguesa -->
      <a class="navbar-brand" href="index.php"><i class="fas fa-shopping-bag"></i> Supermercado D&J </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
     
        <!-- Sección de usuario derecha -->
        <div class="user-section">
          <a href="carrito.php"> <i class="fas fa-shopping-cart cart-icon"></i></a>
          <a href="../app/dashboard.php">Salir</a>
        </div>
      </div>
  </nav>
</header>
<!-- Inicializar el dropdown cuando la página cargue -->
<script>
  $(document).ready(function() {
    // Inicializar dropdown
    $('.dropdown-toggle').dropdown();
  });
</script>
<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: ../app/index.php");
    exit;
}

$usuario_id = $_SESSION['id'];

$sql = "
   SELECT c.id AS carrito_id, p.id AS producto_id, p.nombre, c.precio, c.cantidad, c.total
    FROM carrito c
    JOIN producto p ON c.producto_id = p.id
    WHERE c.usuario_id = $usuario_id
";
$result = $db->query($sql);

?>

<body>
    <div class="container mt-5">
        <h2>🛒 Mi Carrito</h2>
        <?php if ($result && $result->num_rows > 0): ?>
            <table class="table table-bordered mt-4">
                <thead class="thead-light">
                    <tr>
                        
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $granTotal = 0; ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <?php $granTotal += $row['total']; ?>
                        
                        <tr> 
                            
                            <td><?= htmlspecialchars($row['nombre']) ?></td>
                            <td>$<?= number_format($row['precio'], 2) ?></td>
                            <td><?= $row['cantidad'] ?></td>
                            <td>$<?= number_format($row['total'], 2) ?></td>
                            <td>
                                <a href="eliminar_carrito.php?id=<?= $row['carrito_id'] ?>" class="btn btn-danger btn-sm">
                                    Eliminar
                                </a>
                                <!-- Aquí podrías poner un formulario para actualizar cantidad -->
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-right">Total a pagar:</th>
                        <th colspan="2">$<?= number_format($granTotal, 2) ?></th>
                    </tr>
                </tfoot>
            </table>
        <?php else: ?>
            <div class="alert alert-info mt-4">Tu carrito está vacío.</div>
        <?php endif; ?>
        <a href="dashboard.php" class="btn btn-secondary">← Seguir comprando</a>
        <a href="finalizar_compra.php" class="btn btn-success">  Finalizar compra →</a>
        
    </div>
</body>

</html>