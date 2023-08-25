<?php
namespace App\Providers;
use App\Http\Resources\ApiResource;
use App\Http\Resources\ApiResourceInterface;
use Illuminate\Support\ServiceProvider;

class ApiResourceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ApiResourceInterface::class, function ($app) {
            return new ApiResource();
        });
    }
}
