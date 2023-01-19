@extends('layouts.app')
@section ('content')

<title>Pendataan Penduduk</title>
    <h1 class="text-center mb-4">Pengajuan Surat Pengantar Disetujui</h1>
        <div class="row justify-content-md-center">
          <div class="container">
            <a href="/tambahdisetujui" type="button" class="btn btn-danger" style="background-color: #2b93de">Tambah +</a><br>
            <br>
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
              </div>
          </div>
            @endif
            <div class="card">
              <div class="card-body">
                <table class= "table "id="example" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Tanggal Buat</th>
                    <th scope="col">Status</th>
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
                        <td>{{ $row->keterangan}}</td>
                        <td>{{ $row->tanggal_buat }}</td>
                        
                        <td>
                          {{-- <a href="/tampilsuratpengantar/{{ $row->id }}" class="btn btn-info">Edit</a> --}}
                          <a href="/historydisetujui/{{ $row->id }}" class="btn btn-secondary">Disetujui</i></a>
                          <a href="/historyditolak/{{ $row->id }}" class="btn btn-danger">Ditolak</i></a>
                          <a href="/tampilkansuratpengantar/{{ $row->id }}" class="btn btn-primary"><i class="fa-solid fa-print"></i> cetak</i></a>
                          {{-- <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nik="{{ $row->nik }}">Tidak terima</a> --}}
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

{{-- <script>

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
    </script> --}}
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