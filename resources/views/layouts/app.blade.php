<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDOS Website</title>

    {{-- Chargement du CSS compilé via Vite (manifest.json) --}}
    @php
        $manifestPath = public_path('build/manifest.json');
        $manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : [];

        $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
    @endphp

    @if($cssFile)
        <link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- fallback si manifest absent --}}
    @endif
</head>
<body>

    {{-- Barre de navigation --}}
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ url('/about') }}">À propos</a></li>
            <li><a href="{{ url('/services') }}">Services</a></li>
            <li><a href="{{ url('/blog') }}">Blog</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
    </nav>

    {{-- Contenu principal --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <p>&copy; {{ date('Y') }} PDOS. Tous droits réservés.</p>
    </footer>

    {{-- JS compilé via Vite --}}
    @php
        $jsFile = $manifest['resources/js/app.js']['file'] ?? null;
    @endphp

    @if($jsFile)
        <script type="module" src="{{ asset('build/' . $jsFile) }}"></script>
    @endif

</body>
</html>
