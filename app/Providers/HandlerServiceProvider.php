<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HandlerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadHelpers();

    }

    protected function loadHelpers()
    {
        foreach (glob(__DIR__ . '/../Handlers/**/*.php') as $filename) {
            require_once $filename;
        }
    }
}
