<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function super_admin_can_view_customer_page()
    {
        $superAdmin = factory('App\User')->create(['role_id' => 1]);

        $this->actingAs($superAdmin)->get(route('customers.index'))->assertOk();
    }

}
