<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class UserManagementTest extends TestCase
{

    use RefreshDatabase,DatabaseMigrations;

    /** @test */
    public function super_admin_can_create_new_user()
    {
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
        $superAdmin = $this->createRole(1);
        $sales = $this->createRole(2);
        $produksi = $this->createRole(3);

        $data = [
            'name' => 'bebas',
            'email' => 'tes@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role_id' => 3,
        ];
        $this->actingAs($superAdmin);
        $this->post(route('users.store'),$data)->assertStatus(302);
    }

    /** @test */
    public function super_admin_or_self_user_can_update_user()
    {
        $superAdmin = $this->createRole(1);
        $sales = $this->createRole(2);
        $selfUser = $this->createRole(3);
        $data = [
            'name' => 'sales'
        ];
        $this->actingAs($superAdmin);//change this to $selfUser also passed the test
        $this->patch(route('users.update',$selfUser->id),$data)->assertStatus(301);
    }

    public function createRole($role_id)
    {
        return factory('App\User')->create(['role_id' => $role_id]);
    }

}
