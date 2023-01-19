@extends('layouts.app')
@section('content')

    <title>Data</title>
    <h1 class="text-center mb-4"><strong>Data Kematian</strong></h1>

    <div class="container">
      @can('sekretaris')
        <!-- Button trigger modal -->
  <button type="button" class="btn btn-danger" style="background-color: #2b93de" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah +
  </button>
  <br><br>
  @endcan
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kematian</h1>
          <button type="button" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <div class="modal-body">
          <form action="/insertkematian" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No Akta Kematian</label>
              <input type="text" name ="no_akta_kematian"class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">NIK</label>
              <input type="text" name ="nik" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No Surat Kematian</label>
              <input type="text" name ="no_surat_kematian" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tempat Kematian</label>
              <input type="text" name ="tempatkematian" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tanggal Kematian</label>
              <input type="date" name ="tanggalkematian" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Sebab Kematian</label>
              <input type="text" name ="sebabkematian" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Lokasi Pemakaman</label>
              <input type="text" name ="lokasipemakaman" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Masukan foto Surat Kematian</label>
              <input type="file" name ="foto" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a class="btn btn-secondary" href="{{ url('/kematian') }}">Tutup</a>
        </div>
      </form>
      </div>
    </div>
  </div>

        {{-- <div class="row ">
          @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
        </div>
          @endif --}}
          @if ($message = Session::get('success'))
	          <div class="alert alert-success alert-block">
	            <button type="button" class="close" data-dismiss="alert">×</button> 
	            <strong>{{ $message }}</strong>
	          </div>
        @endif

        <div class="card">
          <div class="card-body">
              <table class="table" id="example" class="display" >
                <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Foto Akta Kematian</th>
                <th scope="col">No Akta Kematian</th>
                <th scope="col">NIK</th>
                <th scope="col">No Surat Kematian</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($data as $row)
                <tr>
                  <th scope="row">{{ $no++ }}</th>
                  <td>
                    <img src="{{ asset('fotokematian/'.$row->foto) }}" alt="" style="width: 40px;">
                  </td>
                    <td>{{ $row->no_akta_kematian }}</td>
                    <td>{{ $row->nik }}</td>
                    <td>{{ $row->no_surat_kematian }}</td>

                    <td>
                      @can('sekretaris')
                        <a href="/tampilkematian/{{ $row->nik }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                        @endcan
                        <a href="/kematian/show/{{ $row->nik }}" class="btn btn-warning"><i class="fa-solid fa-eye"></i></a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
            </div>
          </div>
        
    </div>
 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <!--js bootstrap!--->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.jss" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />

    <!--js datatables-->
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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
  </script>

  

</html>

@endsection