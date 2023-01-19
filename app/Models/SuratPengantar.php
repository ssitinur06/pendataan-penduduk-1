<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPengantar extends Model
{
    protected $table = 'surat_pengantars';
    use HasFactory;

protected $fillable = ['id', 'nik', 'nama','tempat_lahir','tgl_lahir', 'jenis_kelamin', 'agama', 'status_perkawinan' ,'keterangan', 'pekerjaan', 'alamat', 'keterangan', 'status_srt'];
protected $hidden;
}
