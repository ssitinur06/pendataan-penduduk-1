@extends('layouts.app')
@section('content')


    {{-- <div class="modal fade" id="examplemodal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
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
  </div> --}}

  <body>
      <div class="card mx-auto col-lg-6">
          <div class="card-body">
              <div class="text-center"><br><br>
                  <h1>Detail Iuran Bulanan</h1>
              </div>
          </div>
          <hr>
          <div class="card-body">
              <div class="row">
                  <div class="col-6">
                      <h3>{{ $data->id_iuran_bulanan}}</h3><br>
                      <p><b>Pencatat: </b><td>{{ auth()->user()->username }}</td></p>
                      <p><b>NIK: </b>{{ $data->nik }}</p>
                      <p><b>Nama Lengkap : </b>{{ $data->nama}}</p>
                      <p><b>Bulan Bayar: </b>{{ $data->bulan_bayar }}</p>
                      <p><b>Tanggal Bayar : </b>{{ $data->tanggal_bayar }}</p>
                      <p><b>Nominal : </b>{{ $data->nominal }}</p>
                      <p><b>Status : </b>
                        @if($data->status == 1)
                    <span class="badge btn-success"> Sudah Bayar </p>
                    @else
                    <span class="badge btn-danger"> Belum Bayar </p>
                    @endif
                      <p><b>Created : </b>{{ $data->created_at}}</p>
                      <p><b>Updated : </b>{{ $data->updated_at}}</p>
                  </div>
              </div> 
      </body> <br><br>
      <a class="btn btn-dark" style="float:right" href="/iuranbulanan">Tutup</a>
    </html>
    
    @endsection
  
  

