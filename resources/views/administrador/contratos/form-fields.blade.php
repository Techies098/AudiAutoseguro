<div class="row g-3">
    <div class="col-md-2">
        <label for="vendedor_id" class="form-label">
            <h1 class="font-bold">{{ $vendedor == null ? '' : $vendedor->user->name }}</h1>
        </label>
        <input type="text" class="form-control" id="vendedor_id" name="vendedor_id"
            value="{{ old('vendedor_id', $vendedor == null ? '' : $vendedor->id) }}" readonly>
    </div>

    <div class="col-md-5">
        <label for="vehiculo_id" class="form-label">Vehículo</label>
        <div class="input-group">
            <select name="vehiculo_id" id="vehiculo_id" class="form-control">
                <option value="" disabled selected>Seleccionar Vehículo</option>
                @foreach ($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo->id }}"
                        {{ old('vehiculo_id', $contrato->vehiculo_id) == $vehiculo->id ? 'selected' : '' }}>
                        {{ $vehiculo->id }} - {{ $vehiculo->marca }} {{ $vehiculo->modelo }} ({{ $vehiculo->placa }})
                    </option>
                @endforeach
            </select>
            <button type="button" class="btn btn-outline-secondary" name="btnvehiculo_ver" id="btnvehiculo_ver"
                data-bs-toggle="modal" data-bs-target="#staticBackdrop" disabled>Ver</button>
            <!--<button type="button" class="btn btn-outline-secondary" name="btnvehiculo_ver" id="btnvehiculo_ver"
                data-bs-toggle="modal" data-bs-target="#staticBackdrop">+</button>-->
        </div>
    </div>

    <div class="col-md-5">
        <label for="seguro_id" class="form-label">Seguro</label>
        <div class="input-group">
            <select name="seguro_id" id="seguro_id" class="form-control">
                <option value="" disabled selected>Seleccionar Seguro</option>
                @foreach ($seguros as $seguro)
                    <option value="{{ $seguro->id }}"
                        {{ old('seguro_id', $contrato->seguro_id) == $seguro->id ? 'selected' : '' }}>
                        {{ $seguro->nombre }}
                    </option>
                @endforeach
            </select>
            <button type="button" class="btn btn-outline-secondary" name="btnseguro_ver" id="btnseguro_ver"
                data-bs-toggle="modal" data-bs-target="#staticBackdrop" disabled>Ver</button>
        </div>
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


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">INFORMACION</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="vehiculoInfo">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript - DOM -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var vehiculoSelect = document.getElementById('vehiculo_id');
            var seguroSelect = document.getElementById('seguro_id');
            var primaInput = document.getElementById('costoprima');

            var verBtnv = document.getElementById('btnvehiculo_ver');
            var verBtns = document.getElementById('btnseguro_ver');
            var vehiculoInfo = document.getElementById('vehiculoInfo'); //modal

            var vehiculos = {!! json_encode($vehiculos) !!}; // Obtener los vehiculos desde DB
            var seguros = {!! json_encode($seguros) !!}; // Obtener los seguros desde DB
            var clientes = {!! json_encode($clientes) !!}; // Obtener los cliente desde DB
            var usuarios = {!! json_encode($usuarios) !!}; // Obtener los usuarios desde DB
            var coberturas = {!! json_encode($coberturas) !!}; // Obtener los coberturas desde DB

            // Función para calcular el costo de la prima
            function calcularPrima() {
                var selectedVehiculoId = vehiculoSelect.value;
                var selectedSeguroId = seguroSelect.value;

                var selectedVehiculo = vehiculos.find(vehiculo => vehiculo.id == selectedVehiculoId);
                var selectedSeguro = seguros.find(seguro => seguro.id == selectedSeguroId);

                /*var selectedCliente = clientes.find(cliente => cliente.id == selectedVehiculo.cliente_id);
                var selectedUsuario = usuarios.find(usuario => usuario.id == selectedCliente.user_id);*/

                if (selectedVehiculo && selectedSeguro) {
                    //primaInput.value = selectedVehiculo.valor_comercial * selectedSeguro.precio_prima;
                    var prima = selectedVehiculo.valor_comercial * selectedSeguro.precio_prima;
                    primaInput.value = prima.toFixed(2); // Redondear a dos decimales
                } else {
                    primaInput.value = ''; // Limpiar el campo si no se selecciona ningún seguro
                }
            }

            // Event listener para el cambio en el campo de selección del vehículo
            vehiculoSelect.addEventListener('change', function() {
                if (vehiculoSelect.value) {
                    verBtnv.disabled = false; // Habilitar el botón Ver
                } else {
                    verBtnv.disabled = true; // Deshabilitar el botón Ver
                }
                calcularPrima(); // Calcular la prima cuando se cambia el vehículo
            });

            // Event listener para el cambio en el campo de selección del seguro
            seguroSelect.addEventListener('change', function() {
                if (seguroSelect.value) {
                    verBtns.disabled = false; // Habilitar el botón Ver
                } else {
                    verBtns.disabled = true; // Deshabilitar el botón Ver
                }
                calcularPrima(); // Calcular la prima cuando se cambia el seguro
            });

            // Event listener para el botón Ver Vehiculo
            verBtnv.addEventListener('click', function() {
                var selectedVehiculoId = vehiculoSelect.value;
                var selectedVehiculo = vehiculos.find(vehiculo => vehiculo.id == selectedVehiculoId);

                var selectedCliente = clientes.find(cliente => cliente.id == selectedVehiculo.cliente_id);
                var selectedUsuario = usuarios.find(usuario => usuario.id == selectedCliente.user_id);

                if (selectedVehiculo) {
                    vehiculoInfo.innerHTML = `
                    <p><strong>VEHÍCULO</strong></p>
                    <p><strong>Marca:</strong> ${selectedVehiculo.marca}</p>
                    <p><strong>Modelo:</strong> ${selectedVehiculo.modelo}</p>
                    <p><strong>Clase:</strong> ${selectedVehiculo.clase}</p>
                    <p><strong>Color:</strong> ${selectedVehiculo.color}</p>
                    <p><strong>Placa:</strong> ${selectedVehiculo.placa}</p>
                    <p><strong>Chasis:</strong> ${selectedVehiculo.chasis}</p>
                    <p><strong>Año:</strong> ${selectedVehiculo.anio}</p>
                    <p><strong>Valor Comercial:</strong> ${selectedVehiculo.valor_comercial}</p>
                    <br>
                    <p><strong>PROPIETARIO</strong></p>
                    <p><strong>Nombre:</strong> ${selectedUsuario.name}</p>
                    <p><strong>Direccion:</strong> ${selectedUsuario.direccion}</p>
                    <p><strong>Email:</strong> ${selectedUsuario.email}</p>
                    <p><strong>Telefono:</strong> ${selectedUsuario.telefono}</p>
                `;
                }
            });

            // Event listener para el botón Ver Seguro
            verBtns.addEventListener('click', function() {
                var selectedSeguroId = seguroSelect.value;
                var selectedSeguro = seguros.find(seguro => seguro.id == selectedSeguroId);

                /*var selectedCoberturas = selectedSeguro.with(coberturas);*/
                ///cliente/contratos/${selectedSeguroId}/coberturas-clausulas

                if (selectedSeguro) {

                    fetch(`cliente/contratos/${selectedSeguroId}/coberturas-clausulas`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.message) {
                                vehiculoInfo.innerHTML = `<p>${data.message}</p>`;
                            } else {
                                var coberturasHtml = data.coberturas.map(cobertura => `
                                <p><strong>Cobertura:</strong> ${cobertura.nombre}</p>
                                <p><strong>Descripción:</strong> ${cobertura.descripcion}</p>
                                `).join('');

                                var clausulasHtml = data.clausulas.map(clausula => `
                                <p><strong>Cláusula:</strong> ${clausula.nombre}</p>
                                <p><strong>Descripción:</strong> ${clausula.descripcion}</p>
                                `).join('');

                                vehiculoInfo.innerHTML = `
                                <p><strong>SEGURO</strong></p>
                                <p><strong>Nombre:</strong> ${selectedSeguro.nombre}</p>
                                <p><strong>Descripción:</strong> ${selectedSeguro.descripcion}</p>
                                <p><strong>Precio Prima:</strong> ${selectedSeguro.precio_prima}</p>
                                ${coberturasHtml}
                                ${clausulasHtml}
                                `;
                            }
                        })
                        .catch(error => console.error('Error al obtener las coberturas y cláusulas:',
                            error));
                }
            });
        });
    </script>
