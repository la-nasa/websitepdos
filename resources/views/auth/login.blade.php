@extends('layouts.app')
@section('title','Login – People Dev')
@section('content')
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6" data-aos="fade-up">
        <div class="card">
          <div class="card-header">{{ __('Login') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="mb-3">
                <label>{{ __('Email') }}</label>
                <input type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror" required autofocus>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="mb-3">
                <label>{{ __('Password') }}</label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
              </div>
              <button type="submit" class="btn bg-pdos-green text-pdos-navy">{{ __('Login') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
