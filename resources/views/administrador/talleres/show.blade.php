<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Taller Mecanico') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h1 class="text-2xl font-semibold text-gray-900">Taller Mecanico</h1>
                    </div>
                    <!--<div class="mt-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                            <div>
                                <p class="text-sm font-semibold text-gray-700">Nombre</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $taller->nombre }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Direccion</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $taller->direccion }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700">Telefono/s</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $taller->telefono }}</p>
                            </div>
                        </div>
                    </div>-->

                    <dl class="row">
                        <dt class="col-sm-3">Nombre</dt>
                        <dd class="col-sm-9 text-lg font-semibold text-gray-900">{{ $taller->nombre }}</dd>

                        <dt class="col-sm-3">Direccion</dt>
                        <dd class="col-sm-9 text-lg font-semibold text-gray-900 ">{{ $taller->direccion }}</dd>

                        <dt class="col-sm-3">Telefono/s</dt>
                        <dd class="col-sm-9 text-lg font-semibold text-gray-900 ">{{ $taller->telefono }}</dd>

                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
