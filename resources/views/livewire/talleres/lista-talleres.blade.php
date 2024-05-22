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
                                <span id="estado-{{ $taller->id }}"
                                    class="badge {{ $taller->estado == 'Activo' ? 'bg-success' : 'bg-danger' }} cursor-pointer"
                                    onclick="cambiarEstado({{ $taller->id }})">
                                    {{ $taller->estado }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('administrador/talleres.show', $taller->id) }}"
                                    class="btn btn-secondary">Ver</a>

                                @can('administrador.talleres.edit', $taller)
                                    <a href="{{ route('administrador/talleres.edit', $taller) }}"
                                        class="btn btn-primary">Editar</a>
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!--javaScript INI-->
            <script>
                function cambiarEstado(id) {
                    fetch(`/administrador/talleres/cambiar-estado/${id}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            const estadoSpan = document.getElementById(`estado-${id}`);
                            estadoSpan.textContent = data.nuevoEstado;
                            estadoSpan.classList.toggle('bg-success', data.nuevoEstado === 'Activo');
                            estadoSpan.classList.toggle('bg-danger', data.nuevoEstado === 'Inactivo');
                        })
                        .catch(error => console.error('Error:', error));
                }
            </script>

            <!--javaScript FIN-->
        </div>
    </div>

    {{ $talleres->links() }}
</div>
