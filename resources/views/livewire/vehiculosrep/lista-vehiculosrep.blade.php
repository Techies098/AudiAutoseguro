<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container">
        <form class="row g-3">
            <!--<div class="col-md-6">
                <label class="form-label">Cliente:</label>
                <input wire:model="name" type="text" class="form-control" placeholder="Nombre completo">
            </div>-->
            <div class="col-md-3">
                <label for="fechaIni" class="form-label">Desde fecha:</label>
                <input wire:model="fechaIni" type="date" class="form-control" id="fechaIni">
            </div>
            <div class="col-md-3">
                <label for="fechaIni" class="form-label">Hasta Fecha:</label>
                <input wire:model="fechaFin" type="date" class="form-control" id="fechaIni">
            </div>
            <div>
                <div class="col-12">
                    <button wire:click="buscarVehiculosr" class="btn btn-primary col-sm-2" type="button">Ver</button>
                    <a href="{{ route('pdf-vehiculo') }}" class="btn btn-warning ms-4 col-sm-2" target="_blank">Generar
                        Reporte</a>
                </div>

            </div>
        </form>
    </div>

    <div class="col-md-12 py-3">
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">CLIENTE</th>
                    <th scope="col">PLACA</th>
                    <th scope="col">CLASE</th>
                    <th scope="col">MARCA</th>
                    <th scope="col">MODELO</th>
                    <th scope="col">AÑO</th>
                    <th scope="col">COLOR</th>
                    <th scope="col">NRO ASIENTO</th>
                    <th scope="col">FECHA</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($vehiculos as $fila => $vehiculo)
                    <tr>
                        <td>{{ $vehiculo->cliente_id }}</td>
                        <td>{{ $vehiculo->placa }} </td>
                        <td>{{ $vehiculo->clase }} </td>
                        <td>{{ $vehiculo->marca }} </td>
                        <td>{{ $vehiculo->modelo }} </td>
                        <td>{{ $vehiculo->anio }} </td>
                        <td>{{ $vehiculo->color }} </td>
                        <td>{{ $vehiculo->nro_asientos }} </td>
                        <td>{{ date('d-m-Y', strtotime($vehiculo->created_at)) }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
