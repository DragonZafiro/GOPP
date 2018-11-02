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
            'user_id' => 1,
            'category_id' => 1,
            'nombre' => "Burger King",
            'direccion' => 'Calle Vicente Guerrero 25',
            'descripcion' => 'Las mejores hamburgesas',
            'telefono' => '55987650432',
            'email' => 'burger@kings.com',
            'web' => 'www.burgerking.com.mx',
            'facebook' => 'burgerking',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 6,
            'category_id' => 1,
            'nombre' => "KFC",
            'direccion' => 'Patio Valle De Chalco',
            'descripcion' => ' Lo más delicioso de nuestro Pollo KFC',
            'telefono' => '5516430800',
            'email' => 'kfc_pollos@kfc.com',
            'web' => 'www.kfc.com.mx',
            'facebook' => 'KFC',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 5,
            'category_id' => 1,
            'nombre' => "Wendys",
            'direccion' => 'Miguel de Cervantes Saavedra 397',
            'descripcion' => 'Un menú diseñado para todo tipo de antojo',
            'telefono' => '5555804829',
            'email' => 'wendysmexico@wendys.com',
            'web' => 'www.wendysmexico.com',
            'facebook' => 'wendys',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 1,
            'category_id' => 1,
            'nombre' => "Pizza Hut",
            'direccion' => ' Los Reyes Acaquilpan, México',
            'descripcion' => 'Aliviana tu apetito con Pizzas Hut',
            'telefono' => '5552589977',
            'email' => 'pizzahut@hut.com',
            'web' => 'www.pizzahut.com.mx',
            'facebook' => 'pizza Hut',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 6,
            'category_id' => 1,
            'nombre' => "Starbucks",
            'direccion' => 'Avenida Nezahualcóyotl Chimalhuacan 1',
            'descripcion' => 'Despierta con los cafes de Starbucks',
            'telefono' => '5589632309',
            'email' => 'starbucks@bucks.com',
            'web' => 'www.starbucks.com.mx',
            'facebook' => 'StarBucks',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 5,
            'category_id' => 7,
            'nombre' => "Price Shoes",
            'direccion' => 'Avenida Homero N6 MZ10',
            'descripcion' => 'El mejor calzado para ti',
            'telefono' => '555123555',
            'email' => 'price@shoes.com',
            'web' => 'www.priceshoes.com',
            'twitter' => 'priceshoes',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 6,
            'category_id' => 7,
            'nombre' => "Liverpool",
            'direccion' => 'Avenida Canal de Garay 3278',
            'descripcion' => 'Ropa moderna para ti',
            'telefono' => '5589675342',
            'email' => 'liverpool_ropa@liverpool.com',
            'web' => 'www.liverpool.com.mx',
            'twitter' => 'liverpool',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 1,
            'category_id' => 7,
            'nombre' => "Palacio de Hierro",
            'direccion' => 'Calle de Durango 230, Roma Nte.',
            'descripcion' => 'Lo ultimo en Europa',
            'telefono' => '5552429000',
            'email' => 'palacio@hierro.com',
            'web' => 'www.elpalaciodehierro.com',
            'twitter' => 'PalaciodeHierro',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 5,
            'category_id' => 7,
            'nombre' => "Sears",
            'direccion' => 'Chimalhuacan 13, México',
            'descripcion' => 'Lo mejor en ropa',
            'telefono' => '5526197101',
            'email' => 'sears@sears.com',
            'web' => 'www.sears.com',
            'twitter' => 'Sears',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 5,
            'category_id' => 7,
            'nombre' => "Suburbia",
            'direccion' => 'Patio Ayotla, México',
            'descripcion' => 'Los mejores descuentos en ropa',
            'telefono' => '5526197101',
            'email' => 'suburbia_moda@suburbia.com',
            'web' => 'www.suburbia.com',
            'twitter' => 'Suburbia_moda',
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
            'user_id' => 6,
            'category_id' => 15,
            'nombre' => "Sanborns",
            'direccion' => 'Avenida Roma 15',
            'descripcion' => 'Electronica para ti',
            'telefono' => '5576895643',
            'email' => 'electronica@sanbornscom',
            'web' => 'www.sanborns.com',
            'password' => bcrypt('123'),
        ]);

        Business::create([
            'user_id' => 6,
            'category_id' => 15,
            'nombre' => "Sam´s Club",
            'direccion' => 'Parque Delta 145',
            'descripcion' => 'Comodida para tu hogar',
            'telefono' => '5590782390',
            'email' => 'electronica@sams.com',
            'web' => 'www.sams.com',
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
