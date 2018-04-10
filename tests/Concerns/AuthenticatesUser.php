<?php

namespace Tests\Concerns;

use Illuminate\Contracts\Auth\Authenticatable;
use Library\Eloquent\Auth\User;

trait AuthenticatesUser
{
    /**
     * @var User
     */
    protected $user;

    public function authenticatesUser()
    {
        $this->actingAs($this->user = create(User::class));
    }

    abstract public function actingAs(Authenticatable $user, $driver = null);
}