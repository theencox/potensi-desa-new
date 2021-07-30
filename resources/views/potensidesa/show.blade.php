@extends('layout.main')

@section('title', 'Profil Desa')

@section('container-fluid')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
            <h1 class="h3 mb-0 text-gray-800">Potensi Desa</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
        <a href="/potensidesa/{{$potensidesa->id}}/create" class="btn btn-primary my-2 ml-3">Tambah Potensi Desa</a>
        <div class="card">
            <h5 class="card-header">{{$potensidesa->nama}}</h5>
            <div class="card-body">
              <div class="text-center">
                 <img src="{{ asset('storage/'.$potensidesa->gambar1)}}" width="100px" alt="" class="rounded">
              </div>
              @foreach ($potensidesa->partpotensidesa()->get() as $item)
              <div class="col-md-9 my-5">
                <div class="card-body">
                    <h4 class="card-title"><a href="/potensidesa/{{$item->id}}/show">{{$item -> judul}} </a></h4>
                    <p class="card-text deskripsi">{!!$item -> deskripsi!!}</p>
                    <img src="{{ asset('storage/'.$item->gambar)}}" width="100px" alt="" class="rounded"> <br>
                    <a href="/potensidesa/{{$item->id}}/edit" class="btn btn-primary my-3">Edit</a>
                </div>
              </div>
              @endforeach
            </div>
        </div>
    </div>


@endsection
