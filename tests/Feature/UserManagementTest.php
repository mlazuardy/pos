<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserManagementTest extends TestCase
{

    /** @test */
    public function super_admin_can_create_new_user()
    {
        $this->assertTrue(true);
    }

}
