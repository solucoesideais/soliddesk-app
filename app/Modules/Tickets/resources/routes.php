<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Tickets\StoreTicketHandler;

Route::post('/tickets', StoreTicketHandler::class);