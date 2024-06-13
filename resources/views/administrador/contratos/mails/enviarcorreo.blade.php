<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Contrato - Ha recibido un contrato de AUTOSEGURO S.A.</h5>
        </div>
        <div class="card-body">
            <p class="mt-3">Estimado(a) cliente <strong
                    class="text-uppercase">{{ $contrato->vehiculo->cliente->user->name }}</strong>, ha
                recibido el siguiente contrato</p>
            <ul class="list-unstyled">
                <li><strong>Contrato No:</strong> {{ $contrato->id }}</li>
                <li><strong>Fecha de Emisión:</strong> {{ date('d-m-Y') }}</li>
                <li><strong>Mensaje:</strong>{{ $mensaje }}</li>
            </ul>
        </div>
    </div>
</div>
