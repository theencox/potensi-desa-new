@extends('layout.main')

@section('title', 'Potensi Desa')

@section('container-fluid')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
            <h1 class="h3 mb-0 text-gray-800">Potensi Desa</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @foreach ($potensidesa as $pd)
    <div class="row" style="margin-top: 20px;" style="margin-bottom: 20px;">
        <div class="col-4 ml-5">
          <div class="list-group">
              @csrf
              <a href="/potensidesa/{{$pd->id}}" class="list-group-item list-group-item-action" aria-current="true">
                {{$pd->nama}}
              </a>
          </div>
        </div>
    </div>

        @endforeach
@endsection
