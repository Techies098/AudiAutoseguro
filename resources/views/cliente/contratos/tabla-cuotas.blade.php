<!-- Cuotas -->
<div class="pt-4">
    <h2 class="text-2xl font-semibold text-gray-900">Cuotas:</h2>
    <div class="overflow-x-auto">
        <table class="w-full mt-4 bg-white border border-gray-200 divide-y divide-gray-200 rounded-md">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Nro</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de pago</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Monto</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Acción</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($contrato->cuotas as $cuota)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $cuota->numero }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $cuota->fecha_por_pagar }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $cuota->estado }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $cuota->monto }} $</td>
                        @if ($cuota->estado == 'Pendiente')
                            <td class="px-6 py-4 whitespace-nowrap">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('paypal') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="contrato_id" value="{{ $contrato->id }}">
                                        <input type="hidden" name="cuota_id" value="{{ $cuota->id }}">
                                        <button class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" 
                                            type="submit"> 
                                            Pagar con PayPal
                                        </button>
                                    </form>
                                </td>
                            </td>
                        @else
                            <td class="px-6 py-4 whitespace-nowrap">Pagada el: {{ $cuota->fecha_pagada }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>