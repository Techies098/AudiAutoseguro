<div class="container text-center">
    <div class="container">
        <div class="mb-3 row">
            {{-- <div class="col-sm-3 col-md-3" >
                <input wire:model="buscar" wire:keydown.enter="buscarSiniestros"
                type="search"
                class="form-control"
                placeholder="Siniestro"><!-- lo q  aparece en el buscador por defecto-->
            </div>
            <div class="mx-auto d-grid col-sm-2 col-md-2" >
                <button wire:click= "buscarSiniestros"
                    class="btn btn-secondary"
                    type="button">
                    Buscar
                </button>
            </div>
            --}}
            <div class="col-sm-7"></div>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Detalle</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Ubicacion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siniestros as $fila => $siniestro)
                    @if ($siniestro)
                        <tr>
                            <td>{{ $siniestro->detalle }}</td>
                            <td>{{ $siniestro->estado }} </td>
                            <td>{{ $siniestro->created_at }} </td>
                            <td>{{ $siniestro->ubicacion }} </td>
                            <td>
                                <a href="{{ route('personal/siniestros.show', $siniestro->id) }}"
                                            class="btn btn-primary">ver</a>
                                @if ($siniestro->estado == 'revisado')
                                    <a href="{{ route('denegar_siniestro', $siniestro->id) }}"
                                        class="btn btn-primary">Denegar</a>
                                    <a href="{{ route('aprobar_siniestro', $siniestro->id) }}"
                                        class="btn btn-primary">Aprobar</a>
                                @else
                                    @if ($siniestro->estado == 'Espera')
                                        <a href="{{ route('revisar_siniestro', $siniestro) }}"
                                            class="btn btn-primary">revisar</a>
                                    @else
                                        {{--<a href="{{ route('re_evaluar_siniestro', $siniestro->id) }}"
                                            class="btn btn-primary">Re_evaluar</a>--}}
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $siniestros->links() }}
</div>
