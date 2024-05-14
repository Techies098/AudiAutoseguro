<x-app-layout>
    <x-slot name="header">
        @can('administrador.seguros.create')
            <a href="{{ route('administrador/seguros.create') }}" class="btn btn-primary float-right col-sm-2">Nuevo Seguro</a>
            @endcan
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de seguros disponibles') }}
            </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('seguros.lista-seguros')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
