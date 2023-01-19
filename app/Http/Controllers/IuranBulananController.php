<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use App\Models\IuranBulanan;
use App\Models\PengeluaranBulanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class IuranBulananController extends Controller
{

    // public function dashbend(){
    //     $data = IuranBulanan::all();

    //     return view('dasbend', [
    //         'data'  => $data
    //     ]);
    // }

    public function index(Request $request){
        
        if (auth()->guest()){
            abort (403);
            
        }
        if (auth ()-> user()->level == 2){
            abort (403);
        }

        $data = IuranBulanan::paginate(15);
        $pengeluaranbulanan = PengeluaranBulanan::all();
        return view('iuranbulanan.iuranbulanan', compact('data', 'pengeluaranbulanan'));

        // $month = ['januari','februari','maret','april','mei','juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];

        // $iuranbulan = [];
        // foreach ($month as $key => $value) {
        //     $iuranbulan[] = IuranBulanan::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        // }
        
        // return view('user.index', [
        //     'users' => DB::table('users')->paginate(15)
        // ]);
    
    }

    // public function dasbend (Request $request){
    //     $data = IuranBulanan::all();
    //     return view('iuranbulanan.pemasukan', compact('data'));
    // }
    public function cetakiuranbulanan(Request $request){
        $data = IuranBulanan::all();
        $iuranbulan = IuranBulanan::select('*')
            ->whereMonth('tanggal_bayar', Carbon::now()->month)
            ->get();
        $jumlahbulan = $iuranbulan->sum('nominal');
        $iurantahun = IuranBulanan::select('*')
            ->whereYear('tanggal_bayar', Carbon::now()->year)
            ->get();
        $jumlahtahun = $iurantahun->sum('nominal');
        $jumlahiuranbulanan = $data->sum('nominal');
        return view('iuranbulanan.cetakiuranbulanan', [
            'data' => $data,
            'jumlahbulan' => $jumlahbulan,
            'jumlahtahun' => $jumlahtahun,
            'jumlahbulan' => $jumlahbulan

        
        ]);

    }
    public function PengeluaranBulanan(){
        $pengeluaranbulanan = PengeluaranBulanan::all();
        return view('pengeluaranbulanan.pengeluaran');
    }

    public function tambahiuranbulanan(){
        return view('iuranbulanan.tambahdata');
    }

    public function insertdata(Request $request){
        IuranBulanan::create($request->all());
        return redirect('/iuranbulanan')->with('success', 'Data berhasil di tambahkan!');
    }

    public function tampilkandata($id){
        $data = IuranBulanan::find($id);
        //dd($data);

        return view('iuranbulanan.tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = IuranBulanan::find($id);
        $data->update($request->all());
        return redirect(route('iuranbulanan.iuranbulanan'))->with('success', 'Data berhasil di update!');
    }

    // public function delete($id){
    //     $data = IuranBulanan::find($id);
    //     $data->delete();
    //     return redirect('iuranbulanan.iuranbulanan')->with('success', 'Data berhasil di hapus!');
    // }
    public function show($id){
        $data = IuranBulanan::find($id);
        //dd($data);
    
        return view('iuranbulanan.detailiuranbulanan', compact('data'));
    }

    // public function _invoke(){
    //     $data = IuranBulanan::upcoming()->paginate(10);
    
    //     return view('IuranBulanan.IuranBulanan', compact('data'));
    // }
   
    public function filterTanggal(Request $request) {
        $from = $request->input('start_date');
        $to = $request->input('end_date');
        $data = IuranBulanan::all();
        $iuranbulan = IuranBulanan::select('*')
            ->whereMonth('tanggal_bayar', Carbon::now()->month)
            ->get();
        $jumlahbulan = $iuranbulan->sum('nominal');
        $iurantahun = IuranBulanan::select('*')
            ->whereYear('tanggal_bayar', Carbon::now()->year)
            ->get();
        $jumlahtahun = $iurantahun->sum('nominal');
        $jumlahiuran = $data->sum('nominal');
        return view('iuranbulanan.cetakiuranbulanan', [
            'data' => IuranBulanan::whereBetween('tanggal_bayar', [$from, $to])->get(),
            'jumlahbulan' => $jumlahbulan,
            'jumlahtahun' => $jumlahtahun,
            'jumlahbulan' => $jumlahbulan
        ]);
    }


     
    public function cetaklaporan_pdf(){
        $data = IuranBulanan::all();

        $pdf = PDF::loadView('iuranbulanan.cetaklaporan', [
            'data' => $data
        ]);
        return $pdf->download('iuranbulanan.pdf');
    }

    public function cetak_surat (){
        $data = IuranBulanan::all();
        return view ('iuranbulanan.cetaklaporan', [
            'data' => $data

        ]);
    }
}