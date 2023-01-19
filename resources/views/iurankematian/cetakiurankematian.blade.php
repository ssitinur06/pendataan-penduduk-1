<!DOCTYPE html>
<html>
<head>
	<title>Iuran Bulanan</title><br>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 12pt;
		}
	</style>
    @extends('layouts.app')
    @section('content')
        <h2 class="text-center mb-4 mt-5"><strong>Laporan Iuran kematian</h2></strong>
        <div class="row d-flex justify-content-center">
    
            <div class="col-lg-4 col-md-3 m-2">
                <div class="card h-100">
                    <div class="card-body px-3 py-4">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center px-5">
                                    <i class="fa-solid fa-square-poll-vertical" style="font-size: 50px"></i>
                                    <div class="col ml-3">
                                        <h6>Total Iuran Kematian Ini</h6>
                                        <h5 class= "font-weight-bold">Rp. {{ $jumlahkematian }}</h5>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-4 col-md-3 m-2">
                <div class="card h-100">
                    <div class="card-body px-3 py-4">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center px-5">
                                <i class="fa-solid fa-square-poll-vertical" style="font-size: 50px"></i>
                                    <div class="col ml-3">
                                        <h6>Total Tahun Ini</h6>
                                        <h5 class="font-weight-bold">Rp. {{ $jumlahtahun }}</h5>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-3 m-2">
                <div class="card h-100">
                    <div class="card-body px-3 py-4">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center px-5">
                                <i class="fa-solid fa-square-poll-vertical" style="font-size: 50px"></i>
                                    <div class="col ml-3">
                                        <h6>Sudah Membayar Bulan Ini</h6>
                                        <h5 class="font-weight-bold"> {{$data->count()}}</h5>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            
            <div class="col-lg-4 col-md-3 m-2">
                <div class="card h-100">
                    <div class="card-body px-3 py-4">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center px-5">
                                <i class="fa-solid fa-square-poll-vertical" style="font-size: 50px"></i>
                                    <div class="col ml-3">
                                        <h6>Belum Membayar Bulan Ini</h6>
                                        <h5 class="font-weight-bold"></h5>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <br>
        <br>
    
        <div class="card p-4 m-4">
                <div class="row justify-content-center">
                    <div class="col-6 col-lg-6 col-md-6">
                    <div class="card px-6 py-6">
                        <div class="card-body">
                        <form action="/cetakiurankematian" method="GET">
                            <label for="start_date" class="pb-3 fw-bold" style="text-center"><strong> Filter Data dengan Rentang Tanggal :</strong></label>
                            <div class="input-group">
                                <input type="date" name="start_date" class="form-control" placeholder="Pilih tanggal awal.." style="width: 100px">
                                <input type="date" name="end_date" class="form-control" placeholder="Pilih tanggal akhir.."  style="width: 100px">
                                <button type="submit" class="mx-2 btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i>  Filter</button>
                                <a href="{{ route('iurankematian.cetaklaporanpdf') }}" class="btn btn-secondary" style="float:right"><i class="fa-sharp fa-solid fa-print"></i> Cetak</i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div> 
          
          <br>
        
          <div class= "card">
            <div class="card-body">
    
                <center>
                    <h5>Laporan Iuran Kematian</h5>
                </center>
                <div class="row justify-content-center">
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success" role="alert">
                      {{ $message }}
                    </div>
                  @endif
                  <table class="table" id="example" class="display">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">NIK</th>
                          <th scope="col">Nama Lengkap</th>
                          <th scope="col">Tanggal Bayar</th>
                          <th scope="col">Nominal</th>
                          <th scope="col">Pencatat</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data as $index => $row)
                        <tr>
                        <th scope="row">{{ $no++}}</th>
                              <td>{{ $row->nik }}</td>
                              <td>{{ $row->nama }}</td>
                              <td>{{ $row->tanggal_bayar }}</td>
                              <td>{{ $row->nominal }}</td>
                              <td>{{ auth()->user()->username }}</td>
                               
                              </td>
                              <td>
        
                        @endforeach
                        <tr>
                            <th></th>
                            <th>Total</th>
                            <td></td>
                            <td></td>
                            <td>{{ $jumlahkematian }}</td>
                        </tr>
                    </tbody>
                </table>
                </div>
    
                </div>
                
    
        <!-- Optional JavaScript; choose one of the two! -->
    
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
      </body>
    
    </html>
   
    @endsection