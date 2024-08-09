@extends('layouts.app')
@section('title', 'Partner Dashboard')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen" id="app-partner">
	<div class="container mx-auto px-4 py-12">
		<div class="bg-white rounded-lg shadow-xl p-8 mb-8">
			<div class="flex items-center justify-between">
				<div>
					<h1 class="text-4xl font-bold text-gray-800">
						Welcome, {{ \Illuminate\Support\Facades\DB::table('partners')->where('user_id', Auth::id())->value('partnership_restaurant') }}!
					</h1>
					<p class="text-gray-600 mt-2">Manage your menus and delight your customers.</p>
				</div>
				<div class="bg-blue-500 text-white p-4 rounded-full">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
					</svg>
				</div>
			</div>
		</div>

		<div class="bg-white rounded-lg shadow-xl p-8 mb-8">
			<h2 class="text-2xl font-bold text-gray-800 mb-4">Partner Dashboard</h2>
			<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
				<div class="bg-blue-100 p-6 rounded-lg">
					<h3 class="text-xl font-semibold text-blue-800 mb-2">Total Menus</h3>
					<p class="text-3xl font-bold text-blue-600">{{ $menuData->count() }}</p>
				</div>
				<div class="bg-green-100 p-6 rounded-lg">
					<h3 class="text-xl font-semibold text-green-800 mb-2">Active Orders</h3>
					<p class="text-3xl font-bold text-green-600">{{ \App\Models\Order::count() }}</p>
				</div>
				@php
				$feedbacks = \Illuminate\Support\Facades\DB::table('feedbacks')->get();
				$totalRating = $feedbacks->sum('rating');
				$feedbackCount = $feedbacks->count();
				$averageRating = $feedbackCount > 0 ? number_format($totalRating / $feedbackCount, 1) : 0;
				@endphp

				<div class="bg-purple-100 p-6 rounded-lg">
					<h3 class="text-xl font-semibold text-purple-800 mb-2">Customer Rating</h3>
					<p class="text-3xl font-bold text-purple-600">{{ $averageRating }} <span class="text-sm">/ 5</span></p>
				</div>
			</div>
		</div>

		<div class="text-center mb-12">
			<h3 class="text-3xl font-bold text-gray-800">Your Menus</h3>
		</div>

		@if (Session::has('menuCreated') || Session::has('menuDeleted') || Session::has('updateData'))
		<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-8 rounded-r-lg shadow-md animate-fade-in" role="alert">
			{{ Session::get('menuCreated') ?? Session::get('menuDeleted') ?? Session::get('updateData') }}
		</div>
		@endif

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
			<div class="col-span-full flex justify-center items-center mb-12 space-x-8">
				<a href="{{ route('partner#createMenu') }}" class="group relative inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-indigo-500 rounded-full shadow-md">
					<span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-indigo-500 group-hover:translate-x-0 ease">
						<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
						</svg>
					</span>
					<span class="absolute flex items-center justify-center w-full h-full text-indigo-500 transition-all duration-300 transform group-hover:translate-x-full ease">Create a Menu</span>
					<span class="relative invisible">Create a Menu</span>
				</a>

				<a href="{{ route('partner#foodSafety') }}" class="group relative inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden font-medium text-emerald-600 transition duration-300 ease-out border-2 border-emerald-500 rounded-full shadow-md">
					<span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-emerald-500 group-hover:translate-x-0 ease">
						<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
						</svg>
					</span>
					<span class="absolute flex items-center justify-center w-full h-full text-emerald-500 transition-all duration-300 transform group-hover:translate-x-full ease">Food Safety</span>
					<span class="relative invisible">Food Safety</span>
				</a>
			</div>

			@foreach ($menuData as $menu)
			<div class="bg-white rounded-lg shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:scale-105">
				<img class="w-full h-48 object-cover" src="{{ asset('uploads/meal/' . $menu->menu_image) }}" alt="menu images">
				<div class="p-6">
					<h2 class="text-2xl font-semibold mb-2 text-gray-800">{{ $menu->menu_title }}</h2>
					<p class="text-gray-600 mb-4 inline-flex flex-wrap gap-2">
						@foreach(explode(',', $menu->menu_description) as $nutrient)
						<span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">{{ trim($nutrient) }}</span>
						@endforeach
					</p>
					<div class="flex justify-between items-center">
						<a href="{{ route('partner#viewMenu', $menu->id) }}" class="text-blue-500 hover:text-blue-700 font-medium">View Details</a>
						@if ( Auth::user()->role == 'partner')
						<div class="space-x-2">
							<a href="{{ route('partner#updateMenu', $menu->id) }}" class="text-green-500 hover:text-green-700">Update</a>
							<a href="{{ route('partner#deleteMenu', $menu->id) }}" class="text-red-500 hover:text-red-700">Delete</a>
						</div>
						@endif
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection