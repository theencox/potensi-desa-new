@extends('layout.homepage-login')

@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-5 mt-4">
        <h3 class="h3 mb-0 text-gray-800">Berita</h3>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="card mb-3 ml-5 w-80">
        <div class="row">
          <div class="col-md-2 ml-5 my-5">
            @if ($user->gambar)
            <img src="{{ asset('storage/'.$user->gambar)}}" width="100px" alt=""></td>
            @else
            <img src="{{url ('style/img/download.png')}}" width="100px" alt="">
            @endif
        </div>
        <div class="col-md-9 my-3">
            <div class="card-body">
              <h4 class="card-title">{{$user -> judul}} </h4>
              <p class="card-text">{!!$user -> deskripsi!!}</p>

              <form action="/beritapage/{{$user->id}}" method="post">
                @csrf
                 <textarea name="deskripsi" id="" cols="100" rows="5" placeholder="Berikan komentar..."></textarea> <br>
                 <button type="submit" class="btn btn-primary my-3">Tambahkan</button>
              </form>

              @foreach ($user->comment()->where('status', '1')->get() as $item)
                  <h4>{{$item->user->name}} - {{$item->created_at->diffForHumans()}}</h4>
                  <p>{{$item->deskripsi}}</p>
                  @if (Auth::user()->id == $item->user->id)
                  <form action="/beritapage/{{$item->id}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">delete</button>

                  </form>

                  @endif
              @endforeach


            </div>
          </div>
        </div>
    </div>

</div>
@endsection
