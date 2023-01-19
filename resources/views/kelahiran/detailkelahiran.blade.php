@extends('layouts.app')
@section('content')
<body>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-8 text-center"><br><br>
                    <h1>Detail Data Kelahiran</h1>
                </div>
                <div class="col-2">
                </div>
            </div>
            
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('fotokelahiran/'.$data->fotokelahiran) }}" width="400" height="220"/>
                </div>
                <div class="col-6">
                    <h3>{{ $data->no_nik}}</h3><br>
                    <p><b>No KK: </b>{{ $data->no_kk }}</p>
                    <p><b>No nik: </b>{{ $data->nik }}</p>
                    <p><b>Akta Kelahiran : </b>{{ $data->no_akta_kelahiran }}</p>
                </div>
            </div> 
    </body> <br><br>
    <a class="btn btn-dark" style="align-items:justify-center" href="/kelahiran">kembali</a>
  </html>
  
  @endsection

