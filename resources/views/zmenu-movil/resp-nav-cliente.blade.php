@if (Auth::user()->hasRole('cliente'))

    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link class="dropdown-item" href="{{ route('administrador/seguros.index') }}" :active="request()->routeIs('administrador/seguros.index')">
            {{ __('Seguros') }}
        </x-responsive-nav-link>
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link class="dropdown-item" href="{{ route('solicitudes.mis') }}" :active="request()->routeIs('solicitudes.mis')">
            {{ __('Mis solicitudes De Seguros') }}
        </x-responsive-nav-link>
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('cliente.contratos.index', ['cliente' => Auth::user()->cliente->id])" :active="request()->routeIs('cliente.contratos.index')">
            {{ __('Contratos') }}
        </x-responsive-nav-link>
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('cliente.dano-menor.index')" :active="request()->routeIs('cliente.dano-menor.index')">
            {{ __('Daños menores') }}
        </x-responsive-nav-link>
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link class="dropdown-item" href="{{ route('personal/siniestros.index') }}" :active="request()->routeIs('personal/siniestros.index')">
            {{ __('Siniestros') }}
        </x-responsive-nav-link>
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link class="dropdown-item" href="{{ route('auxilios.index') }}" :active="request()->routeIs('auxilios.index')">
            {{ __('Auxilio mecanico') }}
        </x-responsive-nav-link>
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link class="dropdown-item" href="{{ route('solicitudesA.mis') }}" :active="request()->routeIs('solicitudesA.mis')">
            {{ __('Mis Solicitudes Auxilio mecanico') }}
        </x-responsive-nav-link>
    </div>
@endif
