<?php

namespace App\Providers\Agricola;

use App\Interfaces\Agricola\CropServiceInterface;
use App\Services\Agricola\CropService;
use Illuminate\Support\ServiceProvider;

class CropServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CropServiceInterface::class, CropService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
