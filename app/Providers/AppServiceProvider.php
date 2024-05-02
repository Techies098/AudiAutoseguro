<?php

namespace App\Providers;

use App\Models\Clausula;
use App\Models\Cobertura;
use App\Models\Seguro;
use App\Models\User;
use App\Models\Vehiculo;
use App\Observers\ClausulaObserver;
use App\Observers\CoberturaObserver;
use App\Observers\SeguroObserver;
use App\Observers\UserObserver;
use App\Observers\VehiculoObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
        Vehiculo::observe(VehiculoObserver::class);
        Seguro::observe(SeguroObserver::class);
        Cobertura::observe(CoberturaObserver::class);
        Clausula::observe(ClausulaObserver::class);
    }
}
