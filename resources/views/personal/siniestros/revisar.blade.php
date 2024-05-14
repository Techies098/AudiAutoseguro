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
                                </div>
                                <div class="mb-3">
                                    <label for="ubicacion" class="form-label">Ubicacion </label>
                                    <input type="text" class="form-control" id="detalle" name="ubicacion" value="{{ old('ubicacion', $siniestro->ubicacion) }}">
                                    @error('ubicacion')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tipo" class="form-label">Tipo de accidente</label>
                                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo', $siniestro->tipo) }}">
                                    @error('tipo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="estado_ebriedad" class="form-label">Estado de ebriedad </label>
                                    <input type="text" class="form-control" id="estado_ebriedad" name="estado_ebriedad" value="{{ old('estado_ebriedad', $siniestro->estado_ebriedad) }}">
                                    @error('estado_ebriedad')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="monto_siniestro" class="form-label">Monto Siniestro</label>
                                    <input type="number" class="form-control" id="monto_siniestro" name="monto_siniestro" step="0.01">
                                    @error('monto_siniestro')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="porcentaje_danio" class="form-label">Porcentaje de daño</label>
                                    <input type="number" class="form-control" id="porcentaje_danio" name="porcentaje_danio" step="0.001">
                                    @error('porcentaje_danio')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="porcentajeCulpabilidad" class="form-label">Porcentaje de Culpabilidad</label>
                                    <input type="number" class="form-control" id="porcentajeCulpabilidad" name="porcentajeCulpabilidad" step="0.001">
                                    @error('porcentajeCulpabilidad')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-full mb-3">
                                    <label for="url_informe" class="form-label">Informe</label>
                                    <input type="text" class="form-control" id="url_informe" name="url_informe">
                                    @error('url_informe')
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
