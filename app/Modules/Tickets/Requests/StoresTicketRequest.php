<?php

namespace App\Modules\Tickets\Requests;

use Library\Http\Requests\BaseFormRequest;
use Library\Storage\Disk;

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

    public function ticketAttributes()
    {
        return [
            'title' => $this->get('title'),
            'body' => $this->get('body'),
            'user_id' => $this->user()->id,
        ];
    }

    public function attachmentAttributes()
    {
        return [
            'path' => $this->file('attachment')->getFilename(),
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
