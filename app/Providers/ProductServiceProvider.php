<?php

namespace App\Providers;

use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductInterface::class,
            ProductRepository::class);
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
