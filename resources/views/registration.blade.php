@extends('layouts.app')
@section('title', 'Registration')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen py-16 px-4 sm:px-6 lg:px-8" id="member-register">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-5xl font-extrabold text-center mb-16 text-gray-800">Choose Your Role</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            <!-- Member Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition-all duration-300">
                <div class="relative h-64">
                    <img src="{{ asset('images/image-registermember.jpg') }}" alt="Member" class="object-cover w-full h-full" />
                    <h5 class="absolute bottom-4 left-4 text-2xl font-bold text-white">Member</h5>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-6">Join as a member to receive meals and support.</p>
                    <a href="{{ route('register') }}" class="block w-full bg-blue-600 text-white text-center font-semibold py-3 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                        Register as Member
                    </a>
                </div>
            </div>

            <!-- Volunteer Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition-all duration-300">
                <div class="relative h-64">
                    <img src="{{ asset('images/image-registervolunteer.jpg') }}" alt="Volunteer" class="object-cover w-full h-full" />
                    <h5 class="absolute bottom-4 left-4 text-2xl font-bold text-white">Volunteer</h5>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-6">Help us deliver meals and make a difference in your community.</p>
                    <a href="{{ route('register') }}" class="block w-full bg-green-600 text-white text-center font-semibold py-3 rounded-lg hover:bg-green-700 transition-colors duration-300">
                        Register as Volunteer
                    </a>
                </div>
            </div>

            <!-- Partner Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition-all duration-300">
                <div class="relative h-64">
                    <img src="{{ asset('images/image-registerpartner.jpg') }}" alt="Partner" class="object-cover w-full h-full" />
                    <h5 class="absolute bottom-4 left-4 text-2xl font-bold text-white">Partner</h5>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-6">Collaborate with us to expand our reach and impact.</p>
                    <a href="{{ route('register') }}" class="block w-full bg-purple-600 text-white text-center font-semibold py-3 rounded-lg hover:bg-purple-700 transition-colors duration-300">
                        Register as Partner
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection