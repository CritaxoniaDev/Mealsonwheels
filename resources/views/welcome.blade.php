@section('title', 'Meals on Wheels')
@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@section('content')
<div class="container mx-auto" id="header2">
    <div class="flex flex-col items-center">
        <!-- Hero Section -->
        <div class="w-full bg-cover bg-center bg-no-repeat py-32 px-4 md:px-8 lg:px-16 relative" style="background-image: linear-gradient(270deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 48, 62, 0.8) 100%), url('https://images.unsplash.com/photo-1533777324565-a040eb52facd?q=80&w=2036&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
            <div class="max-w-2xl relative z-10">
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight animate-fade-in-down">Welcome to <span class="text-yellow-400">Meals on Wheels</span></h1>
                <p class="text-xl md:text-2xl text-white mb-10 animate-fade-in-up">Delivering hope, one meal at a time. We bring hot, nutritious meals to adults unable to cook for themselves.</p>
                <button class="bg-yellow-400 text-gray-900 font-bold py-4 px-8 rounded-full hover:bg-yellow-300 transition duration-300 transform hover:scale-105 animate-pulse">JOIN OUR MISSION</button>
            </div>
        </div>

        <!-- Why Choose Us Section -->
        <section id="how-it-works" class="w-full bg-gradient-to-b from-blue-50 to-white py-24 px-4 md:px-8 lg:px-16">
            <div class="max-w-6xl mx-auto text-center mb-20">
                <h2 class="text-5xl md:text-6xl font-bold mb-8 text-gray-800 leading-tight">Why Choose Meals on Wheels</h2>
                <p class="text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed">Providing nutritious meals and compassionate service to those in need, creating a community of care and support that transforms lives.</p>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-between gap-16">
                <div class="w-full md:w-1/2 rounded-2xl overflow-hidden shadow-2xl">
                    <iframe class="w-full h-96 md:h-[450px] lg:h-[500px]" src="https://www.youtube.com/embed/HqOSbjx5_Ng" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="text-4xl font-bold mb-8 text-gray-800 leading-tight">Nourishing Bodies and Spirits</h3>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Meals on Wheels delivers more than just food. We provide warm, nutritious meals, friendly visits, and safety checks that enable seniors to live nourished lives with independence and dignity. Our service is a lifeline for many in our community, offering not just sustenance, but also companionship and peace of mind.
                    </p>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="w-full py-24 px-4 md:px-8 lg:px-16 bg-gray-100">
            <!-- Feature 1 -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-12 mb-24">
                <div class="w-full md:w-1/2">
                    <h2 class="text-4xl font-bold mb-6 text-gray-800">Dedicated volunteers delivering meals with care</h2>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">Our volunteers are the heart of Meals on Wheels, bringing nutritious meals and friendly smiles to seniors in need. They're not just delivering food; they're delivering hope and human connection.</p>
                    <a href="#" class="text-blue-600 font-semibold text-lg hover:underline">Meet our incredible volunteers →</a>
                </div>
                <img src="{{ URL::asset('images/home-pic-1.jpg') }}" alt="Volunteers" class="w-full md:w-1/2 rounded-lg shadow-2xl transform hover:scale-105 transition duration-300">
            </div>

            <!-- Feature 2 -->
            <div class="flex flex-col md:flex-row-reverse items-center justify-between gap-12 mb-24">
                <div class="w-full md:w-1/2">
                    <h2 class="text-4xl font-bold mb-6 text-gray-800">Nutritious meals tailored to individual needs</h2>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">We provide balanced, healthy meals designed to meet the diverse dietary requirements of our seniors. Our menus are crafted with care, ensuring every meal is as delicious as it is nutritious.</p>
                    <a href="#" class="text-blue-600 font-semibold text-lg hover:underline">Explore our diverse menus →</a>
                </div>
                <img src="/images/healthy-meal.jpg" alt="Healthy Meal" class="w-full md:w-1/2 rounded-lg shadow-2xl transform hover:scale-105 transition duration-300">
            </div>

            <!-- Feature 3 -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="w-full md:w-1/2">
                    <h2 class="text-4xl font-bold mb-6 text-gray-800">Support our mission to nourish and enrich lives</h2>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">Your donation or volunteer time can make a significant difference in the lives of seniors in our community. Join us in our mission to ensure no senior goes hungry or feels forgotten.</p>
                    <button class="bg-blue-600 text-white font-bold py-4 px-8 rounded-full hover:bg-blue-700 transition duration-300 transform hover:scale-105">Donate or Volunteer Now</button>
                </div>
                <img src="/images/community-support.jpg" alt="Community Support" class="w-full md:w-1/2 rounded-lg shadow-2xl transform hover:scale-105 transition duration-300">
            </div>
        </section>

        <!-- Latest Updates Section -->
        <section class="w-full py-24 px-4 md:px-8 lg:px-16 bg-gradient-to-b from-white to-gray-100">
            <div class="max-w-5xl mx-auto text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">Latest Meals on Wheels Updates</h2>
                <p class="text-xl text-gray-600">Stay informed about our recent activities, community impact, and upcoming events. Your involvement makes all the difference!</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Update 1 -->
                <div class="bg-white rounded-lg shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                    <img src="/images/volunteer-drive.jpg" alt="Volunteer Drive" class="w-full h-56 object-cover">
                    <div class="p-8">
                        <span class="text-sm text-gray-500">May 15, 2023</span>
                        <h3 class="text-2xl font-bold mt-2 mb-4 text-gray-800">Successful Volunteer Drive</h3>
                        <p class="text-gray-600 mb-6">Over 100 new volunteers joined our mission to serve seniors in our community, bringing fresh energy and compassion to our team.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:underline">Read full story →</a>
                    </div>
                </div>
                <!-- Update 2 -->
                <div class="bg-white rounded-lg shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                    <img src="/images/meal-milestone.jpg" alt="Meal Milestone" class="w-full h-56 object-cover">
                    <div class="p-8">
                        <span class="text-sm text-gray-500">June 2, 2023</span>
                        <h3 class="text-2xl font-bold mt-2 mb-4 text-gray-800">One Million Meals Milestone</h3>
                        <p class="text-gray-600 mb-6">We've delivered our 1 millionth meal this year, a testament to the dedication of our team and the generosity of our supporters.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:underline">Read full story →</a>
                    </div>
                </div>
                <!-- Update 3 -->
                <div class="bg-white rounded-lg shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                    <img src="/images/community-event.jpg" alt="Community Event" class="w-full h-56 object-cover">
                    <div class="p-8">
                        <span class="text-sm text-gray-500">June 20, 2023</span>
                        <h3 class="text-2xl font-bold mt-2 mb-4 text-gray-800">Annual Fundraiser Dinner</h3>
                        <p class="text-gray-600 mb-6">Join us for our annual fundraiser dinner to support our mission, meet our volunteers, and celebrate the impact we're making together.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:underline">Read full story →</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection