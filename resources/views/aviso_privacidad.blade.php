<!-- resources/views/aviso_privacidad.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso de Privacidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1>Aviso de Privacidad - BookNet</h1>
            </div>
            <div class="card-body">
                <h3 class="mb-4">En BookNet, valoramos tu privacidad</h3>
                <p>
                    En BookNet, como parte de nuestro compromiso con la seguridad y el respeto hacia tus datos personales, te informamos sobre el tratamiento de la información que nos proporcionas al utilizar nuestros servicios. La privacidad de nuestros usuarios es una prioridad y trabajamos constantemente para garantizar la protección de tu información.
                </p>
                <h5>¿Qué datos recopilamos?</h5>
                <ul>
                    <li>Nombre</li>
                    <li>Correo electrónico</li>
                    <li>Datos de uso del sitio web (como cookies)</li>
                </ul>
                
                <h5>¿Para qué utilizamos tus datos?</h5>
                <p>
                    Los datos que recopilamos se utilizan para mejorar la experiencia del usuario, personalizar los contenidos, y para fines de comunicación en relación con los servicios que ofrecemos.
                </p>

                <h5>Seguridad de tus datos</h5>
                <p>
                    Implementamos medidas de seguridad para proteger tus datos personales contra accesos no autorizados, divulgación o modificación.
                </p>

                <h5>Contacto</h5>
                <p>
                    Si tienes alguna pregunta o inquietud sobre el tratamiento de tus datos personales, no dudes en ponerte en contacto con nosotros a través de <a href="mailto:soporte@booknet.com">soporte@booknet.com</a>.
                </p>

                <div class="mt-4">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Aceptar y Continuar</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary">Regresar al Inicio</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
