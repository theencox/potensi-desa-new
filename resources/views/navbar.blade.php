{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{url ('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/docpages')}}">Doc</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Desa
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{url ('/profildesapages')}}">Profil Desa</a>
            <a class="dropdown-item" href="{{url ('/potensidesapages')}}">Potensi Desa</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url ('/beritapages')}}">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url ('/kritikdansaranpages')}}">Kritik dan Saran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary" href="{{ route('login') }}">Masuk</a>
        </li>
      </ul>
        {{-- <div class="navbar-nav ml-auto">
            <a class="nav-link" href="{{url ('/homepage')}}">Home <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="{{ url('/docpages')}}">Doc</a>
            <a class="nav-link" href="#">Desa</a>
            <a class="nav-link" href="#">Upload</a>
            <a class="nav-link" href="{{url ('/kritikdansaranpages')}}">Kritik dan Saran</a>
            <a class="nav-link btn btn-primary" href="#">Masuk</a>
        </div> --}}
    </div>
</nav>
{{-- End of Navbar --}}
