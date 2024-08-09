@extends('layouts.app')
@section('title', 'Create Menu')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-100 to-purple-100 py-20" id="header2">
	<div class="container mx-auto px-4">
		<div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden transform">
			<form action="{{ route('partner#saveMenu') }}" method="POST" enctype="multipart/form-data" class="flex flex-wrap">
				@csrf
				<div class="w-full lg:w-1/2 bg-gradient-to-br from-indigo-500 to-purple-600 p-12 flex items-center justify-center">
					<h1 class="text-white text-5xl font-extrabold leading-tight text-center">
						<span class="block transform hover:scale-110 transition-transform duration-300 ease-in-out mb-4">Start</span>
						<span class="block transform hover:scale-110 transition-transform duration-300 ease-in-out mb-4">Creating</span>
						<span class="block transform hover:scale-110 transition-transform duration-300 ease-in-out mb-4">Your</span>
						<span class="block transform hover:scale-110 transition-transform duration-300 ease-in-out mb-4">Own</span>
						<span class="block transform hover:scale-110 transition-transform duration-300 ease-in-out">Menu!</span>
					</h1>
				</div>
				<div class="w-full lg:w-1/2 p-12 bg-gray-50">
					<div class="space-y-8">
						<div class="animate-fade-in">
							<label for="menu_title" class="block text-sm font-semibold text-gray-700 mb-2">Menu Title</label>
							<input type="text" id="menu_title" name="menu_title" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-300 ease-in-out" placeholder="Enter your menu title" required>
						</div>
						<div class="animate-fade-in">
							<label for="menu_image" class="block text-sm font-semibold text-gray-700 mb-2">Menu Picture</label>
							<div class="relative border-2 border-dashed border-gray-300 rounded-lg p-6 hover:border-purple-500 transition duration-300 ease-in-out">
								<input type="file" id="menu_image" name="menu_image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
								<div class="text-center">
									<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
										<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
									<p class="mt-1 text-sm text-gray-600">Click to upload or drag and drop</p>
								</div>
							</div>
						</div>
						<div class="animate-fade-in">
							<label for="menu_description" class="block text-sm font-semibold text-gray-700 mb-2">Menu Description</label>
							<textarea id="menu_description" name="menu_description" rows="5" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-300 ease-in-out" placeholder="Describe your menu" required></textarea>
						</div>
						<input type="hidden" name="partner" value="{{ $partnerData->id }}" required>
						<div class="animate-fade-in">
							<button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-bold py-3 px-6 rounded-lg hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
								Create Menu
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection