@extends('layouts.app')

@section('content')
<div class="container w-96 mx-auto mt-6">
    <div class="">
        <div class="col-md-8">
            <div class="card p-5 m-2">
                {{-- <div class="text-center text-3xl">{{ __('Register') }}</div> --}}
                <h1 class="text-3xl pt-8">Welcome Back</h1>
                <h2 class="text-blue-500">Enter your details below to register.</h2>
                <div class="card-body mt-6">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full px-3">
                                <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id=" name" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('name') border-red-500 @enderror" name="name" placeholder="John Doe" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full px-3">
                                <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('email') border border-red-500 @enderror" placeholder="your@example.com" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full px-3">
                                <label for="password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full px-3">
                                <label for="password-confirm" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="w-full px-3 mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn bg-primary text-white   rounded">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
