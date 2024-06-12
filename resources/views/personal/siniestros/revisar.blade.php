<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Revisar Siniestro') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="container p-6 text-gray-900">
                    <form action="{{ route('personal.siniestros.update', $siniestro->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="detalle" class="form-label">Detalle </label>
                                    <input type="text" class="form-control" id="detalle" name="detalle" value="{{ old('detalle', $siniestro->detalle) }}">
                                    @error('detalle')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Ingresa un texto.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="ubicacion" class="form-label">Ubicacion </label>
                                    <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion', $siniestro->ubicacion) }}">
                                    @error('ubicacion')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="flex items-center m-1">
                                    <button id="ubicar-btn" class="btn btn-primary" type="button">Ubicar</button>
                                    <a id="maps-link" href="#" class="hidden m-1 text-blue-950" target="_blank">Ver en Google Maps</a>
                                </div>
                                <div class="mb-3">
                                    <label for="tipo" class="form-label">Tipo de accidente</label>
                                    <select wire:model="selectedTipoDeSiniestro" id="tipo" name="tipo" class="form-control">
                                        <option value="">Selecciona un tipo de siniestro</option>
                                        @foreach ($tiposDeSiniestro as $tipo)
                                            <option value="{{ $tipo->id }}" @if ($tipo->id == $siniestro->tipoDeSiniestro->id) selected @endif>
                                                {{ $tipo->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tipo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="estado_ebriedad" class="form-label">Estado de ebriedad </label>
                                    <input type="text" class="form-control" id="estado_ebriedad" name="estado_ebriedad" value="{{ old('estado_ebriedad', $siniestro->estado_ebriedad) }}">
                                    <small class="text-muted">Ingresa un texto.</small>
                                    @error('estado_ebriedad')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="monto_siniestro" class="form-label">Monto Siniestro</label>
                                    <input type="number" class="form-control" id="monto_siniestro" name="monto_siniestro" step="0.01"
                                    value="{{ old('monto_siniestro', $siniestro->monto_siniestro) }}">
                                    <small class="text-muted">Ingresa un monto (por ejemplo, 555.5).</small>
                                    @error('monto_siniestro')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="porcentaje_danio" class="form-label">Porcentaje de daño</label>
                                    <input type="number" class="form-control" id="porcentaje_danio" name="porcentaje_danio" step="0.001"
                                           value="{{ old('porcentaje_danio', $siniestro->porcentaje_danio) }}">
                                    <small class="text-muted">Ingresa un número decimal (por ejemplo, 0.123).</small>
                                    @error('porcentaje_danio')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="porcentajeCulpabilidad" class="form-label">Porcentaje de Culpabilidad</label>
                                    <input type="number" class="form-control" id="porcentajeCulpabilidad" name="porcentajeCulpabilidad"
                                    step="0.001" value="{{ old('porcentajeCulpabilidad', $siniestro->porcentajeCulpabilidad) }}">
                                    <small class="text-muted">Ingresa un número decimal (por ejemplo, 0.123).</small>
                                    @error('porcentajeCulpabilidad')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Terminar revision</button>
                            </div>
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
            // Mostrar la ubicación en el campo de entrada
            document.getElementById('ubicacion').value = mapsLink;
        });
    });
</script>
