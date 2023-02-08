@extends('layouts.app')
@section('content')
    <title>Pendataan Penduduk</title>
    <h1 class="text-center mb-4">Tambah Pengajuan Surat Pengantar</h1>

    <div class="container">
      <div class="row justify-content-center">
       <div class="col-8">
        <div class="card">
          <div class="card-body">
                        <form action="/insertsuratpengantar" method="post" enctype="multipart/form-data">
                          @csrf
                          {{-- <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Id</label>
                            <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div> --}}
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                          </div>
                          <div class="form-group">
                            <label for="filter">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" required>
                              <option value="Laki-laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="filter">Agama</label>
                            <select class="form-control" name="agama" required>
                               <option selected>Pilih</option>
                               <option value="Islam">Islam</option>
                               <option value="Kristen Protestan">Kristen Protestan</option>
                               <option value="Kristen Katolik">Kristen Katolik</option>
                               <option value="Hindu">Hindu</option>
                               <option value="Buddha">Buddha</option>
                               <option value="Konghucu">Konghucu</option>
                               <option value="Lainnya">Lainnya</option>
                               </select>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Status Perkawinan</label>
                            <input type="text" name="status_perkawinan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Keperluan</label>
                            <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                          </div>
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          <a class="btn btn-secondary" href="{{ url('/suratpengantar') }}">Kembali</a>
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