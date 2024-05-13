<div>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-3 col-md-3">
                <input type="search" class="form-control" placeholder="Seguro">
            </div>
            <div class="d-grid col-sm-2 col-md-2 mx-auto">
                <button class="btn btn-secondary" type="button">
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
                    <th scope="col">Precio Prima</th>
                    <th scope="col">Coberturas</th>
                    <th scope="col">Clausulas</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seguros as $seguro)
                    <tr style="height: 100px;">
                        <td>{{ $seguro->nombre }}</td>
                        <td>{{ $seguro->descripcion }}</td>
                        <td>{{ $seguro->precio_prima }}</td>
                        <td style="overflow-y: auto;">
                            <ul style="margin: 0; padding-left: 15px;">
                                @foreach ($seguro->cobertura as $cobertura)
                                    <li>{{ $cobertura->nombre }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td style="overflow-y: auto;">
                            <ul style="margin: 0; padding-left: 15px;">
                                @foreach ($seguro->clausula as $clausula)
                                    <li>{{ $clausula->detalle }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('administrador.seguros.relacionar', $seguro->id) }}" class="btn btn-primary">Relacionar Cláusulas y Coberturas</a>

                            <a href="{{ route('administrador/seguros.edit', $seguro) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('administrador/seguros.destroy', $seguro) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Eliminar Seguro {{ $seguro->nombre }}?')" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $seguros->links() }}
</div>
