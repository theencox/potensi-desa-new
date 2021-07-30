@extends('layout.homepage-login')
@section('main-content')
    <div class="container-fluid my-3">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
            <h1 class="h3 mt-4 text-gray-800">Profil</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

        <div class="form-group row mb-3 ml-4">
                <img src="{{ asset('storage/'.Auth::user()->gambar)}}" width="100px" alt="" class="rounded">
        </div>
        <div class="form-group row mb-3 ml-4">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" autocomplete="off" readonly class="form-control-plaintext @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama" value=": {{ Auth::user()->name }}">
                @error('nama')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                   {{$message}}.
                </div>
                @enderror
            </div>

        </div>

        <div class="form-group row mb-3 ml-4">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" autocomplete="off" readonly class="form-control-plaintext @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value=": {{Auth::user()->alamat}}">
                @error('alamat')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}.
                </div>
                @enderror
            </div>

        </div>
        <div class="form-group row mb-3 ml-4">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" autocomplete="off" readonly class="form-control-plaintext @error('email') is-invalid @enderror" id="email" name="email" value=": {{Auth::user()->email}}">
                @error('email')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}.
                </div>
                @enderror
            </div>

        </div>
        <div class="form-group row mb-3 ml-4">
            <label for="nomorhp" class="col-sm-2 col-form-label">Nomor HP</label>
            <div class="col-sm-10">
                <input type="text" autocomplete="off" readonly class="form-control-plaintext @error('nomorhp') is-invalid @enderror" id="nomorhp" name="nomorhp" value=": {{Auth::user()->nomorhp}}">
                @error('nomorhp')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}.
                </div>
                @enderror
            </div>

        </div>

        </div>
        <div class="col-sm-10">
            <form action="/profil/edit">
                @csrf
                <button type="submit" class="btn btn-success ml-4 my-3">Edit</button>
            </form>
        </div>



    </div>
@endsection
