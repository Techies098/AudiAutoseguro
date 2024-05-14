<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('REGISTRAR NUEVA COTIZACIÓN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6 text-gray-900">
                    <form action="{{ route('cotizaciones.store') }}" method="POST">

                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre:</label>
                            <input type="text" name="name" id="name" autocomplete="name" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400 focus:ring focus:ring-blue-400">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico:</label>
                            <input type="email" name="email" id="email" autocomplete="email" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400 focus:ring focus:ring-blue-400">
                        </div>

                        <div class="mb-4">
                            <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono:</label>
                            <input type="tel" name="telefono" id="telefono" autocomplete="tel" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400 focus:ring focus:ring-blue-400">
                        </div>

                        <div class="mb-4">
                            <label for="year" class="block text-sm font-medium text-gray-700">Año del vehiculo:</label>
                            <input type="number" name="year" id="year" autocomplete="year" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400 focus:ring focus:ring-blue-400">
                        </div>

                        <div class="mb-4">
                            <label for="precio" class="block text-sm font-medium text-gray-700">Precio de lista del vehículo:</label>
                            <input type="number" name="precio" id="precio" autocomplete="precio" step="0.01" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400 focus:ring focus:ring-blue-400">
                        </div>

                        <div class="mb-4">
                            <label for="marca" class="block text-sm font-medium text-gray-700">Marca del vehiculo:</label>
                            <input type="text" name="marca" id="marca" autocomplete="marca" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400 focus:ring focus:ring-blue-400">
                        </div>

                        <div class="mb-4">
                            <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo:</label>
                            <input type="text" name="modelo" id="modelo" autocomplete="modelo" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400 focus:ring focus:ring-blue-400">
                        </div>

                        <select name="seguro_id" id="seguro_id">
                            @foreach($seguros as $seguro)
                                <option value="{{ $seguro->id }}">{{ $seguro->nombre }}</option>
                            @endforeach
                        </select>
                        {{-- <div class="mb-4">
                            <label for="seguro_id" class="block text-sm font-medium text-gray-700">Seleccione un Seguro:</label>
                            <select name="seguro_id" id="seguro_id" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400 focus:ring focus:ring-blue-400">
                                @foreach($seguros as $seguro)
                                    <option value="{{ $seguro->id }}">{{ $seguro->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Realizar Cotización</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
