@extends('layouts.app')
@section('content')

<h2 class="text-center mb-4 mt-5"><strong> Data Iuran Bulanan</h2></strong>
	{{--<div class="row row-cols-1 row-cols-md-3 g-4">
		<div class="col-6 col-lg-6 col-md-6">
			<div class="card h-100">
				<div class="card-body px-3 py-4-4">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon">
								<i class="iconly-boldChart"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted font-semibold"><i class="fa-solid fa-square-poll-vertical"></i>
								Total Bulan Ini</h6>
							<h6 class="font-extrabold mb-0">
								{{ $data['thisDay'] }}
								{{-- {{ $data->count() }} --}}
							{{-- </h6>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-6 col-lg-6 col-md-6">
			<div class="card h -100">
				<div class="card-body px-3 py-4-4">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon">
								<i class="iconly-boldChart"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted font-semibold"><i class="fa-solid fa-square-poll-vertical"></i>
								Total Tahun Ini</h6>
							<h6 class="font-extrabold mb-0">
								{{ $data['thisWeek'] }}
								{{-- {{ $data->count() }} --}}
							{{-- </h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}} 

	{{-- <div class="row">
		<div class="col-6 col-lg-6 col-md-6">
			<div class="card">
				<div class="card-body px-3 py-4-4">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon">
								<i class="iconly-boldChart"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted font-semibold"><i class="fa-solid fa-square-poll-vertical"></i>
								Sudah Membayar Bulan Ini</h6>
							<h6 class="font-extrabold mb-0">
								{{ $data['thisMonth'] }}
								{{-- {{ $data->count() }} --}}
							{{-- </h6>
						</div>
					</div>
				</div>
			</div>
		</div> --}}

		{{-- <div class="col-6 col-lg-6 col-md-6">
			<div class="card">
				<div class="card-body px-3 py-4-4">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon">
								<i class="iconly-boldChart"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted "><i class="fa-solid fa-square-poll-vertical"></i>
								Belum Bayar Bulan ini</h6>
							<h6 class="font-extrabold mb-0">
								{{ $data['thisMonth'] }}
								{{-- {{ $data->count() }} --}}
							{{-- </h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<br>
	<br>  --}}
{{-- 	
	<div class="row justify-content-center ">
		<div class="col-6 col-lg-6 col-md-6">
		<div class="card px-6 py-6">
			<form action="" method="GET">
				<label for="start_date" class="pb-3 fw-bold">Filter Data dengan Rentang Tanggal :</label>
				<div class="input-group">
					<input type="date" name="start_date" class="form-control" placeholder="Pilih tanggal awal..">
					<input type="date" name="end_date" class="form-control" placeholder="Pilih tanggal akhir..">
					<button type="submit" class="btn btn-primary">Filter</button>
				</div>
			</form>
		</div>
	</div>
	</div> --}}
	

	


{{-- @push('js')
@include('iuranbulanan.iuranbulanan')
@endpush --}}



    <div class="container">
    @can ('bendahara')
        <a href="/tambahiuranbulanan" type="button" class="btn btn-danger" style="background-color: #183cc0">Tambah +</a><br><br>
        @endcan

		

        {{-- <div class="row g-3 align-items-center mt-2">
			<div class="col-auto">
			<form class="form" method="get" action="{{ route('search') }}">
			<div class="form-group w-100 mb-3">
				<input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Cari data ( NIK )">
				<button type="submit" class="btn btn-primary mb-1">Cari</button>
			</div>
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
              <table class="table" id="example" class="display">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">NIK</th>
                      <th scope="col">Nama Lengkap</th>
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
                              @can ('bendahara')
                              <a href="/tampilkaniuranbulanan/{{ $row->id }}" class="btn btn-danger"><i class="fas fa-pencil-alt"></i></a>
                              @endcan
                              <a href="/iuranbulanan/show/{{ $row->id }}" class="btn btn-warning"><i class="fa-solid fa-eye"></i></a>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
          </div>
          </div>
        </div>  
	</div> 

	<div class="modal fade" id="examplexamodal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Detail Iuran Bulanan</h5>
					<button type="button" class="btn-close  " data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="name" class="form-label">NIK</label>
								<input type="text" class="form-control" id="nik" disabled>
							</div>
						</div>
					</div>
	
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="name" class="form-label">Nama Lengkap</label>
								<input type="text" class="form-control" id="nama" disabled>
							</div>
						</div>
					</div>
	
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="amount" class="form-label">Nominal</label>
								<input type="number" class="form-control" id="nominal" disabled>
							</div>
						</div>
	
						<div class="row">
							<div class="col-md-12">
								<div class="mb-3">
									<label for="date" class="form-label">Tanggal</label>
									<input type="text" class="form-control" id="date" disabled>
								</div>
							</div>
						</div>
	
						<div class="col-md-6">
							<div class="mb-3">
								<label for="text" class="form-label">Bulan Bayar</label>
								<input type="number" class="form-control" id="bulan_bayar" disabled>
							</div>
						</div>
					</div>
	
					<div class="col-md-6">
						<div class="mb-3">
							<label for="text" class="form-label">Status</label>
							<input type="number" class="form-control" id="status_bayar" disabled>
						</div>
					</div>
				</div>
					<div class="row">
						<div class="mb-3">
							<label for="note" class="form-label">Catatan</label>
							<textarea class="form-control" id="note" rows="3" disabled></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary  " data-bs-dismiss="modal">Tutup</button>
						
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

    </script>
</html>

@endsection


{{-- @push('modal')
@include('iuranbulanan.detailiuranbulanan')
@endpush --}}