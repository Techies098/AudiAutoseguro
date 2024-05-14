<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autoseguro-Contrato</title>
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
            margin-bottom: 20px;
        }

        .header img {
            width: 150px;
            height: auto;
            margin-bottom: 10px;
        }

        h1,
        h2 {
            color: #333;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-size: 20px;
        }

        p {
            margin: 5px 0;
            /* Reducir espacio entre párrafos */
            line-height: 1.3;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }

        .separator {
            border-top: 2px solid #0c0a0a;
            margin: 20px 0;
        }

        .span_tab1 {
            display: inline-block;
            width: 100px;
        }

        .span_tab2 {
            display: inline-block;
            width: 150px;
        }

        .column {
            width: 48%;
            float: left;
            margin-right: 2%;
        }

        .column:last-child {
            margin-right: 0;
        }

        ul {
            margin-bottom: 20px;
        }

        ul li {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Contrato de Seguro Vehicular</h1>
            <h2>Condiciones Particulares</h2>
            <h2>Contrato nro {{ $contrato->id }}</h2>
        </div>
        <p>En consideración a la Solicitud de Seguro presentada por el Asegurado y sus declaraciones contenidas en ella,
            con sujeción a las Condiciones Generales y Cláusulas de la Póliza y en virtud del pago de la prima
            correspondiente, EL AUTOSEGURO S.A. garantiza el pago de los daños o pérdida
            que pudiera sufrir dicho asegurado, en los términos y condiciones que más adelante se establecen:</p>
        <div>
            <h2>Datos del Tomador/Asegurado/Beneficiario</h2>
            <p>TOMADOR:<span> </span>{{ $cliente->name }}</p>
            <p>ASEGURADO: {{ $cliente->name }}</p>
            <p>DIRECCION: {{ $cliente->direccion }}</p>
            <p>TELEFONO: {{ $cliente->telefono }}</p>
            <p>BENEFICIARIO: {{ $cliente->name }}</p>
        </div>
        <hr class="separator">
        <div>
            <h2>Condiciones del Contrato</h2>
            <p>VIGENCIA: {{ $contrato->tipovigencia }}</p>
            <p>DESDE: Desde las 12:01 p.m. del {{ $contrato->vigenciainicio }}</p>
            <p>HASTA: Hasta las 12:01 p.m. del {{ $contrato->vigenciafin }}</p>
            <p>MONEDA: Dólares Americanos</p>
            <p>PRIMA TOTAL: {{ $contrato->costoprima }}</p>
            <p>FORMA DE PAGO: {{ $contrato->nro_cuotas }} cuota/s</p>
        </div>
        <hr class="separator">
        <h2>Materia Asegurada:</h2>
        <div class="column">
            <p>
                <span class="span_tab1">MARCA:</span>
                <span class="span_tab2">{{ $vehiculo->marca }}</span>
            </p>
            <p>
                <span class="span_tab1">CHASIS:</span>
                <span class="span_tab2">{{ $vehiculo->chasis }}</span>
            </p>
            <p>
                <span class="span_tab1">MODELO:</span>
                <span class="span_tab2">{{ $vehiculo->modelo }}</span>
            </p>
            <p>
                <span class="span_tab1">MOTOR:</span>
                <span class="span_tab2">{{ $vehiculo->motor }}</span>
            </p>
            <p>
                <span class="span_tab1">CLASE:</span>
                <span class="span_tab2">{{ $vehiculo->clase }}</span>
            </p>
            <p>
                <span class="span_tab1">TRACCION:</span>
                <span class="span_tab2">{{ $vehiculo->traccion }}</span>
            </p>
        </div>
        <div class="column">
            <p>
                <span class="span_tab1">COLOR:</span>
                <span class="span_tab2">{{ $vehiculo->color }}</span>
            </p>
            <p>
                <span class="span_tab1">AÑO:</span>
                <span class="span_tab2">{{ $vehiculo->anio }}</span>
            </p>
            <p>
                <span class="span_tab1">PLACA:</span>
                <span class="span_tab2">{{ $vehiculo->placa }}</span>
            </p>
            <p>
                <span class="span_tab1">USO:</span>
                <span class="span_tab2">{{ $vehiculo->uso }}</span>
            </p>
            <p>
                <span class="span_tab1">VALOR COMERCIAL:</span>
                <span class="span_tab2">USD. {{ $vehiculo->valor_comercial }}</span>
            </p>
            <p>
                <span class="span_tab1">COMBUSTIBLE:</span>
                <span class="span_tab2">{{ $vehiculo->combustible }}</span>
            </p>
        </div>
        <div>
            <h2>Coberturas Aseguradas</h2>
            <hr class="separator">
            <ul>
                @php
                    $cont = 1;
                @endphp
                @foreach ($coberturas as $cobertura)
                    <li>Sección {{ $cont }} - {{ $cobertura->nombre }}
                        {{ $cobertura->cubre !== null ? '(al ' . $cobertura->cubre . '%)' : '' }}
                        {{ $cobertura->sujeto_a_franquicia == 'Si' ? 'sujeto a franquicia' : '' }}
                        {{ $cobertura->limite_cobertura !== null ? ' hasta USD ' . $cobertura->limite_cobertura : '' }}
                    </li>

                    @php
                        $cont = $cont + 1;
                    @endphp
                @endforeach
                <!--<li>Sección I - Cobertura de Pérdida Total por Accidente (al 100%)</li>
                <li>Sección II - Cobertura de Pérdida Total por Robo (al 100%)</li>
                <li>Sección III - Cobertura de Daños Propios (al 100%) sujeto a franquicia</li>
                <li>Sección IV - Cobertura de HMACC AMIT (al 100%) sujeto a franquicia</li>
                <li>Sección VI - Cobertura de Responsabilidad Civil, hasta USD. 5,000.00</li>
                <li>Sección VII - Cobertura de Accidentes Personales a Ocupantes de Vehículos, hasta USD 3.000 (Gastos
                    Médicos y de Sepelio al 20% de la Suma Asegurada en esta Sección, máximo 7 personas)</li>-->
            </ul>
        </div>

        <div>
            <h2>CLÁUSULAS ADICIONALES</h2>
            <hr class="separator">
            <ul>
                @foreach ($clausulas as $clausula)
                    <li>{{ $clausula->detalle }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            <h2>ACLARACIONES</h2>
            <hr class="separator">
            <p>Se aclara que el alcance territorial de la presente póliza es a nivel nacional.</p>
            <ul>
                <li>Indemnización sin depreciación por uso para Vehículos “0 km.” (hasta el primer año y 15.000 km.)
                </li>
                <li>Asesoría Jurídica (para las ciudades de La Paz y Santa Cruz. potestivamente para el resto del país).
                </li>
                <li>Rescisión de Contrato a prorrata.</li>
                <li>Partes Genuinas.</li>
                <li>Exención del pago de Franquicias Deducibles para indemnizaciones en efectivo, aplicable a Secciones
                    III
                    y IV.</li>
                <li>Licencia de Conducir no vigente, 2 meses</li>
                <li>Flete aéreo y/o Courier (overnight) hasta $us. -1,000.00.</li>
                <li>Daños producidos por el ingreso de agua a partes mecánicas, electrónicas, eléctricas o combinadas al
                    100%.</li>
                <li>Errores y Omisiones</li>
                <li>Costo de salvamento hasta 10% del valor asegurado</li>
                <li>Libre elegibilidad de talleres de acuerdo a la sección III, clausula 3 del condiciona genera</li>
                <li> Cobertura a los air bag por siniestros aceptados</li>
            </ul>
        </div>
    </div>
    <div class="footer">
        <p>FIRMA DEL ASEGURADO</p>
        <p>Fecha</p>
    </div>
</body>

</html>
