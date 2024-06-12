<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('REPORTE DINAMICO') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <style>
                            .selected-tables,
                            .selected-columns {
                                border: 1px solid #ccc;
                                padding: 10px;
                                margin-top: 10px;
                            }

                            .selected-columns span {
                                display: inline-block;
                                margin-right: 10px;
                                cursor: pointer;
                            }
                        </style>
                        {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
                        <div class="container">
                            <form class="row g-3" action="{{ route('pdf-dinamico') }}" method="POST" target="_blank">
                                @csrf

                                <div>
                                    <label for="tables">Tablas:</label>
                                    <select id="tables" name="tables[]" multiple onchange="updateColumns()">
                                        @foreach ($tablas as $tabla)
                                            <option value="{{ $tabla->nombre }}">{{ $tabla->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="" class="form-label"> Tabla Seleccionada:</label>
                                    <div class="selected-tables" id="selectedTables"></div>
                                </div>

                                <div>
                                    <label for="" class="form-label"> Columnas:</label>
                                    <div class="selected-columns" id="selectedColumns"></div>
                                </div>

                                <input type="hidden" name="selected_columns" id="selected_columns">

                                <div class="col-md-3">
                                    <label for="fechaIni" class="form-label">Desde fecha:</label>
                                    <input class="form-control" type="date" name="fechaIni" id="fechaIni">
                                </div>
                                <div class="col-md-3">
                                    <label for="fechaFin" class="form-label">Hasta Fecha:</label>
                                    <input class="form-control" type="date" name="fechaFin" id="fechaFin">
                                </div>

                                <!---->

                                <div class="col-md-8">
                                    <label for="titulo" class="form-label">Titulo:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo"
                                        value="REPORTE DE VEHÍCULOS ASEGURADOS"
                                        placeholder="REPORTE DE VEHÍCULOS ASEGURADOS"
                                        oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="descripcion" class="form-label">Descripcion:</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                                        value="Este es un informe de los vehículos asegurados en nuestro sistema. A continuación se muestra una lista de los vehículos junto con sus detalles:"
                                        placeholder="Este es un informe de los vehículos asegurados en nuestro sistema. A continuación se muestra una lista de los vehículos junto con sus detalles:">
                                </div>


                                <!---->

                                <div class="mb-3">
                                    <div class="col-12">
                                        <!--<button class="btn btn-primary ms-4 col-sm-2" type="button">Ver</button>-->
                                        <button class="btn btn-warning col-sm-2" type="submit" id="btn-generar-reporte"
                                            disabled>Generar
                                            reporte</button>
                                    </div>

                                </div>
                            </form>

                            <script>
                                let tables = @json($tablas);
                                let selectedColumnsArray = [];

                                function updateColumns() {

                                    // Vaciar el array de columnas seleccionadas
                                    selectedColumnsArray = [];

                                    let selectedTables = document.getElementById('tables');
                                    let selectedTablesDiv = document.getElementById('selectedTables');
                                    let selectedColumnsDiv = document.getElementById('selectedColumns');
                                    let selectedColumnsInput = document.getElementById('selected_columns');

                                    selectedTablesDiv.innerHTML = '';
                                    selectedColumnsDiv.innerHTML = '';

                                    for (let option of selectedTables.options) {
                                        if (option.selected) {
                                            let tableName = option.value;
                                            let tableDiv = document.createElement('div');
                                            tableDiv.innerHTML = `<strong>${tableName}</strong>`;
                                            selectedTablesDiv.appendChild(tableDiv);

                                            let columnsDiv = document.createElement('div');
                                            let table = tables.find(table => table.nombre === tableName);
                                            let columns = JSON.parse(table.columna);
                                            columns.forEach(col => {
                                                let columnName = `${tableName}.${col}`;
                                                if (!selectedColumnsArray.includes(columnName)) {
                                                    selectedColumnsArray.push(columnName);
                                                }

                                                columnsDiv.innerHTML +=
                                                    `<span onclick="removeColumn('${columnName}')" data-table="${tableName}" data-column="${col}">${columnName} X</span>`;
                                            });
                                            selectedColumnsDiv.appendChild(columnsDiv);
                                        }
                                    }
                                    selectedColumnsInput.value = selectedColumnsArray.join(',');

                                    document.getElementById('btn-generar-reporte').disabled = false;
                                }

                                function removeColumn(columnName) {
                                    selectedColumnsArray = selectedColumnsArray.filter(col => col !== columnName);
                                    updateSelectedColumnsDiv();
                                    document.getElementById('selected_columns').value = selectedColumnsArray.join(',');
                                }

                                function updateSelectedColumnsDiv() {
                                    let selectedColumnsDiv = document.getElementById('selectedColumns');
                                    selectedColumnsDiv.innerHTML = '';

                                    selectedColumnsArray.forEach(col => {
                                        let [tableName, columnName] = col.split('.');
                                        selectedColumnsDiv.innerHTML +=
                                            `<span onclick="removeColumn('${col}')" data-table="${tableName}" data-column="${columnName}">${col} X</span>`;
                                    });
                                }
                            </script>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
