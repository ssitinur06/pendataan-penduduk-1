@extends('layouts.app')
@section('content')
    
    <h1 class="text-center mb-4">Tambah Data Iuran bulanan</h1>
          <div class="container">
            <div class="row justify-content-center">
            <div class="col-8">
              <div class="card">
                <div class="card-body">

                  
                      <form action="/insertiuranbulanan" method="GET" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">NIK</label>
                              <input type="text" name="nik" class="form-control" id="exampleInputEmail1" placeholder="NIK">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                              <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="nama">
                            </div>
                            <div class="form-group">
                              <label for="filter">Bulan Bayar</label>
                              <select class="form-control">
                                 <option selected>Januari</option>
                                 <option value="1">Februari</option>
                                 <option value="2">Maret</option>
                                 <option value="3">April</option>
                                 <option value="4">Mei</option>
                                 <option value="5">Juni</option>
                                 <option value="6">Juli</option>
                                 <option value="7">Agustus</option>
                                 <option value="8">September</option>
                                 <option value="9">Oktober</option>
                                 <option value="10">November</option>
                                 <option value="11">Desember</option>
                                 </select>
                            </div>
                            {{-- <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Nominal</label>
                              <input type="text" name="nominal" class="form-control" id="exampleInputEmail1" placeholder="10000">
                            </div> --}}
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label>
                              <input type="date" name="tanggal_bayar" class="form-control" id="exampleInputEmail1" placeholder="tanggal">
                            </div>
                            {{-- <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Waktu Bayar</label>
                              <input type="time" name="waktu_bayar" class="form-control" id="exampleInputEmail1" placeholder="Waktu Bayar">
                            </div> --}}
                            <div class="form-group">
                              <label for="filter">Nominal</label>
                              <select class="form-control">
                                <option value="1">10000</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Status</label>
                              <input type="text" name="status" class="form-control" id="exampleInputEmail1" placeholder="1 (sudah) 0(belum)">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a class="btn btn-secondary" href="{{ url('/iuranbulanan') }}">Kembali</a>

                          </form>
                    </div>
                   </div>
            </div>
        </div>
    </div>

   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

@endsection