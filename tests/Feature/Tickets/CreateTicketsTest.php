<?php

namespace Tests\Feature\Tickets;

use Illuminate\Foundation\Testing\WithFaker;
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
        [$title, $body] = [$this->faker->sentence, $this->faker->paragraph];

        $this->post('/tickets', $attributes = [
            'title' => $title,
            'body' => $body,
        ])
        ->assertStatus(302)
        ->assertRedirect('/tickets');

        $this->assertDatabaseHas('tickets', $attributes + ['user_id' => $this->user->id]);
    }
}
