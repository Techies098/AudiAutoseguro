<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Aprobar cobertura de daño menor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="p-3" >
                    {{-- @include('perito.danos-menores.datos-vehiculos') --}}
                    <br>
                    <form action="{{ route('perito.danos-menores.update', $dano_menor)}}" method="POST">
                        @csrf @method('PUT')
                        <div class="mb-3">
                            <label for="taller_id" class="form-label">Seleccionar taller para la reparación del vehículo:</label>
                            <select name="taller_id" id="taller_id" class="form-control">
                                @foreach ($talleres as $taller)
                                    <option value="{{ $taller->id }}">
                                        {{ $taller->id }} - {{ $taller->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary mt-3">
                                Aprobar
                            </button>
                        </div> 
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
