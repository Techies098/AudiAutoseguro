<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Reportar Siniestro') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="container p-6 text-gray-900">
                    <form action="{{ route('personal/siniestros.store') }}" method="POST">
                        @csrf
                        <div class="col-md-4">
                            <label for="contrato_id" class="form-label">Poliza/Vehículo</label>
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
                        <div class="col">
                            <div class="mb-3">
                                <label for="ubicacion" class="form-label">ubicacion </label>
                                <input type="text" class="form-control" id="ubicacion" name="ubicacion">
                                @error('ubicacion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex items-center m-1">
                                <button id="ubicar-btn" class="btn btn-primary" type="button">Ubicar</button>
                                <a id="maps-link" href="#" class="hidden m-1 text-blue-950" target="_blank">Ver en Google Maps</a>
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">tipo de accidente </label>
                                <input type="text" class="form-control" id="tipo" name="tipo">
                                @error('tipo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Reportar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.getElementById('ubicar-btn').addEventListener('click', function() {
        // Obtener la ubicación del usuario
        navigator.geolocation.getCurrentPosition(function(position) {
            const latitud = position.coords.latitude;
            const longitud = position.coords.longitude;
            const mapsLink = `https://www.google.es/maps?q=${latitud},${longitud}`;
            document.getElementById('maps-link').href = mapsLink;
            // Mostrar el enlace
            document.getElementById('maps-link').style.display = 'block';
            // Mostrar la ubicación en el campo de entrada (opcional)
            document.getElementById('ubicacion').value = mapsLink;
        });
    });
</script>
