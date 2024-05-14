<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mis contratos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nro contrato</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Inicio vigencia</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Costo prima</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cant cuotas</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($contratos as $contrato)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $contrato->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $contrato->vigenciainicio }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $contrato->estado }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $contrato->costoprima }} $</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $contrato->nro_cuotas }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('cliente.contratos.show', $contrato->id) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
