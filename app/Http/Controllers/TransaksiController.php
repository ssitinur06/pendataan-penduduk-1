<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\TransaksiController;
use App\Models\IuranBulanan;
use App\Models\PengeluaranBulanan;

class TransaksiController extends Controller
{
     public function index(Request $request){
        // $transaksi = Transaksi::all();
        // $data = IuranBulanan::paginate(15);
        // $pengeluaranbulanan = PengeluaranBulanan::all();
        // $totaliuranbulanan = $data->sum('nominal');
        // return view('iuranbulanan.iuranbulanan', [
        //     'data' => $data,
        //     'pengeluaranbulanan' => $pengeluaranbulanan,
        //     'totaliuranbulanan' => $totaliuranbulanan,
        //     'transaksi' => $transaksi,
        $pengeluaranbulanan = PengeluaranBulanan::all();
        $total = $pengeluaranbulanan->sum('nominal');
        
        return view('pengeluaranbulanan.pengeluaran',compact ('pengeluaranbulanan', 'total'));
    }
}
