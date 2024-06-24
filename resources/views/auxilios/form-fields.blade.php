<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $auxilio->nombre ?? '') }}" required>
</div>
<div class="form-group">
    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion', $auxilio->descripcion ?? '') }}" required>
</div>
<div class="form-group">
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio', $auxilio->precio ?? '') }}" required>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>