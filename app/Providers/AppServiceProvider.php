<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\VerifikasiService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(VerifikasiService::class, function ($app) {
            return new VerifikasiService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
