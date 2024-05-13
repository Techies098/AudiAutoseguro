<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Relacionar Cláusulas y Coberturas con Seguro') }}</div>
    
                        <div class="card-body">
                            <form method="POST" action="{{ route('guardar.relacion') }}">
                                @csrf
    
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">{{ __('Nombre del Seguro') }}</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="{{ old('nombre', $seguro->nombre) }}" readonly>
                                </div>
    
                                <div class="mb-3">
                                    <label for="clausulas" class="form-label">{{ __('Clausulas') }}</label>
                                    @foreach ($clausulas as $clausula)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="clausulas[]"
                                                id="clausula{{ $clausula->id }}" value="{{ $clausula->id }}"
                                                {{ optional($seguro->clausulas)->contains($clausula->id) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="clausula{{ $clausula->id }}">
                                                {{ $clausula->detalle }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <div class="mb-3">
                                    <label for="coberturas" class="form-label">{{ __('Coberturas') }}</label>
                                    @foreach ($coberturas as $cobertura)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="coberturas[]"
                                                id="cobertura{{ $cobertura->id }}" value="{{ $cobertura->id }}"
                                                {{ optional($seguro->coberturas)->contains($cobertura->id) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="cobertura{{ $cobertura->id }}">
                                                {{ $cobertura->nombre }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
    
                                <button type="submit" class="btn btn-primary">{{ __('Guardar Relación') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
