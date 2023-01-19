<?php

namespace App\Imports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;

class PendudukImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Penduduk([
            'nik' => $row[0],
            'no_kk' => $row[1], 
            'nama' => $row[2], 
            'jenis_kelamin' => $row[3],
            'tempat_lahir' => $row[4], 
            'tanggal_lahir' => $row[5], 
            'agama' => $row[6],
            'status_perkawinan' => $row[7], 
            'pekerjaan' => $row[8], 
            'status_keluarga' => $row[9],
            'kewarganegaraan' => $row[10], 
            'no_paspor' => $row[11], 
            'no_kitas_kitap' => $row[12],
            'nama_ayah' => $row[13], 
            'nama_ibu' => $row[14], 
            'fotoktp' => $row[15], 
            'fotokk' => $row[16], 
        ]);
    }
}