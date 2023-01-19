<?php

namespace App\Http\Controllers;

use pagination;
use Illuminate\Http\Request;
use App\Models\SuratPengantar;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class SuratPengantarController extends Controller
{
    public function index(Request $request){
        $data = DB::table('surat_pengantars')->simplePaginate(5);
        // $data = SuratPengantar::paginate(15);
        return view('suratpengantar.datasuratpengantar', compact('data'));

    }
    
     public function historisuratpengantar(){
        $history = SuratPengantar::all();
        return view('suratpengantar.historisuratpengantar', compact('history'));

    }
    //  public function cetak(Request $request, $data){
    //     $data = SuratPengantar::where('data', $data) ->get();
    //     $pdf = PDF::loadview('cetak_surat', ['data' => $data]);
    //     return $pdf-> stream ('cetak_surat.pdf');
    // }

    // public function cetak_surat()
    // {

    //     $data = SuratPengantar::all();
    //     $pdf   = S::loadview('suratpengantar.cetak_surat', ['suratpengantar' => $data]);
    //     return $pdf->download('cetak_surat.pdf');
    // }
    
    public function cetak_pdf(){
        $data = SuratPengantar::all();

        $pdf = PDF::loadView('suratpengantar.cetak_surat', [
            'data' => $data
        ]);
        return $pdf->download('suratpengantar.pdf');
    }

    // public function cetak_surat (){
    //     $data = SuratPengantar::all();
    //     return view ('suratpengantar.cetak_surat', [
    //         'data' => $data

    //     ]);

    public function cetak_surat($id){
        $data = SuratPengantar::find($id);
        //dd($data);
    
        return view('suratpengantar.cetak_surat', compact('data'));
    }

    
    

    public function tambahsuratpengantar(){
        return view('suratpengantar.tambahsuratpengantar');
    }

    
    public function insertsuratpengantar(Request $request){
        SuratPengantar::create($request->all());
        return redirect()->route('suratpengantar.datasuratpengantar')->with('success', 'Data berhasil di tambahkan!');
    }

    public function tampilkandata($id){
        $data = SuratPengantar::find($id);
        //dd($data);

        return view('suratpengantar.tampilsuratpengantar', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = SuratPengantar::find($id);
        $data->update($request->all());
        return redirect(route('suratpengantar.suratpengantar'))->with('success', 'Data berhasil di update!');
    }

    public function delete($id){
        $data = SuratPengantar::find($id);
        $data->delete();
        return redirect('suratpengantar.suratpengantar')->with('success', 'Data berhasil di hapus!');
    }
    // public function show($id){
    //     $data = SuratPengantar::find($id);
    //     //dd($data);
    
    //     return view('suratpengantar.detailsuratpengantar', compact('data'));
    // }

    public function disetujui($id)
    {
        $data = SuratPengantar::find($id);
        $data->update(['status_srt' => 'disetujui']);
        // return redirect()->back();
        return redirect()->route('suratpengantar.datasuratpengantar')->with('success', 'Data berhasil di konfirmasi!');
    }

    public function ditolak($id)
    {
        $data = SuratPengantar::find($id);
        $data->update(['status_srt' => 'ditolak']);
       return redirect()->back();
    }
    
    // public function ditolak($id)
    // {
    //     $sql="UPDATE surat_pengantars SET status_srt='ditolak' WHERE id=$id";
    //     $this->db->query($sql);
    //     $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">  Data Telah Ditolak<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    //     redirect(site_url('suratpengantar.datasuratpengantar'));
    // }

    // public function disetujui($id){
    //     $data = SuratPengantar::find($id);
    //     $data->update($request->all());
    //     return redirect(route('suratpengantar.disetujui'))->with('success', 'Data berhasil di Setujui!');

    // }
    public function tampildisetujui(){
        // $data = SuratPengantar::find($id);
        return view('suratpengantar.tampildisetujui');
        
    }

    
}
