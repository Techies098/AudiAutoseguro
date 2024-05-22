<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Contrato') }}
        </h2>
    </x-slot>
    <!---->
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6 text-gray-900">

                    <div class="container my-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">CONTRATO DE SEGURO DE AUTOMOTORES AUTOOSEGURO</h5>
                                <p class="text-center"><strong>CONDICIONES PARTICULARES</strong></p>
                                <p class="text-center">Código Asignado: 101-910547-2017 09 400</p>
                                <p class="text-center">Contrato No. <strong>{{ $contrato->id }}</strong></p>
                                <br>
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

                                <div class="row">

                                    <div class="col-md-6">
                                        <p><strong>DATOS DEL TOMADOR/ASEGURADO/BENEFICIARIO</strong></p>
                                        <p><strong>TOMADOR:</strong> {{ $cliente->name }}</p>
                                        <p><strong>ASEGURADO:</strong> {{ $cliente->name }}</p>
                                        <p>
                                            <strong>DIRECCIÓN:</strong> {{ $cliente->direccion }}
                                        </p>
                                        <p><strong>TELÉFONO:</strong> {{ $cliente->telefono }}</p>
                                        <p><strong>BENEFICIARIO:</strong> {{ $cliente->name }}</p>
                                    </div>

                                    <div class="col-md-6">
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
                                </div>
                                <br>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>MATERIA ASEGURADA:</strong></p>
                                        <p><strong>MARCA:</strong> {{ $vehiculo->marca }}</p>
                                        <p><strong>MODELO:</strong> {{ $vehiculo->modelo }}</p>
                                        <p><strong>CLASE:</strong> {{ $vehiculo->clase }}</p>
                                        <p><strong>COLOR:</strong> {{ $vehiculo->color }}</p>
                                        <p><strong>PLACA:</strong> {{ $vehiculo->placa }}</p>
                                        <p><strong>VALOR COMERCIAL:</strong> {{ $vehiculo->valor_comercial }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <p><strong>CHASIS:</strong> {{ $vehiculo->chasis }}</p>
                                        <p><strong>MOTOR:</strong> {{ $vehiculo->motor }}</p>
                                        <p><strong>TRACCIÓN:</strong> {{ $vehiculo->traccion }}</p>
                                        <p><strong>AÑO:</strong> {{ $vehiculo->anio }}</p>
                                        <p><strong>USO:</strong> {{ $vehiculo->uso }}</p>
                                        <p><strong>COMBUSTIBLE:</strong> {{ $vehiculo->combustible }}</p>
                                    </div>
                                </div>

                                <br>
                                <hr>

                                <div class="mb-3">
                                    <p><strong>COBERTURAS ASEGURADAS</strong></p>
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
                                </div>

                                <br>
                                <hr>

                                <div class="mb-3">
                                    <p><strong>CLÁUSULAS ADICIONALES</strong></p>
                                    @foreach ($clausulas as $clausula)
                                        <li>
                                            {{ $clausula->detalle }}
                                        </li>
                                    @endforeach
                                </div>

                                <br>
                                <hr>

                                <div class="mb-3">
                                    <p><strong>ACLARACIONES</strong></p>
                                    <p>Se aclara que el alcance territorial de la presente póliza es a nivel nacional.
                                    </p>

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

                                </div>

                                <hr>
                                <br>
                                <div class="mb-3">
                                    <h5 class="text-center"><strong>LIQUIDACIÓN DE COBRANZA</strong></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Tomador:</strong> {{ $cliente->name }}</p>
                                            <p><strong>Asegurado:</strong> {{ $cliente->name }}</p>
                                            <p><strong>Código del Cliente:</strong> {{ $cliente->id }}</p>
                                            <p><strong>Dirección:</strong>{{ $cliente->direccion }}</p>
                                            <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
                                            <p><strong>Fecha expedición:</strong> {{ date('d-m-Y') }}</p>
                                            <p><strong>Moneda:</strong> Dólares Americanos</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Ramo:</strong> {{ $contrato->seguro->nombre }}</p>
                                            <p><strong>Endoso:</strong> 0</p>
                                            <p>
                                                <strong>Vigencia:</strong> Desde las 12:01 p.m. del
                                                {{ date('d-m-Y', strtotime($contrato->vigenciainicio)) }}
                                            </p>
                                            <p>Hasta las 12:01 p.m. del
                                                {{ date('d-m-Y', strtotime($contrato->vigenciafin)) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <br>

                                <div class="mb-3">
                                    <h5 class="text-center"><strong>FORMA DE PAGO</strong></h5>
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


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!---->
</x-app-layout>
