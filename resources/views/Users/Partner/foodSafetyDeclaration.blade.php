@extends('layouts.app')
@section('title', 'Food Safety Management')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-50 to-indigo-100 py-16" id="food-safety-management">
	<div class="container mx-auto px-4">
		<div class="max-w-4xl mx-auto">
			<div class="bg-white shadow-2xl rounded-lg overflow-hidden">
				<div class="p-8 space-y-10">
					<div class="animate-fade-in text-center">
						<svg class="w-16 h-16 mx-auto text-blue-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
						</svg>
						<h4 class="text-2xl font-extrabold text-gray-800 mb-2">Meals on Wheels</h4>
						<h1 class="text-4xl font-extrabold text-gray-800 mb-4">Food Safety Management</h1>
						<p class="text-xl text-gray-600">Our commitment to food safety is paramount. We adhere to strict guidelines and best practices to ensure the health and well-being of our customers.</p>
					</div>

					<div class="grid md:grid-cols-2 gap-8">
						<div class="animate-fade-in bg-blue-50 p-6 rounded-lg shadow-md">
							<svg class="w-10 h-10 text-blue-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
							</svg>
							<h3 class="text-xl font-semibold text-gray-800 mb-2">Hygiene and Sanitation</h3>
							<p class="text-gray-600">We maintain rigorous hygiene standards in all areas of food preparation, including regular hand washing and sanitization practices.</p>
						</div>

						<div class="animate-fade-in bg-blue-50 p-6 rounded-lg shadow-md">
							<svg class="w-10 h-10 text-blue-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
							</svg>
							<h3 class="text-xl font-semibold text-gray-800 mb-2">Temperature Control</h3>
							<p class="text-gray-600">We ensure all foods are stored, prepared, and served at safe temperatures to prevent bacterial growth and maintain food quality.</p>
						</div>

						<div class="animate-fade-in bg-blue-50 p-6 rounded-lg shadow-md">
							<svg class="w-10 h-10 text-blue-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
							</svg>
							<h3 class="text-xl font-semibold text-gray-800 mb-2">Allergen Management</h3>
							<p class="text-gray-600">Our staff is trained in allergen awareness, with protocols in place to prevent cross-contact during food preparation and service.</p>
						</div>

						<div class="animate-fade-in bg-blue-50 p-6 rounded-lg shadow-md">
							<svg class="w-10 h-10 text-blue-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
							</svg>
							<h3 class="text-xl font-semibold text-gray-800 mb-2">Staff Training</h3>
							<p class="text-gray-600">All food handlers undergo comprehensive training on foodborne illnesses, safe handling practices, and personal hygiene requirements.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="mt-10 animate-fade-in text-center">
				<a href="javascript:history.go(-1)" class="inline-block bg-blue-600 text-white font-bold py-3 px-6 rounded-full hover:bg-blue-700 transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
					<svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
					</svg>
					Back to Menu
				</a>
			</div>
		</div>
	</div>
</div>
@endsection