@if (Auth::user()->hasRole('perito'))
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link class="dropdown-item" href="{{ route('personal/siniestros.index') }}" :active="request()->routeIs('Personal/siniestros.index')">
        {{ __('Siniestro') }}
    </x-nav-link>
</div>
@endif
