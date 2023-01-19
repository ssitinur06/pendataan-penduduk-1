@extends('layouts.app')
@section ('content')

<title>Pendataan Penduduk</title>
    <h1 class="text-center mb-4"><strong>Data Perpindahan</strong></h1>

    
    
    <div class="container">
      @can('sekretaris')
        <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger" style="background-color: #2b93de" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Tambah +
      </button>
    @endcan
    <br><br>


  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Perpindahan</h4>
          <button type="button" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        
        <div class="modal-body">
          <form action="/insertperpindahan" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No Surat Pindah</label>
              <input type="text" name="no_surat_pindah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No KK</label>
              <select class="form-control" name="no_kk">
                @foreach ($perpindahan as $item)
                    @if (old('no_kk') == $item->no_kk)
                    <option value="{{ $item->no_kk }}" selected>{{ $item->no_kk }}</option>
                    @else
                    <option value="{{ $item->no_kk }}">{{ $item->no_kk }}</option>
                    @endif
                @endforeach
                </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tanggal Pindah</label>
              <input type="date" name="tanggal_pindah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Alamat Tujuan Pindah</label>
              <input type="text" name="alamat_tujuan_pindah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            
              <div class="mb-3">
                <label for="note" class="form-label">Catatan</label>
                <textarea name="keterangan"class="form-control" id="text" rows="3" ></textarea>
              </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Masukkan Foto Surat Pindah</label>
              <input type="file" name="foto" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="badge badge-pill badge-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="badge badge-pill badge-primary">Simpan</button> --}}
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a class="btn btn-secondary" href="{{ url('/perpindahan') }}">Tutup</a>
        </div>
      </form>
      </div>
    </div>
  </div>

        {{-- <div class="row g-3 align-items-center mt-2">
          <div class="col-auto">
        {{-- <form class="form" method="get" action="{{ route('search') }}" >
          <div class="form-group w-100 mb-3">
              <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Cari data ( NIK )">
              <button type="submit" class="btn btn-primary mb-1">Cari</button>
          </div>
      </form> --}}
          {{-- </div>
        </div> --}}

{{--         <div class="row g-3 align-items-center mt-2">
          <div class="col-auto">
            <form action="/perpindahan" method="GET">
            <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
            </form>
          </div>
        </div> --}}
        @if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
		  		<button type="button" class="close" data-dismiss="alert">×</button> 
		  		<strong>{{ $message }}</strong>
		</div>
  		@endif
        
      <div class="card">
        <div class="card-body">
                  <table class="table" id="example">
                      <thead>
                        <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">No Surat Pindah</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Tanggal Pindah</th>
                    <th scope="col">Alamat Tujuan Pindah</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                    <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>
                          <img src="{{ asset('fotoperpindahan/'.$row->foto) }}" alt="" style="width: 40px;">
                        </td>
                        <td>{{ $row->no_surat_pindah }}</td>
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->tanggal_pindah }}</td>
                        <td>{{ $row->alamat_tujuan_pindah }}</td>
                        <td>
                          @can('sekretaris')
                          <a href="/tampilkanperpindahan/{{ $row->nik }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                          {{-- <a href="perpindahan/{nik}{{ $row->nik }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a> --}}
                          @endcan
                          <a href="/perpindahan/show/{{ $row->nik }}" class="btn btn-warning"><i class="fa-solid fa-eye"></i></a>

                        </td>
                      </tr>
                    @endforeach

                </tbody>
              </table>
              {{ $data->links() }}
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

  <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value="A"></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
  
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
  
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
  } );
  v
  </script>

<script>

    $('.delete').click(function(){
      var pendudukid = $(this).attr('data-id');
      var nik = $(this).attr('data-nik');

      swal({
  title: "Yakin ?",
  text: "Kamu akan menghapus data penduduk dengan nik "+nik+" ",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location = "/penduduk/delete/"+pendudukid+""
    swal("Data berhasil di hapus", {
      icon: "success",
    });
  } else {
    swal("Data tidak jadi di hapus");
  }
});
    });
    
    </script>

	
</html>
@endsection
  {{-- <script>

    $('.delete').click(function(){
      var perpindahanid = $(this).attr('data-id');
      var nik = $(this).attr('data-nik');

      swal({
  title: "Yakin ?",
  text: "Kamu akan menghapus data perpindahan dengan nik "+nik+" ",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location = "/perpindahan/delete/"+perpindahanid+""
    swal("Data berhasil di hapus", {
      icon: "success",
    });
  } else {
    swal("Data tidak jadi di hapus");
  }
});
    });

    

    </script> --}}
{{-- </html>

@endsection --}}