@if (Auth::user()->hasRole('vendedor'))

<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="dropdown-item" href="{{ route('administrador/seguros.index') }}" :active="request()->routeIs('administrador/seguros.index')">
        {{ __('Seguros') }}
    </x-responsive-nav-link>
</div>
<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="dropdown-item" href="{{ route('administrador/clausulas.index') }}" :active="request()->routeIs('administrador/clausulas.index')">
        {{ __('Clausulas') }}
    </x-responsive-nav-link>
</div>
<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="dropdown-item" href="{{ route('administrador/coberturas.index') }}" :active="request()->routeIs('administrador/coberturas.index')">
        {{ __('Coberturas') }}
    </x-responsive-nav-link>
</div>

<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="dropdown-item" href="{{ route('solicitudes.mis') }}" :active="request()->routeIs('solicitudes.mis')">
        {{ __('Mis solicitudes De Seguros') }}
    </x-responsive-nav-link>
</div>

<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="dropdown-item" href="{{ route('solicitudes.index') }}" :active="request()->routeIs('solicitudes.index')">
        {{ __('Solicitudes') }}
    </x-responsive-nav-link>
</div>
<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="dropdown-item" href="{{ route('solicitudes.vendedor') }}" :active="request()->routeIs('solicitudes.vendedor')">
        {{ __('Solicitudes Asignadas') }}
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
<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="dropdown-item" href="{{ route('solicitudesA.index') }}" :active="request()->routeIs('solicitudesA.index')">
        {{ __('Solicitudes Auxilio mecanico') }}
    </x-responsive-nav-link>
</div>
<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link class="dropdown-item" href="{{ route('solicitudesA.vendedor') }}" :active="request()->routeIs('solicitudesA.vendedor')">
        {{ __('Solicitudes Asignadas') }}
    </x-responsive-nav-link>
</div>
    
@endif
