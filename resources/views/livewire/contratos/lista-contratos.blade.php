<div class="container text-center">

    <div class="container">
        <div class="mb-3 row">
            <div class="col-sm-3 col-md-3">
                <input wire:model="buscar" wire:keydown.enter="buscarContratos" type="search" class="form-control"
                    placeholder="codigo de contrato"><!-- lo q  aparece en el buscador por defecto-->
            </div>
            <div class="mx-auto d-grid col-sm-2 col-md-2">
                <button wire:click= "buscarContratos" class="btn btn-secondary" type="button">
                    Buscar
                </button>
            </div>
            <div class="col-sm-7"></div>
        </div>

    </div>

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">ID Vehiculo</th>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Seguro</th>
                        <th scope="col">Franquicia</th>
                        <th scope="col">Prima</th>
                        <th scope="col">Nro Cuotas</th>
                        <th scope="col">Tipo Vigencia</th>
                        <th scope="col">Vigencia Inicio</th>
                        <th scope="col">Vigencia Fin</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($contratos as $fila => $contrato)
                        <tr>
                            <td>{{ $contrato->id }}</td>
                            <td>{{ $contrato->vehiculo_id }} </td>
                            <td>{{ $contrato->user_id }} </td>
                            <td>{{ $contrato->seguro_id }} </td>
                            <td>{{ $contrato->costofranquicia }} </td>
                            <td>{{ $contrato->costoprima }} </td>
                            <td>{{ $contrato->nro_cuotas }} </td>
                            <td>{{ $contrato->tipovigencia }} </td>
                            <td>{{ date('d-m-Y', strtotime($contrato->vigenciainicio)) }} </td>
                            <td>{{ date('d-m-Y', strtotime($contrato->vigenciafin)) }} </td>

                            <td>
                                @if ($contrato->estado == 'Activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('administrador/contratos.edit', $contrato) }}"
                                    class="btn btn-secondary btn-sm">Ver</a>
                                <a href="{{ route('pdf-contrato', $contrato) }}" class="btn btn-warning btn-sm"
                                    target="_blank">PDF</a>
                                <a href="{{ route('administrador/contratos.edit', $contrato) }}"
                                    class="btn btn-primary btn-sm">Editar</a>
                                <a href="{{ route('administrador/contratos.edit', $contrato) }}"
                                    class="btn btn-info btn-sm">Enviar</a>
                                <!--<form action="{{ route('administrador/contratos.destroy', $contrato) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Eliminar contrato {{ $contrato->id }}?')"
                                        class="btn btn-danger btn-sm">Eliminar</button>
                                </form>-->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $contratos->links() }}

</div>
