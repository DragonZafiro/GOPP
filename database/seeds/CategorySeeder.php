<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\CategoryModel;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('category')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas

        DB::insert(
            'insert into category (nombre) values (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?), (?)',
            ['Comida', 'Ocio', 'Entretenimiento', 'Bares', 'Bebidas', 'Belleza', 'Moda', 'Hoteles y viajes',
                'Deportes', 'TV y audio', 'Videojuegos', 'Móvil', 'Computación', 'Hogar', 'Electrodomésticos',
                'Reloj y accesorios', 'Salud', 'Niños y juguetes', 'Máscotas', 'Educación', 'Servicios profesionales',
                'Industria', 'Otros']
            );
    }
}
