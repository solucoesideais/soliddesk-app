<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Home\HomeHandler;

Route::get('/', HomeHandler::class);
Route::get('/home', HomeHandler::class);