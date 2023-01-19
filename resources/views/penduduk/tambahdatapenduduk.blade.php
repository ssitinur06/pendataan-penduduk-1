@extends('layouts.app')
@section('content')
<h1 class="text-center mb-4">TAMBAH DATA PENDUDUK</h1>
<div class="container">
  <div class="row justify-content-center">
   <div class="col-8">
    <div class="card">
      <div class="card-body">
        <form action="/insertpenduduk" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NIK</label>
            <input type="text" name ="nik" class="form-control" id="exampleInputEmail1">
          </div>  
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">No KK</label>
            <input type="text" name ="no_kk" class="form-control" id="exampleInputEmail1">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" name ="nama" class="form-control" id="exampleInputEmail1">
          </div>
          <div class="form-group">
            <label for="filter">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin">
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
            <input type="text" name ="tempat_lahir" class="form-control" id="exampleInputEmail1">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
            <input type="date" name ="tanggal_lahir" class="form-control" id="exampleInputEmail1">
          </div>
          <div class="form-group">
            <label for="filter">Agama</label>
            <select class="form-control" name="agama">
               <option selected>Pilih</option>
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
            <input type="text" name ="status_perkawinan" class="form-control" id="exampleInputEmail1">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
            <input type="text" name ="pekerjaan" class="form-control" id="exampleInputEmail1">
          </div>
          <div class="form-group">
            <label for="filter">Status Keluarga</label>
            <select class="form-control" name="status_keluarga">
                <option value="0" selected>Pilih Status Keluarga</option>
                <option value="Kepala Keluarga">Kepala Keluarga</option>
                <option value="Istri">Istri</option>
                <option value="Anak">Anak</option>
                <option value="Lainnya">Lainnya</option>
            </select>
          </div>     
            </select>
            <div class="form-group">
              <label for="filter">Kewarganegaraan</label>
              <select class="form-control" name="kewarganegaraan">
                <option value="WNI">WNI</option>
                <option value="WNA">WNA</option>
              </select>
            </div>
      
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No paspor</label>
              <input type="text" name ="no_paspor" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No Kitas/Kitap</label>
              <input type="text" name ="no_Kitas_kitap" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Ayah</label>
              <input type="text" name ="nama_ayah" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Ibu</label>
              <input type="text" name ="nama_ibu" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Foto KTP</label>
              <input type="file" name ="fotoktp" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Foto Kartu Keluarga</label>
              <input type="file" name ="fotokk" class="form-control">
              <br>
          </div>
          

        
            <button type="submit" class="btn btn-pill badge-primary"style="font-size: 15px;">
              &nbsp;Simpan Data</button>
          <a class="btn btn-pill badge-secondary" href="{{ url('/penduduk') }}" style="font-size: 15px;">&nbsp;Kembali</a>
        </form>
          </div>

            
          </div>
          
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