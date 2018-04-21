<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Concerns\AuthenticatesUser;
use Tests\Concerns\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->setUpCustomTraits();
    }

    protected function setUpCustomTraits(): void
    {
        $uses = array_flip(class_uses_recursive(static::class));

        if (isset($uses[AuthenticatesUser::class])) {
            $this->authenticatesUser();
        }
    }
}
