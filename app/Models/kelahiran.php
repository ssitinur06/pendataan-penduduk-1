<?php

namespace App\Models;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kelahiran extends Model
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