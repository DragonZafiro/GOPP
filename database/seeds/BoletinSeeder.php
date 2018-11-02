<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Boletin;

class BoletinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('boletin')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas

        Boletin::create([
            'business_id' => 1,
            'enlace' => 'http://www.mcdonalds.com.mx/promociones/mctrio',
            'titulo' => 'McTrío 3x3',
            'contenido' => '¡Vuelve la hamburguesa Gourmet!',
            'fecha_inicio' => '2019',
            'fecha_fin' => '2020',
            'plantilla' => '1'
        ]);

        Boletin::create([
            'business_id' => 7,
            'enlace' => 'http://www.priceshoes.com',
            'titulo' => 'Nuevas promociones FLEX',
            'contenido' => '¡Vuelve la moda más deseada!',
            'fecha_inicio' => '2019',
            'fecha_fin' => '2020',
            'plantilla' => '1'
        ]);

        Boletin::create([
            'business_id' => 6,
            'enlace' => 'http://www.elektra.com.mx/',
            'titulo' => 'Equipos HP',
            'contenido' => '¡Nuevas ofertas en todos nuestros equipos HP!',
            'fecha_inicio' => '2019',
            'fecha_fin' => '2020',
            'plantilla' => '1'
        ]);
    }
}
