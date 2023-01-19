<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IuranBulananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iuran_bulanans')->insert([
            'id_iuran_bulanan' => 'B1',
            'nik' => '2009876543212345',
            'bulan_bayar' => 'Januari',
            'tanggal_bayar' => '2022-09-09',
            'nominal' => '10000',
            'status' => '1'
        ]);
    }
}
