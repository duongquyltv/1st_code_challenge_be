<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Mysql\EqUserRepository;
use App\Contracts\Repository\UserRepository;

class SingletonProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepository::class, function() {
            return new EqUserRepository();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
