<?php

namespace App\Http\Controllers;
use App\Models\kelahiran;
use Illuminate\Http\Request;

class KelahiranController extends Controller
{
    public function index(){

        $data = kelahiran::all();
        return view('kelahiran.datakelahiran',compact('data'));
    }


    
   public function tambahkelahiran(){
    return view('kelahiran.tambahdata');
   }

   public function insertdata(Request $request){
    //dd($request->all());
    $data = kelahiran::create($request->all());
    if($request ->hasFile('foto_aktakelahiran')){
        $request->file('foto_aktakelahiran')->move('fotokelahiran/', $request->file('foto_aktakelahiran')->getClientOriginalName());
        $data->foto_aktakelahiran=$request->file('foto_aktakelahiran')->getClientOriginalName();
        $data->save();
    }
        return redirect()->route('kelahiran.kelahiran')->with('success','Data berhasil Di Tambahkan');
}

public function tampilkandata($nik){

    $data = kelahiran::find($nik);
    
    return view('kelahiran.tampildata', compact('data'));
}

public function updatedata(Request $request, $nik){
    $data = kelahiran::find($nik);
    $data->update($request->all());
    if($request ->hasFile('foto_aktakelahiran')){
        $request->file('foto_aktakelahiran')->move('fotokelahiran/', $request->file('foto_aktakelahiran')->getClientOriginalName());
        $data->foto_aktakelahiran =$request->file('foto_aktakelahiran')->getClientOriginalName();
        $data->save();
    }
    return redirect()->route('kelahiran.kelahiran')->with('success','Data berhasil Di update');

}
public function show($nik){
    $data = kelahiran::find($nik);
    //dd($data)

    return view('kelahiran.detailkelahiran', compact('data'));
}

public function delete($nik){
    $data = kelahiran::find($nik);
    $data->delete();
    return redirect()->route('kelahiran.kelahiran')->with('success','Data berhasil Di Delete');
 
}
public function search(Request $request)
{
    $keyword = $request->search;
    $data = kelahiran::where('nik', 'like', "%" . $keyword . "%")->paginate(15);
    return view('kelahiran.datakelahiran', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
}

public function daftar(Request $request, $nik){
    $kelahiran = kelahiran::where('nik', $nik)->first();
    return view('daftarkelahiran.tambahdaftar', compact('kelahiran'));
}
}
