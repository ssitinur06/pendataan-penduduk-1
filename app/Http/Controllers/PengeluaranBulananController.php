<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengeluaranBulanan;

class PengeluaranBulananController extends Controller
{
    public function index(){
        $pengeluaranbulanan = PengeluaranBulanan::all();
        $total = $pengeluaranbulanan->sum('nominal');
        return view('pengeluaranbulanan.pengeluaran',compact ('pengeluaranbulanan', 'total'));
    }
    public function tambahpengeluaranbulanan(Request $request){
        $pengeluaranbulanan = PengeluaranBulanan::all();
        return view('PengeluaranBulanan.tambahdata', compact('pengeluaranbulanan'));
    }

    public function insertdata(Request $request){
        PengeluaranBulanan::create($request->all());
        if($request->hasFile('bukti_pengeluaran')){
            $request->file('bukti_pengeluaran')->move('fotopengeluaranbulanan/', $request->file('fotopengeluaranbulanan')->getClientOriginalName());
            $pengeluaranbulanan->bukti_pengeluaran = $request->file('fotopengeluaranbulanan')->getClientOriginalName();
            $pengeluaranbulanan->tgl_pengeluaran = $request->tgl_pengeluaran;
            $pengeluaranbulanan->keterangan = $request->keterangan;
            $pengeluaranbulanan->nominal = $request->nominal;
            $pengeluaranbulanan->save();
        }
        return redirect('/tambahpengeluaranbulanan')->with('success', 'Data berhasil di tambahkan!');
    }

    public function filterdata(Request $request){
        $pengeluaranbulanan = PengeluaranBulanan::select("*")
        ->whereBetween('tgl_pengeluaran', [$request->start_date, $request->end_date])
        ->get();

        $total = $pengeluaranbulanan->sum('nominal');

        return view('pengeluaranbulanan.pengeluaran',compact ('pengeluaranbulanan', 'total'));
    }

}
