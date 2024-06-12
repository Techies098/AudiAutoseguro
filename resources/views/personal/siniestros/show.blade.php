<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Siniestro') }} {{ $siniestro->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-xl font-semibold leading-tight text-gray-800"><strong>Siniestro {{ $siniestro->id }}</strong></h2>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><strong>Detalle:</strong> {{ $siniestro->detalle ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Tipo:</strong> {{ $siniestro->tipo ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Estado:</strong> {{ $siniestro->estado ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Estado de Ebriedad:</strong> {{ $siniestro->estado_ebriedad ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Monto Siniestro:</strong> {{ $siniestro->monto_siniestro ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Porcentaje de Daño:</strong> {{ $siniestro->porcentaje_danio ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Porcentaje Culpabilidad:</strong> {{ $siniestro->porcentaje_culpabilidad ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Ubicación:</strong> {{ $siniestro->ubicacion ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Informe:</strong> {{ $siniestro->url_informe ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Fecha de Creación:</strong> {{ $siniestro->created_at ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Fecha de Actualización:</strong> {{ $siniestro->updated_at ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Contrato:</strong> {{ $siniestro->contrato->id. '- '.$siniestro->contrato->seguro->nombre ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Administrador:</strong> {{ $siniestro->administrador->user->name ?? 'No disponible' }}</p>
                                <p class="card-text"><strong>Perito:</strong> {{ $siniestro->perito->user->name ?? 'No disponible' }}</p>
                                @include('personal.siniestros.pagar-franquicia')
                            </div>
                            <div class="card">
                            <div class="card-header">
                                <h2><strong>Adjuntos</strong></h2>
                            </div>
                            <div class="card-body">
                                <p>ninguno</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
