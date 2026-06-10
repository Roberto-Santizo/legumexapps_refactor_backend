<?php

namespace App\Providers\Agricola;

use App\Interfaces\Agricola\FincaGroupServiceInterface;
use App\Services\Agricola\FincaGroupService;
use Illuminate\Support\ServiceProvider;

class FincaGroupServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FincaGroupServiceInterface::class, FincaGroupService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
