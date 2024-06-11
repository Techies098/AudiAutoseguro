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
            font-size: 12px;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .mb-1 {
            margin-bottom: 0.5rem;
        }

        hr {
            border: 0;
            border-top: 1px solid #000;
            margin: 1rem 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
            margin-bottom: 1rem;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000;
        }

        .col-6 {
            width: 50%;
            float: left;
        }

        .clearfix {
            clear: both;
        }

        p {
            margin: 0;
        }

        .two-column {
            display: flex;
            flex-wrap: wrap;
        }

        .two-column div {
            width: 50%;
        }

        ul {
            padding: 0;
            margin: 0;
            list-style-position: inside;
        }

        li {
            margin: 0;
        }

        .page-break {
            page-break-before: always;
        }

        .signature-section {
            margin-top: 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }

        .signature-section div {
            /*text-align: center;*/
            width: 65%;
        }

        .signature-section .company-signature {
            margin-left: auto;
            margin-right: auto;
            margin-top: 2rem;
        }

        .signature-section p {
            margin: 0;
        }
    </style>

</head>

<body>
    <div class="container">

        <p class="text-center mb-1"><strong>AUTO SEGURO</strong></p>
        <p class="text-center mb-1">Fecha: <strong>{{ date('d-m-Y') }}</strong></p>
        <h5 class="text-center">REPORTE DE VEHÍCULOS ASEGURADOS</h5>

        <div class="mb-3">
            <p>
                Este es un informe de los vehículos asegurados en nuestro sistema. A continuación
                se muestra una lista de los vehículos junto con sus detalles:
            </p>
        </div>

        <p>Total de vehículos asegurados: {{ $vehiculos->count() }}</p>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    @foreach ($columnas as $columna)
                        <th>{{ $columna }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @foreach ($datos2 as $dato)
                    <tr>
                        @foreach ($columnas as $columna)
                            <td>{{ $dato->$columna }}</td>
                        @endforeach
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
