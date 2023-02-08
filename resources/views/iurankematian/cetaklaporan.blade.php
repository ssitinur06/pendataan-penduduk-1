<div class= "card">
  <div class="card-body">

      <center>
          <h5>Laporan Iuran Kematian</h5>
      </center>
      <div class="row justify-content-center">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
          </div>
        @endif
        <table border="1" cellspacing="0" cellpadding="0" class="table" id="example" class="display">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Tanggal Bayar</th>
                <th scope="col">Nominal</th>
                <th scope="col">Pencatat</th>
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
              @endphp
              @foreach ($data as $index => $row)
              <tr>
              <th scope="row">{{ $no++}}</th>
                    <td>{{ $row->nik }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->tanggal_bayar }}</td>
                    <td>{{ $row->nominal }}</td>
                    <td>{{ auth()->user()->username }}</td>
                     
                    </td>
                    <td>

              @endforeach
              <tr>
                  <th></th>
                  <th>Total</th>
                  <td></td>
                  <td></td>
                  <td>{{ $totalcetakkematian}}</td>
              </tr>
          </tbody>
      </table>
      </div>

      </div>
       