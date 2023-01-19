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
        DB::table('perpindahans')->insert([
            'no_surat_pindah' => '102/0004/TR/I/2021',
            'nik' => '2009876543212345',
            'tanggal_pindah' => '2022-09-09',
            'alamat_tujuan_pindah' => 'Bandung',
            'keterangan' => 'Membuat KTP',
        ]);
    }
}
