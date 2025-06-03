<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Repository\CityRepositoryInterface','App\Repository\CityRepository');
        $this->app->bind('App\Repository\TownRepositoryInterface','App\Repository\TownRepository');
        $this->app->bind('App\Repository\CategoryRepositoryInterface','App\Repository\CategoryRepository');
        $this->app->bind('App\Repository\FacilityRepositoryInterface','App\Repository\FacilityRepository');

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
