<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header img {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
        }

        .company-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .date {
            font-style: italic;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
            line-height: 1.5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="header">
            <!--<img src="https://imgur.com/2hKCMgT" alt="Logo">-->
            <div class="company-name">Auto Seguro</div>
            <div class="date">Fecha: {{ date('d-m-Y') }}</div>
            <h1>Reporte de Vehículos Asegurados</h1>
        </div>
        <p>Este es un informe de los vehículos asegurados en nuestro sistema. A continuación se muestra una lista de los
            vehículos junto con sus detalles:</p>


        <p>Total de vehículos asegurados: {{ $vehiculos->count() }}</p>
        <table>
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Clase</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Color</th>
                    <th>Fecha</th>
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
                        <td>{{ date('d-m-Y', strtotime($vehiculo->created_at)) }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
