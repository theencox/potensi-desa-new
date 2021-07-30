 @extends('layout.homepage-login')
 @section('main-content')
 {{-- jumbotron --}}
<div class="container-slider">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('style/img/background.jpg')}}" class="d-block w-100" alt="..." style="height: 650px">
                <div class="carousel-caption my-auto">
                    <h1 class="display-4">Selamat Datang di Website<br> <span>Potensi Desa Kecamatan Arjawinangun</span></h1>
                </div>
            </div>
            @foreach ($profildesa as $item)
            <div class="carousel-item">

                @if ($item->gambar)
                <img src="{{ asset('storage/'.$item->gambar)}}" class="d-block w-100" alt="..." style="height: 650px">
                @else
                <img src="style/img/download.png" class="d-block w-100" alt="..." style="height: 650px">
                @endif

                <div class="carousel-caption">
                    <h1 class="display-5"><a href="/profildesapage/{{$item->id}}" class="text-light" style="text-decoration: none">{{$item->nama}}</a></h1>
                </div>

            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>

</div>
{{-- end of jumbotron --}}
{{-- Container Doc--}}
<section class="">
    <main>
        @foreach ($docs as $doc)
        <div class="container">
            <div class="row">
                <div class="col text-center my-5">
                    <img src="storage/{{$doc->gambar}}" alt="" width="200">
                </div>
                <div class="col my-5">
                    <p class="text-uppercase text-right mb-4">{{$doc->judul}}</p>
                    <p class="text-justify">
                        {!!$doc->deskripsi!!}

                    </p>
                </div>
        </div>
        @endforeach

    </main>
</section>
{{-- <div class="row doc">
   <div class="col my-5 mx-4">
       <img src="style/img/logo.png" alt="doc" class="img-fluid">
   </div>
   <div class="col my-5 mx-4">
       <h2>Judul</h2>
       <p>Deskripsi</p>
   </div>
</div> --}}
{{-- End of Container Doc--}}
{{-- Container Desa --}}
    <div class="container-fluid bg-secondary desa">
        <div class="row">
            <div class="col text-center text-white">
                <h4>Daftar Desa-Desa Beserta Profil dan Potensi Desa di Kecamatan Arjawinangun</h4>
            </div>
        </div>
        @foreach ($profildesa as $pd)
        <div class="row mt-4">
            <div class="col text-center">
                <a href="/profildesapage/{{$pd->id}}" class="text-white">{{$pd->nama}}</a> <br>

            </div>

        </div>
        @endforeach
    </div>

    @foreach ($berita as $beritas)
    <div class="card my-3 ml-5 w-80">
        <div class="row">
          <div class="col-md-2 ml-5 my-5">
            @if ($beritas->gambar)
            <img src="{{ asset('storage/'.$beritas->gambar)}}" width="100px" alt=""></td>
            @else
            <img src="style/img/download.png" width="100px" alt="">
            @endif
          </div>
          <div class="col-md-9 my-5">
            <div class="card-body">
              <h5> <a class="card-title" href="/beritapage/{{$beritas->id}}">{{$beritas -> judul}}</a> </h5>
              <p class="card-text">{!!$beritas -> deskripsi!!}</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
{{-- End of Container Desa --}}
 @endsection
