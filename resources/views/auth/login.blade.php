@extends('layouts.app')

@section('content')

<div class="container-xxl">
    <div class="row justify-content-center mt-4">
        <div class="col-4">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                  <!-- Register -->
                  <div class="card">
                    <div class="card-body">
                      <!-- Logo -->
                      <div class="row justify-content-center">
                     <div class="col-6">
                        <img src="{{url('/images/logo.jpeg')}}" style="border-radius: 50% ;box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.19);" class="img-fluid" alt="">
                        </div>
                    </div>
                      <!-- /Logo -->
                      <h4 class="mb-2 mt-4">Welcome to Admin Panel 👋</h4>
                      <p class="mb-4">Please sign-in to your account and start the adventure</p>

                      <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="email" class="form-label">Email or Username</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                          <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                               <small> {{ __('Forgot Your Password?') }}</small>
                            </a>
                        @endif

                          </div>
                          <div class="input-group input-group-merge">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                          </div>
                        </div>
                        {{-- <div class="mb-3">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                          </div>
                        </div> --}}
                        <div class="mb-3">
                          <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

    </div>
@endsection
