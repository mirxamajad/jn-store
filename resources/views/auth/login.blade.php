@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
        <div class="card radius-10">
          <div class="card-body p-4">
            <div class="text-center">
              <h4>Sign In</h4>
              <p>Sign In to your account</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="form-body row g-3">
                @csrf
              <div class="col-12">
                <label for="inputEmail" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="inputEmail" placeholder="abc@example.com" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
              <div class="col-12">
                <label for="inputPassword" class="form-label">Password</label>
                <input id="password" type="password" id="inputPassword" placeholder="Your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-12 col-lg-6">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckRemember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckRemember">Remember Me</label>
                </div>
              </div>
              <div class="col-12 col-lg-6 text-end">
                  @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
              </div>
              <div class="col-12 col-lg-12">
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
              </div>
              <div class="col-12 col-lg-12 text-center">
                <p class="mb-0">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
