<?php

namespace App\Providers;

use App\Interfaces\AuthServicesInterface;
use App\Interfaces\DemandeServicesInterface;
use App\Interfaces\DocumentServicesInterfces;
use App\Services\AuthServices;
use App\Services\DemandeServices;
use App\Services\DocumentServices;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(AuthServicesInterface::class,AuthServices::class);
        $this->app->bind(DemandeServicesInterface::class,DemandeServices::class);
        $this->app->bind(DocumentServicesInterfces::class,DocumentServices::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
