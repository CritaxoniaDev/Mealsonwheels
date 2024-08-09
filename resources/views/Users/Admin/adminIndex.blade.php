@extends('layouts.app')
@section('title', 'Dashboard')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-100 to-purple-100 min-h-screen py-12" id="header2">
	<div class="bg-white rounded-2xl shadow-xl overflow-hidden" style="background-image: url(images/admin-pic.jpg); background-size: cover;">
		<div class="relative h-96">
			<div class="absolute inset-0 bg-cover bg-center" style="background-image: url(images/priscilla-du-preez-nNMBa7Y1Ymk-unsplash.jpg);"></div>
			<div class="absolute inset-0 bg-black opacity-60"></div>
			<div class="absolute inset-0 flex items-center justify-center">
				<div class="text-center px-6">
					<h2 class="text-5xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
						<span class="text-yellow-400">Nourishing</span> Communities,<br>
						<span class="text-yellow-400">One Meal</span> at a Time
					</h2>
					<a href="#" class="inline-block bg-yellow-400 text-gray-900 font-bold py-4 px-8 rounded-full hover:bg-yellow-300 transition duration-300 transform hover:scale-105 shadow-lg">
						Explore Our Impact
					</a>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="container mx-auto px-4" id="dashboard">
		<div class="bg-white rounded-2xl shadow-xl p-8 mb-10">
			<h1 class="text-4xl font-extrabold text-center text-indigo-700 mb-3">Dashboard Command Center</h1>
			<p class="text-center text-gray-600 text-lg">Your central hub for website administration and oversight</p>
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10" id="dashboard">
			<div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
				<h3 class="text-2xl font-semibold mb-3">Members</h3>
				<p class="text-4xl font-bold">{{ \App\Models\User::where('role', 'member')->count() }}</p>
				<p class="text-sm mt-2">Total registered users</p>
			</div>
			<div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
				<h3 class="text-2xl font-semibold mb-3">Meal Programs</h3>
				<p class="text-4xl font-bold">{{ \App\Models\Menu::count() }}</p>
				<p class="text-sm mt-2">Active meal options</p>
			</div>
			<div class="bg-gradient-to-br from-yellow-500 to-yellow-600 text-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
				<h3 class="text-2xl font-semibold mb-3">Total Orders</h3>
				<p class="text-4xl font-bold">{{ \App\Models\Order::count() }}</p>
				<p class="text-sm mt-2">All orders</p>
			</div>
			<div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
				<h3 class="text-2xl font-semibold mb-3">Total Donations</h3>
				<p class="text-4xl font-bold">${{ number_format(\App\Models\DonorFee::sum('donor_fee'), 2) }}</p>
				<p class="text-sm mt-2">Amount donated</p>
			</div>
		</div>
	</div>
</div>
@endsection