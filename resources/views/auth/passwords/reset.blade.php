@extends('layouts.app')
@section('title','New Password – People Dev')
@section('meta','Définir un nouveau mot de passe.')

@section('content')
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6" data-aos="fade-up">
        <div class="card shadow-sm">
          <div class="card-header text-pdos-navy">{{ __('Reset Password') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email"
                       value="{{ $email ?? old('email') }}"
                       class="form-control @error('email') is-invalid @enderror" required autofocus>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Nouveau mot de passe</label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Confirmer mot de passe</label>
                <input type="password" name="password_confirmation" class="form-control" required>
              </div>
              <button type="submit" class="btn bg-pdos-green text-pdos-navy">Réinitialiser</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
