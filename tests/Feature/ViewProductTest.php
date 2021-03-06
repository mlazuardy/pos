<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function produksi_can_view_product_page()
    {
        $produksi = $this->createRole(3);

        $this->actingAs($produksi);
        $this->get(route('products.index'))->assertOk();
    }

    /** @test */
    public function super_admin_can_view_product_page()
    {
        $superAdmin = $this->createRole(1);

        $this->actingAs($superAdmin);
        $this->get(route('products.index'))->assertOk();
    }

    /** @test */
    public function sales_cant_view_product_page()
    {
        $this->withExceptionHandling();
        $superAdmin = $this->createRole(2);
        $this->actingAs($superAdmin)
            ->get('/products')->assertStatus(403);
    }

    public function createRole($role_id)
    {
        return factory('App\User')->create(['role_id' => $role_id]);
    }

}
