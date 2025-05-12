@extends('layouts.app')

@section('title','Contact – People Dev')
@section('meta','Contactez People Dev pour vos projets mobiles, web, design, SEO et marketing.')

@section('content')
<section class="py-5 bg-pdos-light">
  <div class="container">
    <h2 class="text-center text-pdos-navy mb-4" data-aos="fade-down">Contactez-nous</h2>
    <div class="row justify-content-center">
      <div class="col-md-8" data-aos="fade-up">
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('contact.send') }}" method="POST" class="card p-4 shadow-sm border-0">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror"></textarea>
            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <button class="btn bg-pdos-green text-pdos-navy">Envoyer <i class="fas fa-paper-plane ms-2"></i></button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
