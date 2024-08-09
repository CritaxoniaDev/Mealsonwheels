@extends('layouts.app')
@section('title', 'Login')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<section class="relative flex flex-wrap lg:h-screen lg:items-center" id="login">
    <div class="w-full px-4 py-12 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-12">
        <div class="mx-auto max-w-lg">
            <div class="flex items-center mb-4 pl-4">
                <a href="{{ url('/') }}" class="text-blue-500 hover:text-blue-700 flex items-center">
                    <i class="fas fa-arrow-left"></i>
                    <span class="pl-2">Back to Home</span>
                </a>
            </div>
            <h1 class="text-5xl pl-4 text-left font-bold">Login</h1>

            <p class="text-center mt-4 text-gray-500">
                Start using MerryMeal's Meal on Wheels application by signing in
            </p>
        </div>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
            @csrf

            <div>
                <label for="email" class="sr-only">Email</label>
                <div class="relative">
                    <input id="email" type="email" class="w-full border-2 rounded-lg border-gray-300 p-4 pe-12 text-sm shadow-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">
                    <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password" class="sr-only">Password</label>
                <div class="relative">
                    <input id="password" type="password" class="w-full rounded-lg border-2 border-gray-200 p-4 pe-12 text-sm shadow-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer toggle-password">
                        <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="ml-2 text-sm text-gray-600" for="remember">{{ __('Remember Me') }}</label>
                </div>

                @if (Route::has('password.request'))
                <a class="text-sm text-blue-500" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>

            <button type="submit" class="inline-block rounded-lg bg-blue-500 w-1/4 px-5 py-3 text-sm font-medium text-white">
                {{ __('Login') }}
            </button>
            <div class="mt-4 text-left">
                <span>Create an Account? </span><a href="{{ route('registration') }}" class="text-blue-500 hover:text-blue-700">Sign up Here</a>
            </div>
        </form>
    </div>

    <div class="relative sm:h-96 sm:w-full lg:h-4/6 lg:w-5/12">
        <img id="image1" alt="" src="{{ asset('images/login-pic.jpg') }}" class="absolute rounded-lg inset-0 h-full w-full object-cover opacity-100 transition-opacity duration-1000" />
        <img id="image2" alt="" src="{{ asset('images/login-pic2.jpg') }}" class="absolute rounded-lg inset-0 h-full w-full object-cover opacity-0 transition-opacity duration-1000" />
        <img id="image3" alt="" src="{{ asset('images/login-pic3.jpg') }}" class="absolute rounded-lg inset-0 h-full w-full object-cover opacity-0 transition-opacity duration-1000" />
        <img id="image4" alt="" src="{{ asset('images/login-pic4.jpg') }}" class="absolute rounded-lg inset-0 h-full w-full object-cover opacity-0 transition-opacity duration-1000" />
    </div>
</section>
@endsection
<script src="{{ asset('js/login.js') }}"></script>