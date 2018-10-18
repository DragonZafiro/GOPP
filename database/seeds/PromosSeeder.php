<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Promos;
use Carbon\Carbon;
class PromosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('promos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas

        Promos::create([
            'product_id' => 1,
            'business_id' => 1,
            'precio' => '19',
            'compraMinima' => '2',
            'encabezado' => 'Papas 2x1',
            'descripcion' => 'Llevate 2 y paga 19$',
            'fecha_inicio' => '2018-20-10',
            'fecha_fin' => '2018-20-10',
            'plantilla' => '1'
        ]);

        Promos::create([
            'product_id' => 2,
            'business_id' => 1,
            'precio' => '59',
            'compraMinima' => '2',
            'encabezado' => 'Este es el encabezado de la promoción',
            'descripcion' => 'Esta es una descripción muy larga de la promoción',
            'fecha_inicio' => '2018-20-10',
            'fecha_fin' => '2018-20-10',
            'plantilla' => '1'
        ]);
        Promos::create([
            'product_id' => 3,
            'business_id' => 1,
            'precio' => '22',
            'compraMinima' => '2',
            'encabezado' => 'Ofertón',
            'descripcion' => 'Refresco Manzanita de oferta',
            'fecha_inicio' => '2018-20-10',
            'fecha_fin' => '2018-20-10',
            'plantilla' => '1'
        ]);
        Promos::create([
            'product_id' => 4,
            'business_id' => 2,
            'precio' => '199',
            'compraMinima' => '1',
            'encabezado' => 'Botas de remate!',
            'descripcion' => 'Esta es la descripción',
            'fecha_inicio' => '2018-20-10',
            'fecha_fin' => '2018-20-10',
            'plantilla' => '1'
        ]);
        Promos::create([
            'product_id' => 5,
            'business_id' => 2,
            'precio' => '259',
            'compraMinima' => '1',
            'encabezado' => 'Botas café de oferta',
            'descripcion' => 'De temporada, color negro',
            'fecha_inicio' => '2018-20-10',
            'fecha_fin' => '2018-20-10',
            'plantilla' => '1'
        ]);
        Promos::create([
            'product_id' => 6,
            'business_id' => 2,
            'precio' => '450',
            'compraMinima' => '1',
            'encabezado' => 'Oferta de temporada',
            'descripcion' => 'En talla 27',
            'fecha_inicio' => '2018-20-10',
            'fecha_fin' => '2018-20-10',
            'plantilla' => '1'
        ]);
        Promos::create([
            'product_id' => 7,
            'business_id' => 2,
            'precio' => '499',
            'compraMinima' => '1',
            'encabezado' => 'dadsfadsf',
            'descripcion' => 'asdfasdfasdf',
            'fecha_inicio' => '2018-20-10',
            'fecha_fin' => '2018-20-10',
            'plantilla' => '1'
        ]);
        Promos::create([
            'product_id' => 8,
            'business_id' => 2,
            'precio' => '799',
            'compraMinima' => '1',
            'encabezado' => 'Botas de promoción',
            'descripcion' => 'Sólo por este mes',
            'fecha_inicio' => '2018-20-10',
            'fecha_fin' => '2018-20-10',
            'plantilla' => '1'
        ]);
        Promos::create([
            'product_id' => 9,
            'business_id' => 3,
            'precio' => '9999',
            'compraMinima' => '1',
            'encabezado' => 'Buen fin',
            'descripcion' => 'Aprovecha el buen fin',
            'fecha_inicio' => '2018-20-10',
            'fecha_fin' => '2018-20-10',
            'plantilla' => '1'
        ]);
    }
}
