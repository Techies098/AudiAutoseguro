<div>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-3 col-md-3">
                <input wire:model="buscar" wire:keydown.enter="buscarseguros" type="search" class="form-control"
                    placeholder="Seguro">
            </div>
            <div class="d-grid col-sm-2 col-md-2 mx-auto">
                <button wire:click="buscarseguros" class="btn btn-secondary" type="button">
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
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio de primas</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seguros as $seguro)
                    <tr>
                        <td>{{ $seguro->nombre }}</td>
                        <td>{{ $seguro->descripcion }}</td>
                        <td>{{ $seguro->precio_prima }}</td>

                        <td>
                            <a href="{{ route('administrador/seguros.edit', $seguro) }}"
                                class="btn btn-primary">Editar</a>
                            <form action="{{ route('administrador/seguros.destroy', $seguro) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Eliminar Seguro {{ $seguro->nombre }}?')" 
                                    class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $seguros->links() }}
</div>
