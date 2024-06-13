<div class="card mb-3">
    <div class="card-body">
        <p><b>Datos del vehiculo:</b></p>
        <p><b>Marca: {{ $dano->contrato->vehiculo->marca }}</b></p>
        <p><b>Modelo: {{ $dano->contrato->vehiculo->modelo }}</b></p>
        <p><b>Año: {{ $dano->contrato->vehiculo->anio }}</b></p>
        <p>Valor comercial: {{ $dano->contrato->vehiculo->valor_comercial }}</p>
        <p>Valor de la franquicia: {{ $dano->contrato->costofranquicia }}</p>
    </div>
</div>