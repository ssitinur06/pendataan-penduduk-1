@extends('layouts.app')
@section('content')

    <h1 class="text-center mb-4">FORM EDIT PENDUDUK</h1>
    

<div class="container">
    <div class="row justify-content-center">
     <div class="col-8">
      <div class="card">
        <div class="card-body">
          <form action="/updatependuduk{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">NIK</label>
              <input type="text" name ="nik" value="{{ $data->nik }}" class="form-control" id="exampleInputEmail1"disabled>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No KK</label>
              <input type="text" name ="no_kk" class="form-control" value="{{ $data->no_kk }}" id="exampleInputEmail1"disabled>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama</label>
              <input type="text" name ="nama" class="form-control" value="{{ $data->nama }}" id="exampleInputEmail1">
            </div>
            <div class="form-group">
              <label for="filter">Jenis Kelamin</label>
              <select class="form-control" name="jenis_kelamin">
                <option selected>{{ $data->jenis_kelamin }}</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
              <input type="text" name ="tempat_lahir" class="form-control" value="{{ $data->tempat_lahir }}" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
              <input type="date" name ="tanggal_lahir" class="form-control" value="{{ $data->tanggal_lahir }}" id="exampleInputEmail1">
            </div>
            <div class="form-group">
              <label for="filter"> Agama</label>
              <select class="form-control" name="agama">
                 <option selected>{{ $data->agama }}</option>
                 <option value="Islam">Islam</option>
               <option value="Kristen Protestan">Kristen Protestan</option>
               <option value="Kristen Katolik">Kristen Katolik</option>
               <option value="Hindu">Hindu</option>
               <option value="Buddha">Buddha</option>
               <option value="Konghucu">Konghucu</option>
               <option value="Lainnya">Lainnya</option>
               </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Status Perkawinan</label>
              <input type="text" name ="status_perkawinan" class="form-control" value="{{ $data->status_perkawinan }}"  id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
              <input type="text" name ="pekerjaan" class="form-control" value="{{ $data->pekerjaan }}"  id="exampleInputEmail1">
            </div>

            <div class="form-group">
              <label for="filter">Status Keluarga</label>
              <select class="form-control">
                <option value="0" selected>Pilih Status Keluarga</option>
                <option value="Kepala Keluarga">Kepala Keluarga</option>
                <option value="Istri">Istri</option>
                <option value="Anak">Anak</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>

            <div class="form-group">
              <label for="filter">Kewarganegaraan</label>
              <select class="form-control" name="kewarganegaraan">
                <option value="0" selected>{{ $data->kewarganegaraan }}</option>
                <option value="WNI">WNI</option>
                <option value="WNA">WNA</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No Paspor</label>
              <input type="text" name ="no_paspor" class="form-control" value="{{ $data->no_paspor }}"  id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No Kitas/Kitap</label>
              <input type="text" name ="no_Kitas_kitap" class="form-control" value="{{ $data->no_Kitas_kitap }}"  id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Ayah</label>
              <input type="text" name ="nama_ayah" class="form-control" value="{{ $data->nama_ayah }}" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Ibu</label>
              <input type="text" name ="nama_ibu" class="form-control" value="{{ $data->nama_ibu}}" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Gambar KTP</label>
              <input type="file" name ="fotoktp" class="form-control" value="{{ $data->fotoktp}}" id="exampleInputEmail1">
              <img src="{{ asset('/fotoktppenduduk').'/'.$data->fotoktp}}" style="width:200px; height:90px;"alt="">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Gambar KK</label>
              <input type="file" name ="fotokk" class="form-control" value="{{ $data->fotokk}}" id="exampleInputEmail1">
              <img src="{{ asset('/fotokkpenduduk').'/'.$data->fotokk}}" style="width:200px; height:90px;"alt=""> 
            </div>
              
            <button type="submit" class="btn btn-primary">Ubah Data</button>
            <a class="btn btn-secondary" href="{{ url('/penduduk') }}">Kembali</a>
          </form>
        </div>
      </div>
     </div>
     
              
               
            </tbody>
          </table>
    </div>
</div>
 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>

@endsection