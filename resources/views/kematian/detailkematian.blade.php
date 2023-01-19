@extends('layouts.app')
@section('content')
<body>
    <div class="card mx-auto col-lg-8">
        <div class="card-body">
            <div class="text-center"><br><br>
                <h1>Detail Data Kematian</h1>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('fotokematian/'.$data->foto) }}" width="400" height="220"/>
                </div>
                <div class="col-6">
                    <h3>{{ $data->no_akta_kematian}}</h3><br>
                    <p><b>NIK: </b>{{ $data->nik }}</p>
                    <p><b>No Surat Kematian : </b>{{ $data->no_surat_kematian }}</p>
                    <p><b>Tempat Kematian: </b>{{ $data->tempatkematian }}</p>
                    <p><b>Tanggal Kematian : </b>{{ $data->tanggalkematian }}</p>
                    <p><b>Sebab Kematian : </b>{{ $data->sebabkematian }}</p>
                    <p><b>Lokasi Pemakaman : </b>{{ $data->lokasipemakaman}}</p>
                    <a href="#" class="card-link">Lihat Gambar</a>
                </div>
            </div> 
    </body> <br><br>
    <a class="btn btn-dark" style="float:right" href="/kematian">kembali</a>
  </html>
  
  @endsection

