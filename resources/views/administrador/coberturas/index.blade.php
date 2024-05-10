<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('administrador/coberturas.create') }}" class="btn btn-primary float-right col-sm-2">Nueva cobertura</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de coberturas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('coberturas.lista-coberturas')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
