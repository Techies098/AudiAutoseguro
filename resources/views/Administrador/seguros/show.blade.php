<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Detalle del seguro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-10">
                    <h1 class="text-2xl font-semibold text-gray-900">Detalle del seguro</h1>
                    <div class="flex justify-between mt-6">
                        <div class="w-1/2">
                            <h2>Nombre:</h2>
                            <p class="text-2xl font-semibold text-gray-900">{{ $seguro->nombre }}</p>
                        </div>
                        <div class="w-1/2">
                            <h2>Porcentaje prima sobre el valor del vehículo:</h2>
                            <p class="text-2xl font-semibold text-gray-900">{{ $seguro->precio_prima * 100 }} %</p>
                        </div>
                    </div>
                    <div class="flex justify-between mt-6">
                        <div class="w-1/2">
                            <h2>Descripción:</h2>
                            <p class="text-lg">{{ $seguro->descripcion }}</p>
                        </div>
                        <div class="w-1/2">
                            <h2>Fecha de actualización:</h2>
                            <p class="text-lg font-semibold text-gray-900">{{ $seguro->updated_at }}</p>
                        </div>
                    </div>
                    <br>
                    <h2>Coberturas:</h2>
                    <div class="mt-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cubre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Franquicia</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Límite</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($seguro->cobertura as $cobertura)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cobertura->nombre }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cobertura->cubre }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cobertura->sujeto_a_franquicia }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cobertura->limite_cobertura }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cobertura->precio }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h2 class="mt-6">Clausulas:</h2>
                    <div class="mt-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detalle</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($seguro->clausula as $clausula)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $clausula->detalle }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
