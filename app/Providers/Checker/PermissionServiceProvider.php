<?php

namespace App\Providers\Checker;

use App\Repositories\Checker\PermissionRepository;
use App\Repositories\Interfaces\Checker\PermissionInterface;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PermissionInterface::class,
            PermissionRepository::class);
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
