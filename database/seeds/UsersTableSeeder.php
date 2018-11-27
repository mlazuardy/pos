<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'role_id' => 1,
            'name' => 'Michael Lazuardy',
            'email' => 'michael@tampan.com',
            'password' => 'superadmin'
        ]);

        $sales = User::create([
            'role_id' => 2,
            'name' => 'Super Sales',
            'email' => 'sales@tidaktampan.com',
            'password' => 'salesstandar'
        ]);

        $produksi = User::create([
            'role_id' => 3,
            'name' => 'Super Produksi',
            'email' => 'produksi@standar.com',
            'password' => 'produksiyeah',
        ]);
    }
}
