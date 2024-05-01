<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-3 col-md-3">
                <input wire:model="buscar" wire:keydown.enter="buscarClausulas" type="search" class="form-control"
                    placeholder="clausula">
            </div>
            <div class="d-grid col-sm-2 col-md-2 mx-auto">
                <button wire:click= "buscarClausulas" class="btn btn-secondary" type="button">
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
                    <th scope="col">Detalle</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clausulas as $fila => $clausula)
                    <tr>
                        <td>{{ $clausula->detalle }}</td>
                        <td>
                            <a href="{{ route('administrador/clausulas.edit', $clausula) }}"
                                class="btn btn-primary">Editar</a>
                            <form action="{{ route('administrador/clausulas.destroy', $clausula) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Eliminar Clausula {{ $clausula->placa }}?')"
                                    class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $clausulas->links() }}
</div>
