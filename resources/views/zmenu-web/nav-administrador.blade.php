@if (Auth::user()->hasRole('administrador'))
    <!-- Gestionar Seguros -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Gestion de seguros
        </a>
        <ul class="p-2 bg-white dropdown-menu" aria-labelledby="navbarDropdown">
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
        <ul class="p-2 bg-white dropdown-menu" aria-labelledby="navbarDropdown">
            <x-nav-link class="dropdown-item" href="{{ route('administrador/usuarios.index') }}" :active="request()->routeIs('administrador/usuarios.index')">
                {{ __('Usuarios') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('personal/clientes.index') }}" :active="request()->routeIs('administrador/clientes.index')">
                {{ __('Clientes') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('administrador/personal.index') }}" :active="request()->routeIs('administrador/clientes.index')">
                {{ __('Personal') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('administrador.bitacoras.index') }}" :active="request()->routeIs('administrador.bitacoras.index')">
                {{ __('Bitacora') }}
            </x-nav-link>
        </ul>
    </div>

    <!-- Gestionar Vehiculos -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Gestion de vehiculos
        </a>
        <ul class="p-2 bg-white dropdown-menu" aria-labelledby="navbarDropdown">
            <x-nav-link class="dropdown-item" href="{{ route('administrador/vehiculos.index') }}" :active="request()->routeIs('administrador/vehiculos.index')">
                {{ __('Vehiculos') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('reporte-vehiculo') }}" :active="request()->routeIs('reporte/vehiculos.reportev')">
                {{ __('Reporte Vehiculo') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('administrador/contratos.index') }}" :active="request()->routeIs('administrador/contratos.index')">
                {{ __('Contrato') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('personal/siniestros.index') }}" :active="request()->routeIs('Personal/siniestros.index')">
                {{ __('Siniestro') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('administrador/talleres.index') }}" :active="request()->routeIs('administrador/talleres.index')">
                {{ __('Taller') }}
            </x-nav-link>

            <x-nav-link class="dropdown-item" href="{{ route('auxilios.index') }}" :active="request()->routeIs('auxilios.index')">
                {{ __('Auxilio mecanico') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('solicitudesA.mis') }}" :active="request()->routeIs('solicitudesA.mis')">
                {{ __('Mis Solicitudes Auxilio mecanico') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('solicitudesA.index') }}" :active="request()->routeIs('solicitudesA.index')">
                {{ __('Solicitudes Auxilio mecanico') }}
            </x-nav-link>
            <x-nav-link class="dropdown-item" href="{{ route('solicitudesA.vendedor') }}" :active="request()->routeIs('solicitudesA.vendedor')">
                {{ __('Solicitudes Asignadas') }}
            </x-nav-link>

            <x-nav-link class="dropdown-item" href="{{ route('reporte-dinamico') }}" :active="request()->routeIs('reporte/dinamicos.index-reportes')">
                {{ __('Reporte') }}

            </x-nav-link>
        </ul>
    </div>

@endif
