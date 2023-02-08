@extends('layouts.app')
@section('content')
    <title>Data</title>
  </head>
  <body>
    <h1 class="text-center mb-4"><strong>Data Penduduk</strong></h1>
    <div class="mx-5">
      <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" style="background-color: rgb(4, 63, 130)" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class="fa-solid fa-file-import"></i> Import Excel
    </button>
    <button type="button" class="btn btn-primary" style="background-color:blueviolet" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class="fa-solid fa-file-import"></i> Export Excel
    </button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/penduduk/import_excel" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Import</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="file" name="file" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Import</button>
      </div>
    </div>
  </form>
  </div>
</div>  

    @can('sekretaris')
    <a href="/tambahpenduduk" class="btn btn-success">+Tambah Data</a>
    @endcan
    <br><br>
    <div class="row g-3 align-items-center mt-2">
      <div class="col-auto">
    {{-- <form class="form" method="get" action="{{ route('search') }}">
      <div class="form-group w-100 mb-3">
          <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Cari data ( NIK )">
          <button type="submit" class="btn btn-primary mb-1">Cari</button>
      </div>
  </form> --}}
      </div>
    </div>

    @if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
		  		<button type="button" class="close" data-dismiss="alert">×</button> 
		  		<strong>{{ $message }}</strong>
		</div>
  		@endif
    
      <div class="card">
        <div class="card-body">
          <table class="table text-center" id="penduduks"  class="display" >
            <thead>
              <tr>
                <th scope="col">No</th>
                {{-- <th scope="col"></th> --}}
                <th scope="col">NIK</th>
                <th scope="col">No KK</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tempat Lahir</th>
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
                    <td>{{ $row->nik }}</td>
                    <td>{{ $row->no_kk }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->jenis_kelamin}}</td>
                    <td>{{ $row->tempat_lahir }}</td>
                    <td>
                      @can('sekretaris')
                        <a title="Edit Penduduk" href="/tampilkanpenduduk/{{ $row->id }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                        <a title="Tambah Penduduk Pindah " href="/tambahperpindahan/{{ $row->id }}" class="btn btn-warning" style="background-color: blueviolet"><i class="fa-sharp fa-solid fa-house-user"></i></a>
                        <a title="Tambahkan Status Kematian" href="/tambahkematian/{{ $row->id }}" class="btn btn-danger" ><i class="fa-solid fa-skull"></i></a>
                      @endcan
                        {{-- <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nik="{{ $row->nik }}"><i class="fas fa-trash-alt"></i></a> @endcan --}}
                        <a title="Show Detail Penduduk" href="/penduduk/show/{{ $row->id }}" class="btn btn-dark"><i class="fa-solid fa-user"></i></i></a> 
                     
                    </td>
                    
                    </td>
                  </tr>
                @endforeach  
            </tbody>
          </table>
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
    $('#penduduks').DataTable( {
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