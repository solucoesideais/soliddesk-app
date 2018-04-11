<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewsServiceProvider extends ServiceProvider
{
    public function register()
    {
        View::addNamespace('auth', app_path('Modules/Auth/resources/views'));
        View::addNamespace('home', app_path('Modules/Home/resources/views'));
    }
}
