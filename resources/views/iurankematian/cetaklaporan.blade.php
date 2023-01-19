<div class= "card">
    <div class="card-body">
        <center>
            <h3>LAPORAN KEUANGAN IURAN KEMATIAN RT 06 RW 05 RANCABENTANG </h3>
            <h5>BULAN JANUARI -  </h5>
        </center>
        <div class="row justify-content-center">
          @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
          @endif
          <table class="table" id="example" class="display">
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
            </tbody>
        </table>
        </div>

        </div>

    
        