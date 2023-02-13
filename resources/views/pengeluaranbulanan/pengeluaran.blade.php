 @extends('layouts.app')
    @section('content')

        <div class="card p-4 m-4">
                <div class="row justify-content-center">
                    <div class="col-6 col-lg-6 col-md-6">
                    <div class="card px-6 py-6">
                        <div class="card-body">
                        <form action="/filterpengeluaran" method="GET">
                            <label for="start_date" class="pb-3 fw-bold" style="text-center"><strong> Filter Data dengan Rentang Tanggal :</strong></label>
                            <div class="input-group">
                                <input type="date" name="start_date" class="form-control" placeholder="Pilih tanggal awal.." style="width: 100px">
                                <input type="date" name="end_date" class="form-control" placeholder="Pilih tanggal akhir.."  style="width: 100px">
                                <button type="submit" class="mx-2 btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i>  Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div> 
          
          <br>
          <div class="container">
            @can('bendahara')
            <a href="/tambahpengeluaranbulanan" class="btn btn-success">+Tambah Data</a>
          @endcan
          <br><br>
        
          @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                  <table class="table" id="example" class="display">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tanggal Transaksi</th>
                          <th scope="col">Bukti Transaksi</th>
                          <th scope="col">Keterangan</th>
                          <th scope="col">Nominal</th>
                          <th scope="col">Pencatat</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                        $no = 1;
                        @endphp
                         @foreach ($pengeluaranbulanan as $index => $row)
                        <tr>
                        <th scope="row">{{ $no++}}</th>
                              <td>{{ $row->tgl_pengeluaran }}</td>
                              <td>{{ $row->bukti_pengeluaran }}</td>
                              <td>{{ $row->keterangan }}</td>
                              <td>{{ $row->nominal }}</td>
                              <td>{{ auth()->user()->username }}</td>
                              </td>
                              <td>
                        @endforeach
                        <tr>
                            <th></th>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                            <td>{{ $total }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                    </div>
                  </div>
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