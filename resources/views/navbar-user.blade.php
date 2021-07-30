{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarNavAltMarkup">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{url ('/homepage')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/docpage')}}">Doc</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Desa
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{url ('/profildesapage')}}">Profil Desa</a>
            <a class="dropdown-item" href="{{url ('/potensidesapage')}}">Potensi Desa</a>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url ('/beritapage')}}">Berita</a>
        </li>
        <li class="nav-item border-right">
          <a class="nav-link" href="{{url ('/kritikdansaranpage')}}">Kritik dan Saran</a>
        </li>
        @auth
        <div class="dropdown no-arrow ml-3">
            <a class="nav-link text-center" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                @if (Auth::user()->gambar)
                                <img class="rounded-circle" width="20"
                                     src="{{ asset('storage/'.Auth::user()->gambar)}}" alt="">
                                @else
                                <img class="rounded-circle" width="20"
                                    src="{{asset('style/img/user.png')}}">
                                @endif

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{url('/profil')}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </div>
        @endauth
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

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Logout</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
</div>
{{-- End of Navbar --}}
