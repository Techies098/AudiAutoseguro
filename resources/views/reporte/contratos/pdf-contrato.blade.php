<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autoseguro-Contrato</title>
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
        <h5 class="text-center">CONTRATO DE SEGURO DE AUTOMOTORES AUTOSEGURO</h5>
        <p class="text-center mb-1"><strong>CONDICIONES PARTICULARES</strong></p>
        <p class="text-center mb-1">Código Asignado: 101-910547-2017 09 400</p>
        <p class="text-center mb-1">Contrato No. <strong>{{ $contrato->id }}</strong></p>

        <hr>

        <div class="mb-3">
            <p>
                En consideración a la Solicitud de Seguro presentada por el Asegurado y sus
                contenidas en ella, con sujeción a las Condiciones Generales y Cláusulas de la
                Contrato (póliza) y en virtud del pago de la prima correspondiente, AUTOSEGURO
                S.A.
                garantiza el pago de los daños o pérdida que pudiera sufrir dicho asegurado, en
                los términos y condiciones que más adelante se establecen:
            </p>
        </div>

        <div class="col-6">
            <p><strong>DATOS DEL TOMADOR/ASEGURADO/BENEFICIARIO</strong></p>
            <p><strong>TOMADOR:</strong> {{ $cliente->name }}</p>
            <p><strong>ASEGURADO:</strong> {{ $cliente->name }}</p>
            <p>
                <strong>DIRECCIÓN:</strong> {{ $cliente->direccion }}
            </p>
            <p><strong>TELÉFONO:</strong> {{ $cliente->telefono }}</p>
            <p><strong>BENEFICIARIO:</strong> {{ $cliente->name }}</p>
        </div>
        <div class="col-6">
            <br>
            <p><strong>VIGENCIA:</strong> {{ $contrato->tipovigencia }}</p>
            <p><strong>DESDE:</strong> Desde las 12:01 p.m. del
                {{ date('d-m-Y', strtotime($contrato->vigenciainicio)) }}</p>
            <p><strong>HASTA:</strong> Hasta las 12:01 p.m. del
                {{ date('d-m-Y', strtotime($contrato->vigenciafin)) }}</p>
            <p><strong>MONEDA:</strong> Dólares Americanos</p>
            <p><strong>PRIMA TOTAL:</strong> {{ $contrato->costoprima }}</p>
            <p><strong>FORMA DE PAGO:</strong> {{ $contrato->nro_cuotas }} Cuota/s</p>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="two-column ">
            <div>
                <p><strong>MATERIA ASEGURADA:</strong></p>
                <p><strong>MARCA:</strong> {{ $vehiculo->marca }}</p>
                <p><strong>MODELO:</strong> {{ $vehiculo->modelo }}</p>
                <p><strong>CLASE:</strong> {{ $vehiculo->clase }}</p>
                <p><strong>COLOR:</strong> {{ $vehiculo->color }}</p>
                <p><strong>PLACA:</strong> {{ $vehiculo->placa }}</p>
                <p><strong>VALOR COMERCIAL:</strong> {{ $vehiculo->valor_comercial }}</p>
            </div>
            <div>
                <p><strong>CHASIS:</strong> {{ $vehiculo->chasis }}</p>
                <p><strong>MOTOR:</strong> {{ $vehiculo->motor }}</p>
                <p><strong>TRACCIÓN:</strong> {{ $vehiculo->traccion }}</p>
                <p><strong>AÑO:</strong> {{ $vehiculo->anio }}</p>
                <p><strong>USO:</strong> {{ $vehiculo->uso }}</p>
                <p><strong>COMBUSTIBLE:</strong> {{ $vehiculo->combustible }}</p>
            </div>
        </div>

        <hr>

        <div class="mb-3">
            <p><strong>COBERTURAS ASEGURADAS</strong></p>
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
            </ul>
        </div>

        <hr>

        <div class="mb-3">
            <p><strong>CLÁUSULAS ADICIONALES</strong></p>
            <ul>
                @foreach ($clausulas as $clausula)
                    <li>
                        {{ $clausula->detalle }}
                    </li>
                @endforeach
            </ul>
        </div>

        <hr>

        <div class="mb-3">
            <p><strong>ACLARACIONES</strong></p>
            <p>Se aclara que el alcance territorial de la presente póliza es a nivel nacional.
            </p>
            <ul>
                <li>Indemnización sin depreciación por uso para Vehículos “0 km.” (hasta el
                    primer año y 15.000 km.)
                </li>
                <li>Asesoría Jurídica (para las ciudades de La Paz y Santa Cruz. potestivamente
                    para el resto del país).
                </li>
                <li>Rescisión de Contrato a prorrata.</li>
                <li>Partes Genuinas.</li>
                <li>Exención del pago de Franquicias Deducibles para indemnizaciones en
                    efectivo, aplicable a Secciones III y IV.</li>
                <li>Licencia de Conducir no vigente, 2 meses</li>
                <li>Flete aéreo y/o Courier (overnight) hasta $us. -1,000.00.</li>
                <li>Daños producidos por el ingreso de agua a partes mecánicas, electrónicas,
                    eléctricas o combinadas al 100%.</li>
                <li>Errores y Omisiones</li>
                <li>Costo de salvamento hasta 10% del valor asegurado</li>
                <li>Libre elegibilidad de talleres de acuerdo a la sección III, clausula 3 del
                    condiciona genera</li>
                <li> Cobertura a los air bag por siniestros aceptados</li>
            </ul>
        </div>

        <div class="page-break"></div>
        <div class="container">

            <p><strong>ESPECIFICACIONES:</strong></p>
            <hr>
            <p><strong>Central de Riesgos:</strong></p>
            <p>
                El asegurado autoriza a la Compañía su reporte a la Central de Riesgos del Mercado de Seguros, acorde a
                las
                normativas reglamentarias de la Autoridad de Fiscalización y Control de Pensiones y Seguros - APS.
            </p><br>
            <p>
                Se deja claramente establecido que la Compañía no se hace responsable por los repuestos que no puedan
                encontrarse en el mercado boliviano a consecuencia del siniestro amparado en el Contrato (Póliza).
                En este caso la Compañía se reserva el derecho de indemnizar en efectivo de acuerdo a cotizaciones
                referenciales que pudieran ser emitidas en el mercado local o a la sustitución de partes similares.
            </p><br>

            <p><strong>Lugar y fecha:</strong> Santa Cruz de la Sierra, {{ date('d-m-Y') }}</p>

            <div class="signature-section">
                <div>
                    <p><strong>Firma del Asegurado</strong></p>
                </div>
                <!--<div>
                    <p><strong>Por la Compañía</strong></p>
                </div>-->
            </div>
            <br>
            <p class="text-center">AUTOSEGURO S.A.</p>
        </div>

        <div class="page-break"></div>
        <hr>
        <h5 class="text-center">LIQUIDACIÓN DE COBRANZA</h5>
        <div class="col-6">
            <p><strong>Tomador:</strong> {{ $cliente->name }}</p>
            <p><strong>Asegurado:</strong> {{ $cliente->name }}</p>
            <p><strong>Código del Cliente:</strong> {{ $cliente->id }}</p>
            <p><strong>Dirección:</strong>{{ $cliente->direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
            <p><strong>Fecha expedición:</strong> {{ date('d-m-Y') }}</p>
            <p><strong>Moneda:</strong> Dólares Americanos</p>
        </div>
        <div class="col-6">
            <p><strong>Ramo:</strong> {{ $contrato->seguro->nombre }}</p>
            <p><strong>Endoso:</strong> 0</p>
            <p>
                <strong>Vigencia:</strong> Desde las 12:01 p.m. del
                {{ date('d-m-Y', strtotime($contrato->vigenciainicio)) }}
            </p>
            <p>Hasta las 12:01 p.m. del
                {{ date('d-m-Y', strtotime($contrato->vigenciafin)) }}</p>
        </div>
        <div class="clearfix"></div>



        <h5 class="text-center">FORMA DE PAGO</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Codigo/Cuota</th>
                    <th>Monto</th>
                    <th>Fecha Vencimiento</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>26.49</td>
                    <td>09/04/2023</td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>26.50</td>
                    <td>09/05/2023</td>
                </tr>
                <tr>
                    <td>03</td>
                    <td>26.50</td>
                    <td>09/06/2023</td>
                </tr>
                <tr>
                    <td>04</td>
                    <td>26.50</td>
                    <td>09/07/2023</td>
                </tr>
                <tr>
                    <td>05</td>
                    <td>26.50</td>
                    <td>09/08/2023</td>
                </tr>
                <tr>
                    <td>06</td>
                    <td>26.50</td>
                    <td>09/09/2023</td>
                </tr>
                <tr>
                    <td>07</td>
                    <td>26.50</td>
                    <td>09/10/2023</td>
                </tr>
                <tr>
                    <td>08</td>
                    <td>26.50</td>
                    <td>09/11/2023</td>
                </tr>
                <tr>
                    <td>09</td>
                    <td>26.50</td>
                    <td>09/12/2023</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>26.50</td>
                    <td>09/01/2024</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>26.50</td>
                    <td>09/02/2024</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>26.50</td>
                    <td>09/03/2024</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
