<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>@yield('title', config('app.name','People Dev'))</title>
  <meta name="description" content="@yield('meta','')">

  {{-- 1) Bootstrap CSS CDN --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">

  {{-- 2) AOS CSS CDN --}}
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  {{-- 3) Votre CSS compilé par Vite (manifest) --}}
  @php
    $manifestPath = public_path('build/manifest.json');
    $manifest = file_exists($manifestPath)
      ? json_decode(file_get_contents($manifestPath), true)
      : [];
    $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
  @endphp

  @if($cssFile)
    <link rel="stylesheet" href="{{ asset('build/'.$cssFile) }}">
  @else
    {{-- fallback vers un CSS statique si compilé absent --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @endif

  <style>
    /* Petit debug pour voir si votre CSS custom passe */
    /* body { outline: 2px solid lime !important; } */
  </style>
</head>
<body>

  {{-- Navbar (Bootstrap) --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name','People Dev') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navMenu" aria-controls="navMenu"
              aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('services.index') }}">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">À propos</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#"
                 data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
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

  <main class="py-4">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="bg-dark text-light py-4">
    <div class="container text-center">
      &copy; {{ date('Y') }} {{ config('app.name','People Dev') }}. Tous droits réservés.
    </div>
  </footer>

  {{-- Bootstrap JS CDN --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-AO1IYxDVLyU2K4srYXfUHPcqDe5i/jI1y7itmEJu1RHj/9fQYBNSzqF6Y1UPt3Mg"
          crossorigin="anonymous"></script>

  {{-- AOS JS CDN --}}
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script> AOS.init({ duration: 600, once: true }); </script>

  {{-- Votre JS compilé par Vite --}}
  @php
    $jsFile = $manifest['resources/js/app.js']['file'] ?? null;
  @endphp
  @if($jsFile)
    <script type="module" src="{{ asset('build/'.$jsFile) }}"></script>
  @endif
</body>
</html>
