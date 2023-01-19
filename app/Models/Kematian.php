<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;


    protected $guarded = [];
    protected $primaryKey = 'nik';
    // protected $fillable = ['id' ,'no_kk', 'nik', 'no_akta_kelahiran',];
    // // protected $fillable = [
    // //     'care',];

    public function penduduk (){
        return $this->hasOne(Penduduk::class);
    }
  
}