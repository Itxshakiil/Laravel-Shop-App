@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="container mx-auto w-96 p-6 ">
    <div class="col-md-8">
        <div class="card p-3">
            <h1 class="text-3xl pt-8">Welcome Back</h1>
            <h2 class="text-blue-500">Enter your credentials below.</h2>
            {{-- <div class="card-header">{{ __('Login') }}</div> --}}

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @error('email')
                    <span class="text-red-500 mt-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="your@example.com" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="rounded @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn bg-primary text-white rounded">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
