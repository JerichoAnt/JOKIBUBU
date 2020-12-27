<?php

use Illuminate\Database\Seeder;

class OrmawaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ormawas')->insert([
            'id' => 1,
            'nama_ormawa'=>'UKKK'
        ]);
        DB::table('ormawas')->insert([
            'id' => 2,
            'nama_ormawa'=>'UKKI'
        ]);
        DB::table('ormawas')->insert([
            'id' => 3,
            'nama_ormawa'=>'UKKP'
        ]);
    }
}
