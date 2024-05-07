<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'agenciamoba@gmail.com',
            'password' => bcrypt('Moba2024')
        ]);


        DB::table('people')->insert([
            'id_card' => '1234567890',
            'addres' => 'Calle 15 # 7A - 30',
            'identification_type' => 'NIT',
            'name' => 'Agencia Moba',
            'rol' => 'Administrador',
            'region_id' => 15,
            'disable' => false,
            'number_phones_id' => 5,
            'towns_id' => 923,
            'users_id' => 6,
        ]);
    }
}
