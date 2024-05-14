<div>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6 mb-3">
                <input wire:model="buscar" wire:keydown.enter="buscarCoberturas" type="search" class="form-control"
                    placeholder="Cobertura">
            </div>
            <div class="col-sm-12 col-md-3 mb-3">
                <button wire:click="buscarCoberturas" class="btn btn-secondary w-100" type="button">
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
                        <th scope="col">Cubre al</th>
                        <th scope="col">Sujeto a Franquicia?</th>
                        <th scope="col">Límite Cobertura</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coberturas as $cobertura)
                        <tr>
                            <td>{{ $cobertura->nombre }}</td>
                            <td>{{ $cobertura->cubre }}</td>
                            <td>{{ $cobertura->sujeto_a_franquicia }}</td>
                            <td>{{ $cobertura->limite_cobertura }}</td>
                            <td>{{ $cobertura->precio }}</td>
                            <td>
                                <a href="{{ route('administrador/coberturas.edit', $cobertura) }}"
                                    class="btn btn-primary">Editar</a>
                                <form action="{{ route('administrador/coberturas.destroy', $cobertura) }}"
                                    method="POST" class="d-inline">
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
    </div>

    {{ $coberturas->links() }}
</div>
