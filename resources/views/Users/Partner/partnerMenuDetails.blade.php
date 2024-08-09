@extends('layouts.app')
@section('title')
{{ $viewMenu->menu_title }} Details
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen py-12" id="menu-description">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="text-center mb-12">
			<h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
				{{ $viewMenu->menu_title }}
			</h1>
		</div>

		<div class="bg-white shadow-2xl rounded-3xl overflow-hidden transform hover:scale-105 transition duration-300">
			<div class="md:flex">
				<div class="md:flex-shrink-0">
					@if ($viewMenu->menu_image)
					<img class="h-96 w-full object-cover md:w-96" src="{{ asset('uploads/meal/'. $viewMenu->menu_image) }}" alt="Menu image">
					@endif
				</div>
				<div class="p-8">
					<div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Menu Details</div>
					<h2 class="block mt-1 text-3xl leading-tight font-bold text-gray-900">{{ $viewMenu->menu_title }}</h2>
					<p class="mt-4 text-gray-600">{{ $viewMenu->menu_description }}</p>

					<div class="mt-8 flex flex-wrap gap-4">
						<a href="{{ route('partner#foodSafety') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
							<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
							</svg>
							Food Safety
						</a>
						<a href="{{ route('partner#updateMenu', $viewMenu->id) }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
							<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
							</svg>
							Update
						</a>
						<a href="{{ route('partner#deleteMenu', $viewMenu->id) }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300">
							<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
							</svg>
							Delete
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection