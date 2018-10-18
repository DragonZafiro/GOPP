<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PromosSeeder::class);
        $this->call(BoletinSeeder::class);
    }
}
