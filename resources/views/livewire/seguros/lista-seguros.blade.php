<div>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-3 col-md-3">
                <input type="search" class="form-control" placeholder="Buscar seguro">
            </div>
            <div class="d-grid col-sm-2 col-md-2 mx-auto">
                <button class="btn btn-secondary" type="button">Buscar</button>
            </div>
            <div class="col-sm-7"></div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-rounded">
                <thead class="table-dark">
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
                    <tr>
                        <td style="font-size: 20px; font-family: Cambria, sans-serif; vertical-align: middle;">{{ $seguro->nombre }}</td>
                        <td>{{ $seguro->descripcion }}</td>
                        <td>{{ $seguro->precio_prima }}</td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($seguro->cobertura as $cobertura)
                                <li>{{ $cobertura->nombre }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($seguro->clausula as $clausula)
                                <li>{{ $clausula->detalle }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @can('administrador.seguros.relacionar', $seguro)
                            <a href="{{ route('administrador.seguros.relacionar', $seguro->id) }}" class="btn btn-primary">Relacionar</a>
                            @endcan

                            @can('administrador.seguros.edit', $seguro)
                            <a href="{{ route('administrador/seguros.edit', $seguro) }}" class="btn btn-primary">Editar</a>
                            @endcan
                            <a href="{{ route('administrador/seguros.show', $seguro) }}" class="btn btn-primary">Ver</a>

                            @can('administrador.seguros.destroy', $seguro)
                            <form action="{{ route('administrador/seguros.destroy', $seguro) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar Seguro {{ $seguro->nombre }}?')" class="btn btn-danger">Eliminar</button>
                            </form>
                            @endcan
                            <form action="{{ route('solicitudes.store') }}" method="POST" onsubmit="return confirm('¿Está seguro de solicitar este seguro?')">
                                @csrf
                                <input type="hidden" name="seguro_id" value="{{ $seguro->id }}">
                                <button type="submit" class="btn btn-primary">Solicitar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $seguros->links() }}
</div>
