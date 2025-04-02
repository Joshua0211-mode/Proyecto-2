<?php require_once 'encabezado.php'; ?>
<!DOCTYPE html>
<html lang="es" ng-app="app">
    <!-- Carrito Flotante -->
 <div class="floating-cart" id="cartToggle">
        <div class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count">0</span>
        </div>
    </div>
    
    <div class="cart-overlay" id="cartOverlay"></div>
    
    <div class="cart-panel" id="cartPanel">
        <span class="close-cart" id="closeCart">&times;</span>
        <h3>Tu Carrito</h3>
        <div class="cart-items" id="cartItems">
            <!-- Aquí se agregarán los productos dinámicamente -->
            <p class="text-muted">Tu carrito está vacío</p>
        </div>
        <div class="cart-total">
            <h4>Total: <span id="cartTotal">$0.00</span></h4>
        </div>
        <button class="btn btn-primary btn-block mt-3">Finalizar Compra</button>
    </div>