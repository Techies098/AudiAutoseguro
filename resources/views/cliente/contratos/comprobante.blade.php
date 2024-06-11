<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprobante</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h4, h5 {
            text-align: center;
            color: #333;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }
        h2 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        h4, h5 {
            margin: 5px 0;
        }
        p {
            font-size: 1em;
            margin: 10px 0;
            color: #555;
        }
        .info, .payment-details, .payer-details {
            margin-bottom: 20px;
        }
        .info p, .payment-details p, .payer-details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Autoseguro</h1>
        {{-- <img src="logo.png" alt="" width="50px" height="50px"> --}}
        <h2>Comprobante de Pago</h2>
        <div class="info">
            <h4>Descripción: {{ $data['payment']['product_name'] }}</h4>
            <h5>Monto: {{ $data['payment']['amount'] }} USD</h5>
        </div>
        <div class="payment-details">
            <p>Número de contrato: {{ $data['cuota']['contrato_id'] }}</p>
            <p>Número de cuota: {{ $data['cuota']['numero'] }}</p>
            <p>Cuotas totales: {{ $data['contrato']['nro_cuotas'] }}</p>
            <p>Cliente: {{ auth()->user()->name }}</p>
            <p>Dirección: {{ auth()->user()->direccion }}</p>
            <p>Correo: {{ auth()->user()->email }}</p>
        </div>
        <div class="payer-details">
            <h5>Pagado por: {{ $data['payment']['payer_name'] }}</h5>
            <p>Correo: {{ $data['payment']['payer_email'] }}</p>
            <p>Comprobante N.º: {{ $data['payment']['payment_id'] }}</p>
            <p>Fecha: {{ $data['payment']['created_at'] }}</p>
        </div>
    </div>

</body>
</html>
