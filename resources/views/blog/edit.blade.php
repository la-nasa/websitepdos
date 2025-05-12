@extends('layouts.app')

@section('title',"Éditer – {$article->titre}")
@section('meta',"Édition de l'article {$article->titre}.")

@section('content')
<section class="py-5">
  <div class="container">
    <h2 class="text-pdos-navy mb-4" data-aos="fade-up">Éditer un article</h2>
    <form action="{{ route('blog.update',$article) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm border-0" data-aos="fade-up" data-aos-delay="200">
      @csrf @method('PUT')
      <div class="mb-3">
        <label class="form-label">Titre</label>
        <input type="text" name="titre" value="{{ $article->titre }}" class="form-control @error('titre') is-invalid @enderror">
        @error('titre')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Contenu</label>
        <textarea name="contenu" rows="6" class="form-control @error('contenu') is-invalid @enderror">{{ $article->contenu }}</textarea>
        @error('contenu')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Image (optionnelle)</label>
        <input type="file" name="image" class="form-control mb-2">
        @if($article->image)
          <img src="{{ asset('storage/'.$article->image) }}" class="img-thumbnail" style="max-width:200px" alt="">
        @endif
      </div>
      <button class="btn bg-pdos-green text-pdos-navy">Mettre à jour</button>
    </form>
  </div>
</section>
@endsection
