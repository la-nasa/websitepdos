<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', config('app.name','People Dev'))</title>
    <meta name="description" content="@yield('meta','Solutions mobiles & web, design graphique, SEO, marketing digital et community management.')">

    {{-- Chargement des assets compilés par Vite --}}
    @vite(['resources/css/app.css','resources/js/app.js'])
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

    {{-- Espace pour le contenu --}}
    <main class="flex-fill" style="padding-top:75px;">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-pdos-navy text-pdos-white mt-auto pt-5 pb-4">
        <div class="container">
            <div class="row">
                {{-- À propos --}}
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold">People Dev</h5>
                    <p>Startup tech spécialisée dans le développement mobile & web, le design graphique, le référencement SEO/SEM, le marketing digital et la gestion des réseaux sociaux.</p>
                </div>
                {{-- Liens utiles --}}
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
                    <a href="#" class="me-2 text-pdos-white fs-4"><i class="fab fa-facebook-square"></i></a>
                    <a href="#" class="me-2 text-pdos-white fs-4"><i class="fab fa-twitter-square"></i></a>
                    <a href="#" class="text-pdos-white fs-4"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="text-center mt-3" style="font-size:.9rem;">
                &copy; {{ date('Y') }} {{ config('app.name','People Dev') }}. Tous droits réservés.
            </div>
        </div>
    </footer>

    {{-- Scroll to Top --}}
    <button id="scrollTop" class="btn position-fixed"
            style="bottom:20px;right:20px;display:none;
                   background:var(--pdos-green); color:var(--pdos-navy);">
        <i class="fa fa-arrow-up"></i>
    </button>

    {{-- Initialisation du Scroll To Top --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('scrollTop');
            window.addEventListener('scroll', () => {
                btn.style.display = window.scrollY > 300 ? 'block' : 'none';
            });
            btn.addEventListener('click', () => {
                window.scrollTo({top:0,behavior:'smooth'});
            });
        });
    </script>

</body>
</html>
