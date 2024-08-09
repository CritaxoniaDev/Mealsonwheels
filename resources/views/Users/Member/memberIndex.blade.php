@extends('layouts.app')
@section('title', 'Member Dashboard')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<section class="bg-gradient-to-r from-blue-50 to-indigo-100 min-h-screen py-12">
    <div class="container mx-auto px-4" id="app">
        <div class="bg-white rounded-lg shadow-xl overflow-hidden mb-12">
            <div class="relative h-96">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url(/images/healthy-meal-for-seniors.jpg);"></div>
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-white mb-4"><span class="text-yellow-400">Enjoy</span> Nutritious <span class="text-blue-400">Meals at Home</span></h2>
                        <p class="text-xl text-white mb-8">Delicious, balanced meals delivered right to your doorstep.</p>
                        <a href="{{ route('member#viewAllMenu') }}" class="bg-blue-400 text-gray-900 font-bold py-3 px-6 rounded-full hover:bg-yellow-500 transition duration-300">View Today's Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-10">
            <div class="grid grid-cols-1 gap-y-8 lg:grid-cols-2 lg:items-center lg:gap-x-16">
                <div class="space-y-6">
                    <h2 class="text-4xl font-extrabold text-indigo-700 leading-tight">Your Meal Dashboard</h2>
                    <p class="text-xl text-gray-600">
                        Manage your meal plans, view upcoming deliveries, and update your preferences. We're here to ensure you receive nutritious meals tailored to your needs.
                    </p>
                    <a href="{{ route('member#viewAllMenu') }}" class="inline-flex items-center px-6 py-3 text-lg font-semibold text-white bg-indigo-600 rounded-full hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span>View Today's Menu</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-6 sm:grid-cols-2 lg:grid-cols-2">
                    <a class="flex flex-col items-center p-6 bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 ease-in-out transform hover:scale-105" href="{{ route('member#viewAllMenu') }}">
                        <span class="inline-block p-3 rounded-full bg-indigo-100 text-indigo-500 mb-4">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">View Menu</h3>
                        <p class="text-sm text-gray-600 text-center">Browse our selection of meals</p>
                    </a>
                    @php
                    $hasOrder = \Illuminate\Support\Facades\DB::table('orders')->where('user_id', Auth()->user()->id)->value('id') != null;
                    @endphp
                    <a class="flex flex-col items-center p-6 bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 ease-in-out transform hover:scale-105 {{ !$hasOrder ? 'opacity-50 cursor-not-allowed' : '' }}" href="{{ $hasOrder ? route('order#showOrderDelivery', Auth()->user()->id) : '#' }}" {{ !$hasOrder ? 'onclick="event.preventDefault()"' : '' }}>
                        <span class="inline-block p-3 rounded-full bg-green-100 text-green-500 mb-4">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">My Orders</h3>
                        <p class="text-sm text-gray-600 text-center">{{ $hasOrder ? 'View your order history' : 'No orders yet' }}</p>
                    </a>
                    <a class="flex flex-col items-center p-6 bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 ease-in-out transform hover:scale-105" href="{{ route('member#updateProfile', Auth()->user()->id) }}">
                        <span class="inline-block p-3 rounded-full bg-purple-100 text-purple-500 mb-4">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Profile</h3>
                        <p class="text-sm text-gray-600 text-center">Update your personal information</p>
                    </a>
                    <a class="flex flex-col items-center p-6 bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 ease-in-out transform hover:scale-105" href="#">
                        <span class="inline-block p-3 rounded-full bg-yellow-100 text-yellow-500 mb-4">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Help</h3>
                        <p class="text-sm text-gray-600 text-center">Get assistance or FAQs</p>
                    </a>
                </div>
            </div>
        </div>

        @if($memberData->member_meal_duration == 0)
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-6 rounded-lg mb-10" role="alert">
            <h4 class="text-lg font-bold mb-2">Reassessment Required</h4>
            <p class="mb-4">Please undergo reassessment to continue with your 30 days meal plan.</p>
            <a href="{{ route('member#reassesment', Auth()->user()->id) }}" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-300 ease-in-out">
                Apply for Reassessment
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
        @endif
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-10">
            <h2 class="text-3xl font-bold mb-6 text-center text-indigo-700">Caregiver Details</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Caregiver Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Caregiver Relation</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Medical Condition</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Meal Duration</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $memberData->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $memberData->member_caregiver_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $memberData->member_caregiver_relation }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $memberData->member_medical_condition }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $memberData->member_meal_duration > 10 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $memberData->member_meal_duration }} days left
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection