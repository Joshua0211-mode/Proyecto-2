<!DOCTYPE html>
<html lang="es" ng-app="app">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supermercado XYZ</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/png" href="./img/ITSAV.png" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css"> <!-- Tu archivo CSS personalizado -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="./controlador/jquery.min.js"></script>
    <script src="./controlador/bootstrap.min.js"></script>
    <script src="./controlador/angular.min.js"></script>
    <!-- Font Awesome para íconos -->
</head>
<header>
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Supermercado XYZ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
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
            <form class="form-inline ml-auto">
                <input class="form-control mr-2" type="search" placeholder="Buscar productos" aria-label="Buscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <div class="ml-2">
                <a href="sesion.php" class="btn btn-outline-success my-2 my-sm-0">Registrasrse</a>
                <a href="inicio.php" class="btn btn-outline-success my-2 my-sm-0">Iniciar Sesión</a>
                <a href="carrito.php" class="my-2 my-sm-0"> <img src="" style="width: 30px; height: 30px;">
                </a>
            </div>
        </div>
    </nav>
</header>