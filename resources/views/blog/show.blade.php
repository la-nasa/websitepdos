@extends('layouts.app')
@section('title',$article->titre)
@section('meta',Str::limit(strip_tags($article->contenu),150))

@section('content')
<section class="py-5">
  <div class="container">
    <h1 class="text-pdos-navy mb-3">{{ $article->titre }}</h1>
    <p class="text-pdos-gray mb-4">Publié le {{ $article->created_at->format('d M Y') }}</p>
    <img src="{{ $article->image }}" class="img-fluid rounded mb-4 shadow-sm" alt="">
    <div class="mb-4">{!! Str::markdown($article->contenu) !!}</div>
    @auth
      <a href="{{ route('blog.edit',$article) }}" class="btn btn-outline-primary me-2">Éditer</a>
      <form action="{{ route('blog.destroy',$article) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer ?')">
        @csrf @method('DELETE')
        <button class="btn btn-outline-danger">Supprimer</button>
      </form>
    @endauth
  </div>
</section>
@endsection
