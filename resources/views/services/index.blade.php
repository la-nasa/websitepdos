@extends('layouts.app')

@section('title','Services – People Dev')
@section('meta','Découvrez nos services: mobile & web, design, SEO, marketing digital, social media.')

@section('content')
<section class="py-5 bg-pdos-light">
  <div class="container">
    <h2 class="text-center text-pdos-navy mb-5" data-aos="fade-up">Nos Services</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach($services as $s)
        <div class="col" data-aos="flip-left" data-aos-delay="{{ $loop->index*150 }}">
          <div class="card h-100 border-0 shadow-sm hover-scale text-center">
            <div class="card-body">
              <i class="{{ $s->icone }} fa-2x text-pdos-green mb-3"></i>
              <h5>{{ $s->titre }}</h5>
              <p class="text-pdos-gray">{{ $s->description }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
