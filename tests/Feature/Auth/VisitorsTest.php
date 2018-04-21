<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class VisitorsTest extends TestCase
{
    /**
     * @test
     */
    public function visitors_will_be_redirected_to_login()
    {
        $this->get('/')
            ->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function visitors_can_see_the_login_form()
    {
        $this->get('/login')
            ->assertSuccessful()
            ->assertViewIs('auth::login');
    }
}