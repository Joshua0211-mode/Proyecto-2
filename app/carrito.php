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
  <link rel="stylesheet" href="./css/carrito.css">
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
<script src ="./controlador/carrito.js"></script>
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
        <!-- Menú de navegación izquierda -->
        <ul class="navbar-nav">
          <li class="nav-link" href=""><?php session_start(); echo $_SESSION['usuario']; ?></li>

         
        <!-- Sección de usuario derecha -->
        <div class="user-section">
          <a href="carrito.php"> <i class="fas fa-shopping-cart cart-icon"></i></a>
          <a href="../api/salir.php">Salir</a>

        </div>
      </div>
    </div>
  </nav>
</header>   
<body>

  <!-- Carrito de compras -->
  <div class="cart-sidebar">
    <h3>Tu Carrito</h3>
    <div class="cart-items">
      <div ng-repeat="item in cart" class="cart-item">
        <div class="d-flex justify-content-between">
          <span>{{item.name}} x{{item.quantity}}</span>
          <span>${{(item.price * item.quantity).toFixed(2)}}</span>
          <button class="btn btn-sm btn-danger" ng-click="removeFromCart($index)">×</button>
        </div>
      </div>
      <div ng-if="cart.length === 0" class="text-muted">El carrito está vacío</div>
    </div>
    <div class="cart-total">
      Total: $<span class="total-amount">{{getTotal().toFixed(2)}}</span>
    </div>
    <button class="btn btn-success checkout-btn" ng-click="checkout()" ng-disabled="cart.length === 0">
      Finalizar Compra
    </button>
  </div>
</div>

</body>

</html>