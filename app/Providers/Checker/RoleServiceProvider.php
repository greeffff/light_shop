<?php

namespace App\Providers\Checker;

use App\Repositories\Checker\RoleRepository;
use App\Repositories\Interfaces\Checker\RoleInterface;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RoleInterface::class,
            RoleRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
