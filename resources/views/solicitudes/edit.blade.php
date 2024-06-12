<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Solicitud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('solicitudes.update', $solicitud) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="cliente_id">Cliente ID:</label>
                            <input type="text" name="cliente_id" class="form-control" value="{{ $solicitud->cliente_id }}" required>
                        </div>
                        <div class="form-group">
                            <label for="seguro_id">Seguro ID:</label>
                            <input type="text" name="seguro_id" class="form-control" value="{{ $solicitud->seguro_id }}" required>
                        </div>
                        <div class="form-group">
                            <label for="hora">Hora:</label>
                            <input type="text" name="hora" class="form-control" value="{{ $solicitud->hora }}" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha:</label>
                            <input type="date" name="fecha" class="form-control" value="{{ $solicitud->fecha }}" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <select name="estado" class="form-control" required>
                                <option value="pendiente" {{ $solicitud->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="en progreso" {{ $solicitud->estado == 'en progreso' ? 'selected' : '' }}>En Progreso</option>
                                <option value="aprobada" {{ $solicitud->estado == 'aprobada' ? 'selected' : '' }}>Aprobada</option>
                                <option value="denegada" {{ $solicitud->estado == 'denegada' ? 'selected' : '' }}>Denegada</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
