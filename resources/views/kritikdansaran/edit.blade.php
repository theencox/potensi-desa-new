@extends('layout.main')

@section('title', 'Kritik dan Saran')

@section('container-fluid')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Kritik dan Saran</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    
    {{-- Form --}}
    <form method="post" action="/kritikdansaran/{{$kritikdansaran->id}}">
        @method('patch')
        @csrf
        <div class="form-group mb-3 ml-4">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" autocomplete="off" autocomplete="no" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama" value="{{$kritikdansaran->nama}}">
            @error('nama')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>                
            @enderror
        </div>

        
        <div class="form-group mb-3 ml-4">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" autocomplete="off" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="{{$kritikdansaran->alamat}}">
            @error('alamat')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>                
            @enderror
        </div>
        <div class="form-group mb-3 ml-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" autocomplete="off" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{$kritikdansaran->email}}">
            @error('email')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>                
            @enderror
        </div>
        <div class="form-group mb-3 ml-4">
            <label for="nomorhp" class="form-label">Nomor HP</label>
            <input type="text" autocomplete="off" class="form-control @error('nomorhp') is-invalid @enderror" id="nomorhp" placeholder="Masukkan Nomor HP" name="nomorhp" value="{{$kritikdansaran->nomorhp}}">
            @error('nomorhp')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>                
            @enderror
        </div>
        <div class="form-group mb-3 ml-4">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" rows="5" id="deskripsi" placeholder="Masukkan Deskripsi" name="deskripsi">{{$kritikdansaran->deskripsi}}</textarea>
            @error('deskripsi')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>                
            @enderror
        </div>

        <button type="submit" class="btn btn-primary ml-4">Ubah</button>
    </form>
        
    @endsection