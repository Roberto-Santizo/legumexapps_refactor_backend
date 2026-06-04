<?php

namespace App\Providers\Agricola;

use App\Interfaces\Agricola\FincaServiceInterface;
use App\Services\Agricola\FincaService;
use Illuminate\Support\ServiceProvider;

class FincaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FincaServiceInterface::class, FincaService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
