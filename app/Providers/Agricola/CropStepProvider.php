<?php

namespace App\Providers\Agricola;

use App\Interfaces\Agricola\CropStepServiceInterface;
use App\Services\Agricola\CropStepService;
use Illuminate\Support\ServiceProvider;

class CropStepProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CropStepServiceInterface::class, CropStepService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
