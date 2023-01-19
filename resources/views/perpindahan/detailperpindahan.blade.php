@extends('layouts.app')
@section('content')
<body>
    <div class="card mx-auto col-lg-8">
        <div class="card-body">
            <div class="text-center"><br><br>
                <h1>Detail Perpindahan</h1>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('fotoperpindahan/'.$data->foto) }}" width="400" height="220"/>
                </div>
                <div class="col-6">
                    <h3>{{ $data->no_surat_pindah}}</h3><br>
                    <p><b>NO NIK: </b>{{ $data->nik }}</p>
                    <p><b>Tanggal Pindah : </b>{{ $data->tanggal_pindah }}</p>
                    <p><b>Alamat Tujuan Pindah : </b>{{ $data->alamat_tujuan_pindah }}</p>
                    <p><b>Keterangan : </b>{{ $data->keterangan }}</p>
                    <a href="#"class="card-link" >Lihat Gambar</a>
                </div>
            </div> 
            <a class="btn btn-dark" style="float: right;" href="/perpindahan">kembali</a>
        </div>
    </body> <br><br>
    
  </html>
  
  @endsection

