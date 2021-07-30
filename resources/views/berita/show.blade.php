@extends('layout.main')

@section('title', 'Berita')

@section('container-fluid')
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
            @if ($berita->gambar)
            <img src="{{ asset('storage/'.$berita->gambar)}}" width="100px" alt=""></td>
            @else
            <img src="{{url ('style/img/download.png')}}" width="100px" alt="">
            @endif
          </div>
          <div class="col-md-9 my-5">
            <div class="card-body">
              <h5 class="card-title">{{$berita -> judul}}</h5>
              <p class="card-text">{!!$berita -> deskripsi!!}</p>

              @foreach ($berita->comment()->get() as $item)
                  <h4>{{$item->user->name}} - {{$item->created_at->diffForHumans()}}</h4>
                  @if ($item->status == 0)
                      <h6 class="text-success">Menunggu</h6>
                  @elseif ($item->status == 1)
                    <h6 class="text-primary">Diterima</h6>
                @else
                    <h6 class="text-danger">Ditolak</h6>
                @endif

                  <p>{{$item->deskripsi}}</p>
                  @if ($item->status == 0)
                  <form action="/berita/detail/{{$item->id}}" method="post">
                    @method('patch')
                    @csrf
                    <input type="hidden" value="1" name="status">
                            <button type="submit" class="btn btn-primary">terima</button>

                   </form>
                   <form action="/berita/detail/{{$item->id}}" method="post">
                    @method('patch')
                    @csrf
                    <input type="hidden" value="2" name="status">
                        <button type="submit" class="btn btn-danger">tolak</button>

               </form>
                  @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>

</div>
@endsection
