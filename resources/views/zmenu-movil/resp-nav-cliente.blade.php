@if (Auth::user()->hasRole('cliente'))
    <div class="pt-2 pb-3 space-y-1">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Seguros
        </a>
        <ul class="dropdown-menu bg-white p-2" aria-labelledby="navbarDropdown">
            <x-responsive-nav-link class="dropdown-item" href="{{ route('administrador/seguros.index') }}" :active="request()->routeIs('administrador/seguros.index')">
                {{ __('Seguros') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link class="dropdown-item" href="{{ route('solicitudes.mis') }}" :active="request()->routeIs('solicitudes.mis')">
                {{ __('Mis solicitudes') }}
            </x-responsive-nav-link>
        </ul>
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('cliente.contratos.index', ['cliente' => Auth::user()->cliente->id])" :active="request()->routeIs('cliente.contratos.index')">
            {{ __('Contratos') }}
        </x-responsive-nav-link>
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link class="dropdown-item" href="{{ route('personal/siniestros.index') }}" :active="request()->routeIs('Personal/siniestros.index')">
            {{ __('Siniestro') }}
        </x-responsive-nav-link>
    </div>
@endif
