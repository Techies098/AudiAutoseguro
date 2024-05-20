<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar nuevo taller') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6 text-gray-900">

                    <form action="{{ route('administrador/talleres.store') }}" method="POST">
                        @csrf
                        @include('administrador.talleres.form-fields')
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
