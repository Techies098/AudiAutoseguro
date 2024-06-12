<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Reportar un daño menor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                
                <form action="{{ route('cliente.dano-menor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col p-6">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Selecciona el vehiculo/seguro que presentró el daño</label>
                            <select name="contrato_id" id="contrato_id" class="form-control">
                                <option value="" disabled selected>Seleccionar Vehículo</option>
                                @foreach ($vehiculos as $vehiculo)
                                    @foreach ($contratos as $contrato)
                                        @if ($contrato->vehiculo_id == $vehiculo->id)
                                            <option value="{{ $contrato->id }}">
                                                {{ $contrato->id }} - Seguro: {{($contrato->Seguro)->nombre }}/
                                                {{ $vehiculo->marca }} {{ $vehiculo->modelo }}
                                                ({{ $vehiculo->placa }})
                                            </option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                            @error('titulo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="detalle" class="form-label">Detalle</label>
                            <input type="text" class="form-control" id="detalle" name="detalle" required>
                            @error('detalle')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card mb-3" >
                            <div class="card-body" >
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Archivos</label>
                                    <input class="form-control" name="file[]" type="file" id="formFileMultiple" multiple
                                    accept="image/*, .pdf, .mp4">
                                    @error('file')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
