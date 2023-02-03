<?php

namespace App\Providers;

use App\Repositories\Contracts\KeyWalletRepositoryInterface;
use App\Repositories\Contracts\LoginRepositoryInterface;
use App\Repositories\KeyWalletRepository;
use App\Repositories\LoginRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            KeyWalletRepositoryInterface::class,
            KeyWalletRepository::class
        );

        $this->app->bind(
            LoginRepositoryInterface::class,
            LoginRepository::class
        );
    }
}
