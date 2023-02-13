<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $fillable = ['id', 'tgl_trans', 'perincian', 'pemasukan', 'pengeluaran', 'nominal', 'status'];
    // protected $fillable = [
    //     'care',];
}
