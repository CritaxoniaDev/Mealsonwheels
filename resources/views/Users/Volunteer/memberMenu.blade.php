@extends('layouts.app')
@section('title', 'All Menus')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-100 to-green-100 py-20" id="header2">
	<div class="container mx-auto px-4">
		<h2 class="text-5xl font-extrabold text-center text-gray-800 mb-16 ">Delicious Menus Await</h2>

		@if(count($menuData) > 0)
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
			@foreach ($menuData as $menu)
			<div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl">
				<div class="relative">
					<img class="w-full h-64 object-cover" src="{{ asset('uploads/meal/' . $menu->menu_image) }}" alt="{{ $menu->menu_title }}">
					<div class="absolute top-0 right-0 bg-green-500 text-white px-4 py-2 rounded-bl-lg font-semibold">New</div>
				</div>
				<div class="p-8">
					<h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $menu->menu_title }}</h3>
					<p class="text-gray-600 mb-6 leading-relaxed">{{ Str::limit($menu->menu_description, 120) }}</p>
					<button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1">
						View Details
					</button>
				</div>
			</div>
			@endforeach
		</div>
		@else
		<div class="bg-white rounded-xl shadow-lg p-12 text-center max-w-2xl mx-auto">
			<svg class="mx-auto h-24 w-24 text-gray-400 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
			</svg>
			<h3 class="mt-6 text-xl font-bold text-gray-900">No menus available at the moment</h3>
			<p class="mt-4 text-lg text-gray-500">Our chefs are cooking up something special. Please check back soon for mouthwatering menus!</p>
			<button class="mt-8 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1">
				Notify Me When Available
			</button>
		</div>
		@endif
	</div>
</div>
@endsection