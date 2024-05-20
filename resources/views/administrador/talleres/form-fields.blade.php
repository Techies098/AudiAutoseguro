<div class="col">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" class="form-control" id="nombre" name="nombre"
            value="{{ old('nombre', $taller->nombre) }}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Direccion *</label>
        <input type="text" class="form-control" id="direccion" name="direccion"
            value="{{ old('direccion', $taller->direccion) }}">
        @error('direccion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Telefono *</label>
        <input type="text" class="form-control" id="telefono" name="telefono"
            value="{{ old('telefono', $taller->telefono) }}">
        @error('telefono')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
