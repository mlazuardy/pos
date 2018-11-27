<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    /** @test */
    public function super_admin_can_create_customer()
    {
        $superAdmin = factory('App\User')->create(['role_id' => 1]);

        $this->actingAs($superAdmin)->get(route('customers.create'))->assertOk();
    }

    /** @test */
    public function sales_can_create_customer()
    {
        $sales = factory('App\User')->create(['role_id' => 2]);
        $this->actingAs($sales)->get(route('customers.create'))->assertOk();
    }

    //Negative
    /** @test */
    public function produksi_cant_create_customer()
    {
        $this->withExceptionHandling();
        $produksi = factory('App\User')->create(['role_id' => 3]);
        $this->actingAs($produksi)->get(route('customers.create'))->assertStatus(403);
    }

}
