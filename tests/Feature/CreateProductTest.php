<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function super_admin_can_create_product()
    {
        $superAdmin = factory('App\User')->make(['role_id' => 1]);

        $this->actingAs($superAdmin)->get(route('products.index'))->assertOk();
    }

    /** @test */
    public function admin_produksi_can_create_product()
    {
        $adminProduksi = factory('App\User')->make(['role_id' => 3]);

        $this->actingAs($adminProduksi)->get(route('products.index'))->assertOk();
    }

    /** @test */
    public function admin_sales_cant_create_product()
    {
        $this->withExceptionHandling();
        $adminSales = factory('App\User')->make(['role_id' => 2]);

        $this->actingAs($adminSales)->get(route('products.index'))->assertStatus(403);
    }
}
