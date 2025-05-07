var App = angular.module('app', []);

App.controller('carritoCtrl', function ($scope, $http) {
  // Inicializar el carrito
  $scope.cart = [];
  
  // Función para añadir producto al carrito
  $scope.addToCart = function(name, price, image) {
    // Verificar si el producto ya está en el carrito
    var existingItem = $scope.cart.find(item => item.name === name);
    
    if (existingItem) {
      existingItem.quantity += 1;
    } else {
      $scope.cart.push({
        name: name,
        price: price,
        image: image,
        quantity: 1
      });
    }
    
    // Mostrar notificación
    alert(name + " ha sido añadido al carrito");
  };
  
  // Función para remover producto del carrito
  $scope.removeFromCart = function(index) {
    $scope.cart.splice(index, 1);
  };
  
  // Función para calcular el total
  $scope.getTotal = function() {
    return $scope.cart.reduce((total, item) => {
      return total + (item.price * item.quantity);
    }, 0);
  };
  
  // Función para finalizar compra
  $scope.checkout = function() {
    $http.post('../api/checkout.php', { cart: $scope.cart })
      .success(function(data) {
        alert("Compra realizada con éxito!");
        $scope.cart = [];
      })
      .error(function(error) {
        alert("Error al procesar la compra: " + error);
      });
  };
});