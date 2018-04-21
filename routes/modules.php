<?php

use Illuminate\Support\Facades\Route;

Route::group([], app_path('Modules/Auth/resources/routes.php'));

Route::group(['middleware' => 'auth'], function () {
    Route::group([], app_path('Modules/Home/resources/routes.php'));
    Route::group([], app_path('Modules/Tickets/resources/routes.php'));
});
