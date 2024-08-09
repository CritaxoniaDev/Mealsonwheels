@extends('layouts.app')
@section('title', 'Services')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen py-16" id="faq">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-extrabold text-center text-indigo-800 mb-16 relative">
            Frequently Asked Questions
            <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-32 h-1 bg-indigo-500"></span>
        </h1>

        <div class="max-w-3xl mx-auto">
            <div class="space-y-6">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full py-4 px-6 text-left bg-indigo-100 hover:bg-indigo-200 transition-colors duration-300 flex justify-between items-center focus:outline-none">
                        <span class="text-lg font-semibold text-indigo-800">How often are meals delivered?</span>
                        <svg class="w-6 h-6 text-indigo-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="p-6 text-gray-700">Meals are typically delivered once a day, five days a week. Weekend meals can be delivered on Friday upon request.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full py-4 px-6 text-left bg-indigo-100 hover:bg-indigo-200 transition-colors duration-300 flex justify-between items-center focus:outline-none">
                        <span class="text-lg font-semibold text-indigo-800">Can I choose my meals?</span>
                        <svg class="w-6 h-6 text-indigo-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="p-6 text-gray-700">Yes, we offer a rotating menu with multiple options each day. You can choose your preferred meals when you sign up or update your preferences anytime.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full py-4 px-6 text-left bg-indigo-100 hover:bg-indigo-200 transition-colors duration-300 flex justify-between items-center focus:outline-none">
                        <span class="text-lg font-semibold text-indigo-800">Is there a cost for the service?</span>
                        <svg class="w-6 h-6 text-indigo-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="p-6 text-gray-700">The cost varies based on individual circumstances. We offer subsidized rates for those who qualify. Please contact us for more information about pricing and financial assistance.</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full py-4 px-6 text-left bg-indigo-100 hover:bg-indigo-200 transition-colors duration-300 flex justify-between items-center focus:outline-none">
                        <span class="text-lg font-semibold text-indigo-800">How can I become a volunteer?</span>
                        <svg class="w-6 h-6 text-indigo-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="p-6 text-gray-700">To become a volunteer, fill out the online application form on our website. We'll review your application and contact you for an interview and orientation session.</p>
                    </div>
                </div>

                <!-- Partner FAQ -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full py-4 px-6 text-left bg-indigo-100 hover:bg-indigo-200 transition-colors duration-300 flex justify-between items-center focus:outline-none">
                        <span class="text-lg font-semibold text-indigo-800">How can restaurants become partners?</span>
                        <svg class="w-6 h-6 text-indigo-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="p-6 text-gray-700">Restaurants interested in partnering with us can reach out through our partnership form. We'll review your application and discuss menu options, food safety standards, and delivery logistics.</p>
                    </div>
                </div>

                <!-- Member FAQ -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full py-4 px-6 text-left bg-indigo-100 hover:bg-indigo-200 transition-colors duration-300 flex justify-between items-center focus:outline-none">
                        <span class="text-lg font-semibold text-indigo-800">What is the process for becoming a member?</span>
                        <svg class="w-6 h-6 text-indigo-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="p-6 text-gray-700">To become a member, submit an application online or call our office. We'll assess your eligibility, conduct a home visit if necessary, and set up your meal delivery schedule once approved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('button').forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;
            const icon = button.querySelector('svg');

            content.style.maxHeight = content.style.maxHeight ? null : content.scrollHeight + 'px';
            icon.classList.toggle('rotate-180');
        });
    });
</script>
@endsection