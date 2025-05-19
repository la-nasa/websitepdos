<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>@yield('title', config('app.name','People Dev'))</title>
  <meta name="description" content="@yield('meta','Solutions mobiles & web, design graphique, SEO, marketing digital et community management.')">

  {{-- Bootstrap CSS CDN --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">

  {{-- AOS CSS CDN --}}
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  {{-- Votre CSS “inline” pour garantir qu’il s’applique --}}
  <style>
  /* ============================ */
  /* Palette & global            */
  /* ============================ */
  :root {
    --pdos-green:  #A3E635;
    --pdos-navy:   #274159;
    --pdos-light:  #F9FAFB;
    --pdos-white:  #FFFFFF;
    --pdos-gray:   #6E6E6E;
    --pdos-font:   'Segoe UI', sans-serif;
  }
  *,*::before,*::after { box-sizing:border-box }
  html,body{margin:0;padding:0;height:100%}
  body{
    font-family:var(--pdos-font);
    background:var(--pdos-light);
    color:var(--pdos-gray);
    line-height:1.6;
  }
  h1,h2,h3,h4,h5,h6{color:var(--pdos-navy);margin-bottom:.5rem}
  p{margin-bottom:1rem}
  a{color:var(--pdos-green);text-decoration:none}
  a:hover{color:var(--pdos-navy)}

  /* ============================ */
  /* Utilities                   */
  /* ============================ */
  .text-pdos-navy  { color: var(--pdos-navy) !important; }
  .text-pdos-green { color: var(--pdos-green) !important; }
  .text-pdos-white { color: var(--pdos-white) !important; }
  .bg-pdos-navy    { background: var(--pdos-navy) !important; }
  .bg-pdos-green   { background: var(--pdos-green) !important; }
  .bg-pdos-white   { background: var(--pdos-white) !important; }
  .bg-pdos-light   { background: var(--pdos-light) !important; }

  /* ============================ */
  /* Navbar                       */
  /* ============================ */
  .navbar {
    background: var(--pdos-white);
    box-shadow: 0 2px 4px rgba(0,0,0,.1);
  }
  .navbar .nav-link {
    color: var(--pdos-navy) !important;
    margin-right: 1rem;
  }
  .navbar .nav-link:hover {
    color: var(--pdos-green) !important;
  }

  /* ============================ */
  /* Hero Section                 */
  /* ============================ */
  .hero {
    position: relative;
    overflow: hidden;
    height: 75vh;
  }
  .hero img {
    width:100%; height:100%; object-fit:cover;
  }
  .hero::before {
    content:""; position:absolute; inset:0;
    background:rgba(0,0,0,.5);
  }
  .hero .hero-content {
    position:absolute; top:50%; left:50%;
    transform:translate(-50%,-50%);
    color:var(--pdos-white); text-align:center;
  }
  .hero .hero-content h1 {
    font-size:3rem; margin-bottom:1rem;
    text-shadow:0 2px 6px rgba(0,0,0,.8);
  }
  .hero .hero-content p {
    font-size:1.25rem; margin-bottom:1.5rem;
  }
  .hero .hero-content .btn {
    background:var(--pdos-green);
    color:var(--pdos-navy);
    padding:.75rem 1.5rem;
    border:none;
    font-weight:bold;
  }
  .hero .hero-content .btn:hover {
    background:var(--pdos-navy);
    color:var(--pdos-white);
  }

  /* ============================ */
  /* Section Titles               */
  /* ============================ */
  .section-title {
    text-align:center;
    margin:3rem 0 2rem;
  }
  .section-title h2 {
    font-size:2.5rem;
  }
  .section-title p {
    color:var(--pdos-gray);
  }

  /* ============================ */
  /* Cards                         */
  /* ============================ */
  .card-custom {
    border:none; border-radius:.5rem;
    box-shadow: 0 .25rem .5rem rgba(0,0,0,.1);
    transition:transform .3s,box-shadow .3s;
  }
  .card-custom:hover {
    transform:translateY(-5px);
    box-shadow:0 .5rem 1rem rgba(0,0,0,.15);
  }
  .card-custom .card-body h5 {
    color:var(--pdos-navy);
    margin-bottom:.5rem;
  }
  .card-custom .card-body p {
    color:var(--pdos-gray);
  }

  /* ============================ */
  /* Services Grid                */
  /* ============================ */
  .services-grid {
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:2rem;
    padding-bottom:4rem;
  }

  /* ============================ */
  /* Team Section (About)         */
  /* ============================ */
  .team {
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:2rem;
    padding:3rem 0;
  }
  .team-member {
    text-align:center;
  }
  .team-member img {
    width:100px; height:100px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:1rem;
  }

  /* ============================ */
  /* Timeline (About)             */
  /* ============================ */
  .timeline {
    list-style:none; padding-left:0; margin-top:2rem;
  }
  .timeline li {
    position:relative; padding-left:2rem; margin-bottom:1rem;
  }
  .timeline li::before {
    content:""; position:absolute; left:0; top:.3rem;
    width:.5rem; height:.5rem; background:var(--pdos-green);
    border-radius:50%;
  }
  .timeline li strong {
    color:var(--pdos-navy);
  }

  /* ============================ */
  /* Contact Form                 */
  /* ============================ */
  .contact-form {
    max-width:600px; margin:0 auto; padding:2rem;
    background:var(--pdos-white);
    border-radius:.5rem;
    box-shadow:0 .25rem .5rem rgba(0,0,0,.1);
  }
  .contact-form .form-control:focus {
    border-color:var(--pdos-green);
    box-shadow:0 0 0 .2rem rgba(163,230,53,.25);
  }
  .contact-form .btn {
    background:var(--pdos-green);
    color:var(--pdos-navy);
    padding:.75rem 1.5rem;
    border:none; font-weight:bold;
  }
  .contact-form .btn:hover {
    background:var(--pdos-navy);
    color:var(--pdos-white);
  }

  /* ============================ */
  /* Blog List                    */
  /* ============================ */
  .blog-list {
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:2rem;
    padding-bottom:4rem;
  }
  .blog-list .card img {
    height:180px; object-fit:cover;
  }

  /* ============================ */
  /* Blog Article                 */
  /* ============================ */
  .blog-article img {
    max-width:100%; height:auto; margin-bottom:2rem;
  }
  .blog-article .article-content {
    white-space: pre-wrap;
  }

  /* ============================ */
  /* Footer                       */
  /* ============================ */
  footer {
    background:var(--pdos-navy);
    color:var(--pdos-white);
    padding:3rem 0;
  }
  footer h5,h6 { color:var(--pdos-white); }
  footer a { color:var(--pdos-white); }
  footer a:hover { color:var(--pdos-green); }
  .footer-bottom { text-align:center; margin-top:2rem; font-size:.9rem; }

  /* ============================ */
  /* Scroll to Top                */
  /* ============================ */
  #scrollTop {
    position:fixed; bottom:30px; right:30px;
    width:3rem; height:3rem; border:none; border-radius:50%;
    background:var(--pdos-green); color:var(--pdos-navy);
    display:none; align-items:center; justify-content:center;
    cursor:pointer; box-shadow:0 .5rem 1rem rgba(0,0,0,.2);
    z-index:1000;
  }
  #scrollTop:hover {
    background:var(--pdos-navy); color:var(--pdos-white);
  }

  /* ============================ */
  /* AOS Animations (reset)       */
  /* ============================ */
  [data-aos] { opacity:0; transition-property:opacity,transform; }
  [data-aos].aos-animate { opacity:1; }

  /* ============================ */
  /* Responsive Adjustments       */
  /* ============================ */
  @media (max-width:768px) {
    .hero .hero-content h1 { font-size:2rem; }
    .stats, .team { gap:1rem; }
    .services-grid, .blog-list { grid-template-columns:1fr; }
  }
  </style>

