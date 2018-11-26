<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Super Admin',
            'display_name' => 'super_admin',
        ]);

        Role::create([
            'name' => 'Admin Sales',
            'display_name' => 'admin_sales'
        ]);

        Role::create([
            'name' => 'Admin Produksi',
            'display_name' => 'admin_produksi'
        ]);
    }
}
