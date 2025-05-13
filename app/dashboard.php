<!DOCTYPE html>
<html lang="es" ng-app="app">

<head>
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
      <a class="navbar-brand" href="dashboard.php"><i class="fas fa-shopping-bag"></i> Supermercado D&J </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Contenido colapsable -->
      <div class="collapse navbar-collapse" id="navbarNav">

        </li>

        <!-- Menú de navegación izquierda -->

        <ul class="navbar-nav">

          <li class="nav-item">
          <li class="nav-link" href=""><i class="fas fa-user-circle"></i><?php session_start();
                                                                          echo $_SESSION['usuario']; ?></li>
          <a class="nav-link" href="productos.php"><i class="fas fa-box"></i> Productos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="categoriasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-th-list"></i> Categorías
            </a>
            <div class="dropdown-menu" aria-labelledby="categoriasDropdown">
              <a class="dropdown-item" href="productos.php?categoria=Lácteos y Derivados">Lácteos y Derivados</a>
              <a class="dropdown-item" href="productos.php?categoria=Panificación y Repostería">Panificación y Repostería</a>
              <a class="dropdown-item" href="productos.php?categoria=Cárnicos y Embutidos">Cárnicos y Embutidos</a>
              <a class="dropdown-item" href="productos.php?categoria=Enlatados y Conservas">Enlatados y Conservas</a>
              <a class="dropdown-item" href="productos.php?categoria=Aves y Huevo">Aves y Huevo</a>
              <a class="dropdown-item" href="productos.php?categoria=Jugos y Bebidas de Frutas">Jugos y Bebidas de Frutas</a>
              <a class="dropdown-item" href="productos.php?categoria=Bebidas no Alcohólicas">Bebidas no Alcohólicas</a>
              <a class="dropdown-item" href="productos.php?categoria=Bebidas Alcohólicas">Bebidas Alcohólicas</a>
              <a class="dropdown-item" href="productos.php?categoria=Botanas y Snacks">Botanas y Snacks</a>
              <a class="dropdown-item" href="productos.php?categoria=Encurtidos y Aderezos">Encurtidos y Aderezos</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="productos.php">Todas las categorías</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="perfil.php"><i class="fas fa-map-marker-alt""></i> Direcciones</a>
          </li>
          <li class=" nav-item">
                <a class="nav-link" href="pie.php">Contacto</a>
          </li>

        </ul>

        <!-- Barra de búsqueda centrada -->
        <div class="search-container">
          <form class="form-inline d-flex" method="GET" action="">
            <input class="form-control flex-grow-1" type="search" name="buscar" placeholder="Buscar productos">
            <button class="btn btn-outline-success ml-2" type="submit">Buscar</button>
          </form>
        </div>
        <!-- Sección de usuario derecha -->
        <div class="user-section">
          <li class="nav-item">
            <a href="carrito.php"> <i class="fas fa-shopping-cart cart-icon"></i></a>
            <a href="../api/salir.php">Cerrar Sesión</a>
          </li>
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
require_once 'conexion.php'; // Usa tu archivo que contiene la conexión
$condicion = "";
$param = [];

if (!empty($_GET['buscar'])) {
  $buscar = $db->real_escape_string($_GET['buscar']);
  $condicion = "WHERE nombre LIKE '%$buscar%' OR descripcion LIKE '%$buscar%'";
}

$sql = "SELECT nombre, descripcion, precio FROM producto $condicion";
$result = $db->query($sql);


$condiciones = [];

if (!empty($_GET['buscar'])) {
  $buscar = $db->real_escape_string($_GET['buscar']);
  $condiciones[] = "(p.nombre LIKE '%$buscar%' OR p.descripcion LIKE '%$buscar%')";
}

if (!empty($_GET['categoria'])) {
  $categoria = $db->real_escape_string($_GET['categoria']);
  $condiciones[] = "c.nombre = '$categoria'";
}

$where = count($condiciones) > 0 ? 'WHERE ' . implode(' AND ', $condiciones) : '';

$sql = "
    SELECT p.id, p.nombre, p.descripcion, p.precio, c.nombre AS categoria
    FROM producto p
    LEFT JOIN categorias c ON p.categoria_id = c.id
    $where
    LIMIT 30
";

$result = $db->query($sql);


$categoriaActual = null;

if (!empty($_GET['categoria'])) {
  $categoriaNombre = $db->real_escape_string($_GET['categoria']);
  $queryCategoria = "SELECT nombre FROM categorias WHERE nombre = '$categoriaNombre' LIMIT 1";
  $resultadoCategoria = $db->query($queryCategoria);

  if ($resultadoCategoria && $resultadoCategoria->num_rows > 0) {
    $fila = $resultadoCategoria->fetch_assoc();
    $categoriaActual = $fila['nombre'];
  }
}


?>

<body>


  <div class="container py-5">
    <h2 class="section-title">
      <?php if ($categoriaActual): ?>
        <?= htmlspecialchars($categoriaActual) ?>
      <?php else: ?>
        ¡Encuntra una variedad de productos!
      <?php endif; ?>
    </h2>
    <div class="row">
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card product-card h-100">
              <?php
              $id = isset($row['id']) ? $row['id'] : 0;
              $imgPath = "img/{$id}.png";

              if (!file_exists($imgPath)) {
                $imgPath = "img/default.png";
              }
              ?>
              <img src="<?= $imgPath ?>" class="card-img-top product-img" alt="<?= htmlspecialchars($row['nombre']) ?>">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?= htmlspecialchars($row['nombre']) ?></h5>
                <p class="card-text"><?= htmlspecialchars($row['descripcion']) ?></p>
                <small class="text-muted">Categoría: <?= htmlspecialchars($row['categoria']) ?></small>
                <div class="mt-auto">
                  <p class="card-text product-price">$<?= number_format($row['precio'], 2) ?></p>
                  <a href="agregar_carrito.php?id=<?= $row['id'] ?>&cantidad=1" class="btn btn-primary btn-block">
                    Agregar al Carrito
                  </a>

                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="col-12">
          <p class="text-center">No se encontraron productos.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>

</body>
<?php require_once 'pie.php'; ?>