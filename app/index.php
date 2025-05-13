<!DOCTYPE html>
<html lang="es" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supermercado D&J</title>
    
    <!-- Estilos y recursos -->
    <link rel="icon" type="image/png" href="./img/super.png" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    
    <script>
        angular.module('app', []);
    </script>


</head>

<body>
    <!-- Header -->
    <header class="sticky-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><i class="fas fa-shopping-bag"></i> Supermercado D&J</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="nav-link" href="inicio.php"><i class="fas fa-user-circle"></i> Mi Perfil</a>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form class="form-inline d-flex" method="GET" action="index.php">
                                <input class="form-control flex-grow-1" type="search" name="buscar" placeholder="Buscar productos">
                                <button class="btn btn-outline-success ml-2" type="submit">Buscar</button>
                            </form>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="sesion.php" class="btn btn-outline-success">Registrarse</a>
                            <a href="inicio.php" class="btn btn-outline-success ml-2">Iniciar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Mejorado -->
    <section class="hero-section text-center text-white py-5">
        <div class="container">
            <h1 class="display-4 font-weight-bold">Supermercado D&J</h1>
            <p class="lead">Tu mercado de confianza, a un clic de distancia</p>
            <a href="#productos" class="btn btn-light btn-lg mt-3">Explora nuestros productos</a>
        </div>
    </section>

    <!-- Conexión PHP y lógica de productos -->
    <?php
    require_once 'conexion.php';
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
        SELECT p.id, p.nombre, p.descripcion, p.precio
        FROM producto p
        $where
        LIMIT 16
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

    <!-- Productos -->
    <div id="productos" class="container py-5">
        <h2 class="section-title mb-4 text-center">
            <?php if ($categoriaActual): ?>
                <?= htmlspecialchars($categoriaActual) ?>
            <?php else: ?>
                Todos nuestros productos
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
                                
                                <div class="mt-auto">
                                    <p class="card-text product-price">$<?= number_format($row['precio'], 2) ?></p>
                                    <a href="inicio.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
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

    <!-- Footer -->
    <?php require_once 'pie.php'; ?>

    <!-- JS extra -->
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>
</html>
