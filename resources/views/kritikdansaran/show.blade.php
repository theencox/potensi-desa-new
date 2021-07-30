@extends('layout.main')

@section('title', 'Kritik dan Saran')

@section('container-fluid')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
        <h1 class="h3 mb-0 text-gray-800">Kritik dan Saran</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    {{-- Form --}}
    <form method="post" class="ml-4" action="/kritikdansaran/{{$kritikdansaran->id}}">
        @method('delete')
        @csrf

        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama </label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="nama" name="nama" value=": {{$kritikdansaran->nama}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="alamat" name="alamat" value=": {{$kritikdansaran->alamat}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email </label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="email" name="email" value=": {{$kritikdansaran->email}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="nomorhp" class="col-sm-2 col-form-label">Nomor HP </label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="nomorhp" name="nomorhp" value=": {{$kritikdansaran->nomorhp}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi </label>
            <div class="col-sm-10">
              <textarea type="text" readonly class="form-control-plaintext" id="deskripsi" name="deskripsi">: {{$kritikdansaran->deskripsi}}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>

    @endsection
