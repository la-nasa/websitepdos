<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>@yield('title', config('app.name','People Dev'))</title>
  <meta name="description" content="@yield('meta','Solutions mobiles & web, design graphique, SEO, marketing digital et community management.')">

  {{-- 1) Bootstrap CSS (CDN) --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">

  {{-- 2) Votre CSS statique compilé en local --}}
   <link rel="stylesheet"
        href="{{ asset('css/app.css') }}?v={{ filemtime(public_path('css/app.css')) }}">


  {{-- 3) AOS CSS (CDN) --}}
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
        <img src="{{ asset('logo.png') }}" alt="Logo" style="height:40px; filter:drop-shadow(0 0 5px rgba(0,0,0,0.2));">
        <span class="ms-2 fw-bold text-pdos-navy">{{ config('app.name','People Dev') }}</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('services.index') }}">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">À propos</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item">Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  {{-- Espace de contenu (padding-top pour laisser place à la navbar) --}}
  <main class="flex-fill" style="padding-top:75px;">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="bg-pdos-navy text-pdos-white py-5 mt-auto">
    <div class="container">
      <div class="row">
        {{-- À propos --}}
        <div class="col-md-4 mb-4">
          <h5 class="fw-bold">People Dev</h5>
          <p>Startup tech : mobile & web, design graphique, SEO, marketing digital et community management.</p>
        </div>
        {{-- Liens --}}
        <div class="col-md-2 mb-4">
          <h6 class="fw-bold">Liens</h6>
          <ul class="list-unstyled">
            <li><a href="{{ route('home') }}" class="text-pdos-white text-decoration-none">Accueil</a></li>
            <li><a href="{{ route('services.index') }}" class="text-pdos-white text-decoration-none">Services</a></li>
            <li><a href="{{ route('about') }}" class="text-pdos-white text-decoration-none">À propos</a></li>
            <li><a href="{{ route('blog.index') }}" class="text-pdos-white text-decoration-none">Blog</a></li>
            <li><a href="{{ route('contact') }}" class="text-pdos-white text-decoration-none">Contact</a></li>
          </ul>
        </div>
        {{-- Contact --}}
        <div class="col-md-3 mb-4">
          <h6 class="fw-bold">Contact</h6>
          <p class="mb-1"><i class="fas fa-envelope me-2"></i>contact@pdos.com</p>
          <p><i class="fas fa-phone me-2"></i>+237 6 1234 5678</p>
        </div>
        {{-- Réseaux sociaux --}}
        <div class="col-md-3 mb-4">
          <h6 class="fw-bold">Suivez-nous</h6>
          <a href="#" class="me-2 text-pdos-white fs-4"><i class="fab fa-facebook"></i></a>
          <a href="#" class="me-2 text-pdos-white fs-4"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-pdos-white fs-4"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>
      <div class="text-center mt-3">&copy; {{ date('Y') }} {{ config('app.name','People Dev') }}. Tous droits réservés.</div>
    </div>
  </footer>

  {{-- Scroll to Top --}}
  <button id="scrollTop" class="btn position-fixed"
          style="bottom:20px;right:20px;background:var(--pdos-green);color:var(--pdos-navy);display:none;">
    <i class="fa fa-arrow-up"></i>
  </button>

  {{-- Scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-AO1IYxDVLyU2K4srYXfUHPcqDe5i/jI1y7itmEJu1RHj/9fQYBNSzqF6Y1UPt3Mg"
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration:600, once:true });

    // Scroll to top
    document.addEventListener('DOMContentLoaded', () => {
      const btn = document.getElementById('scrollTop');
      window.addEventListener('scroll', () => {
        btn.style.display = window.scrollY > 300 ? 'block' : 'none';
      });
      btn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    });
  </script>

</body>
</html>
