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
            'nick'=>'admin',
            'password'=>bcrypt('123'),
            'email'=>'admin@gopp.com',
            'fecha_nac'=>'1996-01-17',
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
            'nick'=>'usuario',
            'password'=>bcrypt('123'),
            'email'=>'usuario@gopp.com',
            'fecha_nac'=>'1996-01-17',
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
            'nick'=>'afiliador',
            'password'=>bcrypt('123'),
            'email'=>'afiliador@gopp.com',
            'fecha_nac'=>'1996-01-17',
            'direccion_num' => 'MZ14',
            'direccion_calle' => 'Calle azul',
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => '54332',
            'direccion_estado' => 'Estado de México',
            'pais' => 'México',
            'puntos' => '100',
            'afiliador' => true,
        ]);

        User::create([
            'name'=>'Repartidor',
            'last_name'=>'apellidos',
            'nick'=>'repartidor',
            'password'=>bcrypt('123'),
            'email'=>'repartidor@gopp.com',
            'fecha_nac'=>'1996-01-17',
            'direccion_num' => 'MZ14',
            'direccion_calle' => 'Calle azul',
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => '54332',
            'direccion_estado' => 'Estado de México',
            'pais' => 'México',
            'puntos' => '15',
            'usuario' => true,
            'repartidor' => true,
        ]);

        User::create([
            'name'=>'Empresa',
            'last_name'=>'apellidos',
            'nick'=>'empresa',
            'password'=>bcrypt('123'),
            'email'=>'empresa@gopp.com',
            'fecha_nac'=>'1996-01-17',
            'direccion_num' => 'MZ14',
            'direccion_calle' => 'Calle azul',
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => '54332',
            'direccion_estado' => 'Estado de México',
            'pais' => 'México',
            'puntos' => '2',
            'usuario' => true,
            'empresa' => true,
        ]);

        User::create([
            'name'=>'Otra Empresa',
            'last_name'=>'apellidos',
            'nick'=>'empresa2',
            'password'=>bcrypt('123'),
            'email'=>'empresa2@gopp.com',
            'fecha_nac'=>'1996-01-17',
            'direccion_num' => 'MZ14',
            'direccion_calle' => 'Calle azul',
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => '54332',
            'direccion_estado' => 'Estado de México',
            'pais' => 'México',
            'puntos' => '104',
            'usuario' => true,
            'empresa' => true,
        ]);

        User::create([
            'name'=>'Usuario Repartidor',
            'last_name'=>'apellidos',
            'nick'=>'repartidor2',
            'password'=>bcrypt('123'),
            'email'=>'repartidor2@gopp.com',
            'fecha_nac'=>'1996-01-17',
            'direccion_num' => 'MZ14',
            'direccion_calle' => 'Calle azul',
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => '54332',
            'direccion_estado' => 'Estado de México',
            'pais' => 'México',
            'puntos' => '89',
            'usuario' => true,
            'repartidor' => true,
            'empresa' => true,
        ]);
    }
}
