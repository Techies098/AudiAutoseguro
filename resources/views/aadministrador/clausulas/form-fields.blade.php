<div class="col">
    <div class="mb-3">
        <label for="detalle" class="form-label">Detalle *</label>
        <input type="text" class="form-control" id="detalle" name="detalle"
            value="{{ old('detalle', $clausula->detalle) }}">
        @error('detalle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
