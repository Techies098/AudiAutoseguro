<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
    <style>
        /* Estilos CSS en línea */
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            margin-top: 3cm;
            margin-right: 2cm;
            margin-left: 2.5cm;
            margin-bottom: 3cm;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* También puedes enlazar un archivo CSS externo si lo prefieres */
        /*<link rel="stylesheet" href="{{ asset('css/pdf-styles.css') }}"> */
    </style>

</head>

<body>
    <h1>Vehiculos Asegurados</h1>
    <table>
        <thead>
            <tr>
                <th>Placa</th>
                <th>Clase</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Color</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->clase }}</td>
                    <td>{{ $vehiculo->marca }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>{{ $vehiculo->anio }}</td>
                    <td>{{ $vehiculo->color }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
