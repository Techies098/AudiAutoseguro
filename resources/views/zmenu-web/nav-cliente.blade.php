@if (Auth::user()->hasRole('cliente'))

    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link :href="route('cliente.contratos.index', ['cliente' => Auth::user()->cliente->id])" :active="request()->routeIs('cliente.contratos.index')">
            {{ __('Contratos') }}
        </x-nav-link>
    </div>
    
@endif
