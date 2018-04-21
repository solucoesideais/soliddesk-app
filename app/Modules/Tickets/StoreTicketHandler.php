<?php

namespace App\Modules\Tickets;

use Illuminate\Http\Request;
use Library\Eloquent\Ticket;

class StoreTicketHandler
{
    public function __invoke(Request $request, Ticket $ticket)
    {
        $ticket->create($request->all() + ['user_id' => auth()->id()]);

        return redirect('/tickets')->with('success', __('Ticket successfully created!'));
    }
}
