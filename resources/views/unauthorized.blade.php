@extends('layouts.unauthorized_layout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-400 via-pink-500 to-red-500" id="header2">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-2xl transform hover:scale-105 transition-all duration-300">
        <div class="text-center">
            <svg class="mx-auto h-24 w-24 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Admin Access Required
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                This area is restricted to authorized administrators only.
            </p>
        </div>
        <div class="mt-8 space-y-6">
            <div class="relative">
                <a href="{{ Auth::user()->role === 'volunteer' ? route('volunteer#index') : (Auth::user()->role === 'partner' ? route('partner#index') : route('member#index')) }}" class="group w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:scale-105 transition-all duration-300">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Return to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection