@extends('layouts.app')
@section ('content')

<title>Data</title>
</head>
<body>
  
        <h1 class="text-center mb-4"><strong>Pengajuan Surat Pengantar</strong></h1>
        <div class="row align-items-center mt-2"> 
          <div class="mx-5">
            @can('sekretaris')
            {{-- <a href="/historysuratpengantar" type="button" class="btn btn-primary " style="float: left"><i class="fa-solid fa-clock-rotate-left"></i> History</a> --}}
            <a href="/tambahsuratpengantar" type="button" class="btn btn-success ml-3" style="float: left">Tambah +</a><br>
            @endcan
            <br>
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
              </div>
            @endif
            <div class="card">
              <div class="card-body">
                <table class="table" id="surat_pengantars">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Status Perkawinan</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $index)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $index->nik }}</td>
                        <td>{{ $index->nama }}</td>
                        <td>{{ $index->tempat_lahir }}</td>
                        <td>{{ $index->tanggal_lahir }}</td>
                        <td>{{ $index->jenis_kelamin }}</td>
                        <td>{{ $index->agama }}</td>
                        <td>{{ $index->status_perkawinan }}</td>
                        <td>{{ $index->pekerjaan }}</td>
                        <td>{{ $index->alamat }}</td>
                        <td>{{ $index->keterangan}}</td>
                        <td>
                          @if($index->status_srt === null )
                            <span class="badge badge-pill badge-secondary">diproses</span>
                          @else
                            @if ($index->status_srt === 'disetujui')
                            <span class="badge badge-pill badge-success">{{ $index->status_srt }}</span>
                            @else
                            <span class="badge badge-pill badge-danger">{{ $index->status_srt }}</span>
                            @endif
                          @endif   
                        </td>   
                        <td>
                          @can('ketuart')
                          {{-- <a href="/tampilsuratpengantar/{{ $index->id }}" class="btn btn-info">Edit</a> --}}
                          <a href="/disetujui/{{ $index->id }}" class="badge btn-success">Setuju</i></a>
                          <a href="/ditolak/{{ $index->id }}" class="badge btn-danger">Tolak</i></a>
                          @endcan
                          @can('sekretaris')
                          <a href="{{ route('suratpengantar.cetak_pdf') }}" class="btn btn-secondary"><i class="fa-sharp fa-solid fa-print"></i> Cetak</i></a>
                          @endcan
                          
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
    $('.table').DataTable( {
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
  <script>
    $('.cetak_pdf').click (function){
      swal("Are you sure you want to do this?", {
    buttons: ["Oh noez!", true],
  })
    }
  </script>
  </script>
 

</html>
@endsection