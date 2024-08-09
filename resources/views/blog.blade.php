@extends('layouts.app')
@section('title', 'Blog')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-100 via-green-100 to-yellow-100 min-h-screen py-16" id="blog">
    <div class="container mx-auto px-4">
        <h1 class="text-6xl font-extrabold text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-green-600 mb-16 animate-fade-in-down">
            MealsOnWheels: Nourishing Communities
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 mb-24">
            <div class="bg-white rounded-2xl shadow-2xl p-10 transform hover:scale-105 transition duration-300 border-t-8 border-blue-500">
                <h2 class="text-3xl font-semibold text-blue-700 mb-6">Our Mission</h2>
                <p class="text-gray-700 leading-relaxed text-lg">
                    MealsOnWheels is dedicated to providing nutritious meals to those in need, particularly the elderly and disabled. Our mission is to ensure that no one in our community goes hungry, while also promoting social interaction and checking on the well-being of our clients.
                </p>
            </div>
            <div class="bg-white rounded-2xl shadow-2xl p-10 transform hover:scale-105 transition duration-300 border-t-8 border-green-500">
                <h2 class="text-3xl font-semibold text-green-700 mb-6">How We Work</h2>
                <ul class="list-none text-gray-700 space-y-4">
                    @foreach(['Partner with local restaurants', 'Recruit dedicated volunteers', 'Deliver fresh meals daily', 'Offer special diet options', 'Provide friendly check-ins'] as $item)
                    <li class="flex items-center bg-green-50 p-3 rounded-lg">
                        <svg class="w-8 h-8 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <h2 class="text-5xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-green-600 mb-16">Our Impact</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-24">
            @foreach([
            ['number' => '100,000+', 'label' => 'Meals Delivered'],
            ['number' => '1,000+', 'label' => 'Volunteers'],
            ['number' => '50+', 'label' => 'Community Partners']
            ] as $stat)
            <div class="bg-white rounded-2xl shadow-2xl p-10 text-center transform hover:scale-105 transition duration-300 border-b-8 border-yellow-400">
                <p class="text-5xl font-bold text-blue-600 mb-4">{{ $stat['number'] }}</p>
                <p class="text-2xl text-gray-600">{{ $stat['label'] }}</p>
            </div>
            @endforeach
        </div>

        <h2 class="text-5xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-green-600 mb-16">Testimonials</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-24">
            @foreach([
            ['name' => 'Sarah J.', 'content' => "MealsOnWheels has been a lifesaver for my elderly mother. The meals are delicious and the volunteers are so kind."],
            ['name' => 'Robert M.', 'content' => "As someone with mobility issues, this service has made a huge difference in my life. I'm eating better than ever!"],
            ['name' => 'Emily T.', 'content' => "Volunteering with MealsOnWheels has been incredibly rewarding. It's more than just delivering food - we're delivering hope."]
            ] as $testimonial)
            <div class="bg-white rounded-2xl shadow-2xl p-8 transform hover:scale-105 transition duration-300 relative">
                <svg class="w-16 h-16 text-yellow-400 absolute -top-8 -left-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                </svg>
                <p class="text-gray-700 italic mb-6 text-lg">"{{ $testimonial['content'] }}"</p>
                <p class="text-blue-600 font-semibold text-xl">- {{ $testimonial['name'] }}</p>
            </div>
            @endforeach
        </div>

        <div class="text-center">
            <a href="#" class="bg-gradient-to-r from-blue-600 to-green-600 text-white px-12 py-5 rounded-full text-2xl font-bold hover:from-blue-700 hover:to-green-700 transition duration-300 transform hover:scale-105 inline-block shadow-lg">
                Get Involved Today
            </a>
        </div>
    </div>
</div>

<style>
    @keyframes fade-in-down {
        0% {
            opacity: 0;
            transform: translateY(-10px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-down {
        animation: fade-in-down 0.5s ease-out;
    }
</style>
@endsection