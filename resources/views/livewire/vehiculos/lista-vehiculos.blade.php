<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-3 col-md-3">
                <input wire:model="buscar" wire:keydown.enter="buscarVehiculos" type="search" class="form-control"
                    placeholder="vehiculo">
            </div>
            <div class="d-grid col-sm-2 col-md-2 mx-auto">
                <button wire:click= "buscarVehiculos" class="btn btn-secondary" type="button">
                    Buscar
                </button>
            </div>
            <div class="col-sm-7"></div>
        </div>

    </div>

    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Clase</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Año</th>
                    <th scope="col">Color</th>
                    <th scope="col">Nro Asientos</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehiculos as $fila => $vehiculo)
                    <tr>
                        <td>{{ $vehiculo->id_cliente }}</td>
                        <td>{{ $vehiculo->placa }} </td>
                        <td>{{ $vehiculo->clase }} </td>
                        <td>{{ $vehiculo->marca }} </td>
                        <td>{{ $vehiculo->modelo }} </td>
                        <td>{{ $vehiculo->anio }} </td>
                        <td>{{ $vehiculo->color }} </td>
                        <td>{{ $vehiculo->nro_asientos }} </td>
                        <td>
                            <a href="{{ route('administrador/vehiculos.edit', $vehiculo) }}"
                                class="btn btn-primary">Editar</a>
                            <form action="{{ route('administrador/vehiculos.destroy', $vehiculo) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Eliminar Vehiculo {{ $vehiculo->placa }}?')"
                                    class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $vehiculos->links() }}
</div>
