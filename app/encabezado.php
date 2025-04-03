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
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
       
        .search-container {
            flex-grow: 1;
            max-width: 600px;
            margin: 0 100px;
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

                    <!-- Barra de búsqueda centrada -->
                    <div class="search-container">
                        <form class="form-inline d-flex">
                            <input class="form-control flex-grow-1" type="search" placeholder="Buscar productos">
                            <button class="btn btn-outline-success ml-2" type="submit">Buscar</button>
                        </form>
                    </div>

                    <!-- Sección de usuario derecha -->
                    <div class="user-section">
                        <a href="sesion.php" class="btn btn-outline-success">Registrarse</a>
                        <a href="inicio.php" class="btn btn-outline-success">Iniciar Sesión</a>
                        <a href="carrito.php"> <i class="fas fa-shopping-cart cart-icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>