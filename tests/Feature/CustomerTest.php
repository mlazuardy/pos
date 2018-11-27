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

    /** @test */
    public function sales_can_view_customer_page()
    {
        $sales = factory('App\User')->create(['role_id' => 2]);
        $this->actingAs($sales)->get(route('customers.index'))->assertOk();
    }

    //Negative
    /** @test */
    public function produksi_cant_view_customer_page()
    {
        $this->withExceptionHandling();
        $produksi = factory('App\User')->create(['role_id' => 3]);
        $this->actingAs($produksi)->get(route('customers.index'))->assertStatus(403);
    }

}
