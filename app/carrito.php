
<!DOCTYPE html>
<html lang="es" ng-app="app">
<head>
    <!-- Asegúrate de tener estos en tu head -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Estilos mejorados para el carrito */
        .floating-cart {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 999;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .floating-cart:hover {
            transform: scale(1.1);
        }
        
        .cart-icon {
            position: relative;
            background-color: #2c3e50;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .cart-icon i {
            font-size: 1.5rem;
        }
        
        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #e74c3c;
            color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .cart-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 998;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .cart-panel {
            position: fixed;
            top: 0;
            right: -400px;
            width: 380px;
            height: 100%;
            background-color: white;
            z-index: 999;
            box-shadow: -5px 0 15px rgba(0,0,0,0.1);
            transition: right 0.3s ease;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        
        .close-cart {
            position: absolute;
            top: 15px;
            left: 15px;
            font-size: 1.5rem;
            cursor: pointer;
            color: #7f8c8d;
        }
        
        .close-cart:hover {
            color: #e74c3c;
        }
        
        .cart-panel h3 {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ecf0f1;
            color: #2c3e50;
        }
        
        .cart-items {
            flex-grow: 1;
            overflow-y: auto;
            margin-bottom: 20px;
        }
        
        .cart-item {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ecf0f1;
        }
        
        .cart-item-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 15px;
        }
        
        .cart-item-details {
            flex-grow: 1;
        }
        
        .cart-item-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: #2c3e50;
        }
        
        .cart-item-price {
            color: #27ae60;
            font-weight: 600;
        }
        
        .cart-item-remove {
            color: #e74c3c;
            cursor: pointer;
            align-self: flex-start;
        }
        
        .cart-total {
            padding: 15px 0;
            border-top: 2px solid #ecf0f1;
            border-bottom: 2px solid #ecf0f1;
            margin-bottom: 20px;
        }
        
        .cart-total h4 {
            display: flex;
            justify-content: space-between;
            color: #2c3e50;
        }
        
        .btn-checkout {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        
        .btn-checkout:hover {
            background-color: #219653;
        }
        
        .empty-cart-message {
            text-align: center;
            padding: 40px 0;
            color: #7f8c8d;
        }
        
        @media (max-width: 480px) {
            .cart-panel {
                width: 90%;
                right: -100%;
            }
        }
    </style>
</head>
<body>

    <!-- Carrito Flotante Mejorado -->
    <div class="floating-cart" id="cartToggle">
        <div class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count">0</span>
        </div>
    </div>
    
    <div class="cart-overlay" id="cartOverlay"></div>
    
    <div class="cart-panel" id="cartPanel">
        <span class="close-cart" id="closeCart">&times;</span>
        <h3>Tu Carrito de Compras</h3>
        <div class="cart-items" id="cartItems">
            <!-- Ejemplo de producto en el carrito (se generará dinámicamente) -->
            <
            <div class="cart-item">
                <img src="ruta/a/imagen-producto.jpg" alt="Producto" class="cart-item-img">
                <div class="cart-item-details">
                    <div class="cart-item-title">Aceite de Oliva Extra Virgen</div>
                    <div class="cart-item-price">$3.50</div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="quantity-selector">
                            <button class="btn-quantity">-</button>
                            <span class="quantity">1</span>
                            <button class="btn-quantity">+</button>
                        </div>
                        <div class="cart-item-remove">
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                </div>
            </div>
        >
            <p class="empty-cart-message">Tu carrito está vacío</p>
        </div>
        <div class="cart-total">
            <h4>Total: <span id="cartTotal">$0.00</span></h4>
        </div>
        <button class="btn btn-checkout">Finalizar Compra</button>
    </div>

    <script>
        // JavaScript para funcionalidad del carrito
        document.addEventListener('DOMContentLoaded', function() {
            const cartToggle = document.getElementById('cartToggle');
            const cartOverlay = document.getElementById('cartOverlay');
            const cartPanel = document.getElementById('cartPanel');
            const closeCart = document.getElementById('closeCart');
            
            // Abrir carrito
            cartToggle.addEventListener('click', function() {
                cartOverlay.style.display = 'block';
                setTimeout(() => {
                    cartOverlay.style.opacity = '1';
                    cartPanel.style.right = '0';
                }, 10);
            });
            
            // Cerrar carrito
            function closeCartPanel() {
                cartPanel.style.right = '-400px';
                cartOverlay.style.opacity = '0';
                setTimeout(() => {
                    cartOverlay.style.display = 'none';
                }, 300);
            }
            
            closeCart.addEventListener('click', closeCartPanel);
            cartOverlay.addEventListener('click', closeCartPanel);
            
            // Aquí iría la lógica para agregar/eliminar productos, calcular total, etc.
        });
    </script>
</body>
</html>