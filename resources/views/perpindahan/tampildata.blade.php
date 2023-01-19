@extends('layouts.app')
@section('content')
    <title>Pendataan Penduduk</title>
    <h2 class="text-center mb-4">Edit Data Perpindahan</h2>

      <div class="container">
        <div class="row justify-content-center">
         <div class="col-8">
          <div class="card">
            <div class="card-body">
                        <form action="/updateperpindahan/{{ $data->nik }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">No Surat Pindah</label>
                              <input type="text" name="no_surat_pindah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->no_surat_pindah }}">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">NIK</label>
                              <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nik }}">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Tanggal Pindah</label>
                              <input type="date" name="tanggal_pindah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->tanggal_pindah }}">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Alamat Tujuan Pindah</label>
                              <input type="text" name="alamat_tujuan_pindah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->alamat_tujuan_pindah }}">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                              <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->keterangan }}">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Masukan Foto Surat Perpindahan</label>
                              <input type="file" name ="foto" class="form-control">
                              <img src="{{ asset('/fotoperpindahan').'/'.$data->foto}}" style="width:200px; height:90px;"alt=""> 
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                            <a class="btn btn-secondary" href="{{ url('/perpindahan') }}">Kembali</a>
                          </form>
                    </div>
                   </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--fontawesome!--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

@endsection