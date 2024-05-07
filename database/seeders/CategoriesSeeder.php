<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('categories_products_services')->insert([
        'name' => 'Accesorios',
        'description' => 'Accesorios de difererentes estilos para toda ocacion',
        'status' => 'active',
        'quantity' => '1',
        'popular' => 'Alta',
        'type' => 'Producto',
        'disable' => '0',

       ]);
       DB::table('categories_products_services')->insert([
        'name' => 'Mascotas',
        'description' => 'Accesorios para las mascotas',
        'status' => 'active',
        'quantity' => '1',
        'popular' => 'Alta',
        'type' => 'Producto',
        'disable' => '0',

       ]);
       DB::table('categories_products_services')->insert([
        'name' => 'Decoracion',
        'description' => 'Decoracion para todos los gustos',
        'status' => 'active',
        'quantity' => '1',
        'popular' => 'Alta',
        'type' => 'Producto',
        'disable' => '0',

       ]);
       DB::table('categories_products_services')->insert([
        'name' => 'Joditas pal Recuerdo',
        'description' => 'Accesorios para toda ocacion',
        'status' => 'active',
        'quantity' => '1',
        'popular' => 'Alta',
        'type' => 'Producto',
        'disable' => '0',

       ]);
}
}