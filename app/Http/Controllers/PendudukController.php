<?php

namespace App\Http\Controllers;
use App\Models\Kematian;
use App\Models\penduduk;
use App\Models\kelahiran;
use App\Models\Perpindahan;
use App\Models\IuranBulanan;
use Illuminate\Http\Request;
use App\Imports\PendudukImport;
use App\Models\PengeluaranBulanan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Session\Session;

class PendudukController extends Controller
{

  
    public function indexDashboard(){
        // if (auth()->guest()){
        //     abort (403);
            
        // }
        // if (auth ()-> user()->level == 3){
        //     abort (403);
        // }
        // $data = Penduduk::all();
        $jan = IuranBulanan::whereYear('tanggal_bayar', date('Y'))
                ->where('bulan_bayar', 'Januari')
                ->get()
                ->sum('nominal');
        $feb = IuranBulanan::whereYear('tanggal_bayar', date('Y'))
                ->where('bulan_bayar', 'Februari')
                ->get()
                ->sum('nominal');
        $mar = IuranBulanan::whereYear('tanggal_bayar', date('Y'))
                ->where('bulan_bayar', 'Maret')
                ->get()
                ->sum('nominal');
        $apr = IuranBulanan::whereYear('tanggal_bayar', date('Y'))
                ->where('bulan_bayar', 'April')
                ->get()
                ->sum('nominal');
        $may = IuranBulanan::whereYear('tanggal_bayar', date('Y'))
                ->where('bulan_bayar', 'Juni')
                ->get()
                ->sum('nominal');

        $jun = IuranBulanan::whereYear('tanggal_bayar', date('Y'))
                ->where('bulan_bayar', 'Juni')
                ->get()
                ->sum('nominal');
                
        $jul = IuranBulanan::whereYear('tanggal_bayar', date('Y'))
                ->where('bulan_bayar', 'Juli')
                ->get()
                ->sum('nominal');

        $agst = IuranBulanan::whereYear('tanggal_bayar', date('Y'))
                ->where('bulan_bayar', 'Agustus')
                ->get()
                ->sum('nominal');

        $sep = IuranBulanan::whereYear('tanggal_bayar', date('Y'))
                ->where('bulan_bayar', 'September')
                ->get()
                ->sum('nominal');

        $oct = IuranBulanan::whereYear('tanggal_bayar', date('Y'))
                ->where('bulan_bayar', 'Oktober')
                ->get()
                ->sum('nominal');

        $nov = IuranBulanan::whereYear('tanggal_bayar', date('Y'))
                ->where('bulan_bayar', 'November')
                ->get()
                ->sum('nominal');

        $dec = IuranBulanan::whereYear('tanggal_bayar', date('Y'))
                ->where('bulan_bayar', 'Desember')
                ->get()
                ->sum('nominal');

        
        $statistik = [$jan, $feb, $mar, $apr, $may, $jun, $jul, $agst, $sep, $oct, $nov, $dec];
        $total = PengeluaranBulanan::whereYear('tgl_pengeluaran', date('Y'))->sum('nominal');
        $jmlh_penduduk = Penduduk::all()->count();
        $jmlh_pindah = Perpindahan::all()->count();
        $jmlh_lahir = Kelahiran::all()->count();
        $jmlh_kematian = Kematian::all()->count();
        return view('dashboard',compact('jmlh_penduduk',  'jmlh_pindah', 'jmlh_lahir', 'jmlh_kematian', 'statistik', 'total'));

    }

        
        
    
    
    public function index(){
      $data = penduduk::all();
    
      return view('penduduk.datapenduduk',compact('data'));
  }

    public function tambahpenduduk(Request $request){
        $data = Penduduk::all();
        $kelahiran = kelahiran::all();
        return view('penduduk.tambahdatapenduduk', compact('data', 'kelahiran'));
    }

    public function insertdata(Request $request){
        $data = Penduduk::create($request->all());
        if($request->hasFile('fotoktp')){
            $request->file('fotoktp')->move('fotoktppenduduk/', $request->file('fotoktp')->getClientOriginalName());
            $data->fotoktp = $request->file('fotoktp')->getClientOriginalName();
            $data->save();
        }
        if($request->hasFile('fotokk')){
            $request->file('fotokk')->move('fotokkpenduduk/', $request->file('fotokk')->getClientOriginalName());
            $data->fotokk = $request->file('fotokk')->getClientOriginalName();
            $data->save();
        }
        return redirect(route('penduduk.penduduk'))->with('success', 'Data berhasil di tambahkan!');
    }

    public function updatedata(Request $request, $id){
        $data = penduduk::find($id);
        $data->update($request->all());
        if($request->hasFile('fotoktp')){
            $request->file('fotoktp')->move('fotoktppenduduk/', $request->file('fotoktp')->getClientOriginalName());
            $data->fotoktp = $request->file('fotoktp')->getClientOriginalName();
            $data->save();
        }
        if($request->hasFile('fotokk')){
            $request->file('fotokk')->move('fotokkpenduduk/', $request->file('fotokk')->getClientOriginalName());
            $data->fotokk = $request->file('fotokk')->getClientOriginalName();
            $data->save();
        }
        
        // return redirect()->route('penduduk.penduduk')->with('success', 'Data berhasil di update!');
        return redirect(route('penduduk.penduduk'))->with('success', 'Data berhasil di update!');
    }


public function tampilkandata($id){
    $data = penduduk::find($id);
    // dd($data);

    return view('penduduk.tampildatapenduduk', compact('data'));
}

public function show($id){
    $data = penduduk::find($id);
    //dd($data);

    return view('penduduk.detailpenduduk', compact('data'));
}





// public function delete($id){
//     $data = penduduk::find($id);
//     $data->delete();
//     return redirect()->route('penduduk.penduduk')->with('success', 'Data berhasil di hapus!');
// }

// public function delete($id)
// {
//     $data =penduduk::where('id',$id)->first();

//     if ($data != null) {
//         $data->delete();
//         return redirect()->route('penduduk.penduduk')->with(['message'=> 'Successfully deleted!!']);
//     }

//     return redirect()->route('penduduk.penduduk')->with(['message'=> 'Wrong ID!!']);
// } 

public function search(Request $request)
{
    $keyword = $request->search;
    $data = penduduk::where('nik', 'like', "%" . $keyword . "%")->paginate(15);
    return view('penduduk.datapenduduk', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
}
public function import_excel(Request $request) 
{
    // validasi
    $this->validate($request, [
        'file' => 'required|mimes:csv,xls,xlsx'
    ]);

    // menangkap file excel
    $file = $request->file('file');

    // membuat nama file unik
    $nama_file = rand().$file->getClientOriginalName();

    // upload ke folder file_siswa di dalam folder public
    $file->move('file_penduduk',$nama_file);

    // import data
    Excel::import(new pendudukImport, public_path('/file_penduduk/'.$nama_file));
    // notifikasi dengan session
   /*  Session::flash('sukses','Data Penduduk Berhasil Diimport!'); */
    // alihkan halaman kembali
    return redirect(route('penduduk.penduduk'))->with('success', 'Import Telah Berhasil!');
    
}
public function daftarpindah(Request $request, $nik){
    $pindah = Perpindahan::where('nik', $nik)->first();
    return view('daftarpindah.tambahdaftar', compact('pindah'));
}

}

