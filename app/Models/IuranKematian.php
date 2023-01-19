<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IuranKematian extends Model
{
    use HasFactory;

    protected $fillable = ['id' ,'id_iuran_kematian', 'nik', 'nama', 'bulan_bayar', 'tanggal_bayar', 'nominal', 'status'];
    // protected $fillable = [
    //     'care',];
}
