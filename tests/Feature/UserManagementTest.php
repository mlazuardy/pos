<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserManagementTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function super_admin_can_create_new_user()
    {
        $user = factory('App\User');
        /**
         * Only Super Admin/ Role_id 1 can create user
         * Every Role that doesnt have role_id 1 will be throw error
         * Choose the 3 variable below to test using role_id 1/2/or 3
         * change the $this->actingAs() to your choosen variable
         * $superAdmin , $sales, or $produksi
         * Expectation = using the first/$superAdmin will OK the test
         * but, using 2nd and 3rd ($sales or $produksi) will throw an error
         * 'This action is unauthorize'
         */
        $superAdmin = $user->make(['role_id' => 1]);
        $sales = $user->make(['role_id' => 2]);
        $produksi = $user->make(['role_id' => 3]);

        $data = [
            'name' => 'bebas',
            'email' => 'tes@gmail.com',
            'password' => 'password',
            'role_id' => 3,
        ];
        $this->actingAs($superAdmin);
        $this->postJson(route('users.store'),$data)->assertStatus(201);
    }

    /** @test */
    public function super_admin_or_self_user_can_update_user()
    {
        $user = factory('App\User');
        $superAdmin = $user->create(['role_id'=>1]);//Pass if using this in actingAs
        $selfUser = $user->create(['role_id'=>2]);//Pass if using this in actingAs
        $anotherSales = $user->create(['role_id' => 2]);//will not pass if using this,except user param == this variable

        $data = [
            'name' => 'sales'
        ];
        $this->actingAs($superAdmin);
        $this->postJson(route('users.update',$selfUser->id),$data)->assertStatus(201);
    }

}
