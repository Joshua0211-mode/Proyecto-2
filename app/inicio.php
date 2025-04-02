<?php require_once 'encabezado.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
<script src="./controlador/jquery.min.js"></script>
    <script src="./controlador/bootstrap.min.js"></script>
    <script src="./controlador/angular.min.js"></script>
    <title>Inicio de Sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #295C8B;
            color: white;
            height: 100vh; /* Corregido de 00vh a 100vh */
            display: flex;
            flex-direction: column;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container .btn-primary {
            background-color: #0062cc;
            border: none;
        }
        .form-container .btn-success {
            background-color: #28a745;
            border: none;
        }
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<!DOCTYPE html>
<html lang="es" ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            padding-top: 50px;
        }
        
        #content {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        h1 {
            color: #4158d0;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }
        
        h1:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, #c850c0, #4158d0);
        }
        
        .form-control {
            border-radius: 25px;
            padding: 12px 20px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #4158d0;
            box-shadow: 0 0 0 0.2rem rgba(65, 88, 208, 0.25);
        }
        
        .input-group-addon {
            background-color: transparent;
            border-left: none;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .input-group-addon:hover {
            color: #4158d0;
        }
        
        .btn-success {
            background: linear-gradient(to right, #c850c0, #4158d0);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .signup-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        
        .signup-link a {
            color: #4158d0;
            text-decoration: none;
            font-weight: 500;
        }
        
        .signup-link a:hover {
            text-decoration: underline;
        }
        
        label.control-label {
            font-weight: 500;
            color: #555;
            padding-top: 10px;
        }
    </style>
    <script src="./controlador/jquery.min.js"></script>
    <script src="./controlador/bootstrap.min.js"></script>
    <script src="./controlador/angular.min.js"></script>
    <script src="./controlador/index.js"></script>
</head>

<body ng-controller="indexCtrl">
    <div id="content" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <h1>Regístrate</h1>
                <form class="form-horizontal" name="form">

                    <div class="form-group row mb-4">
                        <label class="col-sm-4 col-form-label control-label">Nombre:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nombre"
                                ng-model="usuario.nombre" placeholder="Nombre Completo" required
                                ng-class="{'is-invalid': form.nombre.$touched && form.nombre.$invalid}">
                            <div class="invalid-feedback" ng-show="form.nombre.$touched && form.nombre.$invalid">
                                Por favor ingrese su nombre
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-sm-4 col-form-label control-label">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email"
                                ng-model="usuario.email" placeholder="Email" required
                                ng-class="{'is-invalid': form.email.$touched && form.email.$invalid}">
                            <div class="invalid-feedback" ng-show="form.email.$touched && form.email.$invalid">
                                Por favor ingrese un email válido
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-sm-4 col-form-label control-label">Contraseña:</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="{{showPassword ? 'text' : 'password'}}" class="form-control" id="pass" name="pass"
                                    ng-model="usuario.password" placeholder="Contraseña" required
                                    ng-class="{'is-invalid': form.pass.$touched && form.pass.$invalid}">
                                <span class="input-group-text input-group-addon" 
                                      ng-click="showPassword = !showPassword">
                                    <i class="fas {{showPassword ? 'fa-eye-slash' : 'fa-eye'}}"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback" ng-show="form.pass.$touched && form.pass.$invalid">
                                La contraseña es requerida
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-sm-4 col-form-label control-label">Rol:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="rol" ng-model="usuario.rol" required
                                ng-class="{'is-invalid': form.rol.$touched && form.rol.$invalid}">
                                <option value="" disabled selected>Seleccione un rol</option>
                                <option value="admin">Administrador</option>
                                <option value="usuario">Usuario</option>
                                <option value="editor">Editor</option>
                            </select>
                            <div class="invalid-feedback" ng-show="form.rol.$touched && form.rol.$invalid">
                                Por favor seleccione un rol
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="submit" value="enviar" ng-click="form.$valid && guardar()"
                                class="btn btn-success">
                                <i class="fas fa-user-plus me-2"></i>Crear cuenta
                            </button>
                        </div>
                    </div>

                    <div class="signup-link">
                        ¿Ya tienes cuenta? <a href="index.php">Iniciar sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</body>
</html>
</html>
