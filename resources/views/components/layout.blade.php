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


</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">MiDoctor</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#" class="active">Inicio</a></li>
          <li><a href="#">Acerca</a></li>
          <li><a href="#">Servicios</a></li>
          <li><a href="#">Portaforlio</a></li>
          <li><a href="#">Equipo</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Contacto</a></li>
          <li class="dropdown"><a href="#"><img src="{{ asset('img/log.png') }}" alt="Image" class="img-fluid" style="max-width: 40px; max-height: 40px;">
          <i class="bi toggle-dropdown"></i></a>
            <ul>
              @if(Auth::check())
              <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
              <li>
                <a href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión
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

  <footer id="footer" class="footer light-background">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
          <div class="widget">
            <h3 class="widget-heading">Acerca de nosotros</h3>
            <p class="mb-4">
              There live the blind texts. Separated they live in Bookmarksgrove
              right at the coast of the Semantics, a large language ocean.
            </p>
            <p class="mb-0">
              <a href="#" class="btn-learn-more">Ver mas</a>
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 ps-lg-5 mb-3 mb-md-0">
          <div class="widget">
            <h3 class="widget-heading">Navegacion</h3>
            <ul class="list-unstyled float-start me-5">
              <li><a href="#">Semantics</a></li>
              <li><a href="#">Semantics</a></li>
              <li><a href="#">Semantics</a></li>
            </ul>
            <ul class="list-unstyled float-start">
              <li><a href="#">Semantics</a></li>
              <li><a href="#">Semantics</a></li>
              <li><a href="#">Semantics</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 pl-lg-5">
          <div class="widget">
            <h3 class="widget-heading">Recent Posts</h3>
            <ul class="list-unstyled footer-blog-entry">
              <li>
                <span class="d-block date">May 3, 2020</span>
                <a href="#">There live the Blind Texts</a>
              </li>
              <li>
                <span class="d-block date">May 3, 2020</span>
                <a href="#">Separated they live in Bookmarksgrove right</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 pl-lg-5">
          <div class="widget">
            <h3 class="widget-heading">Connect</h3>
            <ul class="list-unstyled social-icons light mb-3">
              <li>
                <a href="#"><span class="bi bi-facebook"></span></a>
              </li>
              <li>
                <a href="#"><span class="bi bi-twitter-x"></span></a>
              </li>
              <li>
                <a href="#"><span class="bi bi-linkedin"></span></a>
              </li>
              <li>
                <a href="#"><span class="bi bi-google"></span></a>
              </li>
              <li>
                <a href="#"><span class="bi bi-google-play"></span></a>
              </li>
            </ul>
          </div>

          <div class="widget">
            <div class="footer-subscribe">
              <h3 class="widget-heading">Subscribe</h3>
              <form action="forms/newsletter.php" method="post" class="php-email-form">
                <div class="mb-2">
                  <input type="text" class="form-control" name="email" placeholder="Enter your email">

                  <button type="submit" class="btn btn-link">
                    <span class="bi bi-arrow-right"></span>
                  </button>
                </div>
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">
                  Your subscription request has been sent. Thank you!
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="copyright d-flex flex-column flex-md-row align-items-center justify-content-md-between">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">MiDoctor</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
          Designed by <a href="#">#</a> Distributed By <a href="#">#</a>
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
  <!-- <script src="assets/js/main.js"></script> -->

</body>

</html>