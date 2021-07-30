@extends('layout.homepage')
@section('main-content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4 mt-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Desa di Kecamatan Arjawinangun</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>
    @foreach ($profildesapages as $pd)
  <div class="row profildesa">
    <div class="col-4 ml-4">
      <div class="list-group">
          @csrf
          <a href="/profildesapages/{{$pd->id}}" class="list-group-item list-group-item-action" aria-current="true">
            {{$pd->nama}}
          </a>
      </div>
    </div>
  </div>
                
    @endforeach
</div>
@endsection


