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
        $this->call(BarangSeeder::class);
        $this->call(FasilitasSeeder::class);
        $this->call(OrmawaSeeder::class);
        $this->call(TempSeeder::class);
    }
}
