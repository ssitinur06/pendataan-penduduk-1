<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IuranBulanan extends Model
{
    use HasFactory;

    protected $fillable = ['id_iuran_bulanan', 'nik', 'nama', 'bulan_bayar', 'tanggal_bayar', 'nominal', 'status'];
    // protected $fillable = [
    //     'care',];
}
