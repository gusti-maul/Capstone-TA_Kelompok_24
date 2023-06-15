<header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="{{url('/')}}"><img src="{{url('assets/img/logosma.png')}}" alt="Logo" style="width: 50px;" class="logo"> SMA NEGERI 1 <span>SOKARAJA</span></a></h1>

    <nav id="navbar" class="navbar">
      <ul>
        <li class="{{ request()->is('/') ? 'active' : '' }}"><a class="nav-link scrollto" href="{{ url('/') }}">Home</a></li>
        <li class="{{ request()->is('about') ? 'active' : '' }}"><a class="nav-link scrollto" href="{{ url('/about') }}">About</a></li>
        <li class="{{ request()->is('portofolio') ? 'active' : '' }}"><a class="nav-link scrollto" href="{{ url('/portofolio') }}">Portfolio</a></li>
        <li class="dropdown {{ request()->is('prestasi', 'siswabaru') ? 'active' : '' }}">
          <a href="#"><span>Info</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li class="{{ request()->is('prestasi') ? 'active' : '' }}"><a href="{{ url('/prestasi') }}">PRESTASI</a></li>
            <li class="{{ request()->is('siswabaru') ? 'active' : '' }}"><a href="{{ url('/siswabaru') }}">Penerimaan Siswa Baru</a></li>
          </ul>
        </li>
        <li class="{{ request()->is('contact') ? 'active' : '' }}"><a class="nav-link scrollto" href="{{ url('/contact') }}">Contact</a></li>



        <!-- <ul class="navbar-nav ms-auto"> -->
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </ul>
        </li>

        @else
        <li class="nav-item"><a class="nav-link scrollto" href="#" data-bs-toggle="modal" data-bs-target="#login-modal">Login</a></li>
        @endauth
        <!-- </ul> -->

        <!-- <li><a class="nav-link scrollto" href="{{url('/login')}}">Login asli</a></li> -->

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    <!-- .navbar -->

  </div>
</header>



<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <div class="input-group">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                <i class="fas fa-eye"></i>
              </button>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>


          <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
              {{ __('Remember Me') }}
            </label>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
            <a class="btn btn-secondary" href="{{ url('/') }}">{{ __('Back') }}</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');

  togglePassword.addEventListener('click', function() {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    togglePassword.querySelector('i').classList.toggle('fa-eye');
    togglePassword.querySelector('i').classList.toggle('fa-eye-slash');
  });
</script>