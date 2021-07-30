@extends('layout.homepage')

@section('main-content')
    <div class="container-fluid showdesa">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
            <h1 class="h3 mt-4 text-gray-800">Potensi Desa</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
        <div class="namadesa">
            <h4 class="mb-5 ml-4 mt-5">{{$potensidesapages->nama}}</h4>
        </div>
        <div class="row deskripsi">
            <div class="col-7">
                <div class="text-center">
                   <img src="{{ asset('storage/'.$potensidesapages->gambar1)}}" width="300px" alt="" class="rounded">
                </div>
                <p class="ml-4">{!!$potensidesapages->deskripsi!!}</p>
            </div>
        </div>
    </div>
@endsection
