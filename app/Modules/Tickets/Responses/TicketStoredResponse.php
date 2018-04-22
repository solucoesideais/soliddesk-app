<?php

namespace App\Modules\Tickets\Responses;

use Illuminate\Contracts\Support\Responsable;
use Library\Eloquent\Ticket;

class TicketStoredResponse implements Responsable
{
    /**
     * @var Ticket
     */
    private $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function toResponse($request)
    {
        if ($request->expectsJson()) {
            return response($this->ticket->id, 201);
        }

        return redirect('/tickets')->with('success', __('Ticket successfully created!'));
    }
}
