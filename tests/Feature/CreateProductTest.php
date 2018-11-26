<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function produksi_can_create_product()
    {
        $produksi = $this->createRole(3);

        $this->actingAs($produksi);
        $this->get(route('products.index'))->assertOk();
    }

    /** @test */
    public function super_admin_can_create_product()
    {
        $superAdmin = $this->createRole(1);

        $this->actingAs($superAdmin);
        $this->get(route('products.index'))->assertOk();
    }

    /** @test */
    public function sales_cant_create_product()
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
