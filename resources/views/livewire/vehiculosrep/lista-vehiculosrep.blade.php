<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container">
        <!-- <div class="mb-3 row">
            <div class="col-sm-3 col-md-3">
                <input wire:model="buscar" wire:keydown.enter="buscarVehiculos" type="search" class="form-control"
                    placeholder="vehiculo">
            </div>
            <div class="mx-auto d-grid col-sm-2 col-md-2">
                <button wire:click= "buscarVehiculos" class="btn btn-secondary" type="button">
                    Buscar
                </button>
            </div>
            <div class="col-sm-3 col-md-3">
                <label class="form-label">Desde fecha: </label>
                <input wire:model="buscar" wire:keydown.enter="buscarVehiculos" type="date" id="desdeFecha"
                    name="desdeFecha" class="form-control">
            </div>
            <div class="col-sm-3 col-md-3">
                <label class="form-label">Hasta fecha: </label>
                <input wire:model="buscar" wire:keydown.enter="buscarVehiculos" type="date" id="hastaFecha"
                    name="hastaFecha" class="form-control">
            </div>
            <div class="col-sm-7"></div>
        </div>-->
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Cliente:</label>
                <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Desde fecha:</label>
                <input type="date" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Hasta Fecha:</label>
                <input type="date" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-3">
                <button class="btn btn-primary col-sm-12" type="submit">consultar</button>
            </div>
            <div class="col-3 float-right ">
                <a href="{{ route('pdf-vehiculo') }}" class="btn btn-warning float-right col-sm-12 "
                    target="_blank">Generar
                    Reporte</a>
            </div>
            <!--<button type="button" class="btn btn-primary btn-lg">Small button</button>
            <button type="button" class="btn btn-secondary btn-lg">Small button</button>-->
        </form>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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

    {{ $vehiculos->links() }}
</div>
