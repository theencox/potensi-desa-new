@extends('layout.main')

@section('title', 'Kritik dan Saran')

@section('container-fluid')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
            <h1 class="h3 mb-0 text-gray-800">Kritik dan Saran</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Sementara --}}
    {{-- <a href="/kritikdansaran/create" class="btn btn-primary my-2 ml-3"> Tambah Kritik dan Saran</a> --}}
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
                <th scope="col">Nomor Hp</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($kritikdansaran as $mhs)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$mhs -> nama}}</td>
                    <td>{{$mhs -> alamat}}</td>
                    <td>{{$mhs -> email}}</td>
                    <td>{{$mhs -> nomorhp}}</td>
                    <td>{!!$mhs -> deskripsi!!}</td>
                    <td>
                        {{-- <form action="/kritikdansaran/{{$mhs->id}}/edit">
                            @csrf
                            <button type="submit" class="btn btn-success">edit</button>
                        </form> --}}
                        <form action="/kritikdansaran/{{$mhs->id}}">
                            @csrf
                            <button type="submit" class="btn btn-success">detail</button>
                        </form>
                        <form action="/kritikdansaran/{{$mhs->id}}" method="POST">
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
