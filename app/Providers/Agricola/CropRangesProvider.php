<?php

namespace App\Providers\Agricola;

use App\Interfaces\Agricola\CropRangesServiceInterface;
use App\Services\Agricola\CropRangeService;
use Illuminate\Support\ServiceProvider;

class CropRangesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CropRangesServiceInterface::class, CropRangeService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
