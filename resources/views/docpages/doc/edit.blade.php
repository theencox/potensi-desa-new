@extends('layout.main')

@section('title', 'Doc')

@section('container-fluid')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Doc</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
    </div>
    
    {{-- Form --}}
    <form method="post" action="/doc/{{$doc->id}}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-group mb-3 ml-4">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" autocomplete="off" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Masukkan Judul" name="judul" value="{{$doc->judul}}">
            @error('judul')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>                
            @enderror
        </div>
        <div class="form-group mb-3 ml-4">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea type="text" autocomplete="off" rows="5" class="form-control ckeditor @error('deskripsi') is-invalid @enderror" id="ckeditor" placeholder="Masukkan Deskripsi" name="deskripsi">{{$doc->deskripsi}}</textarea>
            @error('deskripsi')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>                
            @enderror
        </div>
        <div class="form-group mb-3 ml-4">
            <img src="{{ asset('storage/'.$doc->gambar)}}" width="100px" alt="" class="img-thumbnail">
        </div>
        <div class="form-group mb-3 ml-4">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file"  class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{$doc->gambar}}">
            <label for="" class="form-label-gambar"></label>
            @error('gambar')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>                
            @enderror
        </div>
        <button type="submit" class="btn btn-primary ml-4">Edit</button>
    </form>
        
    @endsection