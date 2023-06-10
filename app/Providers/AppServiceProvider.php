<?php

namespace App\Providers;

use App\Interfaces\IHosptalRepository;
use App\Repositories\HospitalRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IHosptalRepository::class , HospitalRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
