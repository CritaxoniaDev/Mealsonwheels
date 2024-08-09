@extends('layouts.app')
@section('title', 'Services')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 min-h-screen py-16" id="services">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-extrabold text-center text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-16 relative">
            Our Services
            <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full"></span>
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Services Description -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transform transition duration-500 hover:scale-105 hover:rotate-1 border-t-4 border-indigo-600">
                <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 p-4">
                    <h2 class="text-2xl font-semibold text-white mb-2">Services Provided</h2>
                </div>
                <div class="p-6">
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Meal preparation and delivery
                        </li>
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Nutritional counseling
                        </li>
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Special diet accommodations
                        </li>
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Friendly check-ins
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Eligibility Criteria -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transform transition duration-500 hover:scale-105 hover:rotate-1 border-t-4 border-purple-600">
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 p-4">
                    <h2 class="text-2xl font-semibold text-white mb-2">Eligibility Criteria</h2>
                </div>
                <div class="p-6">
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Age 65 or older
                        </li>
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Unable to prepare meals
                        </li>
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Limited mobility
                        </li>
                        <li class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            No regular caregiver
                        </li>
                    </ul>
                </div>
            </div>

            <!-- How to Apply -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transform transition duration-500 hover:scale-105 hover:rotate-1 border-t-4 border-pink-600">
                <div class="bg-gradient-to-r from-pink-600 to-pink-700 p-4">
                    <h2 class="text-2xl font-semibold text-white mb-2">How to Apply</h2>
                </div>
                <div class="p-6">
                    <ol class="space-y-3">
                        <li class="flex items-center text-gray-700">
                            <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-pink-100 rounded-full text-pink-500 font-bold mr-3">1</span>
                            Fill out online application
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-pink-100 rounded-full text-pink-500 font-bold mr-3">2</span>
                            Provide necessary documentation
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-pink-100 rounded-full text-pink-500 font-bold mr-3">3</span>
                            Schedule an assessment
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-pink-100 rounded-full text-pink-500 font-bold mr-3">4</span>
                            Await approval notification
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="mt-16 text-center">
            <a href="#" class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold py-4 px-8 rounded-full hover:from-indigo-700 hover:to-purple-700 transition duration-300 transform hover:scale-105 hover:shadow-lg">
                Apply Now
            </a>
        </div>
    </div>
</div>
@endsection