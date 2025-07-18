@if (Auth::user()->hasRole('cliente'))
    <!-- Gestionar Seguros -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Seguros
        </a>
        <ul class="dropdown-menu bg-white p-2" aria-labelledby="navbarDropdown">
            <x-nav-link class="dropdown-item" href="{{ route('administrador/seguros.index') }}" :active="request()->routeIs('administrador/seguros.index')">
                {{ __('Seguros') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('solicitudes.mis') }}" :active="request()->routeIs('solicitudes.mis')">
                {{ __('Mis solicitudes') }}
            </x-nav-link>
        </ul>
    </div>

    <!-- Gestionar Siniestros -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Siniestros
        </a>
        <ul class="dropdown-menu bg-white p-2" aria-labelledby="navbarDropdown">
            <x-nav-link class="dropdown-item" href="{{ route('personal/siniestros.index') }}" :active="request()->routeIs('Personal/siniestros.index')">
                {{ __('Siniestro') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" :href="route('cliente.dano-menor.index')" :active="request()->routeIs('cliente.dano-menor.index')">
                {{ __('Daños menores') }}
            </x-nav-link>
        </ul>
    </div>


    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link :href="route('cliente.contratos.index', ['cliente' => Auth::user()->cliente->id])" :active="request()->routeIs('cliente.contratos.index')">
            {{ __('Contratos') }}
        </x-nav-link>
    </div>

    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link class="dropdown-item" href="{{ route('auxilios.index') }}" :active="request()->routeIs('auxilios.index')">
                {{ __('Auxilio mecanico') }}
            </x-nav-link>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link class="dropdown-item" href="{{ route('solicitudesA.mis') }}" :active="request()->routeIs('solicitudesA.mis')">
            {{ __('Mis Solicitudes Auxilio mecanico') }}
        </x-nav-link>
    </div>

@endif
