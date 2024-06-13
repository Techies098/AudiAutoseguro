@if (Auth::user()->hasRole('perito'))

<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link :href="route('perito.danos-menores.index')" :active="request()->routeIs('perito.danos-menores.index')">
        {{ __('Daños menores') }}
    </x-responsive-nav-link>
</div>
    
@endif
