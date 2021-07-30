@extends('layout.homepage-login')

@section('main-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between my-4 ml-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profil</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    {{-- Form --}}
    <div class="kritikdansaran my-3">
    <form method="post" action="/profil" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-group mb-3 ml-4">
            <label for="name" class="form-label">Nama</label>
            <input type="text" autocomplete="off" autocomplete="no" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{$user->name}}">
            @error('name')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>
            @enderror
        </div>
        <div class="form-group mb-3 ml-4">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" autocomplete="off" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="{{$user->alamat}}">
            @error('alamat')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>
            @enderror
        </div>
        <div class="form-group mb-3 ml-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" autocomplete="off" readonly class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{$user->email}}">
            @error('email')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>
            @enderror
        </div>
        <div class="form-group mb-3 ml-4">
            <label for="nomorhp" class="form-label">Nomor HP</label>
            <input type="text" autocomplete="off" class="form-control @error('nomorhp') is-invalid @enderror" id="nomorhp" placeholder="Masukkan Nomor HP" name="nomorhp" value="{{$user->nomorhp}}">
            @error('nomorhp')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>
            @enderror
        </div>
        <div class="form-group mb-3 ml-4">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file"  class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{$user->gambar}}">
            <label for="" class="form-label-gambar"></label>
            @error('gambar')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}.
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary ml-4">Ubah</button>
    </form>
    <form method="POST" class="user" action="{{ route('password.confirm') }}">
        @csrf
        <button type="submit" class="btn btn-primary btn-user ml-4 my-3">Ubah Password</button>
    </form>
    </div>

    @endsection
