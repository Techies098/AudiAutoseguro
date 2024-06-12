<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Solicitud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-gray-900">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold">Información de la Solicitud</h3>
                        <p><span class="font-semibold">ID:</span> {{ $solicitud->id }}</p>
                        <p><span class="font-semibold">Estado:</span> {{ $solicitud->estado }}</p>
                        <p><span class="font-semibold">Fecha:</span> {{ $solicitud->fecha }}</p>
                        <p><span class="font-semibold">Hora:</span> {{ $solicitud->hora }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Información del Cliente</h3>
                        <p><span class="font-semibold">Nombre:</span> {{ $cliente->name }}</p>
                        <p><span class="font-semibold">Email:</span> {{ $cliente->email }}</p>
                        <p><span class="font-semibold">Telefono:</span> {{ $cliente->telefono }}</p>

                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Información del Vendedor</h3>
                        <p><span class="font-semibold">Nombre:</span> {{ optional($vendedor)->name }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Información del Seguro</h3>
                        <p><span class="font-semibold">Nombre del Seguro:</span> {{ $seguro->nombre }}</p>
                        <p><span class="font-semibold">Descripción:</span> {{ $seguro->descripcion }}</p>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mt-6">Coberturas</h3>
                    @if ($seguro->cobertura->isNotEmpty())
                        <ul class="list-disc list-inside">
                            @foreach ($seguro->cobertura as $cobertura)
                                <li>{{ $cobertura->nombre }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No hay coberturas disponibles para este seguro.</p>
                    @endif
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mt-6">Cláusulas</h3>
                    @if ($seguro->clausula->isNotEmpty())
                        <ul class="list-disc list-inside">
                            @foreach ($seguro->clausula as $clausula)
                                <li>{{ $clausula->detalle }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No hay cláusulas disponibles para este seguro.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
