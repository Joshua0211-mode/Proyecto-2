<!DOCTYPE html>
<html lang="en"  ng-app="app">
<?php require_once 'encabezado.php'; ?>

<script src="./controlador/dashboard.js"></script>
<body ng-controller="dashboardCtrl">

<div id="lateral">
    <img src="./img/Escudo.png" />
    <div id="menu">
        <!-- Recuadro de "Clases impartidas" -->
        <div class="menu-container">
            <ul>
                <li class="menu-item">Clases impartidas</li>
                <div class="submenu">
                    <li class="submenu-item"><a href="#">Programacion avanzada de tecnologias moviles</a></li>
                    <li class="submenu-item"><a href="#">Clase 2</a></li>
                </div>
            </ul>
        </div>

        <hr>

        <!-- Recuadro de "Clases inscritas" -->
        <div class="menu-container">
            <ul>
                <li class="menu-item">Clases inscritas</li>
                <div class="submenu">
                    <li class="submenu-item"><a href="#">Clase 3</a></li>
                    <li class="submenu-item"><a href="#">Clase 4</a></li>
                </div>
            </ul>
        </div>
    </div>
</div>

 <div id="content" class="container">
 
 <div class ="row">
  <div class="col-md-12">
    <h2>¡Bienvenido!</h2>
    </div>
  </div>
<br>
  <div class ="row">

    <div class="panel-group col-md-4">
    <div class="panel panel-success">
        <div class="panel-heading">Panel with panel-primary class</div>
        <div class="panel-body">Panel Content</div>
      </div>
    </div>

    <div class="panel-group col-md-4">
    <div class="panel panel-success">
        <div class="panel-heading">Panel with panel-primary class</div>
        <div class="panel-body">Panel Content</div>
      </div>
    </div>

    <div class="panel-group col-md-4">
    <div class="panel panel-success">
        <div class="panel-heading">Panel with panel-primary class</div>
        <div class="panel-body">Panel Content</div>
      </div>
    </div>

    <div class="panel-group col-md-4">
    <div class="panel panel-success">
        <div class="panel-heading">Panel with panel-primary class</div>
        <div class="panel-body">Panel Content</div>
      </div>
    </div>

  </div>

 </div>
</body>

<?php require_once 'pie.php'; ?>