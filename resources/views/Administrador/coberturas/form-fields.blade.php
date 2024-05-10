<div class="row g-3">
    <div class="col-md-4">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" class="form-control" id="nombre" name="nombre"
            value="{{ old('nombre', $cobertura->nombre) }}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="cubre" class="form-label">Cubre al:</label>
        <input type="text" class="form-control" id="cubre" name="cubre"
            value="{{ old('cubre', $cobertura->cubre) }}" pattern="[0-9.,]*">
        @error('cubre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="sujeto_a_franquicia" class="form-label">Sujeto a franquicia?</label>
        <select class="form-select" id="sujeto_a_franquicia" name="sujeto_a_franquicia" aria-label="Selecciona">
            <option value="" selected disabled>Selecciona</option>
            <option value="Si"
                {{ old('sujeto_a_franquicia', $cobertura->sujeto_a_franquicia) == 'Si' ? 'selected' : '' }}>Si</option>
            <option value="No"
                {{ old('sujeto_a_franquicia', $cobertura->sujeto_a_franquicia) == 'No' ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="col-md-4">
        <label for="limite_cobertura" class="form-label">Límite de Cobertura:</label>
        <input type="text" class="form-control" id="limite_cobertura" name="limite_cobertura"
            value="{{ old('limite_cobertura', $cobertura->limite_cobertura) }}" pattern="[0-9.,]*">
        @error('limite_cobertura')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="precio" class="form-label">Precio:</label>
        <input type="text" class="form-control" id="precio" name="precio"
            value="{{ old('precio', $cobertura->precio) }}" pattern="[0-9.,]*">
        @error('precio')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
