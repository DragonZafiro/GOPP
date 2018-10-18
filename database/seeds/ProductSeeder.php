<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Products;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas

        Products::create([
            'tipo' => 'Producto',
            'nombre' => 'Papas Fritas',
            'business_id' => 1,
            'codigo' => '000523311',
            'descripcion' => '500ml',
            'marca' => 'Mc Donalds',
            'precio' => '18',
            'puntos' => '1500',
            'stock' => '800',
            'comentario' => 'Remate'
        ]);

        Products::create([
            'tipo' => 'Producto',
            'nombre' => 'Hamburguesa Doble JR',
            'business_id' => 1,
            'codigo' => '000523352',
            'descripcion' => 'Carne de res',
            'marca' => 'Mc Donalds',
            'precio' => '22',
            'puntos' => '1800',
            'stock' => '800',
            'comentario' => 'Caja especial'
        ]);
        Products::create([
            'tipo' => 'Producto',
            'nombre' => 'Refresco mediano',
            'business_id' => 1,
            'codigo' => '1202213',
            'descripcion' => 'Coca-Cola, Pepsi, Sprite',
            'marca' => 'Mc Donalds',
            'precio' => '20',
            'puntos' => '500',
            'stock' => '800',
            'comentario' => 'Refresco mediano'
        ]);

        Products::create([
            'tipo' => 'Producto',
            'nombre' => 'BOTA HIKER CATERPILLAR ',
            'business_id' => 2,
            'codigo' => '0005251223',
            'descripcion' => 'Talla 27-29',
            'marca' => 'HIKER',
            'precio' => '1500',
            'puntos' => '800',
            'stock' => '800',
            'comentario' => 'Colores café y negro'
        ]);
        Products::create([
            'tipo' => 'Producto',
            'nombre' => 'BOTA HIKER JEEP ',
            'business_id' => 2,
            'codigo' => '0005251223',
            'descripcion' => 'Talla 27-29',
            'marca' => 'HIKER',
            'precio' => '2500',
            'puntos' => '2800',
            'stock' => '800',
            'comentario' => 'Colores café y negro'
        ]);
        Products::create([
            'tipo' => 'Producto',
            'nombre' => 'BOTA HIKER TIMBERLAND ',
            'business_id' => 2,
            'codigo' => '0005251223',
            'descripcion' => 'Talla 26-29',
            'marca' => 'HIKER',
            'precio' => '3500',
            'puntos' => '800',
            'stock' => '800',
            'comentario' => 'Colores negro y café oscuro'
        ]);
        Products::create([
            'tipo' => 'Producto',
            'nombre' => 'BOTA HEAVY MICHELIN GAEL ',
            'business_id' => 2,
            'codigo' => '0005251223',
            'descripcion' => 'Talla 27-29',
            'marca' => 'GAEL',
            'precio' => '3700',
            'puntos' => '800',
            'stock' => '800',
            'comentario' => 'Colores café y negro'
        ]);
        Products::create([
            'tipo' => 'Producto',
            'nombre' => 'BOTA 3/4 HIKER LOCMAN ',
            'business_id' => 2,
            'codigo' => '0005251223',
            'descripcion' => 'Talla 27-29',
            'marca' => 'HIKER',
            'precio' => '3900',
            'puntos' => '800',
            'stock' => '800',
            'comentario' => 'Colores gris y negro'
        ]);
        Products::create([
            'tipo' => 'Producto',
            'nombre' => 'Pantalla LED Sony 55 Pulgadas 4K Smart 55X750F',
            'business_id' => 3,
            'codigo' => '991231233',
            'descripcion' => 'La marca Sony trae para ti este asombroso Televisor modelo 55X750F, cuenta con una calidad de resolución Ultra HD con tecnología 4K X-Reality Pro',
            'marca' => 'HIKER',
            'precio' => '12000',
            'puntos' => '8000',
            'stock' => '800'
        ]);
        Products::create([
            'tipo' => 'Producto',
            'nombre' => 'Reproductor DVD HKPRO HKD905 - Negro',
            'business_id' => 3,
            'codigo' => '991231233',
            'descripcion' => 'DVD reproductor de alta calidad con elegante diseño delgado en color negro. Disfruta de un excelente sonido digital, está equipado con entrada USB. Diviértete viendo tus películas con alta calidad en imágenes.',
            'marca' => 'HKPRO',
            'precio' => '5000',
            'puntos' => '8000',
            'stock' => '800',
            'comentario' => 'Color negro'
        ]);
        Products::create([
            'tipo' => 'Producto',
            'nombre' => 'Motocicleta Deportiva Italika RT 200 Rojo con Blanco',
            'business_id' => 3,
            'codigo' => '991231233',
            'descripcion' => 'APROVECHA 12, 18 y HASTA 24 MESES SIN INTERESES en ITALIKA. Cuenta con un motor que te ofrece rendimiento de 25.6 km/l con velocidad máxima aproximada de 116 km/h, desplazamiento de 193.3 CC. Frenos delanteros y traseros de disco',
            'marca' => 'ITALIKA',
            'precio' => '120000',
            'puntos' => '8000',
            'stock' => '800'
        ]);
        Products::create([
            'tipo' => 'Producto',
            'nombre' => 'Sony - Audífonos MDR-ZX110 - Negros',
            'business_id' => 4,
            'codigo' => '991231233',
            'descripcion' => 'Los audífonos de Sony en forma de Diadema ZX110 cuenta con diafragmas tipo cúpula de 30 mm para un sonido equilibrado',
            'marca' => 'SONY',
            'precio' => '259',
            'puntos' => '8000',
            'stock' => '800'
        ]);
    }
}
