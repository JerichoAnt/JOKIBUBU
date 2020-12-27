<?php

use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fasilitas')->insert([
            'id' => 1,
            'nama_fasilitas'=>'LapanganBasket'
        ]);
        DB::table('fasilitas')->insert([
            'id' => 2,
            'nama_fasilitas'=>'LapanganFutsal'
        ]);
        DB::table('fasilitas')->insert([
            'id' => 3,
            'nama_fasilitas'=>'LapanganVoli'
        ]);
    }
}
