<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Aprobar cobertura de daño menor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6 text-gray-900">

                    @include('perito.danos-menores.datos-vehiculos')

                    @include('cliente.danos-menores.contenido-reporte')

                    @if ($dano->estado == 'Pendiente')
                        
                        <div class="row row-cols-auto mt-3 ml-2">
                            <a href="{{ route('perito.danos-menores.edit', $dano) }}" class="btn btn-primary ">Aprobar</a>

                            <form action="{{ route('perito.danos-menores-rechazar.rechazar', $dano)}}" method="POST">
                                @csrf @method('PUT')
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Rechazar cobertura del daño menor: {{ $dano->titulo }}?')">
                                        Rechazar
                                    </button>
                            </form>
                        </div>

                    @elseif($dano->estado == 'Aprobado')
                        {{-- <div class="pt-3">
                            <p class="text-green
                                font-semibold">Aprobado</p>
                        </div> --}}
                        <div class="alert alert-success mt-3">
                            <strong>¡Aprobado!</strong> El daño menor ha sido aprobado.
                        </div>
                    
                    @elseif($dano->estado = 'Rechazado')

                        <div class="alert alert-danger">
                            <strong>¡Rechazado!</strong> El daño menor ha sido rechazado.
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
