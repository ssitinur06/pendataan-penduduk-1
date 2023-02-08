<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\IuranKematian;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;

class IuranKematianController extends Controller
{


    public function iurankematian(Request $request){
        if (auth()->guest()){
            abort (403);
            
        }
        if (auth ()-> user()->level == 2 ){
            abort (403);
        }
                $data = IuranKematian::paginate(15);
                return view('iurankematian.iurankematian', compact('data'));
            }


    
    public function tambahiurankematian(){
        return view('iurankematian.tambahdata');
    }

    public function insertdata(Request $request){
        IuranKematian::create($request->all());
        return redirect()->route('iurankematian.iurankematian')->with('success', 'Data berhasil di tambahkan!');
    }

    public function tampilkandata($id){
        $data = IuranKematian::find($id);
        // dd($data);

        return view('iurankematian.tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = IuranKematian::find($id);
        $data->update($request->all());
        return redirect(route('iurankematian.iurankematian'))->with('success', 'Data berhasil di update!');
    }

    // public function delete($id){
    //     $data = IuranKematian::find($id);
    //     $data->delete();
    //     return redirect()->route('iurankematian.iurankematian')->with('success', 'Data berhasil di hapus!');
    // }

    public function show($id){
        $data = IuranKematian::find($id);
        //dd($data);
    
        return view('iurankematian.detailiurankematian', compact('data'));
    }

    public function cetakiurankematian(Request $request){
        $data = IuranKematian::all();
        $iurankematian = IuranKematian::select('*')
            ->whereMonth('tanggal_bayar', Carbon::now()->month)
            ->get();
        $jumlahkematian = $iurankematian->sum('nominal');
        $iurantahun = IuranKematian::select('*')
            ->whereYear('tanggal_bayar', Carbon::now()->year)
            ->get();
        $jumlahtahun = $iurantahun->sum('nominal');
        $jumlahkematian = $data->sum('nominal');
        return view('iurankematian.cetakiurankematian', [
            'data' => $data,
            'jumlahkematian' => $jumlahkematian,
            'jumlahtahun' => $jumlahtahun,
            'jumlahkematian' => $jumlahkematian,
            'jumlahkematian' => $jumlahkematian,
            
        ]);

    }

    public function filterTanggal(Request $request) {
        $from = $request->input('start_date');
        $to = $request->input('end_date');
        $data = IuranKematian::all();
        $iurankematian = IuranKematian::select('*')
            ->whereMonth('tanggal_bayar', Carbon::now()->month)
            ->get();
        $jumlahkematian = $iurankematian->sum('nominal');
        $iurantahun = IuranKematian::select('*')
            ->whereYear('tanggal_bayar', Carbon::now()->year)
            ->get();
        $jumlahtahun = $iurantahun->sum('nominal');
        $jumlahkematian = $data->sum('nominal');
        return view('iurankematian.cetakiurankematian', [
            'data' => $data,
            'jumlahkematian' => $jumlahkematian,
            'jumlahtahun' => $jumlahtahun,
            'jumlahkematian' => $jumlahkematian
        ]);

        return view('iurankematian.cetakiurankematian', [
            'data' => IuranKematian::whereBetween('tanggal_bayar', [$from, $to])->get()
        ]);
    }

    public function cetaklaporanpdf(){
        $data = IuranKematian::all();
        $totalcetakkematian = $data->sum('nominal');
        

        $pdf = PDF::loadView('iurankematian.cetaklaporan', [
            'data' => $data,
            'totalcetakkematian' => $totalcetakkematian,
        ]);
        
        return $pdf->download('iurankematian.pdf');
    }

    

}