@if (Auth::user()->hasRole('cliente'))

    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('cliente.contratos.index', ['cliente' => Auth::user()->cliente->id])" :active="request()->routeIs('cliente.contratos.index')">
            {{ __('Contratos') }}
        </x-responsive-nav-link>
    </div>
    
@endif
