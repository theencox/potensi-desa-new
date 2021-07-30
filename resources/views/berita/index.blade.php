@extends('layout.main')

@section('title', 'Berita')

@section('container-fluid')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
        <h1 class="h3 mb-0 text-gray-800">Berita</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <a href="/berita/create" class="btn btn-primary my-2 ml-3">Tambah Berita</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($berita as $beritas)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$beritas -> judul}}</td>
                    <td>{!!$beritas -> deskripsi!!}</td>
                    <td>
                        @if ($beritas->gambar)
                        <img src="{{ asset('storage/'.$beritas->gambar)}}" width="100px" alt=""></td>
                        @else
                        <img src="style/img/download.png" width="100px" alt="">
                        @endif
                    <td>
                        <form action="/berita/{{$beritas->id}}/edit">
                            @csrf
                            <button type="submit" class="btn btn-success">edit</button>
                        </form>
                        <form action="/berita/{{$beritas->id}}">
                            @csrf
                            <button type="submit" class="btn btn-success">detail</button>
                        </form>
                        <form action="/berita/{{$beritas->id}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
