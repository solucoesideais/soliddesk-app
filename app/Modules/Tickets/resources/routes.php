<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Tickets\StoreTicketHandler;
use App\Modules\Tickets\TicketsViews;

Route::post('/tickets', StoreTicketHandler::class);
Route::get('/tickets/create', route_handler(TicketsViews::class, 'create'));