<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penduduks')->insert([
            'nik' =>'2200651041',
            'no_kk' =>'2200651043',
            'nama' =>'dhanisa',
            'jenis_kelamin' =>'perempuan',
            'tempat_lahir' =>'Rs.Cibabat',
            'tanggal_lahir' =>'220119',
            'agama' =>'islam',
            'status_perkawinan' =>'belum menikah',
            'pekerjaan' =>'doter spesialis anak',
            'status_keluarga' =>'Anak',
            'kewenegaraan' =>'Wna',
            'no_paspor' =>'B-009-88',
            'no_kitas-kitap' =>'9990',
            'nama_ayah' =>'Usep kurniadi',
            'nama_ibu' =>'Wiwi Wiantika',
            'no_akta_kelahiran' =>'99677',
            
        ]);
    }
}
