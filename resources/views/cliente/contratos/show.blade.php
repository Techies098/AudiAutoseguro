<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Contrato de seguro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h1 class="text-2xl font-semibold text-gray-900">Contrato de seguro</h1>
                        <div class="text-lg font-semibold text-gray-900">
                            Vehiculo: {{ $contrato->vehiculo->marca }} - {{ $contrato->vehiculo->modelo }} - {{ $contrato->vehiculo->placa }}
                        </div>
                    </div>
                    <div class="mt-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Seguro</p>
                                <p class="text-lg font-semibold text-gray-900 pb-2">{{ $contrato->seguro->nombre }}</p>
                                <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-black py-2 px-4 border border-blue-500 hover:border-transparent rounded" 
                                    href="{{ route('administrador/seguros.show', $contrato->seguro->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                    Ver
                                </a>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Nro contrato</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $contrato->id }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Tiempo de vigencia</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $contrato->tipovigencia }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Inicio vigencia</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $contrato->vigenciainicio }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Finalización de la vigencia</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $contrato->vigenciafin }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Estado</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $contrato->estado }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Costo prima</p>
                                <p class="pb-2 text-lg font-semibold text-gray-900">{{ $contrato->costoprima }} $</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Costo franquicia</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $contrato->costofranquicia }} $</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Cant cuotas</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $contrato->nro_cuotas }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Valor cuota</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $contrato->valor_cuota }} $</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Fecha de creación</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $contrato->created_at }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Fecha de actualización</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $contrato->updated_at }}</p>
                            </div>
                        </div>
                        @include('cliente.contratos.tabla-cuotas')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

