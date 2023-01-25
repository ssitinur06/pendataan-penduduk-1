<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranBulanan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $table = "pengeluaranbulanans";

    protected $fillable = [
        'id', 'tgl_pengeluaran', 'bukti_pengeluaran', 'keterangan', 'nominal'
    ];
}
