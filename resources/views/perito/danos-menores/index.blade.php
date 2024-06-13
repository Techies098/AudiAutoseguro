<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Reportes de daños menores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="col-md-12 p-3 table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Título</th>
                                <th scope="col">Detalle</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($danos as $fila => $dano)
                                <tr>
                                    <td>{{ $dano->created_at }}</td>
                                    <td>{{ $dano->titulo }}</td>
                                    <td>{{ $dano->detalle }}</td>
                                    <td>{{ $dano->estado }}</td>
                                    <td>
                                        <a href="{{ route('perito.danos-menores.show', $dano) }}" class="btn btn-primary">Ver</a>
                                        {{-- <a href="{{ route('cliente.dano-menor.edit', $dano) }}" class="btn btn-primary">Editar</a> --}}
                                        {{-- <form action="{{ route('cliente.dano-menor.destroy', $dano) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Eliminar daño menor {{$dano->titulo}}?')" class="btn btn-danger">Eliminar</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
    
                {{ $danos->links() }}
    
            </div>
        </div>
    </div>
    
</x-app-layout>
