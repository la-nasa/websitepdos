@extends('layouts.app')
@section('title','Reset Password – People Dev')
@section('meta','Réinitialisation de mot de passe.')

@section('content')
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6" data-aos="fade-up">
        <div class="card shadow-sm">
          <div class="card-header text-pdos-navy">{{ __('Reset Password') }}</div>
          <div class="card-body">
            @if(session('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
              @csrf
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <button type="submit" class="btn bg-pdos-green text-pdos-navy">
                Envoyer lien de réinitialisation
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
