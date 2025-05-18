<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('app.name','People Dev'))</title>
  <meta name="description" content="@yield('meta','')">

  {{-- Bootstrap fallback --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">

  @php
    $manifestPath = public_path('build/manifest.json');
    $hasManifest = file_exists($manifestPath);
    if($hasManifest) {
      $manifest = json_decode(file_get_contents($manifestPath), true);
      $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
    }
  @endphp

  @if(!empty($cssFile))
    {{-- Chargement via manifest --}}
    <link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}">
  @else
    {{-- Chargement direct du fichier buildé (à adapter si votre hash change) --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
  @endif

</head>
<body class="d-flex flex-column min-vh-100">

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('logo.png') }}" alt="Logo" style="height:40px;">
        <span class="ms-2">{{ config('app.name','People Dev') }}</span>
      </a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
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

  {{-- Contenu principal --}}
  <main class="flex-fill" style="padding-top:75px;">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="bg-dark text-white py-5 mt-auto">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4">
          <h5>People Dev</h5>
          <p>Startup tech : mobile & web, design graphique, SEO, marketing digital.</p>
        </div>
        <div class="col-md-2 mb-4">
          <h6>Liens</h6>
          <ul class="list-unstyled">
            <li><a href="{{ route('home') }}" class="text-white">Accueil</a></li>
            <li><a href="{{ route('services.index') }}" class="text-white">Services</a></li>
            <li><a href="{{ route('about') }}" class="text-white">À propos</a></li>
            <li><a href="{{ route('blog.index') }}" class="text-white">Blog</a></li>
            <li><a href="{{ route('contact') }}" class="text-white">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-4">
          <h6>Contact</h6>
          <p><i class="fas fa-envelope me-2"></i>contact@pdos.com</p>
          <p><i class="fas fa-phone me-2"></i>+237 6 1234 5678</p>
        </div>
        <div class="col-md-3 mb-4">
          <h6>Suivez-nous</h6>
          <a href="#" class="me-2 text-white fs-4"><i class="fab fa-facebook"></i></a>
          <a href="#" class="me-2 text-white fs-4"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-white fs-4"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>
      <div class="text-center mt-3">&copy; {{ date('Y') }} People Dev. Tous droits réservés.</div>
    </div>
  </footer>

  {{-- Scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-AO1IYxDVLyU2K4srYXfUHPcqDe5i/jI1y7itmEJu1RHj/9fQYBNSzqF6Y1UPt3Mg"
          crossorigin="anonymous"></script>

  @if(!empty($cssFile))
    {{-- Charger le JS via manifest --}}
    @php
      $jsFile = $manifest['resources/js/app.js']['file'] ?? null;
    @endphp
    @if($jsFile)
      <script type="module" src="{{ asset('build/' . $jsFile) }}"></script>
    @endif
  @endif

</body>
</html>
