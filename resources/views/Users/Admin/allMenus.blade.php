@extends('layouts.app')
@section('title', 'Menu Management')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<section class="bg-gradient-to-r from-blue-50 to-indigo-100 py-16" id="app">
	<div class="container mx-auto px-4">
		<h2 class="text-4xl font-extrabold text-center text-indigo-700 mb-8">Our Delicious Menus</h2>

		@if (Session::has('menuCreated') || Session::has('menuDeleted') || Session::has('updateData'))
		<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8" role="alert">
			@if (Session::has('menuCreated'))
			<p>{{ Session::get('menuCreated') }}</p>
			@endif
			@if (Session::has('menuDeleted'))
			<p>{{ Session::get('menuDeleted') }}</p>
			@endif
			@if (Session::has('updateData'))
			<p>{{ Session::get('updateData') }}</p>
			@endif
		</div>
		@endif

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
			@foreach ($menuData as $menu)
			<div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:scale-105">
				<a href="{{ route('partner#viewMenu', $menu->id) }}" class="block">
					<img class="w-full h-48 object-cover" src="{{ asset('uploads/meal/' . $menu->menu_image) }}" alt="{{ $menu->menu_title }}">
					<div class="p-6">
						<h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $menu->menu_title }}</h3>
						<p class="text-gray-600 mb-4">{{ $menu->menu_description }}</p>
						@if (Auth::user()->role == 'admin')
						<div class="flex justify-between mt-4">
							<a href="{{ route('admin#updateMenu', $menu->id) }}" class="text-blue-500 hover:text-blue-700 flex items-center">
								<svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
								</svg>
								Update Menu
							</a>
							<a href="{{ route('admin#deleteMenu', $menu->id) }}" class="text-red-500 hover:text-red-700 flex items-center">
								<svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
								</svg>
								Delete Menu
							</a>
						</div>
						@endif
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection