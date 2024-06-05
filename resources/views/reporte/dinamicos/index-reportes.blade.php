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
                                <div>
                                    <div class="col-12">
                                        <button class="btn btn-primary col-sm-2" type="button">Ver</button>
                                        <button class="btn btn-warning ms-4 col-sm-2" type="submit">Generar
                                            reporte</button>
                                    </div>

                                </div>
                            </form>


                            <script>
                                let columns = @json($columnas);

                                function updateColumns() {
                                    let selectedTables = document.getElementById('tables');
                                    let selectedTablesDiv = document.getElementById('selectedTables');
                                    let selectedColumnsDiv = document.getElementById('selectedColumns');
                                    let selectedColumnsInput = document.getElementById('selected_columns');

                                    selectedTablesDiv.innerHTML = '';
                                    selectedColumnsDiv.innerHTML = '';

                                    let selectedColumnsArray = [];

                                    for (let option of selectedTables.options) {
                                        if (option.selected) {
                                            let tableName = option.value;
                                            let tableDiv = document.createElement('div');
                                            tableDiv.innerHTML = `<strong>${tableName}</strong>`;
                                            selectedTablesDiv.appendChild(tableDiv);

                                            let columnsDiv = document.createElement('div');
                                            columns[tableName].forEach(col => {
                                                let columnName = `${tableName}.${col.name}`;
                                                selectedColumnsArray.push(columnName);
                                                columnsDiv.innerHTML +=
                                                    `<span onclick="removeColumn(this)" data-table="${tableName}" data-column="${col.nombre}">${columnName} X</span>`;
                                            });
                                            selectedColumnsDiv.appendChild(columnsDiv);
                                        }
                                    }
                                    selectedColumnsInput.value = selectedColumnsArray.join(',');
                                }

                                function removeColumn(span) {
                                    span.parentNode.removeChild(span);
                                    updateColumns();
                                }
                            </script>


                        </div>

                        <div class="col-md-12 py-3">
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped text-sm" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th scope="col">CLIENTE</th>
                                            <th scope="col">MARCA</th>
                                            <th scope="col">MODELO</th>
                                            <th scope="col">CLASE</th>
                                            <th scope="col">COLOR</th>
                                            <th scope="col">PLACA</th>
                                            <th scope="col">CHASIS</th>
                                            <th scope="col">MOTOR</th>
                                            <th scope="col">TRACCION</th>
                                            <th scope="col">AÑO</th>
                                            <th scope="col">USO</th>
                                            <th scope="col">Nro ASIENTOS</th>
                                            <th scope="col">COMBUSTIBLE</th>
                                            <th scope="col">VALOR</th>
                                            <th scope="col">FECHA</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($vehiculos as $fila => $vehiculo)
                                            <tr>
                                                <td>{{ $vehiculo->cliente_id }}</td>
                                                <td>{{ $vehiculo->marca }} </td>
                                                <td>{{ $vehiculo->modelo }} </td>
                                                <td>{{ $vehiculo->clase }} </td>
                                                <td>{{ $vehiculo->color }} </td>
                                                <td>{{ $vehiculo->placa }} </td>
                                                <td>{{ $vehiculo->chasis }} </td>
                                                <td>{{ $vehiculo->motor }} </td>
                                                <td>{{ $vehiculo->traccion }} </td>
                                                <td>{{ $vehiculo->anio }} </td>
                                                <td>{{ $vehiculo->uso }} </td>
                                                <td>{{ $vehiculo->nro_asientos }} </td>
                                                <td>{{ $vehiculo->combustible }} </td>
                                                <td>{{ $vehiculo->valor_comercial }} </td>
                                                <td>{{ date('d-m-Y', strtotime($vehiculo->created_at)) }} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $vehiculos->links() }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