</head>
<body class="d-flex flex-column min-vh-100">

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
        <img src="{{ asset('logo.png') }}" alt="Logo" style="height:40px;">
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

  {{-- Main content --}}
  <main class="flex-fill" style="padding-top:75px;">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4">
          <h5>People Dev</h5>
          <p>Startup tech spécialisée dans le mobile, le web, le design, le SEO et le marketing digital.</p>
        </div>
        <div class="col-md-2 mb-4">
          <h6>Liens</h6>
          <ul class="list-unstyled">
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('services.index') }}">Services</a></li>
            <li><a href="{{ route('about') }}">À propos</a></li>
            <li><a href="{{ route('blog.index') }}">Blog</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-4">
          <h6>Contact</h6>
          <p><i class="fas fa-envelope me-2"></i>contact@pdos.com</p>
          <p><i class="fas fa-phone me-2"></i>+237 6 1234 5678</p>
        </div>
        <div class="col-md-3 mb-4">
          <h6>Suivez-nous</h6>
          <a href="#" class="me-2 text-pdos-navy fs-4"><i class="fab fa-facebook"></i></a>
          <a href="#" class="me-2 text-pdos-navy fs-4"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-pdos-navy fs-4"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>
      <div class="footer-bottom text-center mt-3">&copy; {{ date('Y') }} People Dev. Tous droits réservés.</div>
    </div>
  </footer>

  {{-- Scroll to Top --}}
  <button id="scrollTop">
    <i class="fa fa-arrow-up"></i>
  </button>

  {{-- Bootstrap & AOS Scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration:600, once:true });
    // Scroll to top
    const btn = document.getElementById('scrollTop');
    window.addEventListener('scroll', () => btn.style.display = window.scrollY>300?'flex':'none');
    btn.onclick = () => window.scrollTo({top:0,behavior:'smooth'});
  </script>
</body>
</html>
