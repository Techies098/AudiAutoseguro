
<x-app-layout>
    <x-slot name="header">
        @can('administrador.seguros.create')
        <a href="{{ route('auxilios.create') }}" class="btn btn-primary float-right col-sm-2">Nuevo Auxilio</a>
        @endcan
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Auxilios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-sm-3 col-md-3">
                                <input wire:model="buscar" wire:keydown.enter="buscarAuxilios" type="search" class="form-control" placeholder="Buscar auxilio">
                            </div>
                            <div class="d-grid col-sm-2 col-md-2 mx-auto">
                                <button wire:click="buscarAuxilios" class="btn btn-secondary" type="button">Buscar</button>
                            </div>
                            <div class="col-sm-7"></div>
                        </div>

                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($auxilios as $auxilio)
                                        <tr>
                                            <td>{{ $auxilio->nombre }}</td>
                                            <td>{{ $auxilio->descripcion }}</td>
                                            <td>{{ $auxilio->precio }}</td>
                                            <td>
                                                @can('administrador.seguros.create')
                                                <a href="{{ route('auxilios.edit', $auxilio->id) }}" class="btn btn-primary">Editar</a>
                                                <form action="{{ route('auxilios.destroy', $auxilio->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Eliminar Auxilio {{ $auxilio->nombre }}?')" class="btn btn-danger">Eliminar</button>
                                                </form>
                                                @endcan
                                                <form action="{{ route('solicitudesA.create') }}" method="GET">
                                                    @csrf
                                                    <input type="hidden" name="auxilio_id" value="{{ $auxilio->id }}">
                                                    <button type="submit" class="btn btn-primary">Solicitar Auxilio Mecánico</button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $auxilios->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>