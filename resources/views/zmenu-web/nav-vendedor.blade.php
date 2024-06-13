@if (Auth::user()->hasRole('vendedor'))

    <!-- Gestionar Seguros -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Gestion de seguros
        </a>
        <ul class="dropdown-menu bg-white p-2" aria-labelledby="navbarDropdown">
            <x-nav-link class="dropdown-item" href="{{ route('administrador/seguros.index') }}" :active="request()->routeIs('administrador/seguros.index')">
                {{ __('Seguros') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('administrador/coberturas.index') }}" :active="request()->routeIs('administrador/coberturas.index')">
                {{ __('Coberturas') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('administrador/clausulas.index') }}" :active="request()->routeIs('administrador/clausulas.index')">
                {{ __('Clausulas') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('solicitudes.index') }}" :active="request()->routeIs('solicitudes.index')">
                {{ __('Solicitudes') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('solicitudes.mis') }}" :active="request()->routeIs('solicitudes.mis')">
                {{ __('Mis solicitudes') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('solicitudes.vendedor') }}" :active="request()->routeIs('solicitudes.vendedor')">
                {{ __('Solicitudes Asignadas') }}
            </x-nav-link>
        </ul>
    </div>

    <!-- Gestionar Usuarios -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Gestion de usuarios
        </a>
        <ul class="dropdown-menu bg-white p-2" aria-labelledby="navbarDropdown">
            <x-nav-link class="dropdown-item" href="{{ route('personal/clientes.index') }}" :active="request()->routeIs('administrador/clientes.index')">
                {{ __('Clientes') }}
            </x-nav-link>
        </ul>
    </div>

    <!-- Gestionar Vehiculos -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Gestion de vehiculos
        </a>
        <ul class="dropdown-menu bg-white p-2" aria-labelledby="navbarDropdown">
            <x-nav-link class="dropdown-item" href="{{ route('administrador/vehiculos.index') }}" :active="request()->routeIs('administrador/vehiculos.index')">
                {{ __('Vehiculos') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('reporte-vehiculo') }}" :active="request()->routeIs('reporte/vehiculos.reportev')">
                {{ __('Reporte Vehiculo') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('administrador/contratos.index') }}" :active="request()->routeIs('administrador/contratos.index')">
                {{ __('Contrato') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('auxilios.index') }}" :active="request()->routeIs('auxilios.index')">
                {{ __('Auxilio mecanico') }}
            </x-nav-link>
        </ul>
    </div>
    
@endif
