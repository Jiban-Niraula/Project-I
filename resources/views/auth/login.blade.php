@extends('layouts.inc.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
<<<<<<< HEAD
                    <form method="POST" action="{{ route('login.submit') }}">
=======
                    <form method="POST" action="{{ route('login') }}">
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
=======
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
=======
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
<<<<<<< HEAD
=======

>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
<<<<<<< HEAD
                            <div class="col-md-6 offset-md-4">
=======
                            <div class="col-md-8 offset-md-4">
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

<<<<<<< HEAD
                                @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Register') }}
=======
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
