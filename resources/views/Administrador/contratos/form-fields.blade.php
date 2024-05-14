<div class="row g-3">
    <div class="col-md-4">
        <label for="user_id" class="form-label">
            <h1 class="font-bold">{{ $vendedor == null ? $administrador->user->name : $vendedor->user->name }}</h1>
        </label>
        <input type="text" class="form-control" id="user_id" name="user_id"
            value="{{ old('user_id', $vendedor == null ? $administrador->user->id : $vendedor->user->id) }}" readonly>
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
        <label for="costofranquicia" class="form-label">Franquicia ($us)</label>
        <input type="number" class="form-control" id="costofranquicia" name="costofranquicia"
            value="{{ old('costofranquicia', $contrato->costofranquicia) }}" min="1">
        @error('costofranquicia')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="costoprima" class="form-label">Prima ($us)</label>
        <input type="number" class="form-control" id="costoprima" name="costoprima"
            value="{{ old('costoprima', $contrato->costoprima) }}" min="1" readonly>
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



    <div class="col-12">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var vehiculoSelect = document.getElementById('vehiculo_id');
            var seguroSelect = document.getElementById('seguro_id');
            var primaInput = document.getElementById('costoprima');
            var vehiculos = {!! json_encode($vehiculos) !!}; // Obtener los vehiculos desde DB
            var seguros = {!! json_encode($seguros) !!}; // Obtener los seguros desde DB

            // Función para calcular el costo de la prima
            function calcularPrima() {
                var selectedVehiculoId = vehiculoSelect.value;
                var selectedSeguroId = seguroSelect.value;

                var selectedVehiculo = vehiculos.find(vehiculo => vehiculo.id == selectedVehiculoId);
                var selectedSeguro = seguros.find(seguro => seguro.id == selectedSeguroId);

                if (selectedVehiculo && selectedSeguro) {
                    primaInput.value = selectedVehiculo.valor_comercial * selectedSeguro.precio_prima;
                } else {
                    primaInput.value = ''; // Limpiar el campo si no se selecciona ningún seguro
                }
            }

            // Event listener para el cambio en el campo de selección del vehículo
            vehiculoSelect.addEventListener('change', function() {
                calcularPrima(); // Calcular la prima cuando se cambia el vehículo
            });

            // Event listener para el cambio en el campo de selección del seguro
            seguroSelect.addEventListener('change', function() {
                calcularPrima(); // Calcular la prima cuando se cambia el seguro
            });
        });
    </script>
