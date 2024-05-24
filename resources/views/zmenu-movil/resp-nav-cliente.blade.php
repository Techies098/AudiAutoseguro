@if (Auth::user()->hasRole('cliente'))

    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('cliente.contratos.index', ['cliente' => Auth::user()->cliente->id])" :active="request()->routeIs('cliente.contratos.index')">
            {{ __('Contratos') }}
        </x-responsive-nav-link>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link class="dropdown-item" href="{{ route('personal/siniestros.index') }}" :active="request()->routeIs('Personal/siniestros.index')">
            {{ __('Siniestro') }}
        </x-nav-link>
    </div>
@endif
