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
            <a class="navbar-brand" href="index.php"><i class="fas fa-shopping-bag"></i> Supermercado D&J </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Contenido colapsable -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Menú de navegación izquierda -->
                <ul class="navbar-nav">
                    <li class="nav-item active">

                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productos.php">Productos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="categoriasDropdown">
                            <a class="dropdown-item" href="index.php?categoria=Lácteos y Derivados">Lácteos y Derivados</a>
                            <a class="dropdown-item" href="index.php?categoria=Panificación y Repostería">Panificación y Repostería</a>
                            <a class="dropdown-item" href="index.php?categoria=Cárnicos y Embutidos">Cárnicos y Embutidos</a>
                            <a class="dropdown-item" href="index.php?categoria=Enlatados y Conservas">Enlatados y Conservas</a>
                            <a class="dropdown-item" href="index.php?categoria=Aves y Huevo">Aves y Huevo</a>
                            <a class="dropdown-item" href="index.php?categoria=Jugos y Bebidas de Frutas">Jugos y Bebidas de Frutas</a>
                            <a class="dropdown-item" href="index.php?categoria=Bebidas no Alcohólicas">Bebidas no Alcohólicas</a>
                            <a class="dropdown-item" href="index.php?categoria=Bebidas Alcohólicas">Bebidas Alcohólicas</a>
                            <a class="dropdown-item" href="index.php?categoria=Botanas y Snacks">Botanas y Snacks</a>
                            <a class="dropdown-item" href="index.php?categoria=Encurtidos y Aderezos">Encurtidos y Aderezos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php">Todas las categorías</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
                <!-- Barra de búsqueda centrada -->
                <div class="search-container">
                    <form class="form-inline d-flex" method="GET" action="index.php">
                        <input class="form-control flex-grow-1" type="search" name="buscar" placeholder="Buscar productos">
                        <button class="btn btn-outline-success ml-2" type="submit">Buscar</button>
                    </form>
                </div>
                <!-- Sección de usuario derecha -->
                <div class="user-section">
                    <a href="sesion.php" class="btn btn-outline-success">Registrarse</a>
                    <a href="inicio.php" class="btn btn-outline-success">Iniciar Sesión</a>

                </div>
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