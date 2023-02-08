@extends('layouts.app')
@section('content')
    <title>Pendataan Penduduk</title>
    <h1 class="text-center mb-4">Tambah Data Perpindahan</h1>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card body">
                        <div class="container mt-4">
                            <form action="/insertperpindahan" method="post" enctype="multipart/form-data">
                                @csrf 
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">No Surat Pindah</label>
                                  <input type="text" name="no_surat_pindah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">No KK</label>
                                  <input type="text" name="no_kk" class="form-control" id="exampleInputEmail1" value="{{ $data->no_kk}}" disabled>
                                  <input type="hidden" name="no_kk" class="form-control" id="exampleInputEmail1" value="{{ $data->no_kk}}" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">NIK</label>
                                  <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nik }}" disabled>
                                  <input type="hidden" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nik }}">
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Tanggal Pindah</label>
                                  <input type="date" name="tanggal_pindah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Alamat Tujuan Pindah</label>
                                  <input type="text" name="alamat_tujuan_pindah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                
                                  <div class="mb-3">
                                    <label for="note" class="form-label">Catatan</label>
                                    <textarea name="keterangan"class="form-control" id="text" rows="3" required ></textarea>
                                  </div>
                    
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Masukkan Foto Surat Pindah</label>
                                  <input type="file" name="foto" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                              {{-- <button type="button" class="badge badge-pill badge-secondary" data-bs-dismiss="modal">Tutup</button>
                              <button type="submit" class="badge badge-pill badge-primary">Simpan</button> --}}
                              <button type="submit" class="btn btn-primary">Simpan</button>
                              <a class="btn btn-secondary" href="{{ url('/penduduk') }}">Tutup</a>
                            </div>
                          </form>
                        </div>
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