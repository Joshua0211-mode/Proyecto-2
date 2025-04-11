
<!DOCTYPE html>
<html lang="es" ng-app="app">
<?php require_once 'encabezado.php'; ?>

<body>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title">Supermercado Online</h1>
            <p class="hero-subtitle">Los mejores productos a tu alcance</p>
            
        </div>
    </section>

    <!-- Sección de Productos -->
    <div class="container py-5">
        <h2 class="section-title">Nuestros Productos</h2>
        <div class="row">
            <!-- Producto 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card h-100">
                    <img src="img/lala.png" class="card-img-top product-img" alt="Producto 1">
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
        </div>
    </div>
</body>
<?php require_once 'pie.php'; ?>