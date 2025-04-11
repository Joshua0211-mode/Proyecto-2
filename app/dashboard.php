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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="./controlador/jquery.min.js"></script>
  <script src="./controlador/bootstrap.min.js"></script>
  <script src="./controlador/angular.min.js"></script>
  <style>
    .sticky-header {
      position: sticky;
      top: 0;
      z-index: 1020;
      background-color: #f8f9fa;
      box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
    }

    .search-container {
      flex-grow: 1;
      max-width: 600px;
      margin: 0 150px;
    }

    .user-section {
      margin-left: auto;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .cart-icon {
      color: #28a745;
      font-size: 1.5rem;
    }

    @media (max-width: 991.98px) {
      .search-container {
        position: static;
        transform: none;
        width: 100%;
        margin: 10px 0;
        order: 3;
      }

      .user-section {
        margin-left: 0;
        order: 2;
      }

      .navbar-collapse {
        flex-direction: column;
      }
    }
  </style>
</head>
<header class="sticky-header">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <!-- Logo y menú hamburguesa -->
      <a class="navbar-brand" href="index.php"><i class="fas fa-shopping-bag"></i> Supermercado D&J </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Contenido colapsable -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Menú de navegación izquierda -->
        <ul class="navbar-nav">
        <li><a class="nav-link" href=""><?php session_start(); echo $_SESSION['usuario']; ?></a></li>

          <li class="nav-item">
            <a class="nav-link" href="#">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contacto</a>
          </li>
        </ul>

        <!-- Barra de búsqueda centrada -->
        <div class="search-container">
          <form class="form-inline d-flex">
            <input class="form-control flex-grow-1" type="search" placeholder="Buscar productos">
            <button class="btn btn-outline-success ml-2" type="submit">Buscar</button>
          </form>
        </div>



      </div>
      <!-- Sección de usuario derecha -->
      <ul class="nav navbar-nav navbar-right">
        <a href="carrito.php"> <i class="fas fa-shopping-cart cart-icon"></i>
        <li><a class="nav-link" href="../api/salir.php">Salir</a></li>
      </ul>
    </div>
  </nav>
</header>

<body>


  </section>

  <!-- Sección de Productos -->
  <div class="container py-5">
    <h2 class="section-title">Nuestros Productos</h2>
    <div class="row">
      <!-- Producto 1 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 1">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Leche Entera</h5>
            <p class="card-text">Leche fresca pasteurizada, 1 litro.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.00</p>
              <a href="index.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Producto 2 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 2">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Pan Integral</h5>
            <p class="card-text">Pan de trigo integral, 500g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$0.50</p>
              <a href="#" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Producto 3 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 3">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Arroz Blanco</h5>
            <p class="card-text">Arroz de grano largo, 1kg.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$2.00</p>
              <a href="#" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Producto 4 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 4">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Huevos</h5>
            <p class="card-text">Huevos frescos, docena.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.50</p>
              <a href="#" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Producto 5 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 5">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Aceite de Oliva</h5>
            <p class="card-text">Aceite extra virgen, 500ml.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$3.50</p>
              <a href="#" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Producto 6 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 6">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Azúcar</h5>
            <p class="card-text">Azúcar blanca refinada, 1kg.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.20</p>
              <a href="#" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Producto 7 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 7">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Café</h5>
            <p class="card-text">Café molido, 250g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$2.50</p>
              <a href="#" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Producto 8 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card h-100">
          <img src="" class="card-img-top product-img" alt="Producto 8">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title product-title">Galletas</h5>
            <p class="card-text">Galletas de mantequilla, 200g.</p>
            <div class="mt-auto">
              <p class="card-text product-price">$1.80</p>
              <a href="carrito.php" class="btn btn-primary btn-block">Agregar al Carrito</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>