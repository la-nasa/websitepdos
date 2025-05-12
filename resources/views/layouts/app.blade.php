<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title',config('app.name','People Dev'))</title>
  <meta name="description" content="@yield('meta','')">
  <link rel="icon" href="{{ asset('logo.png') }}">
  @stack('styles')
  @vite(['resources/css/app.css','resources/js/app.js'])
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body class="pt-5" style="padding-top:75px;">

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg fixed-top navbar-custom shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
        <img src="{{ asset('logo.png') }}" alt="Logo" style="height:50px;">
        <span class="ms-3 text-pdos-navy fs-4 fw-bold">{{ config('app.name','People Dev') }}</span>
      </a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('services.index') }}">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">À propos</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
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

  {{-- Content --}}
  <main>@yield('content')</main>

  {{-- Footer --}}
  <footer class="mt-5">
    <div class="container py-4">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5>People Dev</h5>
          <p>Mobile & Web, design, SEO, marketing digital.</p>
        </div>
        <div class="col-md-2 mb-3">
          <h6>Liens</h6>
          <ul class="list-unstyled">
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('services.index') }}">Services</a></li>
            <li><a href="{{ route('about') }}">À propos</a></li>
            <li><a href="{{ route('blog.index') }}">Blog</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-3">
          <h6>Contact</h6>
          <p><i class="fas fa-envelope me-2"></i>contact@pdos.com</p>
          <p><i class="fas fa-phone me-2"></i>+237 6 1234 5678</p>
        </div>
        <div class="col-md-3 mb-3">
          <h6>Suivez-nous</h6>
          <a href="#" class="me-2"><i class="fab fa-facebook-square fs-4"></i></a>
          <a href="#" class="me-2"><i class="fab fa-twitter-square fs-4"></i></a>
          <a href="#"><i class="fab fa-linkedin fs-4"></i></a>
        </div>
      </div>
      <div class="text-center mt-3" style="font-size:.9rem;">
        &copy; {{ date('Y') }} {{ config('app.name','People Dev') }}. Tous droits réservés.
      </div>
    </div>
  </footer>

  {{-- Scroll to Top --}}
  <button id="scrollTop" class="btn position-fixed" style="bottom:20px;right:20px;z-index:1000;">
    <i class="fa fa-arrow-up"></i>
  </button>
</body>
</html>
