<div>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-3 col-md-3">
                <input wire:model="buscar" wire:keydown.enter="buscarCoberturas" type="search" class="form-control"
                    placeholder="Cobertura">
            </div>
            <div class="d-grid col-sm-2 col-md-2 mx-auto">
                <button wire:click="buscarCoberturas" class="btn btn-secondary" type="button">
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
                    <th scope="col">Limite Cobertura</th>
                    <th scope="col">Porcentaje Cobertura</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coberturas as $cobertura)
                    <tr>
                        <td>{{ $cobertura->nombre }}</td>
                        <td>{{ $cobertura->limite_cobertura }}</td>
                        <td>{{ $cobertura->porcentaje_cobertura }}</td>

                        <td>
                            <a href="{{ route('administrador/coberturas.edit', $cobertura) }}"
                                class="btn btn-primary">Editar</a>
                            <form action="{{ route('administrador/coberturas.destroy', $cobertura) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Eliminar Cobertura {{ $cobertura->nombre }}?')" 
                                    class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $coberturas->links() }}
</div>
