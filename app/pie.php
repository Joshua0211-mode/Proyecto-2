<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado D&J</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 20px 0 0px;
            margin-top: 50px;
        }
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .footer-brand {
          font-size: 1.5rem;
            margin-bottom: 15px;
        }
        .footer-brand h3 {
            color: #fff;
            font-weight: 700;
            display: flex;
            align-items: center;
        }
        .footer-brand i {
            color: #27ae60;
            font-size: 1.2rem;
            margin-right: 0px;
        }
        .footer-slogan {
            color: #bdc3c7;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }
        .footer-section {
            margin-bottom: 20px;
        }
        .footer-title {
            color: #fff;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 2px solid #27ae60;
            display: inline-block;
        }
        .footer-contact p {
            margin-bottom: 8px;
            display: flex;
            align-items: flex-start;
        }
        .footer-contact i {
            color: #27ae60;
            margin-right: 8px;
            margin-top: 3px;
            min-width: 16px;
        }
        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .footer-links a:hover {
            color: #27ae60;
        }
        .copyright {
            background-color: #1a252f;
            padding: 1px 0;
            text-align: center;
            font-size: 0.85rem;
            color: #95a5a6;
        }
        @media (max-width: 767px) {
            .footer {
                padding: 30px 0 10px;
            }
            .footer-section {
                margin-bottom: 25px;
            }
        }
    </style>
</head>
<body>

    <!-- Contenido de la página -->

    <footer class="footer">
        <div class="container footer-container">
            <div class="row">
                <!-- Logo y descripción -->
                <div class="col-md-4">
                    <div class="footer-brand">
                        <h3>
                            <i class="fas fa-shopping-basket"></i>
                            Supermercado D&J
                        </h3>
                    </div>
                    <p class="footer-slogan">
                        Tu mercado de confianza con los mejores productos desde 2023
                    </p>
                </div>
                
                <!-- Información de contacto -->
                <div class="col-md-4">
                    <div class="footer-section">
                        <h4 class="footer-title">INSTITUTO TECNOLÓGICO SUPERIOR DE ALVARADO</h4>
                        <div class="footer-contact">
                            <p>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Escolleras Norte S/N<br>Col. La Trocha, Alvarado, Ver.</span>
                            </p>
                            <p>
                                <i class="fas fa-phone"></i>
                                <span>(123) 456-7890</span>
                            </p>
                            <p>
                                <i class="fas fa-envelope"></i>
                                <span>supermercadoD&J@gmail.com</span>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Enlaces útiles -->
                <div class="col-md-4">
                    <div class="footer-section">
                        <h4 class="footer-title">ENLACES ÚTILES</h4>
                        <div class="footer-links">
                            <a href="#">Política de Privacidad</a>
                            <a href="#">Términos y Condiciones</a>
                            <a href="#">Preguntas Frecuentes</a>
                            <a href="#">Trabaja con Nosotros</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="copyright">
            <div class="container">
                © 2023 Supermercado D&J. Todos los derechos reservados.
            </div>
        </div>
    </footer>

</body>
</html>