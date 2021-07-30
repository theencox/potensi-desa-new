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
        <div class="card">
            <h5 class="card-header">{{$potensidesas->judul}}</h5>
            <div class="card-body">
              <div class="text-center">
                 <img src="{{ asset('storage/'.$potensidesas->gambar)}}" width="100px" alt="" class="rounded">
              </div>
              <p class="card-text">{!!$potensidesas->deskripsi!!}</p>
            </div>
        </div>
    </div>


@endsection
