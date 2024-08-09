@extends('layouts.app')
@section('title', 'Terms & Conditions')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<body class="bg-gray-100 font-sans" id="header2">
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-5xl font-bold text-center text-blue-600 mb-8">Terms and Conditions</h1>

        <div class="bg-white shadow-2xl rounded-lg overflow-hidden">
            <div class="p-8">
                <div class="flex items-center mb-6">
                    <svg class="w-12 h-12 text-blue-500 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <p class="text-xl text-gray-700 leading-relaxed">
                        Meals on Wheels is a community-driven initiative dedicated to nourishing and enriching the lives of seniors and individuals with limited mobility.
                    </p>
                </div>

                <h2 class="text-3xl font-semibold text-blue-500 mb-4">Our Mission</h2>
                <p class="text-gray-700 mb-6 leading-relaxed">
                    Our mission is to deliver not just meals, but also companionship and a sense of connection to those who need it most. We strive to ensure that no senior in our community goes hungry or feels isolated.
                </p>

                <h2 class="text-3xl font-semibold text-blue-500 mb-4">Our Services</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-gray-700">Nutritious meal delivery to homes</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="text-gray-700">Friendly check-ins and social interaction</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <span class="text-gray-700">Customized meal plans to meet dietary needs</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                        <span class="text-gray-700">Community engagement and volunteer opportunities</span>
                    </div>
                </div>

                <h2 class="text-3xl font-semibold text-blue-500 mb-4">Our Impact</h2>
                <div class="bg-blue-100 p-6 rounded-lg mb-6">
                    <p class="text-gray-700 leading-relaxed">
                        Every day, our dedicated volunteers and staff work tirelessly to ensure that no senior in our community goes hungry or feels isolated. Through our efforts, we've seen:
                    </p>
                    <ul class="list-disc list-inside mt-4 text-gray-700 space-y-2">
                        <li>Improved health outcomes for seniors</li>
                        <li>Reduced social isolation and loneliness</li>
                        <li>Enhanced quality of life for countless individuals</li>
                        <li>Stronger community bonds and support networks</li>
                    </ul>
                </div>

                <h2 class="text-3xl font-semibold text-blue-500 mb-4">Get Involved</h2>
                <p class="text-gray-700 mb-6 leading-relaxed">
                    Whether you're looking to volunteer, donate, or receive services, we welcome you to join our Meals on Wheels family. Together, we can make a significant difference in the lives of those who need it most.
                </p>

                <div class="mt-8 flex justify-center space-x-4">
                    <a href="#" class="bg-blue-500 text-white font-bold py-3 px-6 rounded-full hover:bg-blue-600 transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Contact Us
                    </a>
                    <a href="#" class="bg-green-500 text-white font-bold py-3 px-6 rounded-full hover:bg-green-600 transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Volunteer Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection