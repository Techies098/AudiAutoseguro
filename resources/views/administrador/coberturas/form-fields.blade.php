<div class="col">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" class="form-control" id="nombre" name="nombre"
            value="{{ old('nombre', $cobertura->nombre) }}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    {{-- <div class="mb-3">
        <label for="limite_cobertura" class="form-label">Límite de Cobertura *</label>
        <input type="number" step="0,01" class="form-control" id="limite_cobertura" name="limite_cobertura"
            value="{{ old('limite_cobertura', $cobertura->limite_cobertura) }}">
        @error('limite_cobertura')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div> --}}


    <div class="mb-3">
        <label for="limite_cobertura" class="form-label">Límite de Cobertura *</label>
        <input type="number" step="0.01" class="form-control" id="limite_cobertura" name="limite_cobertura"
            value="{{ old('limite_cobertura', $cobertura->limite_cobertura) }}">
        @error('limite_cobertura')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    



    <div class="mb-3">
        <label for="porcentaje_cobertura" class="form-label">Porcentaje de Cobertura *</label>
        <input type="number" step="0.01" class="form-control" id="porcentaje_cobertura" name="porcentaje_cobertura"
            value="{{ old('porcentaje_cobertura', $cobertura->porcentaje_cobertura) }}">
        @error('porcentaje_cobertura')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
