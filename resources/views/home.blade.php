@extends('layouts.app')

@section('title','Accueil – People Dev Organisation Software')
@section('meta','Solutions mobiles & web, design graphique, SEO, marketing digital et community management.')

@section('content')
{{-- Hero Carousel --}}
<section class="position-relative">
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach([1,2,3] as $i)
        <div class="carousel-item @if($loop->first) active @endif">
          <img src="{{ asset("images/hero{$i}.jpg") }}" class="d-block w-100" alt="Slide {{ $i }}" style="height:80vh; object-fit:cover;">
          <div class="carousel-caption">
            <h1>
              @if($i==1) Développement Mobile & Web
              @elseif($i==2) Marketing Digital & SEO
              @else Design Graphique & Social Media
              @endif
            </h1>
            <p>Solutions sur-mesure pour propulser votre business.</p>
            <a href="{{ route('services.index') }}" class="btn bg-pdos-green text-pdos-navy">
              Nos services <i class="fas fa-arrow-right ms-2"></i>
            </a>
          </div>
        </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</section>

{{-- Statistiques --}}
<section class="py-5 text-center bg-pdos-white">
  <div class="container row row-cols-1 row-cols-md-3 g-4">
    @foreach([
      ['150+','Projets réalisés','fa-briefcase'],
      ['10','Ans d’expérience','fa-clock'],
      ['50+','Clients satisfaits','fa-smile']
    ] as $idx => [$num,$txt,$icon])
      <div class="col" data-aos="zoom-in" data-aos-delay="{{ $idx*150 }}">
        <i class="fas {{ $icon }} fa-3x text-pdos-green mb-2"></i>
        <h2 class="fw-bold text-pdos-navy">{{ $num }}</h2>
        <p class="text-pdos-gray">{{ $txt }}</p>
      </div>
    @endforeach
  </div>
</section>

{{-- Pourquoi nous --}}
<section class="py-5 bg-pdos-light text-center">
  <div class="container">
    <h2 class="mb-4 text-pdos-navy" data-aos="fade-up">Pourquoi choisir People Dev?</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach([
        ['Innovation','Technos de pointe pour vous démarquer','fa-lightbulb'],
        ['Sécurité','Standards stricts pour vos données','fa-shield-alt'],
        ['Accompagnement','Support dédié du prototype à la prod','fa-hands-helping']
      ] as $idx => [$t,$d,$i])
        <div class="col" data-aos="fade-up" data-aos-delay="{{ $idx*150 }}">
          <i class="fas {{ $i }} fa-2x text-pdos-green mb-2"></i>
          <h5>{{ $t }}</h5>
          <p class="text-pdos-gray">{{ $d }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- CTA --}}
<section class="py-5  text-pdos-navy text-center" data-aos="zoom-in">
  <div class="container">
    <h2 class="mb-3">Prêt à démarrer votre projet?</h2>
    <p class="mb-4">Contactez-nous pour un audit gratuit et une proposition sur-mesure.</p>
    <a href="{{ route('contact') }}" class="btn bg-pdos-green text-pdos-navy">
      Contactez-nous <i class="fas fa-paper-plane ms-2"></i>
    </a>
  </div>
</section>
@endsection
