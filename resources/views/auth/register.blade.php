@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-xl-5 col-lg-6 col-md-7 mx-auto mt-5">
        <div class="card radius-10">
          <div class="card-body p-4">
            <div class="text-center">
              <h4>Sign Up</h4>
              <p>Creat New account</p>
            </div>
            <form class="form-body row g-3" method="POST" action="{{ route('register') }}">
              <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <input id="name" placeholder="Your name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input id="email" placeholder="abc@example.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input id="password" placeholder="Your password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-12">
                <label for="password_confirmation" class="form-label">Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
              <div class="col-12 col-lg-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                  <label class="form-check-label" for="flexCheckChecked">
                    I agree the Terms and Conditions
                  </label>
                </div>
              </div>
              <div class="col-12 col-lg-12">
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
              </div>
              <div class="col-12 col-lg-12 text-center">
                <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
