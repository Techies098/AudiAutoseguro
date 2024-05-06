<div class="col">
    <div class="mb-3">
        <label for="vehiculo_id" class="form-label">Vehiculo *</label>
        <select name="vehiculo_id" id="vehiculo_id" class="form-control">
            @foreach ($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->id }}"
                    {{ old('vehiculo_id', $contrato->vehiculo_id) == $vehiculo->id ? 'selected' : '' }}>
                    {{ $vehiculo->id }} - {{ $vehiculo->placa }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="vendedores_id" class="form-label">Vendedor *</label>
        <select name="vendedores_id" id="vendedores_id" class="form-control">
            @foreach ($vendedores as $vendedor)
                <option value="{{ $vendedor->id }}"
                    {{ old('vendedores_id', $contrato->vendedores_id) == $vendedor->id ? 'selected' : '' }}>
                    {{ $vendedor->id }} - {{ $vendedor->nombrev }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="seguro_id" class="form-label">Codigo seguro *</label>
        <input type="number" class="form-control" id="seguro_id" name="seguro_id"
            value="{{ old('seguro_id', $contrato->seguro_id) }}">
        @error('seguro_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="costofranquicia" class="form-label">Franquicia</label>
        <input type="number" class="form-control" id="costofranquicia" name="costofranquicia"
            value="{{ old('costofranquicia', $contrato->costofranquicia) }}">
        @error('costofranquicia')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="costoprima" class="form-label">Prima</label>
        <input type="number" class="form-control" id="costoprima" name="costoprima"
            value="{{ old('costoprima', $contrato->costoprima) }}">
        @error('costoprima')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="nro_cuotas" class="form-label">Nro de Cuotas</label>
        <input type="number" class="form-control" id="nro_cuotas" name="nro_cuotas"
            value="{{ old('nro_cuotas', $contrato->nro_cuotas) }}">
        @error('nro_cuotas')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="tipovigencia" class="form-label">Tipo de Vigencia *</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Select</option>
            <option value="1">Anual</option>
            <option value="2">Semestral</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="vigenciainicio" class="form-label">Vigencia Inicio </label>
        <input type="date" class="form-control" id="vigenciainicio" name="vigenciainicio" required
            value="{{ old('vigenciainicio', $contrato->vigenciainicio) }}">
        @error('vigenciainicio')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="vigenciafin" class="form-label">Vigencia Fin </label>
        <input type="date" class="form-control" id="vigenciafin" name="vigenciafin" required
            value="{{ old('vigenciafin', $contrato->vigenciafin) }}">
        @error('vigenciafin')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado *</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Select</option>
            <option value="1">Activo</option>
            <option value="2">Desactivo</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
