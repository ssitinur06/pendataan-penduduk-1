<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengeluaranBulanan;

class PengeluaranBulananController extends Controller
{
    public function index(){
        $pengeluaranbulanan = PengeluaranBulanan::all();
        return view('pengeluaranbulanan.pengeluaran');
    }

}
