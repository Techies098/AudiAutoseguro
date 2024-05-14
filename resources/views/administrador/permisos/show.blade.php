<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de permisos del usuario')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Usuario: {{$user->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Gestion de permisos</h6>
                            @include('administrador/permisos/lista-permisos')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
