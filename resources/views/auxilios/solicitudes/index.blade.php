<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todas las Solicitudes de Auxilio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h3>Solicitudes Pendientes</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendientes as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->id }}</td>
                                    <td>{{ $solicitud->user->name }}</td>
                                    <td>{{ $solicitud->estado }}</td>
                                    <td>{{ $solicitud->fecha }}</td>
                                    <td>{{ $solicitud->hora }}</td>
                                    <td>
                                        <form action="{{ route('solicitudesA.cambiarEstado', $solicitud->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" name="estado" value="en progreso" class="btn btn-warning btn-sm">En Progreso</button>
                                            <button type="submit" name="estado" value="denegada" class="btn btn-danger btn-sm">Denegar</button>
                                            <a href="{{ route('solicitudesA.show', $solicitud->id) }}" class="btn btn-primary btn-sm">Ver Detalles</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h3>Solicitudes en Progreso</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enProgreso as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->id }}</td>
                                    <td>{{ $solicitud->user->name }}</td>
                                    <td>{{ $solicitud->estado }}</td>
                                    <td>{{ $solicitud->fecha }}</td>
                                    <td>{{ $solicitud->hora }}</td>
                                    <td>
                                        <a href="{{ route('solicitudesA.show', $solicitud->id) }}" class="btn btn-primary btn-sm">Ver Detalles</a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h3>Solicitudes Aprobadas</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aprobadas as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->id }}</td>
                                    <td>{{ $solicitud->user->name }}</td>
                                    <td>{{ $solicitud->estado }}</td>
                                    <td>{{ $solicitud->fecha }}</td>
                                    <td>{{ $solicitud->hora }}</td>
                                    <td>
                                        <a href="{{ route('solicitudesA.show', $solicitud->id) }}" class="btn btn-primary btn-sm">Ver Detalles</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h3>Solicitudes Denegadas</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($denegadas as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->id }}</td>
                                    <td>{{ $solicitud->user->name }}</td>
                                    <td>{{ $solicitud->estado }}</td>
                                    <td>{{ $solicitud->fecha }}</td>
                                    <td>{{ $solicitud->hora }}</td>
                                    <td>
                                        <a href="{{ route('solicitudesA.show', $solicitud->id) }}" class="btn btn-primary btn-sm">Ver Detalles</a>
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
</x-app-layout>
