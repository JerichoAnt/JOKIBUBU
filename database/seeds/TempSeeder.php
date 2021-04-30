<?php

use Illuminate\Database\Seeder;

class TempSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temps')->insert([
            'id' => 1,
            'field'=>'Filter'
        ]);
    }
}
