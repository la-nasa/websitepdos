@extends('layouts.app')
@section('title','Accueil – People Dev')
@section('meta','Solutions mobiles & Web, design graphique, SEO, marketing digital.')

@section('content')
<section class="position-relative" style="height:80vh;">
  <div id="heroCarousel" class="carousel slide h-100" data-bs-ride="carousel">
    <div class="carousel-inner h-100">
      @foreach([1,2,3] as $i)
        <div class="carousel-item @if($loop->first) active @endif h-100"
             style="background:url('{{ asset("images/hero{$i}.jpg") }}') center/cover;">
          <div class="h-100 d-flex flex-column justify-content-center ps-5 hero-overlay" data-aos="fade-right">
            <h1 class="display-4 text-pdos-white mb-3">
              @if($i==1) Dév. Mobile & Web
              @elseif($i==2) Design Graphique & Social Media
              @else Marketing Digital & SEO
              @endif
            </h1>
            <p class="lead text-pdos-white mb-4">
              Solutions sur-mesure pour propulser votre business.
            </p>
            <a href="{{ route('services.index') }}"
               class="btn btn-lg bg-pdos-green text-pdos-navy"
               data-aos="fade-right" data-aos-delay="200">
              Nos services <i class="fas fa-arrow-right ms-2"></i>
            </a>
          </div>
        </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</section>

<section class="py-5 bg-pdos-white text-center">
  <div class="container row row-cols-1 row-cols-md-3 g-4">
    @foreach([['150+','Projets réalisés','fa-briefcase'],['10','Ans d’expérience','fa-clock'],['50+','Clients satisfaits','fa-smile']] as $idx=>$stat)
      <div class="col" data-aos="zoom-in" data-aos-delay="{{ $idx*150 }}">
        <i class="fas {{ $stat[2] }} fa-3x text-pdos-green mb-2"></i>
        <h2 class="fw-bold text-pdos-navy">{{ $stat[0] }}</h2>
        <p class="text-pdos-gray">{{ $stat[1] }}</p>
      </div>
    @endforeach
  </div>
</section>

<section class="py-5 bg-pdos-light">
  <div class="container text-center">
    <h2 class="mb-4 text-pdos-navy" data-aos="fade-up">Pourquoi choisir People Dev ?</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach([['Innovation','Tech de pointe','fa-lightbulb'],['Sécurité','Standards stricts','fa-shield-alt'],['Accompagnement','Support dédié','fa-hands-helping']] as $idx=>$blk)
        <div class="col" data-aos="fade-up" data-aos-delay="{{ $idx*150 }}">
          <i class="fas {{ $blk[2] }} fa-2x text-pdos-green mb-2"></i>
          <h5>{{ $blk[0] }}</h5>
          <p class="text-pdos-gray">{{ $blk[1] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-5 bg-pdos-navy text-pdos-white text-center" data-aos="zoom-in">
  <div class="container">
    <h2 class="mb-3">Prêt à démarrer ?</h2>
    <p class="mb-4">Contactez-nous pour un audit gratuit.</p>
    <a href="{{ route('contact') }}" class="btn btn-lg bg-pdos-green text-pdos-navy">
      Contactez-nous <i class="fas fa-paper-plane ms-2"></i>
    </a>
  </div>
</section>
@endsection
