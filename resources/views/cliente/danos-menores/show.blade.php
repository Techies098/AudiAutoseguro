<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reporte de daño') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6 text-gray-900">

                    @include('cliente.danos-menores.contenido-reporte')

                    @if ($dano->estado == 'Aprobado')
                        <div class="alert alert-success mt-3">
                            <strong>¡Aprobado!</strong> La cobertura del daño de su vehículo ha sido aprobada.
                            <p>Dirijase al taller <b>{{ $dano->taller->nombre }}</b> para la reparación de su vehículo.
                            </p>
                            <p>Dirección: {{ $dano->taller->direccion }} </p>
                        </div>
                    @elseif($dano->estado == 'Rechazado')
                        <div class="alert alert-danger mt-3">
                            <strong>¡Rechazado!</strong> La cobertura del daño de su vehículo ha sido rechazada.
                            <p>El daño de su vehículo no es menor, por lo tanto debe solicitar la cobertura de su daño
                                por medio de siniestro, en el cual deberá pagar la franquicia estipulada en el contrato.
                            </p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
