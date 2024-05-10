<div class="row g-3">
    <div class="col-md-4">
        <label for="vendedor_id" class="form-label">
            <h1 class="font-bold">Vendedor: {{ $vendedor->nombrev }}</h1>
        </label>
        <input type="text" class="form-control" id="vendedor_id" name="vendedor_id"
            value="{{ old('vendedor_id', $vendedor->v_id) }}" readonly>
    </div>

    <div class="col-md-4">
        <label for="vehiculo_id" class="form-label">Vehículo</label>
        <select name="vehiculo_id" id="vehiculo_id" class="form-control">
            <option value="" disabled selected>Seleccionar Vehículo</option>
            @foreach ($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->id }}"
                    {{ old('vehiculo_id', $contrato->vehiculo_id) == $vehiculo->id ? 'selected' : '' }}>
                    {{ $vehiculo->id }} - {{ $vehiculo->marca }} {{ $vehiculo->modelo }} ({{ $vehiculo->placa }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label for="seguro_id" class="form-label">Seguro</label>
        <select name="seguro_id" id="seguro_id" class="form-control">
            <option value="" disabled selected>Seleccionar Seguro</option>
            @foreach ($seguros as $seguro)
                <option value="{{ $seguro->id }}"
                    {{ old('seguro_id', $contrato->seguro_id) == $seguro->id ? 'selected' : '' }}>
                    {{ $seguro->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label for="costofranquicia" class="form-label">Franquicia</label>
        <input type="number" class="form-control" id="costofranquicia" name="costofranquicia"
            value="{{ old('costofranquicia', $contrato->costofranquicia) }}" min="1">
        @error('costofranquicia')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="costoprima" class="form-label">Prima</label>
        <input type="number" class="form-control" id="costoprima" name="costoprima"
            value="{{ old('costoprima', $contrato->costoprima) }}" min="1">
        @error('costoprima')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="nro_cuotas" class="form-label">Nro de Cuotas</label>
        <input type="number" class="form-control" id="nro_cuotas" name="nro_cuotas"
            value="{{ old('nro_cuotas', $contrato->nro_cuotas) }}" min="0">
        @error('nro_cuotas')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="tipovigencia" class="form-label">Tipo de Vigencia</label>
        <select class="form-select" id="tipovigencia" name="tipovigencia" aria-label="Seleccionar Tipo de Vigencia">
            <option value="" selected disabled>Seleccionar</option>
            <option value="Anual" {{ old('tipovigencia', $contrato->tipovigencia) == 'Anual' ? 'selected' : '' }}>
                Anual</option>
            <option value="Semestral"
                {{ old('tipovigencia', $contrato->tipovigencia) == 'Semestral' ? 'selected' : '' }}>Semestral</option>
        </select>
    </div>

    <div class="col-md-4">
        <label for="vigenciainicio" class="form-label">Vigencia Inicio</label>
        <input type="date" class="form-control" id="vigenciainicio" name="vigenciainicio" required
            value="{{ old('vigenciainicio', $contrato->vigenciainicio) }}" placeholder="YYYY-MM-DD"
            aria-describedby="vigenciainicio-error">
        @error('vigenciainicio')
            <div id="vigenciainicio-error" class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="vigenciafin" class="form-label">Vigencia Fin</label>
        <input type="date" class="form-control" id="vigenciafin" name="vigenciafin" required
            value="{{ old('vigenciafin', $contrato->vigenciafin) }}" placeholder="YYYY-MM-DD"
            aria-describedby="vigenciafin-error">
        @error('vigenciafin')
            <div id="vigenciafin-error" class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="estado" class="form-label">Estado</label>
        <select class="form-select" id="estado" name="estado" aria-label="Seleccionar Estado">
            <option value="" selected disabled>Seleccionar</option>
            <option value="Activo" {{ old('estado', $contrato->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
            <option value="Desactivado" {{ old('estado', $contrato->estado) == 'Desactivado' ? 'selected' : '' }}>
                Desactivado</option>
        </select>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
