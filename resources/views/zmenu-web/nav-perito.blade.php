@if (Auth::user()->hasRole('perito'))
    <!-- Gestionar Vehiculos -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Gestion de vehiculos
        </a>
        <ul class="dropdown-menu bg-white p-2" aria-labelledby="navbarDropdown">
            <x-nav-link class="dropdown-item" href="{{ route('administrador/talleres.index') }}" :active="request()->routeIs('administrador/talleres.index')">
                {{ __('Taller') }}
            </x-nav-link>
        </ul>
    </div>
@endif
