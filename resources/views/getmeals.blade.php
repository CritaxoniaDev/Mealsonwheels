@extends('layouts.app')
@section('title', 'Get Meals')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-green-100 via-blue-100 to-purple-100 min-h-screen py-16" id="header2">
    <div class="container mx-auto px-4">
        <h1 class="text-6xl font-extrabold text-center text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600 mb-16 animate-fade-in-down">
            Nourishing Lives with Meals on Wheels
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 mb-24">
            <div class="bg-white rounded-3xl shadow-2xl p-10 border-t-8 border-green-500">
                <h2 class="text-4xl font-bold text-green-700 mb-8">Our Commitment to Nutrition</h2>
                <p class="text-gray-700 mb-8 text-xl leading-relaxed">
                    At Meals on Wheels, we're passionate about providing nutritious meals that cater to the unique needs of seniors and those with limited mobility. Our expert nutritionists craft each meal to ensure a perfect balance of flavors and essential nutrients.
                </p>
                <ul class="space-y-4 text-gray-700 text-lg">
                    <li class="flex items-center bg-green-50 p-3 rounded-lg">
                        <svg class="w-8 h-8 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Balanced portions of protein, carbohydrates, and vegetables
                    </li>
                    <li class="flex items-center bg-green-50 p-3 rounded-lg">
                        <svg class="w-8 h-8 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Low-sodium options available
                    </li>
                    <li class="flex items-center bg-green-50 p-3 rounded-lg">
                        <svg class="w-8 h-8 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Diabetic-friendly meals
                    </li>
                    <li class="flex items-center bg-green-50 p-3 rounded-lg">
                        <svg class="w-8 h-8 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Variety of flavors to suit different tastes
                    </li>
                </ul>
            </div>
            <div class="bg-white rounded-3xl shadow-2xl p-10 border-t-8 border-blue-500">
                <img src="/images/chicken-quinoa.jpg" alt="Nutritional Meal" class="w-full h-96 object-cover rounded-2xl mb-8 shadow-lg">
                <p class="text-xl text-gray-600 text-center italic font-light">Sample meal: Grilled chicken with roasted vegetables and quinoa</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl p-16 mb-24">
            <h2 class="text-4xl font-bold text-green-700 mb-12 text-center">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="text-center transform hover:scale-105 transition duration-300">
                    <div class="bg-gradient-to-br from-green-100 to-blue-100 rounded-full p-8 inline-block mb-8 shadow-lg">
                        <svg class="w-20 h-20 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-green-700 mb-4">1. Sign Up</h3>
                    <p class="text-gray-700 text-xl">Register for our meal delivery service with ease</p>
                </div>
                <div class="text-center transform hover:scale-105 transition duration-300">
                    <div class="bg-gradient-to-br from-green-100 to-blue-100 rounded-full p-8 inline-block mb-8 shadow-lg">
                        <svg class="w-20 h-20 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-green-700 mb-4">2. Customize</h3>
                    <p class="text-gray-700 text-xl">Tailor your meals to your preferences and dietary needs</p>
                </div>
                <div class="text-center transform hover:scale-105 transition duration-300">
                    <div class="bg-gradient-to-br from-green-100 to-blue-100 rounded-full p-8 inline-block mb-8 shadow-lg">
                        <svg class="w-20 h-20 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-green-700 mb-4">3. Enjoy</h3>
                    <p class="text-gray-700 text-xl">Savor your nutritious meals delivered right to your doorstep</p>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('registration') }}" class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-16 py-5 rounded-full text-2xl font-bold hover:from-green-600 hover:to-blue-600 transition duration-300 transform hover:scale-105 inline-block shadow-xl">
                Start Your Nutritional Journey
            </a>
        </div>
    </div>
</div>
@endsection