<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapModuleRoutes();
    }

    protected function mapModuleRoutes()
    {
        Route::middleware(['web'])
            ->group(base_path('routes/modules.php'));
    }
}
