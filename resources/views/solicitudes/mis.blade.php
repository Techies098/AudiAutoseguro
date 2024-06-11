<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Solicitudes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-sm-3 col-md-3">
                                <input type="search" class="form-control" placeholder="Buscar solicitud">
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
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Seguro</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($misSolicitudes as $solicitud)
                                    <tr>
                                        <td>{{ $solicitud->user->name }}</td>
                                        <td>{{ $solicitud->seguro->nombre }}</td>
                                        <td>{{ $solicitud->estado }}</td>
                                        <td>{{ $solicitud->fecha }}</td>
                                        <td>{{ $solicitud->hora }}</td>
                                        <td>
                                            <form action="{{ route('solicitudes.destroy', $solicitud) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('¿Eliminar Solicitud del {{ $solicitud->seguro->nombre }}?')" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
