<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cotización Exitosa') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 bg-white border-b border-gray-200">
                    <!-- Mostrar información del seguro -->
                    <h3 class="text-lg font-semibold mt-2 sm:text-xl">{{ $seguro->nombre }}</h3>
                    <p class="text-sm sm:text-base">{{ $seguro->descripcion }}</p>
                </div>
                <div class="p-4 sm:p-6 bg-white border-b border-gray-200">
                    <p class="text-green-600 text-sm sm:text-base">La cotización se ha creado correctamente. Precio de la prima anual: ${{ $precioTotal }}</p>
                    <p class="text-green-600 text-sm sm:text-base">Precio Actual del vehiculo: ${{ $precioDepreciado }}</p>
                </div>
                <div class="p-4 sm:p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mt-2 sm:text-xl">Datos de la cotización:</h3>

                    <p class="text-sm sm:text-base"><strong>Nombre:</strong> {{ $cotizacion->name }}</p>
                    <p class="text-sm sm:text-base"><strong>Correo electrónico:</strong> {{ $cotizacion->email }}</p>
                    <p class="text-sm sm:text-base"><strong>Teléfono:</strong> {{ $cotizacion->telefono }}</p>
                    <p class="text-sm sm:text-base"><strong>Año del vehículo:</strong> {{ $cotizacion->year }}</p>
                    <p class="text-sm sm:text-base"><strong>Precio del vehículo:</strong> ${{ $cotizacion->precio }}</p>
                    <p class="text-sm sm:text-base"><strong>Marca del vehículo:</strong> {{ $cotizacion->marca }}</p>
                    <p class="text-sm sm:text-base"><strong>Modelo del vehículo:</strong> {{ $cotizacion->modelo }}</p>
                    <p class="text-sm sm:text-base"><strong>Seguro seleccionado:</strong> {{ $seguro->nombre }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
