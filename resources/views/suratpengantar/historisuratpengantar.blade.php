@extends('layouts.app')
@section ('content')

<title>Data</title>
</head>
<body>
    <br>
    
	<center>
		<h4>History Surat Pengantar</h4>
	</center>
    <br>

    
    <div class="card">
        <div class="card-body">
            <table class="table" id="example">
                
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
                      </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($history as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nik }}</td>
                          <td>{{ $row->nama }}</td>
                          <td>{{ $row->tempat_lahir }}</td>
                          <td>{{ $row->tgl_lahir }}</td>
                          <td>{{ $row->jenis_kelamin }}</td>
                          <td>{{ $row->agama }}</td>
                          <td>{{ $row->status_perkawinan }}</td>
                          <td>{{ $row->pekerjaan }}</td>
                          <td>{{ $row->alamat }}</td>
                          <td>{{ $row->keterangan}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/suratpengantar" class="btn btn-secondary" style="float: left " >Kembali ke Daftar</a>


            
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
  </script>
  <script>
    $('.cetak_pdf').click (function){
      swal("Are you sure you want to do this?", {
    buttons: ["Oh noez!", true],
  })
    }
  </script>
    </div>

  
</html>
@endsection

</html>
