<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container">
        <div class="mb-3 row">
            <div class="col-sm-3 col-md-3">
                <input wire:model="buscar" wire:keydown.enter="buscarVehiculos" type="search" class="form-control"
                    placeholder="vehiculo">
            </div>
            <div class="mx-auto d-grid col-sm-2 col-md-2">
                <button wire:click= "buscarVehiculos" class="btn btn-secondary" type="button">
                    Buscar
                </button>
            </div>
            <div class="col-sm-7"></div>
        </div>

    </div>

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 12px;">
                <thead>
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Clase</th>
                        <th scope="col">Color</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Chasis</th>
                        <th scope="col">Motor</th>
                        <th scope="col">Traccion</th>
                        <th scope="col">Año</th>
                        <th scope="col">Uso</th>
                        <th scope="col">Nro Asientos</th>
                        <th scope="col">Combustible</th>
                        <th scope="col">Valor Comercial</th>
                        <th scope="col">Acciones</th>
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
                            <style>
                                .smaller-button-text {
                                    font-size: 0.56rem;
                                }
                            </style>
                            <td>
                                <a href="{{ route('administrador/vehiculos.edit', $vehiculo) }}"
                                    class="btn btn-primary btn-sm smaller-button-text">Editar</a>
                                <form action="{{ route('administrador/vehiculos.destroy', $vehiculo) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Eliminar Vehiculo {{ $vehiculo->placa }}?')"
                                        class="btn btn-danger btn-sm smaller-button-text">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $vehiculos->links() }}
</div>
