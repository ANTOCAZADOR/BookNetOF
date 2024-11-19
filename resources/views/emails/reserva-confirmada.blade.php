<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Reserva</title>
</head>
<body>
    <h1>Hola {{ $reserva->user->name }},</h1>
    <p>Tu reserva del libro <strong>{{ $reserva->libro->titulo }}</strong> ha sido confirmada.</p>

    <p><strong>Fecha de la reserva:</strong> {{ $reserva->fechaReserva->format('d-m-Y') }}</p>
    <p><strong>Fecha límite para recoger:</strong> {{ $reserva->fechaDevolucionR->format('d-m-Y') }}</p>

    <p>Gracias por utilizar nuestra biblioteca BookNet.</p>

    <p>Saludos,<br>El equipo de la Biblioteca.</p>
</body>
</html>
