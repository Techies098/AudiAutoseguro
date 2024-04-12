<div class="col">
    <div class="mb-3">
        <label for="id_cliente" class="form-label">Cliente *</label>
        <select name="id_cliente" id="id_cliente" class="form-control">
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}"
                    {{ old('id_cliente', $vehiculo->id_cliente) == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->id }} - {{ $cliente->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="placa" class="form-label">Placa *</label>
        <input type="text" class="form-control" id="placa" name="placa"
            value="{{ old('placa', $vehiculo->placa) }}">
        @error('placa')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="clase" class="form-label">Clase</label>
        <input type="text" class="form-control" id="clase" name="clase"
            value="{{ old('clase', $vehiculo->clase) }}">
        @error('clase')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="marca" class="form-label">marca</label>
        <input type="text" class="form-control" id="marca" name="marca"
            value="{{ old('marca', $vehiculo->marca) }}">
        @error('marca')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo"
            value="{{ old('modelo', $vehiculo->modelo) }}">
        @error('modelo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="anio" class="form-label">Año </label>
        <input type="text" class="form-control" id="anio" name="anio" required
            value="{{ old('anio', $vehiculo->anio) }}">
        @error('anio')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="color" class="form-label">Color </label>
        <input type="text" class="form-control" id="color" name="color" required
            value="{{ old('color', $vehiculo->color) }}">
        @error('color')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="nro_asientos" class="form-label">Nro de Asientos</label>
        <input type="number" class="form-control" id="nro_asientos" name="nro_asientos"
            value="{{ old('nro_asientos', $vehiculo->nro_asientos) }}">
        @error('nro_asientos')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <button type="submit" class="btn btn-primary">Guardar</button>
