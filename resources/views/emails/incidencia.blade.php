<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Correo de incidencia</h1>

    <p><strong>Se cayó el servicio {{ $datos['nombre'] }}</p>
    <p><strong>Con IP {{ $datos['ip'] }}</p>
    <p><strong>Con MAC {{ $datos['mac'] }}</p>
</body>

</html>
