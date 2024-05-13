<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización</title>
    <style>
        /* Estilos personalizados para el PDF */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .cotizacion-info {
            margin-bottom: 20px;
        }
        .cotizacion-info p {
            margin: 5px 0;
        }
        .seguro-info {
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }
        .seguro-info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Cotización</h1>
        {{-- <div class="cotizacion-info">
            <p><strong>Nombre:</strong> {{ $cotizaciones->name }}</p>
            <p><strong>Email:</strong> {{ $cotizacion->email }}</p>
            <p><strong>Teléfono:</strong> {{ $cotizacion->telefono }}</p>
            <p><strong>Año:</strong> {{ $cotizacion->year }}</p>
            <p><strong>Precio:</strong> ${{ $cotizacion->precio }}</p>
            <p><strong>Marca:</strong> {{ $cotizacion->marca }}</p>
            <p><strong>Modelo:</strong> {{ $cotizacion->modelo }}</p>
            @if(isset($cotizacion->seguro))
                <p><strong>Seguro:</strong> {{ $cotizacion->seguro->nombre }}</p>
            @else
                <p><strong>Seguro:</strong> No especificado</p>
            @endif --}}
            <!-- Agrega más información de la cotización aquí según tus necesidades -->
        {{-- </div>
            <div class="seguro-info">
                <h2>Información del Seguro</h2>
                <p><strong>Nombre del Seguro:</strong> {{ $cotizacion->seguro->nombre }}</p>
                <p><strong>Descripción:</strong> {{ $cotizacion->seguro->descripcion }}</p>
                <p><strong>Precio de Prima:</strong> ${{ $cotizacion->seguro->precio_prima }}</p> --}}
                <!-- Agrega más información del seguro aquí según tus necesidades -->
            {{-- </div> --}}
    </div>


</body>
</html>
