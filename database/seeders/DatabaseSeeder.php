<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        DB::table('number_phones')->insert([
            'number' => '3106749334',
        ]);

        DB::table('people')->insert([
            'id_card' => '1234567890',
            'addres' => 'Calle 15 # 7A - 30',
            'identification_type' => 'NIT',
            'name' => 'Agencia Moba',
            'rol' => 'Administrador',
            'region_id' => 15,
            'disable' => 0,
            'number_phones_id' => 1,
            'towns_id' => 923,
            'users_id' => 1,
        ]);

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
            'name' => 'Decoracion',
            'description' => 'Accesorios para las mascotas',
            'status' => 'active',
            'quantity' => '1',
            'popular' => 'Alta',
            'type' => 'Producto',
            'disable' => '0',
        ]);
        DB::table('categories_products_services')->insert([
            'name' => 'Joditas pal Recuerdo',
            'description' => 'Decoracion para todos los gustos',
            'status' => 'active',
            'quantity' => '1',
            'popular' => 'Alta',
            'type' => 'Producto',
            'disable' => '0',
        ]);
        DB::table('categories_products_services')->insert([
            'name' => 'Mascotas',
            'description' => 'Accesorios para toda ocacion',
            'status' => 'active',
            'quantity' => '1',
            'popular' => 'Alta',
            'type' => 'Producto',
            'disable' => '0',
        ]);
        DB::table('units')->insert([
            [
                'unit_type' => 'unidad',
            ],
            [
                'unit_type' => 'docena',
            ],
            [
                'unit_type' => 'centena',
            ],
            [
                'unit_type' => 'mil',
            ],
            [
                'unit_type' => 'mm',
            ],
            [
                'unit_type' => 'cm',
            ],
            [
                'unit_type' => 'm',
            ],
            [
                'unit_type' => 'cm2',
            ],
            [
                'unit_type' => 'm2',
            ],
        ]);
        DB::table('products')->insert([
            'name' => 'Llavero Mascota',
            'image' => 'imagenesSeeder/Accesorios1.jpg',
            'quantity' => 10,
            'price' => 2500,
            'units_id' => 1,
            'categories_products_services_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Llavero Deportivo',
            'image' => 'imagenesSeeder/Accesorios2.jpg',
            'quantity' => 10,
            'price' => 2500,
            'units_id' => 2,
            'categories_products_services_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Accesorio',
            'image' => 'imagenesSeeder/Accesorios3.jpg',
            'quantity' => 10,
            'price' => 1500,
            'units_id' => 3,
            'categories_products_services_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Aretes de Gato',
            'image' => 'imagenesSeeder/Accesorios4.jpg',
            'quantity' => 10,
            'price' => 3000,
            'units_id' => 4,
            'categories_products_services_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Llavero personalizado',
            'image' => 'imagenesSeeder/Accesorios5.jpg',
            'quantity' => 10,
            'price' => 2000,
            'units_id' => 5,
            'categories_products_services_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Detalle personalizado',
            'image' => 'imagenesSeeder/Accesorios6.jpg',
            'quantity' => 10,
            'price' => 5000,
            'units_id' => 6,
            'categories_products_services_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Cuadro',
            'image' => 'imagenesSeeder/Decoracion1.jpg',
            'quantity' => 10,
            'price' => 10000,
            'units_id' => 7,
            'categories_products_services_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Cuadro tallado',
            'image' => 'imagenesSeeder/Decoracion2.jpg',
            'quantity' => 10,
            'price' => 12000,
            'units_id' => 8,
            'categories_products_services_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Organizador de plumas',
            'image' => 'imagenesSeeder/Decoracion3.jpg',
            'quantity' => 10,
            'price' => 8000,
            'units_id' => 9,
            'categories_products_services_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Reconocimiento personalizado',
            'image' => 'imagenesSeeder/Decoracion4.jpg',
            'quantity' => 10,
            'price' => 10000,
            'units_id' => 1,
            'categories_products_services_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Detalle personalizado',
            'image' => 'imagenesSeeder/Decoracion5.jpg',
            'quantity' => 10,
            'price' => 20000,
            'units_id' => 2,
            'categories_products_services_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Arbol de cuadros',
            'image' => 'imagenesSeeder/Decoracion6.jpg',
            'quantity' => 10,
            'price' => 15000,
            'units_id' => 3,
            'categories_products_services_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Cuadro',
            'image' => 'imagenesSeeder/Joditas1.jpg',
            'quantity' => 10,
            'price' => 2000,
            'units_id' => 4,
            'categories_products_services_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Manilla',
            'image' => 'imagenesSeeder/Joditas2.jpg',
            'quantity' => 10,
            'price' => 1500,
            'units_id' => 5,
            'categories_products_services_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Rompecabezas',
            'image' => 'imagenesSeeder/Joditas3.jpg',
            'quantity' => 10,
            'price' => 30000,
            'units_id' => 6,
            'categories_products_services_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Recuerdo bautizo',
            'image' => 'imagenesSeeder/Joditas4.jpg',
            'quantity' => 10,
            'price' => 25000,
            'units_id' => 7,
            'categories_products_services_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Llaveros con tarjeta',
            'image' => 'imagenesSeeder/Joditas5.jpg',
            'quantity' => 10,
            'price' => 27000,
            'units_id' => 8,
            'categories_products_services_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Detalle especial',
            'image' => 'imagenesSeeder/Joditas6.jpg',
            'quantity' => 10,
            'price' => 27000,
            'units_id' => 9,
            'categories_products_services_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Medallón',
            'image' => 'imagenesSeeder/Mascotas1.jpg',
            'quantity' => 10,
            'price' => 5000,
            'units_id' => 1,
            'categories_products_services_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Placa',
            'image' => 'imagenesSeeder/Mascotas2.jpg',
            'quantity' => 10,
            'price' => 4000,
            'units_id' => 2,
            'categories_products_services_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Placa personalizada',
            'image' => 'imagenesSeeder/Mascotas3.jpg',
            'quantity' => 10,
            'price' => 4500,
            'units_id' => 3,
            'categories_products_services_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Placa',
            'image' => 'imagenesSeeder/Mascotas4.jpg',
            'quantity' => 10,
            'price' => 4500,
            'units_id' => 4,
            'categories_products_services_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Placa personalizada',
            'image' => 'imagenesSeeder/Mascotas5.jpg',
            'quantity' => 10,
            'price' => 4500,
            'units_id' => 5,
            'categories_products_services_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Placa mascota',
            'image' => 'imagenesSeeder/Mascotas6.jpg',
            'quantity' => 10,
            'price' => 5500,
            'units_id' => 6,
            'categories_products_services_id' => 4,
        ]);
        echo 'Seeder ejecutado correctamente.';
    }
}
