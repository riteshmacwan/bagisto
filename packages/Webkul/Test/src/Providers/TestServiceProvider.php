<?php

namespace Webkul\Test\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
