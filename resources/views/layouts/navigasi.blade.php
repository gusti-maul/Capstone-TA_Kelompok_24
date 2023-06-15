    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="{{url('landingpage.home')}}"><img src="{{url('assets/img/logosma.png')}}" alt="Logo" class="logo">SMA 1 JAKENAN<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        {{-- <a href="index.html" class="logo"><img src="{{url('assets/img/logosma.png')}}" alt=""></a> --}}

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="{{url('/home')}}">Home</a></li>
            @guest
            <li><a class="nav-link scrollto" href="{{url('/register')}}">register</a></li>
            <li><a class="nav-link scrollto" href="{{url('/login')}}">login</a></li>
            @else
            <li class="dropdown"><a href="#"><span>Jurusan</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{url('/about')}}">about</a></li>
                <li><a href="{{url('/contact')}}">contat</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#">
                @if (empty(Auth::user()->name))
                {{''}}
                @else
                {{Auth::user()->name}}
                @endif
                <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{url('/about')}}">about</a></li>
                <li><a href="{{url('/contact')}}">contat</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
                @endguest

              </ul>
            </li>
          </ul>

          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->