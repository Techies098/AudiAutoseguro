<div class="row g-3">

    <div class="col-md-3">
        <label for="cliente_id" class="form-label">Cliente *</label>
        <select name="cliente_id" id="cliente_id" class="form-control">
            <option value="" disabled selected>Seleccionar Cliente</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}"
                    {{ old('cliente_id', $vehiculo->cliente_id) == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->id }} - {{ $cliente->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <label for="marca" class="form-label">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca"
            value="{{ old('marca', $vehiculo->marca) }}" maxlength="30">
        @error('marca')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo"
            value="{{ old('modelo', $vehiculo->modelo) }}" maxlength="30">
        @error('modelo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="clase" class="form-label">Clase</label>
        <select class="form-select" id="clase" name="clase" aria-label="Seleccionar Clase">
            <option value="" selected disabled>Seleccionar</option>
            <option value="Auto" {{ old('clase', $vehiculo->clase) == 'Auto' ? 'selected' : '' }}>Auto</option>
            <option value="Vagoneta" {{ old('clase', $vehiculo->clase) == 'Vagoneta' ? 'selected' : '' }}>Vagoneta
            </option>
            <option value="Camioneta" {{ old('clase', $vehiculo->clase) == 'Camioneta' ? 'selected' : '' }}>Camioneta
            </option>
        </select>
        @error('clase')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="color" class="form-label">Color </label>
        <input type="text" class="form-control" id="color" name="color" required
            value="{{ old('color', $vehiculo->color) }}" maxlength="20">
        @error('color')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="placa" class="form-label">Placa *</label>
        <input type="text" class="form-control" id="placa" name="placa"
            value="{{ old('placa', $vehiculo->placa) }}" maxlength="15">
        @error('placa')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="chasis" class="form-label">Chasis *</label>
        <input type="text" class="form-control" id="chasis" name="chasis"
            value="{{ old('chasis', $vehiculo->chasis) }}" maxlength="80">
        @error('chasis')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="motor" class="form-label">Motor *</label>
        <input type="text" class="form-control" id="motor" name="motor"
            value="{{ old('motor', $vehiculo->motor) }}" maxlength="80">
        @error('motor')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="traccion" class="form-label">Traccion</label>
        <select class="form-select" id="traccion" name="traccion" aria-label="Seleccionar Traccion">
            <option value="" selected disabled>Seleccionar</option>
            <option value="Simple" {{ old('traccion', $vehiculo->traccion) == 'Simple' ? 'selected' : '' }}>Simple
            </option>
            <option value="Doble" {{ old('traccion', $vehiculo->traccion) == 'Doble' ? 'selected' : '' }}>Doble
            </option>
        </select>
        @error('traccion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="anio" class="form-label">Año </label>
        <input type="text" class="form-control" id="anio" name="anio" required
            value="{{ old('anio', $vehiculo->anio) }}" maxlength="5">
        @error('anio')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="uso" class="form-label">Uso</label>
        <select class="form-select" id="uso" name="uso" aria-label="Seleccionar Uso">
            <option value="" selected disabled>Seleccionar</option>
            <option value="Perticular" {{ old('uso', $vehiculo->uso) == 'Perticular' ? 'selected' : '' }}>Perticular
            </option>
            <option value="Publico" {{ old('uso', $vehiculo->uso) == 'Publico' ? 'selected' : '' }}>Publico</option>
        </select>
        @error('uso')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3">
        <label for="nro_asientos" class="form-label">Nro de Asientos</label>
        <input type="number" class="form-control" id="nro_asientos" name="nro_asientos"
            value="{{ old('nro_asientos', $vehiculo->nro_asientos) }}" min="1">
        @error('nro_asientos')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="combustible" class="form-label">Combustible</label>
        <select class="form-select" id="combustible" name="combustible" aria-label="Seleccionar Combustible">
            <option value="" selected disabled>Seleccionar</option>
            <option value="Gasolina" {{ old('combustible', $vehiculo->combustible) == 'Gasolina' ? 'selected' : '' }}>
                Gasolina</option>
            <option value="Diesel" {{ old('combustible', $vehiculo->combustible) == 'Diesel' ? 'selected' : '' }}>
                Diesel</option>
        </select>
        @error('combustible')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="valor_comercial" class="form-label">Valor Comercial</label>
        <input type="number" class="form-control" id="valor_comercial" name="valor_comercial"
            value="{{ old('valor_comercial', $vehiculo->valor_comercial) }}" min="1">
        @error('valor_comercial')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
