@extends('layouts.app')
@section('title','Register – People Dev')
@section('content')
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6" data-aos="fade-up">
        <div class="card">
          <div class="card-header">{{ __('Register') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="mb-3">
                <label>{{ __('Name') }}</label>
                <input type="text" name="name"
                       class="form-control @error('name') is-invalid @enderror" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="mb-3">
                <label>{{ __('Email') }}</label>
                <input type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="mb-3">
                <label>{{ __('Password') }}</label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="mb-3">
                <label>{{ __('Confirm Password') }}</label>
                <input type="password" name="password_confirmation" class="form-control" required>
              </div>
              <button type="submit" class="btn bg-pdos-green text-pdos-navy">{{ __('Register') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
