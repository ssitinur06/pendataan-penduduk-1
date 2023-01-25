<?php

namespace App\Http\Controllers;
use App\Models\Kematian;
use App\Models\penduduk;
use App\Models\kelahiran;
use App\Models\Perpindahan;
use Illuminate\Http\Request;
use App\Imports\PendudukImport;
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
        $jmlh_penduduk = Penduduk::all()->count();
        $jmlh_pindah = Perpindahan::all()->count();
        $jmlh_lahir = Kelahiran::all()->count();
        $jmlh_kematian = Kematian::all()->count();
        return view('dashboard',compact('jmlh_penduduk',  'jmlh_pindah', 'jmlh_lahir', 'jmlh_kematian'));

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
    return redirect('/penduduk')->with("Data Berhasil di Import", "success");;
 
    
}
public function daftarpindah(Request $request, $nik){
    $pindah = Perpindahan::where('nik', $nik)->first();
    return view('daftarpindah.tambahdaftar', compact('pindah'));
}

}

