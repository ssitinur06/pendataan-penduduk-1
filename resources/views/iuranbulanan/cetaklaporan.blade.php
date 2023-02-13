
      <!DOCTYPE html>
      <html>
      <head>
        <title>Laporan Iuran RT 06</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      </head>
      <body>
        <style type="text/css">
          table tr td,
          table tr th{
            font-size: 9pt;
          }
        </style>
        <center>
          <h1>Laporan Iuran RT 06</h1>
          <h4> Cibereum Cimahi Selatan Kota Cimahi</h4>
        </center>

 
              <table class='table table-bordered'>
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

    
        