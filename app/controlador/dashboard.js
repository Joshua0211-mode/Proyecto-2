var App = angular.module('app',[]);

App.controller('dashboardCtrl', function($scope,$http){

$scope.usuario={};
$scope.guardaClase  = function(){
	alert("si funciona");
}

$scope.guardar = function(){
	$http.post('../api/guardarUsuario.php',$scope.usuario)
	.success(function(data,status,headers,config){
		$scope.usuario={};
		alert("Registrado");
        // setTimeout(function () {$scope.creaU = false;}, 1000);
	}).error(function(data,status,headers,config){
		alert("Error BD" + data);
	});
}

$scope.entro = function(){
	$('#pass').removeAttr('type');
}

$scope.salio = function(){
	$('#pass').attr('type','password');
}

});