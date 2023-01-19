<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KematianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kematians')->insert([
            'no_akta_kematian' =>'251/p/3657',
            'nik' =>'5256478',
            'no_surat_kematian' =>'251/et/887',
            'tempatkematian' =>'Rs.Cibabat',
            'sebab kematian' =>'Sakit',
            'lokasi pemakaman' =>'Bandung',
            
        ]);
    }
}
