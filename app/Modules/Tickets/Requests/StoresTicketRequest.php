<?php

namespace App\Modules\Tickets\Requests;

use Library\Http\Requests\BaseFormRequest;

class StoresTicketRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|min:6',
            'body' => 'required',
            'attachment' => 'file'
        ];
    }

    /**
     * Return array map of tickets attributes for the tickets table.
     *
     * @return array
     */
    public function ticketAttributes()
    {
        return [
            'title' => $this->get('title'),
            'body' => $this->get('body'),
            'user_id' => $this->user()->id,
        ];
    }

    /**
     * Return array map of attachments attribute for the attachments table.
     *
     * @return array
     */
    public function attachmentAttributes()
    {
        return [
            'path' => $this->file('attachment')->hashName(),
        ];
    }

    public function hasAttachment()
    {
        return $this->hasFile('attachment');
    }

    public function attachment()
    {
        return $this->file('attachment');
    }
}
