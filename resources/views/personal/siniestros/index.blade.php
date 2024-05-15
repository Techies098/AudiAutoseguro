<x-app-layout>
    <x-slot name="header">
        {{--<a href="{{route('administrador/usuarios.create')}}" class="float-right btn btn-primary col-sm-2 ">Nuevo Cliente</a>
        --}}
        <a href="{{route('reportar_siniestro')}}" class="float-right btn btn-primary col-sm-2 ">Reportar Siniestro</a>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Lista de Siniestros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('siniestros.lista-siniestros')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
