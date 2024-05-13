<div class="col">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" class="form-control" id="nombre" name="nombre"
            value="{{ old('nombre', $seguro->nombre) }}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion *</label>
        <input type="text"class="form-control" id="descripcion" name="descripcion"
            value="{{ old('descripcion', $seguro->descipcion) }}">
        @error('descripcion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    



    <div class="mb-3">
        <label for="precio_prima" class="form-label">Porcentaje de la prima *</label>
        <input type="number" step="0.01" class="form-control" id="precio_prima" name="precio_prima"
            value="{{ old('precio_prima', $seguro->precio_prima) }}">
        @error('precio_prima')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
