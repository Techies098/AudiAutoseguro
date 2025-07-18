<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container">
        <form class="row g-3" action="{{ route('pdf-vehiculo') }}" method="POST" target="_blank">
            @csrf
            <!--<div class="col-md-6">
                <label class="form-label">Cliente:</label>
                <input wire:model="name" type="text" class="form-control" placeholder="Nombre completo">
            </div>-->
            <div class="col-md-3">
                <label for="fechaIni" class="form-label">Desde fecha:</label>
                <input wire:model="fechaIni" class="form-control" type="date" name="fechaIni" id="fechaIni">
            </div>
            <div class="col-md-3">
                <label for="fechaFin" class="form-label">Hasta Fecha:</label>
                <input wire:model="fechaFin" class="form-control" type="date" name="fechaFin" id="fechaFin">
            </div>
            <div>
                <div class="col-12">
                    <button wire:click="buscarVehiculosr" class="btn btn-primary col-sm-2" type="button">Ver</button>
                    <button class="btn btn-warning ms-4 col-sm-2" type="submit">Generar reporte</button>
                </div>

            </div>
        </form>
    </div>

    <div class="col-md-12 py-3">
        <hr>
        <div class="table-responsive">
            <table class="table table-striped text-sm" style="font-size: 13px;">
                <thead>
                    <tr>
                        <th scope="col">CLIENTE</th>
                        <th scope="col">MARCA</th>
                        <th scope="col">MODELO</th>
                        <th scope="col">CLASE</th>
                        <th scope="col">COLOR</th>
                        <th scope="col">PLACA</th>
                        <th scope="col">CHASIS</th>
                        <th scope="col">MOTOR</th>
                        <th scope="col">TRACCION</th>
                        <th scope="col">AÑO</th>
                        <th scope="col">USO</th>
                        <th scope="col">Nro ASIENTOS</th>
                        <th scope="col">COMBUSTIBLE</th>
                        <th scope="col">VALOR</th>
                        <th scope="col">FECHA</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($vehiculos as $fila => $vehiculo)
                        <tr>
                            <td>{{ $vehiculo->cliente_id }}</td>
                            <td>{{ $vehiculo->marca }} </td>
                            <td>{{ $vehiculo->modelo }} </td>
                            <td>{{ $vehiculo->clase }} </td>
                            <td>{{ $vehiculo->color }} </td>
                            <td>{{ $vehiculo->placa }} </td>
                            <td>{{ $vehiculo->chasis }} </td>
                            <td>{{ $vehiculo->motor }} </td>
                            <td>{{ $vehiculo->traccion }} </td>
                            <td>{{ $vehiculo->anio }} </td>
                            <td>{{ $vehiculo->uso }} </td>
                            <td>{{ $vehiculo->nro_asientos }} </td>
                            <td>{{ $vehiculo->combustible }} </td>
                            <td>{{ $vehiculo->valor_comercial }} </td>
                            <td>{{ date('d-m-Y', strtotime($vehiculo->created_at)) }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
