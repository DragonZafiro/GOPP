<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Business;

class BusinessSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('business')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas

        Business::create([
            'user_id' => 5,
            'category_id' => 1,
            'nombre' => "Mc Donald's",
            'direccion' => 'Avenida Zapata N4',
            'descripcion' => 'La mejor comida rápida',
            'telefono' => '5511423125',
            'email' => 'mcdonalds@mcdonalds.com',
            'web' => 'www.mcdonalds.com',
            'facebook' => 'mcdonalds',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 5,
            'category_id' => 7,
            'nombre' => "Price Shoes",
            'direccion' => 'Avenida Homero N6 MZ10',
            'descripcion' => 'Ropa a la moda',
            'telefono' => '555123555',
            'email' => 'price@shoes.com',
            'web' => 'www.priceshoes.com',
            'twitter' => 'mcdonalds',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 6,
            'category_id' => 15,
            'nombre' => "Elektra",
            'direccion' => 'Calle Reforma N1',
            'descripcion' => 'Tienda en línea',
            'telefono' => '555123555',
            'email' => 'elektra@grupoelektra.com',
            'web' => 'www.elektra.com',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 1,
            'category_id' => 14,
            'nombre' => "Best Buy",
            'direccion' => 'Avenida Zapata N4',
            'descripcion' => 'Compras en línea',
            'telefono' => '5511423125',
            'email' => 'bestbuy@bestbuy.com',
            'web' => 'www.bestbuy.com',
            'facebook' => 'Best Buy',
            'password' => bcrypt('123'),
        ]);
    }
}
