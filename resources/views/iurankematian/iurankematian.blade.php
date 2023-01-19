@extends('layouts.app')
@section('content')
<title>Pendataan Penduduk</title>
  </head>
  <body>
    <h2 class="text-center mb-4 mt-5"><strong> Data Iuran Kematian</h2></strong>
    <div class="container">
      @can ('bendahara')
        <a href="/tambahiurankematian" type="button" class="btn btn-danger"  style="background-color: #183cc0">Tambah+</a>
        @endcan
        <div class="row g-3 align-items-center mt-2">
          
          
          <div class="col-auto-right">
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
            <div class="row justify-content-center">
              <table class="table" id="iuran_kematians" class="display">
                  <thead> 
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Bulan Bayar</th>
                        <th scope="col">Tanggal Bayar</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Status</th>
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
                            <td>{{ $row->nik }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->bulan_bayar }}</td>
                            <td>{{ $row->tanggal_bayar }}</td>
                            <td>{{ $row->nominal }}</td>
                            <td>
                              @if($row->status == 1)
                              <span class="badge btn-success"> Sudah Bayar </span>
                              @else
                              <span class="badge btn-danger"> Belum Bayar </span>
                              @endif
                            </td>
                            <td>
                              @can('bendahara')
                                <a href="/tampiliurankematian/{{ $row->id }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                @endcan
                                <a href="/iurankematian/show/{{ $row->id }}" class="btn btn-warning"><i class="fa-solid fa-eye"></i></a>
                                
                                {{-- <a href="/delete/{{ $row->id }}" type="button" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nik="{{ $row->nik }}"><i class="fas fa-trash-alt"></i></a> --}}
                            </td>
                          </tr>
                        @endforeach
    
                    </tbody>
                  </table>
                  
            </div>
          </div>
          {{ $data->links() }}
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
    $('#iuran_kematians').DataTable( {
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