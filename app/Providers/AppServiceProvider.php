<?php

namespace App\Providers;

use App\Models\Medicamentos\Unidad\Rangonpt;
use App\Models\Medicamentos\Unidad\Unidad;
use App\Models\Medicamentos\Unidad\Unidrang;
use App\Models\Medicamentos\Unidad\Urangnpt;
use App\Observers\Medicame\Unidades\RangonptObserver;
use App\Observers\Medicame\Unidades\UnidadObserver;
use App\Observers\Medicame\Unidades\UnidrangObserver;
use App\Observers\Medicame\Unidades\UrangnptObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Rangonpt::observe(RangonptObserver::class);
        Unidad::observe(UnidadObserver::class);
        Unidrang::observe(UnidrangObserver::class);
        Urangnpt::observe(UrangnptObserver::class);
    }
}
