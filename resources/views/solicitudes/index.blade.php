<x-app-layout>
    <x-slot name="header">
        <a href="{{route('solicitudes.create')}}" class="float-right btn btn-primary col-sm-2 ">Nuevo Solicitud</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitudes') }}
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
                        <h2>Solicitudes Pendientes</h2>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-rounded">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Seguro</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendientes as $solicitud)
                                    <tr>
                                        <td>{{ $solicitud->id }}</td>
                                        <td>{{ $solicitud->user->name }}</td>
                                        <td>{{ $solicitud->seguro->nombre }}</td>
                                        <td>{{ $solicitud->estado }}</td>
                                        <td>{{ $solicitud->fecha }}</td>
                                        <td>{{ $solicitud->hora }}</td>
                                        <td>
                                            <form action="{{ route('solicitudes.cambiarEstado', $solicitud->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" name="estado" value="en progreso" class="btn btn-warning">En Progreso</button>
                                                <button type="submit" name="estado" value="denegada" class="btn btn-danger">Denegar</button>
                                            </form>
                                                <a href="{{ route('solicitudes.show', $solicitud->id) }}" class="btn btn-primary">Ver Detalles</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <h2>Solicitudes Aprobadas</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-rounded">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Vendedor <br>asignado</th>
                                        <th scope="col">Seguro</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Acciones</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aprobadas as $solicitud)
                                    <tr>
                                        <td>{{ $solicitud->id }}</td>
                                        <td>{{ $solicitud->user->name }}</td>
                                        <td>{{ $solicitud->vendedor->name }}</td>
                                        <td>{{ $solicitud->seguro->nombre }}</td>
                                        <td>{{ $solicitud->estado }}</td>
                                        <td>{{ $solicitud->fecha }}</td>
                                        <td>{{ $solicitud->hora }}</td>
                                        <td>
                                            <a href="{{ route('solicitudes.show', $solicitud->id) }}" class="btn btn-primary">Ver Detalles</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h2>Solicitudes Denegadas</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-rounded">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Seguro</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Acciones</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($denegadas as $solicitud)
                                    <tr>
                                        <td>{{ $solicitud->id }}</td>
                                        <td>{{ $solicitud->user->name }}</td>
                                        <td>{{ $solicitud->seguro->nombre }}</td>
                                        <td>{{ $solicitud->estado }}</td>
                                        <td>{{ $solicitud->fecha }}</td>
                                        <td>{{ $solicitud->hora }}</td>
                                        <td>
                                            <a href="{{ route('solicitudes.show', $solicitud->id) }}" class="btn btn-primary">Ver Detalles</a>
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
