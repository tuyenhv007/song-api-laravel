<?php

namespace App\Providers;

use App\Http\Repositories\Impl\SongRepositoryImpl;
use App\Http\Repositories\SongRepository;
use App\Http\Services\Impl\SongServicesImpl;
use App\Http\Services\SongServices;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(SongRepository::class, SongRepositoryImpl::class);
        $this->app->singleton(SongServices::class, SongServicesImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }
}
