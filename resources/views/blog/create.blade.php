@extends('layouts.app')
@section('title','Créer un article')

@section('content')
<section class="py-5">
  <div class="container">
    <h2>Créer un article (TEST)</h2>
    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="text" name="titre" placeholder="Titre" class="form-control mb-3">
      <textarea name="contenu" rows="5" placeholder="Contenu" class="form-control mb-3"></textarea>
      <input type="text" name="image" placeholder="URL image" class="form-control mb-3">
      <button class="btn bg-pdos-green text-pdos-white">Publier</button>
    </form>
  </div>
</section>
@endsection
