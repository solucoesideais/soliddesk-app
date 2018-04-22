<?php

namespace App\Modules\Tickets;

use App\Modules\Tickets\Requests\StoresTicketRequest;
use Library\Eloquent\Attachment;
use Library\Eloquent\Ticket;
use Library\Storage\Disk;

class StoreTicketHandler
{
    public function __invoke(StoresTicketRequest $request, Ticket $ticket, Attachment $attachment)
    {
        $ticket = $ticket->create($request->ticketAttributes());

        if ($request->hasAttachment()) {
            $ticket->attachments()->create($request->attachmentAttributes());

            $request->attachment()->store('/', Disk::ATTACHMENTS);
        }

        return redirect('/tickets')->with('success', __('Ticket successfully created!'));
    }
}
