@extends('layouts.app')
@section('content')
<body>
    <div class="card mx-auto col-lg-8">
        <div class="card-body">
            <div class="text-center"><br><br>
                <h1>Detail Penduduk</h1>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('fotoktppenduduk/'.$data->fotoktp) }}" width="400" height="220"/><br><br>
                    <img src="{{ asset('fotokkpenduduk/'.$data->fotokk) }}" width="400" height="220"/><br><br>

                </div>
                <div class="col-6">
                    <h3>{{ $data->nik }}</h3><br>
                    <p><b>NO KK: </b>{{ $data->no_kk }}</p>
                    <p><b>Nama : </b>{{ $data->nama }}</p>
                    <p><b>Jenis Kelamin : </b>{{ $data->jenis_kelamin }}</p>
                    <p><b>Tempat, tanggal lahir : </b>{{ $data->tempat_lahir }}, {{ $data->tanggal_lahir }}</p>
                    <p><b>Agama : </b>{{ $data->agama }}</p>
                    <p><b>status perwakinan : </b>{{ $data->status_perkawinan }}</p>
                    <p><b>Pekerjaan : </b>{{ $data->pekerjaan}}</p>
                    <p><b>status keluarga : </b>{{ $data->status_keluarga }}</p>
                    <p><b>kewarganegaraan : </b>{{ $data->kewarganegaraan }}</p>
                    <p><b>No kitas kitap : </b>{{ $data->no_kitas_kitap }}</p>
                    <p><b>Nama Ayah : </b>{{ $data->nama_ayah }}</p>
                    <p><b>Nama Ibu : </b>{{ $data->nama_ibu}}</p>
                    <p><b>Gambar ktp: </b>{{ $data->fotoktp}}</p>
                    <p><b>Gambar KK : </b>{{ $data->fotokk}}</p>
                    
                </div>
            </div> 
            <a class="btn btn-dark" style="float:right" href="/penduduk">kembali</a>
        </div>
    </body> <br><br>
    
  </html>
  
  @endsection

