<div class="container text-center">

    <div class="container">
        <div class="mb-3 row">
            <div class="col-sm-3 col-md-3">
                <input wire:model="buscar" wire:keydown.enter="buscarUsuarios" type="search" class="form-control"
                    placeholder="Cliente"><!-- lo q  aparece en el buscador por defecto-->
            </div>
            <div class="mx-auto d-grid col-sm-2 col-md-2">
                <button wire:click= "buscarUsuarios" class="btn btn-secondary" type="button">
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Email</th>
                    <th scope="col">Fecha Nac.</th>
                    <th scope="col">Vehiculos</th>
                    <th scope="col">vigente</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $fila => $usuario)
                    @if ($usuario->cliente)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->roles->pluck('name')->implode(', ') }} </td>
                            <td>{{ $usuario->telefono }} </td>
                            <td>{{ $usuario->direccion }} </td>
                            <td>{{ $usuario->email }} </td>
                            <td>{{ $usuario->fecha_nacimiento }} </td>
                            <td>
                                @foreach ($usuario->cliente->vehiculos as $vehiculo)
                                    {{ $vehiculo->placa }}
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($usuario->cliente->vehiculos as $vehiculo)
                                    @php
                                        $hasActiveContract = false;
                                        foreach ($vehiculo->contratos as $contrato) {
                                            if ($contrato->estado == 'Activo') {
                                                $hasActiveContract = true;
                                                break;
                                            }
                                        }
                                    @endphp
                                    @if ($hasActiveContract)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('administrador/usuarios.edit', $usuario) }}"
                                    class="btn btn-primary">Editar</a>
                                <form action="{{ route('administrador/usuarios.destroy', $usuario) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Eliminar Usuario {{ $usuario->name }}?')"
                                        class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>

                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $usuarios->links() }}

</div>
