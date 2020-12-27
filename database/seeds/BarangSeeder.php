<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            'id' => 1,
            'nama_barang'=>'Kursi'
        ]);
        DB::table('barangs')->insert([
            'id' => 2,
            'nama_barang'=>'Meja'
        ]);
        DB::table('barangs')->insert([
            'id' => 3,
            'nama_barang'=>'Papan'
        ]);
    }
}
