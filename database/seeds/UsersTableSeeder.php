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
            'password' => Hash::make('itsuperadmin'),
        ]);

        $sales = User::create([
            'role_id' => 2,
            'name' => 'Super Sales',
            'email' => 'sales@tidaktampan.com',
            'password' => Hash::make('salesstandar'),
        ]);

        $produksi = User::create([
            'role_id' => 3,
            'name' => 'Super Produksi',
            'email' => 'produksi@standar.com',
            'password' => Hash::make('produksiyeah'),
        ]);
    }
}
