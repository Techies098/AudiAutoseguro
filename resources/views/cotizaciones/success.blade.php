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
                    <!-- Mostrar información del seguro -->
                    <h3 class="text-xl font-semibold mt-4">{{ $seguro->nombre }}</h3>
                    <p>{{ $seguro->descripcion }}</p>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-green-600">La cotización se ha creado correctamente. Precio de la prima anual: ${{ $precioTotal }}</p>
                    <p class="text-green-600">Precio Actual del vehiculo: ${{ $precioDepreciado }}</p>


                    <ul>
                        {{-- <li class="font-semibold">Cláusulas:</li>
                        @foreach($seguro->clausulas as $clausula)
                            <li>{{ $clausula->descripcion }}</li>
                        @endforeach
                        
                        <li class="font-semibold">Coberturas:</li>
                        @foreach($seguro->coberturas as $cobertura)
                            <li>{{ $cobertura->descripcion }}</li>
                        @endforeach --}}
                    </ul>


                    <!-- Agregar enlace para descargar el PDF -->
                    {{-- <a href="{{ route('cotizaciones.download_pdf') }}" class="text-blue-600 hover:underline">Descargar PDF de la cotización</a> --}}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl font-semibold mt-4">Datos de la cotizacionl:</h3>

                    <p><strong>Nombre:</strong> {{ $cotizacion->name }}</p>
                    <p><strong>Correo electrónico:</strong> {{ $cotizacion->email }}</p>
                    <p><strong>Teléfono:</strong> {{ $cotizacion->telefono }}</p>
                    <p><strong>Año del vehículo:</strong> {{ $cotizacion->year }}</p>
                    <p><strong>Precio del vehículo:</strong> ${{ $cotizacion->precio }}</p>
                    <p><strong>Marca del vehículo:</strong> {{ $cotizacion->marca }}</p>
                    <p><strong>Modelo del vehículo:</strong> {{ $cotizacion->modelo }}</p>
                    <p><strong>Seguro seleccionado:</strong> {{ $seguro->nombre }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
