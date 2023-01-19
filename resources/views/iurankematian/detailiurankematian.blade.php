@extends('layouts.app')
@section('content')
<body>
    <div class="card mx-auto col-lg-6">
        <div class="card-body">
            <div class="text-center"><br><br>
                <h1>Detail Iuran Kematian</h1>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h3>{{ $data->id_iuran_kematian}}</h3><br>
                    <p><b>Pencatat: </b><td>{{ auth()->user()->username }}</td></p>
                    <p><b>NIK: </b>{{ $data->nik }}</p>
                    <p><b>Nama Lengkap : </b>{{ $data->nama}}</p>
                    <p><b>Bulan Bayar: </b>{{ $data->bulan_bayar }}</p>
                    <p><b>Tanggal Bayar : </b>{{ $data->tanggal_bayar }}</p>
                    <p><b>Nominal : </b>{{ $data->nominal }}</p>
                    <p><b>Status : </b>
                    @if($data->status == 1)
                    <span class="badge btn-success"> Sudah Bayar </p>
                    @else
                    <span class="badge btn-danger"> Belum Bayar </p>
                    @endif
                    <p><b>Created : </b>{{ $data->created_at}}</p>
                    <p><b>Updated : </b>{{ $data->updated_at}}</p>
                    
                </div>
            </div> 
            <a class="btn btn-dark" style="float:right" href="/iurankematian">Tutup</a>
        </div>
    </body> <br><br>
    
  </html>
  
  @endsection

