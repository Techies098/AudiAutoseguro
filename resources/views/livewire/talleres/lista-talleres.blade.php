<div>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6 mb-3">
                <input wire:model="buscar" wire:keydown.enter="buscarTalleres" type="search" class="form-control"
                    placeholder="Taller">
            </div>
            <div class="col-sm-12 col-md-3 mb-3">
                <button wire:click="buscarTalleres" class="btn btn-secondary w-100" type="button">
                    Buscar
                </button>
            </div>
            <div class="col-sm-12 col-md-3"></div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($talleres as $taller)
                        <tr>
                            <td>{{ $taller->nombre }}</td>
                            <td>{{ $taller->direccion }}</td>
                            <td>{{ $taller->telefono }}</td>
                            <td>
                                @if ($taller->estado == 'Activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('administrador/talleres.edit', $taller) }}"
                                    class="btn btn-primary">Editar</a>
                                <form action="{{ route('administrador/talleres.destroy', $taller) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Eliminar taller {{ $taller->nombre }}?')"
                                        class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $talleres->links() }}
</div>
