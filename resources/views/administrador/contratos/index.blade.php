<x-app-layout>
    <x-slot name="header">
        @can('administrador.contratos.create')
            <a href="{{ route('administrador/contratos.create') }}" class="btn btn-primary float-right col-sm-2 ">Nuevo
                contrato</a>
        @endcan
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de contratos') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('contratos.lista-contratos')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
