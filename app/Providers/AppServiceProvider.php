<?php

namespace App\Providers;

use App\Interfaces\AuthServicesInterface;
use App\Interfaces\DemandeServicesInterface;
use App\Interfaces\DocumentServicesInterfces;
use App\Services\AuthServices;
use App\Services\DemandeServices;
use App\Services\DocumentServices;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
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
        RateLimiter::for('login',function(Request $request){
            return Limit::perHour(10)->by($request->user()?->id ?: $request->ip())
                ->response(function(Request $request, array $hearders){
                    return response('Nombre max de tentative atteinte, veuillez ressayer plus tard',429,$hearders);
                });
        });
        Vite::prefetch(concurrency: 3);
    }
}
