<?php

namespace Tests\Feature\Tickets;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Library\Eloquent\Ticket;
use Library\Http\Requests\BaseFormRequest;
use Library\Storage\Disk;
use Tests\Concerns\AuthenticatesUser;
use Tests\TestCase;

class CreateTicketsTest extends TestCase
{
    use AuthenticatesUser, WithFaker;

    /**
     * @test
     */
    public function a_user_can_open_a_ticket()
    {
        $attributes = [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph
        ];

        $this->post('/tickets', $attributes)
            ->assertStatus(302)
            ->assertRedirect('/tickets');

        $this->assertDatabaseHas('tickets', $attributes + ['user_id' => $this->user->id]);
    }

    /**
     * @test
     */
    public function a_user_can_open_a_ticket_with_attachments()
    {
        Storage::fake('attachments');

        $attributes = [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'attachment' => UploadedFile::fake()->create('error.jpg'),
        ];

        $this->post('/tickets', $attributes)
            ->assertStatus(302)
            ->assertRedirect('/tickets');

        $this->assertDatabaseHas('attachments', [
            'attachable_type' => Ticket::class,
            'path' => $attributes['attachment']->hashName()
        ]);

        Storage::disk(Disk::ATTACHMENTS)->assertExists($attributes['attachment']->hashName());
    }

    /**
     * @group f
     */
    public function the_attachment_must_be_a_file()
    {
//        $this->post('/tickets')
//            ->assertSessionHasErrorsIn(BaseFormRequest::FORM_ERROR_BAG, 'file');
    }
}
