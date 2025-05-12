@extends('layouts.app')
@section('title','Blog – People Dev')
@section('meta','Analyses, études de cas et conseils de la team People Dev.')

@section('content')
<section class="py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="text-pdos-navy">Blog</h2>
      @auth
        <a href="{{ route('blog.create') }}"
           class="btn bg-pdos-green text-pdos-white">
          <i class="fas fa-plus"></i> Créer un article
        </a>
      @endauth
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-4">
      @foreach($articles as $article)
        <div class="col" data-aos="fade-up">
          <div class="card h-100 shadow-sm hover-scale">
            <img src="{{ $article->image }}" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">{{ $article->titre }}</h5>
              <p class="text-pdos-gray">{{ Str::limit(strip_tags($article->contenu),150) }}</p>
              <a href="{{ route('blog.show',$article) }}" class="stretched-link">Lire la suite</a>
            </div>
            <div class="card-footer text-muted small">
              Publié le {{ $article->created_at->format('d/m/Y') }}
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="mt-4">{{ $articles->links() }}</div>
  </div>
</section>
@endsection
