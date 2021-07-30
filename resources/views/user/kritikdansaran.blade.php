@extends('layout.homepage-login')
@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4 mt-4">
        <h3 class="h3 mb-0 text-gray-800">Kritik dan Saran</h3>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="kritikdansaran my-3">
        <p class="ml-4">Silahkan isi data diri terlebih dahulu berikan komentar anda</p>
        <form method="post" action="/kritikdansaranpage">
            @csrf
            <div class="form-group mb-3 ml-4">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" autocomplete="off" readonly class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama" value="{{ Auth::user()->name }}">
                @error('nama')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}.
                </div>
                @enderror
            </div>


            <div class="form-group mb-3 ml-4">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" autocomplete="off" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="{{old('alamat')}}">
                @error('alamat')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}.
                </div>
                @enderror
            </div>
            <div class="form-group mb-3 ml-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" autocomplete="off" readonly class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{ Auth::user()->email }}">
                @error('email')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}.
                </div>
                @enderror
            </div>
            <div class="form-group mb-3 ml-4">
                <label for="nomorhp" class="form-label">Nomor HP</label>
                <input type="text" autocomplete="off" class="form-control @error('nomorhp') is-invalid @enderror" id="nomorhp" placeholder="Masukkan Nomor HP" name="nomorhp" value="{{old('nomorhp')}}">
                @error('nomorhp')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}.
                </div>
                @enderror
            </div>
            <div class="form-group mb-3 ml-4">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" rows="5" id="deskripsi" placeholder="Masukkan Deskripsi" name="deskripsi">{{old('deskripsi')}}</textarea>
                @error('deskripsi')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}.
                </div>
                @enderror</div>

            <button type="submit" class="btn btn-primary ml-4">Tambahkan</button>
        </form>
    </div>
</div>
@endsection
