<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
{{-- <div x-data="{ openGestionSeguros: false }" class="bg-white border-b border-gray-100"> --}}
        <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @auth
                        <a href="{{ route('dashboard') }}">
                            <x-application-mark class="block w-auto h-auto" />
                        </a>
                    @else
                        <a href="{{ route('inicio') }}">
                            <x-application-mark class="block w-auto h-auto" />
                        </a>
                    @endauth
                </div>


                <!-- Navigation Links -->
                @auth<!-- usuarios autenticados: -->

                    <!-- Inicio del menu del administrador: -->
                    @if (Auth::user()->hasRole('administrador'))

                        <!-- Gestionar Seguros -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            </ul>
                        </div>

                        <!-- Gestionar Usuarios -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestion de usuarios
                            </a>
                            <ul class="dropdown-menu bg-white p-2" aria-labelledby="navbarDropdown">
                                <x-nav-link class="dropdown-item" href="{{ route('administrador/usuarios.index') }}" :active="request()->routeIs('administrador/usuarios.index')">
                                    {{ __('Usuarios') }}
                                </x-nav-link>
                                <x-nav-link class="dropdown-item" href="{{ route('personal/clientes.index') }}" :active="request()->routeIs('administrador/clientes.index')">
                                    {{ __('Clientes') }}
                                </x-nav-link>
                                <x-nav-link class="dropdown-item" href="{{ route('administrador.bitacoras.index') }}" :active="request()->routeIs('administrador.bitacoras.index')">
                                    {{ __('Bitacora') }}
                                </x-nav-link>
                            </ul>
                        </div>

                        <!-- Gestionar Vehiculos -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <x-nav-link href="{{ route('personal/siniestros.index') }}" :active="request()->routeIs('Personal/siniestros.index')">
                                    {{ __('Siniestro') }}
                                </x-nav-link>
                            </ul>
                        </div>

                    @endif <!-- Fin del menu del administrador -->

                    <!-- Inicio del menu del vendedor: -->
                    @if (Auth::user()->hasRole('vendedor'))

                        <!-- Gestionar Seguros -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            </ul>
                        </div>

                        <!-- Gestionar Usuarios -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <x-nav-link href="{{ route('personal/siniestros.index') }}" :active="request()->routeIs('Personal/siniestros.index')">
                                    {{ __('Siniestro') }}
                                </x-nav-link>
                            </ul>
                        </div>

                    @endif <!-- Fin del menu del vendedor -->

                    <!-- Inicio del menu del cliente: -->
                    @if (Auth::user()->hasRole('cliente'))

                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('cliente.contratos.index', ['cliente' => Auth::user()->cliente->id])" :active="request()->routeIs('cliente.contratos.index')">
                                {{ __('Contratos') }}
                            </x-nav-link>
                        </div>

                    @endif <!-- Fin del menu del cliente -->
        
                
                @else <!-- Usuarios no autenticado: -->
                    
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link href="{{ route('inicio') }}" :active="request()->routeIs('inicio')">
                            {{ __('Inicio') }}
                        </x-nav-link>
                    </div>

                @endauth  <!-- Fin de la condicion de usuarios autenticados -->

            </div>
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <!-- Settings Dropdown -->
                @auth
                    <div class="relative ms-3">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                        <img class="object-cover w-8 h-8 rounded-full"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50">
                                            {{ Auth::user()->name }}

                                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-nav-link>
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-nav-link>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        @auth <!-- usuarios autenticados: -->

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Inicio del menu del cliente: -->
            @if (Auth::user()->hasRole('cliente'))

                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('cliente.contratos.index', ['cliente' => Auth::user()->cliente->id])" :active="request()->routeIs('cliente.contratos.index')">
                        {{ __('Contratos') }}
                    </x-responsive-nav-link>
                </div>

            @endif <!-- Fin del menu del cliente -->


        @else <!-- usuarios no autenticados: -->

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('inicio') }}" :active="request()->routeIs('inicio')">
                    {{ __('Inicio') }}
                </x-responsive-nav-link>
            </div>

        @endauth <!-- Fin de la condicion de usuarios autenticados -->

        <!-- Responsive Settings Options -->

        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>


                </div>
            </div>
        @else
            <div class="pt-4 pb-1 border-t border-gray-200">
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            </div>
        @endauth
    </div>
</nav>
