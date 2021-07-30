@extends('layout.main')

@section('title', 'Doc')


@section('container-fluid')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
            <h1 class="h3 mb-0 text-gray-800">Doc</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <a href="/doc/create" class="btn btn-primary my-2 ml-3">Tambah Doc</a>
    {{-- @foreach ($doc as $docs)
    <div class="card-group ml-3">
        <div class="row row-cols-1 row-cols-md-1 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body d-inline">
                        <p class="card-title">
                            <b>
                                {{$docs->judul}}
                            </b>
                        </p>
                        <p class="card-text">{{$docs->deskripsi}}</p>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach --}}
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
                    @foreach ($doc as $docs)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$docs -> judul}}</td>
                        <td>{!!$docs -> deskripsi!!}</td>
                        <td>
                            @if ($docs->gambar)
                            <img src="{{ asset('storage/'.$docs->gambar)}}" width="100px" alt=""></td>
                            @else
                            <img src="style/img/download.png" width="100px" alt="">
                            @endif
                        <td>
                            <form action="/doc/{{$docs->id}}/edit">
                                @csrf
                                <button type="submit" class="btn btn-success">edit</button>
                            </form>
                            <form action="/doc/{{$docs->id}}" method="POST">
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
    </div>
@endsection
