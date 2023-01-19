<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelahiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelahirans')->insert([
            'no_kk' =>'324711111',
            'nik' =>'325906478',
            'no_akta_kelahiran' =>'Artisan2123',
            
        ]);
    }
}
