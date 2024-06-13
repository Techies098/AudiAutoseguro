<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Solicitudes de Auxilio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 gap-4">
                        @foreach($misSolicitudes as $solicitud)
                            <div class="border rounded-lg p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="text-lg font-bold">{{ $solicitud->auxilio->nombre }}</h3>
                                    <span class="text-sm font-semibold">{{ $solicitud->estado }}</span>
                                </div>
                                <p class="text-gray-600">{{ $solicitud->fecha }}{{ $solicitud->hora }}</p>
                                <div class="mt-2">
                                    <a href="{{ route('solicitudesA.show', $solicitud) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Ver Detalles
                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
