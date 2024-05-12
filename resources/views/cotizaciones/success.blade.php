<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cotización Exitosa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-green-600">La cotización se ha creado correctamente.</p>
                    
                    <!-- Agregar enlace para descargar el PDF -->
                    {{-- <a href="{{ route('cotizaciones.download_pdf') }}" class="text-blue-600 hover:underline">Descargar PDF de la cotización</a> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
