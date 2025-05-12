@extends('layouts.app')
@section('title','À propos – People Dev')
@section('meta','Qui sommes-nous, notre mission, nos équipes et nos valeurs.')

@section('content')
<section class="py-5 bg-pdos-white">
  <div class="container">
    <h2 class="text-pdos-navy mb-4" data-aos="fade-right">
      À propos de People Dev Organisation Software
    </h2>
    <p data-aos="fade-up">
      <strong>People Dev Organisation Software</strong> est une startup créée en 2022 à Douala (Cameroun),
      par une équipe de jeunes passionnés et d’experts du digital. Notre mission : proposer des solutions
      mobiles, web et marketing digital de <strong>haute qualité</strong>, adaptées aux entreprises ambitieuses
      et aux particuliers, pour automatiser leurs tâches quotidiennes et booster leur croissance.
    </p>

    {{-- Équipe --}}
    <h3 class="mt-5 mb-3 text-pdos-navy" data-aos="fade-right">Notre équipe</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
      @php
        $team = [
          [
            'name' => 'Martini TATCHOU',
            'role' => 'Lead Développeur Backend & Consultant SEO',
            'img'  => 'team/martini.jpg',
          ],
          [
            'name' => 'Dimitry TCHEUFFA',
            'role' => 'Lead Développeur Frontend & DevOps',
            'img'  => 'team/dimitry.jpg',
          ],
          [
            'name' => 'Freddy GAMO',
            'role' => 'UX/UI Designer Senior & Fullstack Dev',
            'img'  => 'team/freddy.jpg',
          ],
          [
            'name' => 'David KEMO',
            'role' => 'Fullstack Développeur',
            'img'  => 'team/david.jpg',
          ],
        ];
      @endphp

      @foreach($team as $idx => $member)
        <div class="col" data-aos="fade-up" data-aos-delay="{{ $idx * 150 }}">
          <div class="card h-100 border-0 shadow-sm text-center">
            <img src="{{ asset('images/'.$member['img']) }}"
                 class="rounded-circle mx-auto mt-3"
                 style="width:100px; height:100px; object-fit:cover;"
                 alt="Photo de {{ $member['name'] }}">
            <div class="card-body">
              <h5>{{ $member['name'] }}</h5>
              <p class="text-pdos-gray">{{ $member['role'] }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- Valeurs --}}
    <h3 class="mt-5 mb-3 text-pdos-navy" data-aos="fade-right">Nos valeurs</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4 text-center">
      @foreach([
        ['Innovation','À la pointe de la technologie.','fa-lightbulb'],
        ['Excellence','Livraison sans compromis.','fa-award'],
        ['Intégrité','Transparence & éthique.','fa-handshake'],
      ] as $idx => [$title, $desc, $icon])
        <div class="col" data-aos="fade-up" data-aos-delay="{{ $idx * 150 }}">
          <i class="fas {{ $icon }} fa-2x text-pdos-green mb-2"></i>
          <h5>{{ $title }}</h5>
          <p class="text-pdos-gray">{{ $desc }}</p>
        </div>
      @endforeach
    </div>

    {{-- Chronologie --}}
    <h3 class="mt-5 mb-3 text-pdos-navy" data-aos="fade-right">Notre histoire</h3>
    <ul class="timeline">
      <li data-aos="fade-up"><strong>2022</strong> – Création de People Dev par 4 fondateurs experts du digital.</li>
      <li data-aos="fade-up" data-aos-delay="150"><strong>2023</strong> – Lancement de notre première application web internationale.</li>
      <li data-aos="fade-up" data-aos-delay="300"><strong>2024</strong> – Déploiement de notre département marketing et social media.</li>
    </ul>
  </div>
</section>

@push('styles')
<style>
  /* Timeline basique */
  .timeline {
    list-style: none;
    padding-left: 0;
    margin-top: 2rem;
  }
  .timeline li {
    position: relative;
    padding-left: 1.5rem;
    margin-bottom: 1rem;
  }
  .timeline li::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0.4rem;
    width: 0.5rem;
    height: 0.5rem;
    background: var(--pdos-green);
    border-radius: 50%;
  }
</style>
@endpush
@endsection
