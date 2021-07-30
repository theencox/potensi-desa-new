@extends('layout.main')

@section('title', 'Profil Desa')

@section('container-fluid')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
            <h1 class="h3 mb-0 text-gray-800">Profil Desa</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="post" action="/profildesa/{{$profildesa->id}}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-group mb-3 ml-4">
            <label for="nama" class="form-label">Desa</label>
            <input type="text" readonly class="form-control-plaintext" id="nama" name="nama" value="{{$profildesa->nama}}">
        </div>
        <div class="form-group mb-3 ml-4">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea type="text" autocomplete="no" class="form-control ckeditor @error('deskripsi') is-invalid @enderror" id="ckeditor" placeholder="Masukkan Deskripsi" name="deskripsi" > {{$profildesa->deskripsi}} </textarea>
            @error('deskripsi')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>
            @enderror
        </div>
        <div class="form-group mb-3 ml-4">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file"  class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{$profildesa->gambar}}">
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
