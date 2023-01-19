<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpindahan extends Model
{
    use HasFactory;

    protected $primaryKey = 'nik';

    protected $guarded = [];

    public function penduduk (){
        return $this->belongsTPoMany(Penduduk::class);
    }
}
