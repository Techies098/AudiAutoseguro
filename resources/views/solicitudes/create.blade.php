<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nueva Solicitud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('solicitudes.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="cliente_id">Cliente ID:</label>
                            <input type="text" name="cliente_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="seguro_id">Seguro ID:</label>
                            <input type="text" name="seguro_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="hora">Hora:</label>
                            <input type="text" name="hora" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha:</label>
                            <input type="date" name="fecha" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
