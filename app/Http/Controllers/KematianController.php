<?php

namespace App\Http\Controllers;
use App\Models\Kematian;
use Illuminate\Http\Request;

class KematianController extends Controller
{
    public function index(){

        $data = kematian::all();
        return view('kematian.datakematian',compact('data'));
    }


    
   public function tambahkematian(){
    return view('kematian.tambahdata');
   }

   public function insertdata(Request $request){
    //dd($request->all());
    $data = kematian::create($request->all());
    if($request ->hasFile('foto')){
        $request->file('foto')->move('fotokematian/', $request->file('foto')->getClientOriginalName());
        $data->foto =$request->file('foto')->getClientOriginalName();
        $data->save();
    }
        return redirect()->route('kematian.kematian')->with('success','Data berhasil Di Tambahkan');
}

public function tampilkandata($nik){

    $data = kematian::find($nik);
    //dd($data);
    return view('kematian.tampildata', compact('data'));
}

public function updatedata(Request $request,$nik){
    $data = kematian::find($nik);
    $data->update($request->all());
    if($request ->hasFile('foto')){
        $request->file('foto')->move('fotokematian/', $request->file('foto')->getClientOriginalName());
        $data->foto =$request->file('foto')->getClientOriginalName();
        $data->save();
    }
    return redirect()->route('kematian.kematian')->with('success','Data berhasil Di update');

}

public function show($nik){
    $data = kematian::find($nik);
    //dd($data);

    return view('kematian.detailkematian', compact('data'));
}

public function delete($nik){
    $data = kematian::find($nik);
    $data->delete();
    return redirect()->route('kematian.kematian')->with('success','Data berhasil Di Delete');
 
}
public function search(Request $request)
{
    $keyword = $request->search;
    $data = kematian::where('nik', 'like', "%" . $keyword . "%")->paginate(15);
    return view('kematian.datakematian', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
}

}