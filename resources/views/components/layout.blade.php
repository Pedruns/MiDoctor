<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $title }}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/aos/aos.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/swiper/swiper-bundle.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/glightbox/css/glightbox.min.css')}}">


  <!-- Main CSS File -->
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  @livewireStyles


</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <i class="bi bi-calendar-check text-primary-green me-2"></i>
        <h1 class="sitename">MiDoctor</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/">Inicio</a></li>
          @role('medico')
          <li><a href="/citasMedicos">Citas</a></li>
          <li><a href="{{route('horario.index')}}">Dias</a></li>
          @endrole
          @if(Auth::check())
          <li><a href="{{route('cita.index')}}">Mis citas</a></li>
          @endif
          <li><a href="/buscarMedicos">Medicos</a></li>
          @role('moderador')
          <li><a href="/revisarSolicitudes">Revisar Solicitudes</a></li>
          @endrole
          @role('paciente')
          @if(!App\Models\Doctor::where('user_id', auth()->id())->exists())
          <li><a href="/formularioMedico">Unirse como doctor</a></li>
          @endif
          @endrole
          <li class="dropdown"><a href="#"><img src="{{ asset('img/log.png') }}" alt="Image" class="img-fluid" style="max-width: 40px; max-height: 40px;">
              <i class="bi toggle-dropdown"></i></a>
            <ul>
              @if(Auth::check())
              <li>
                <a href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
              @else
              <li><a href="{{ route('register') }}">Registrarse</a></li>
              <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
              @endif
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">


    {{$slot}}


  </main>

  <footer class="py-4 border-top">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <p class="text-muted small mb-md-0">
            © 2024 MiDoctor. Todos los derechos reservados.
          </p>
        </div>
        <div class="col-md-6">
          <ul class="list-inline text-md-end mb-0">
            <li class="list-inline-item">
              <a class="text-muted small" href="#">
                Términos de servicio
              </a>
            </li>
            <li class="list-inline-item ms-3">
              <a class="text-muted small" href="#">
                Privacidad
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('vendor/aos/aos.js')}}"></script>
  <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>
  @livewireScripts
  <!-- <script src="assets/js/main.js"></script> -->

</body>

</html>