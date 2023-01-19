@extends('layouts.app')
@section('content')

    <title>Data</title>
    <h1 class="text-center mb-4">Edit Data Kematian</h1>

    <div class="container">
      <div class="row justify-content-center">
       <div class="col-8">
        <div class="card">
          <div class="card-body">
            <form action="/updatekematian/{{ $data->nik }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No Akta Kematian</label>
                <input type="text" name ="no_akta_kematian"class="form-control" id="exampleInputEmail1" value="{{ $data->no_akta_kematian }}" disabled>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NIK</label>
                <input type="text" name ="nik" class="form-control" id="exampleInputEmail1" value="{{ $data->nik }}" disabled>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No Surat Kematian</label>
                <input type="text" name ="no_surat_kematian" class="form-control" id="exampleInputEmail1" value="{{ $data->no_surat_kematian }}"  disabled >
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tempat kematian</label>
                <input type="text" name ="tempatkematian" class="form-control" id="exampleInputEmail1" value="{{ $data->tempatkematian }}">
              </div>  <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Kematian</label>
                <input type="date" name ="tanggalkematian" class="form-control" id="exampleInputEmail1" value="{{ $data->tanggalkematian }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sebab Kematian</label>
                <input type="text" name ="sebabkematian" class="form-control" id="exampleInputEmail1" value="{{ $data->sebabkematian}}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Lokasi Pemakaman</label>
                <input type="text" name ="lokasipemakaman" class="form-control" id="exampleInputEmail1" value="{{ $data->lokasipemakaman }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Masukan Foto Surat Kematian</label>
                <input type="file" name ="foto" class="form-control">
                <img src="{{ asset('/fotokematian').'/'.$data->foto}}" style="width:200px; height:90px;"alt=""> 
              </div>
              <button type="submit" class="btn btn-primary">Ubah Data</button>
              <a class="btn btn-secondary" href="{{ url('/kematian') }}">Kembali</a>
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