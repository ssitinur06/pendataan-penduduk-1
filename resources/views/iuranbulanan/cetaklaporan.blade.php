<div class= "card">
    <div class="card-body">
        <center>
            <h3>LAPORAN KEUANGAN IURAN BULANAN RT 06 RW 05 RANCABENTANG </h3>
        </center>
        <div class="row justify-content-center">
          @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
          @endif
          <table border="1" cellspasing="0" cellpadding="1" class="table" id="example" class="display">
            <thead>
              <thead>
                <tr>
                  <th scope="col">No</th>
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
                  <td>{{ $totalcetakbulanan}}</td>
                </tr>
            </tbody>
        </table>
        </div>

        </div>

    
        