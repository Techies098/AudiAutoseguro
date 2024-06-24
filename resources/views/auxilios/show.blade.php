
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Auxilio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6 text-gray-900">
                    <div>
                        <strong>Nombre:</strong> {{ $auxilio->nombre }}
                    </div>
                    <div>
                        <strong>Descripción:</strong> {{ $auxilio->descripcion }}
                    </div>
                    <div>
                        <strong>Precio:</strong> {{ $auxilio->precio }}
                    </div>
                    <a href="{{ route('auxilios.index') }}" class="btn btn-secondary mt-3">Volver</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>