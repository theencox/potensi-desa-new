@extends('layout.homepage')
@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-5 mt-4">
        <h3 class="h3 mb-0 text-gray-800">Doc</h3>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    @foreach ($doc as $docs)
    <div class="card mb-3 ml-5 w-80">
        <div class="row">
          <div class="col-md-2 ml-5 my-5">
            @if ($docs->gambar)
            <img src="{{ asset('storage/'.$docs->gambar)}}" width="100px" alt=""></td>
            @else
            <img src="style/img/download.png" width="100px" alt="">
            @endif
          </div>
          <div class="col-md-9 my-5">
            <div class="card-body">
              <h5 class="card-title">{{$docs -> judul}}</h5>
              <p class="card-text">{!!$docs -> deskripsi!!}</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
</div>
@endsection
