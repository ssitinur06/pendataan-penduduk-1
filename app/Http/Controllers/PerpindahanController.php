<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Perpindahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerpindahanController extends Controller
{
    public function index(Request $request){
/*         if($request->has('search')){
            $data = perpindahan::where('nik','LIKE','%' .$request->search.'%')->paginate(15);
        }else{
            $data = perpindahan::paginate(15);
        }
 */
        $data = Perpindahan::paginate(15);
        $perpindahan = Perpindahan::all();
        

        return view('perpindahan.perpindahan', compact('data', 'perpindahan'));
        
    }

    public function tambahperpindahan($id){
        $data = Penduduk::find($id);
        return view('perpindahan.tambahdata', compact('data'));
    }

    public function insertdata(Request $request){
        $data = Perpindahan::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoperpindahan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect(route('perpindahan.perpindahan'))->with('success', 'Data berhasil di tambahkan!');
    }

    public function tampilkandata($nik){
        $data = Perpindahan::find($nik);
        //dd($data);

        return view('perpindahan.tampildata', compact('data'));
    }

    public function updatedata(Request $request, $nik){
        $data = Perpindahan::find($nik);
        $data->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoperpindahan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect(route('perpindahan.perpindahan'))->with('success', 'Data berhasil di update!');
    }

    
public function show($nik){
    $data = perpindahan::find($nik);
    //dd($data);

    return view('perpindahan.detailperpindahan', compact('data'));
}

    // public function delete($nik){
    //     $data = Perpindahan::find($nik);
    //     $data->delete();
    //     return redirect('/perpindahan')->with('success', 'Data berhasil di hapus!');
    // }
    public function delete($nik)
    {
        $data =perpindahan::where('nik',$nik)->first();
    
        if ($data != null) {
            $data->delete();
            return redirect()->route('perpindahan.perpindahan')->with(['message'=> 'Successfully deleted!!']);
        }
    
        return redirect()->route('perpindahan.perpindahan')->with(['message'=> 'Wrong nik!!']);
    } 


    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = Perpindahan::where('nik', 'like', "%" . $keyword . "%")->paginate(15);
        return view('perpindahan.dataperpindahan', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

}