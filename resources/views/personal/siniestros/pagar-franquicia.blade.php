@if (auth()->user()->cliente)
    <div class="container pt-2">
        <p><b>Resúmen:</b></p>
        <p>Su siniestro ha sido aprobado para cobertura, por lo tanto debe pagar la franquicia para que procedamos con
            la cobertura de daños de su vehículo.</p>
        <p>El monto de la franquicia es de <b> ${{ $siniestro->contrato->costofranquicia }}</b>.</p>
        
        @if ($siniestro->estado == 'aprobado')
        <form action="{{ route('pago_paypal') }}" method="post">
            @csrf
            <input type="hidden" name="siniestro_id" value="{{ $siniestro->id }}">
            <input type="hidden" name="contrato_id" value="{{ $siniestro->contrato_id }}">
            <input type="hidden" name="product_name" value="Franquicia de {{ $siniestro->contrato->seguro->nombre }} ">
            <input type="hidden" name="tipo_pago" value="Franquicia">
            <input type="hidden" name="monto" value="{{ $siniestro->contrato->costofranquicia }}">
            <button
                class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                type="submit">
                Pagar con PayPal
            </button>
        </form>
             
        @elseif ($siniestro->estado == 'pagado')
            <p><b>Franquicia pagada</b></p>
        @endif
    </div>
@endif
