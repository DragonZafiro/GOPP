<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas

        User::create([
            'name'=>'administrador',
            'last_name'=>'apellidos',
            'nick'=>'root',
            'password'=>bcrypt('123'),
            'email'=>'admin',
            'fecha_nac'=>'1996-01-17',
            'frase' => 'mi frase',
            'direccion_num' => 'MZ14',
            'direccion_calle' => 'Calle azul',
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => '54332',
            'direccion_estado' => 'Estado de México',
            'pais' => 'México',
            'puntos' => '153',
            'admin' => true,
        ]);

        User::create([
            'name'=>'Usuario',
            'last_name'=>'apellidos',
            'nick'=>'user',
            'password'=>bcrypt('123'),
            'email'=>'usuario',
            'fecha_nac'=>'1996-01-17',
            'frase' => 'mi frase',
            'direccion_num' => 'MZ14',
            'direccion_calle' => 'Calle azul',
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => '54332',
            'direccion_estado' => 'Estado de México',
            'pais' => 'México',
            'puntos' => '65',
            'usuario' => true,
        ]);

        User::create([
            'name'=>'Afiliador',
            'last_name'=>'apellidos',
            'nick'=>'afiliate',
            'password'=>bcrypt('123'),
            'email'=>'afiliador',
            'fecha_nac'=>'1996-01-17',
            'frase' => 'mi frase',
            'direccion_num' => 'MZ14',
            'direccion_calle' => 'Calle azul',
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => '54332',
            'direccion_estado' => 'Estado de México',
            'pais' => 'México',
            'puntos' => '100',
            'afiliador' => true,
        ]);

        DB::table('users')->insert([
            'name'=>'Repartidor',
            'last_name'=>'apellidos',
            'nick'=>'deliver',
            'password'=>bcrypt('123'),
            'email'=>'repartidor',
            'fecha_nac'=>'1996-01-17',
            'frase' => 'mi frase',
            'direccion_num' => 'MZ14',
            'direccion_calle' => 'Calle azul',
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => '54332',
            'direccion_estado' => 'Estado de México',
            'pais' => 'México',
            'puntos' => '15',
            'repartidor' => true,
        ]);

        DB::table('users')->insert([
            'name'=>'Empresa',
            'last_name'=>'apellidos',
            'nick'=>'business',
            'password'=>bcrypt('123'),
            'email'=>'empresa',
            'fecha_nac'=>'1996-01-17',
            'frase' => 'mi frase',
            'direccion_num' => 'MZ14',
            'direccion_calle' => 'Calle azul',
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => '54332',
            'direccion_estado' => 'Estado de México',
            'pais' => 'México',
            'puntos' => '2',
            'empresa' => true,
        ]);

        DB::table('users')->insert([
            'name'=>'Otra Empresa',
            'last_name'=>'apellidos',
            'nick'=>'business2',
            'password'=>bcrypt('123'),
            'email'=>'empresa2',
            'fecha_nac'=>'1996-01-17',
            'frase' => 'mi frase',
            'direccion_num' => 'MZ14',
            'direccion_calle' => 'Calle azul',
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => '54332',
            'direccion_estado' => 'Estado de México',
            'pais' => 'México',
            'puntos' => '104',
            'empresa' => true,
        ]);

        DB::table('users')->insert([
            'name'=>'Usuario Repartidor',
            'last_name'=>'apellidos',
            'nick'=>'usuario_repartidor',
            'password'=>bcrypt('123'),
            'email'=>'usuario_deliver',
            'fecha_nac'=>'1996-01-17',
            'frase' => 'mi frase',
            'direccion_num' => 'MZ14',
            'direccion_calle' => 'Calle azul',
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => '54332',
            'direccion_estado' => 'Estado de México',
            'pais' => 'México',
            'puntos' => '89',
            'usuario' => true,
            'repartidor' => true,
        ]);
    }
}
