<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Solicitud de Auxilio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">Solicitud #{{ $solicitud->id }}</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <p><span class="font-semibold">Auxilio:</span> {{ $solicitud->auxilio->nombre }}</p>
                            <p><span class="font-semibold">Estado:</span> {{ $solicitud->estado }}</p>
                            <p><span class="font-semibold">Hora:</span> {{ $solicitud->hora }}</p>
                            <p><span class="font-semibold">Fecha:</span> {{ $solicitud->fecha }}</p>
                            <p><span class="font-semibold">Ubicación:</span> {{ $solicitud->ubicacion }}</p>
                        </div>

                        <div>
                            <div id="map" style="height: 300px;"></div>
                        </div>
                    </div>

                    <div class="mt-4">

                        <a href="{{ route('auxilios.index') }}" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
