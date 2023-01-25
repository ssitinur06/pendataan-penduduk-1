@extends('layouts.app')
@section('content')
    
    <h2 class="text-center mb-4">Tambah Pengeluaran bulanan</h2>
          <div class="container">
            <div class="row justify-content-center">
            <div class="col-8">
              <div class="card">
                <div class="card-body">

                  
                      <form action="/insertpengeluranbulanan" method="GET" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Tanggal Pengeluaran</label>
                              <input type="date" name="tgl_pengeluaran" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Pengeluaran">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Bukti Pengeluaran</label>
                                <input type="file" name ="bukti_pengeluaran" class="form-control">
                              </div>
                              <div class="mb-3">
                                <label for="note" class="form-label">Keterangan</label>
                                <textarea name="keterangan"class="form-control" id="text" rows="3" ></textarea>
                              </div>
                
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Nominal</label>
                              <input type="text" name="nominal" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a class="btn btn-secondary" href="{{ url('/pengeluaranbulanan') }}">Kembali</a>

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