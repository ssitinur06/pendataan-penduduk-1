<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengeluaranBulanan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengeluaranbulanans')->insert([
            'id' =>'1',
            'tgl_trans' =>'2023-01-18',
            'bukti_trans' =>'',
            'keterangan' =>'membeli pelaratan',
            'nominal' =>'Sakit'
            
        ]);
    }
}
