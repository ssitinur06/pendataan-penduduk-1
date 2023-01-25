<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengeluaranBulanan;

class PengeluaranBulananController extends Controller
{
    public function index(){
        $pengeluaranbulanan = PengeluaranBulanan::all();
        return view('pengeluaranbulanan.pengeluaran',compact ('pengeluaranbulanan'));
    }
    public function tambahpengeluaranbulanan(Request $request){
        $pengeluaranbulanan = PengeluaranBulanan::all();
        return view('PengeluaranBulanan.tambahdata', compact('pengeluaranbulanan'));
    }

    public function insertdata(Request $request){
        PengeluaranBulanan::create($request->all());
        if($request->hasFile('bukti_pengeluaran')){
            $request->file('bukti_pengeluaran')->move('fotopengeluaranbulanan/', $request->file('fotopengeluaranbulanan')->getClientOriginalName());
            $pengeluaranbulanan->fotopengeluaranbulanan = $request->file('fotopengeluaranbulanan')->getClientOriginalName();
            $pengeluaranbulanan->save();
        }
        return redirect('/tambahpengeluaranbulanan')->with('success', 'Data berhasil di tambahkan!');
    }

}
