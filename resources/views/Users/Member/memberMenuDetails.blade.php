@extends('layouts.app')
@section('title')
{{ $viewMenu->menu_title }} Details
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
@php
use Illuminate\Support\Facades\DB;

$partner_id = DB::table('menus')->where('id', $viewMenu->id)->value('partner_id');
$partner_user_id = DB::table('partners')->where('id', $partner_id)->value('user_id');
$partner_geolocation = DB::table('users')->where('id', $partner_user_id)->value('geolocation');
$user_geolocation = DB::table('users')->where('id', Auth()->user()->id)->value('geolocation');

[$user_lat, $user_long] = explode(',', $user_geolocation);
[$partner_lat, $partner_long] = explode(',', $partner_geolocation);

$earth_radius = 6371; // in kilometers

$lat_diff = deg2rad($partner_lat - $user_lat);
$long_diff = deg2rad($partner_long - $user_long);

$a = sin($lat_diff / 2) * sin($lat_diff / 2) +
cos(deg2rad($user_lat)) * cos(deg2rad($partner_lat)) *
sin($long_diff / 2) * sin($long_diff / 2);

$c = 2 * atan2(sqrt($a), sqrt(1 - $a));

$distance_km = round($earth_radius * $c, 3);
$distance_meter = $distance_km * 1000;

$is_within_range = $distance_km <= 10; $is_weekend=in_array(date('w'), [0, 6]); if ($is_within_range) { $message=$is_weekend ? "This Meal available only from Monday through Friday" : "This Meal is available today" ; $meal_type="Hot" ; } else { $message=$is_weekend ? "This Meal is available today" : "Support over weekend only" ; $meal_type="Frozen" ; } 
@endphp 
<div class="bg-gradient-to-r from-blue-50 to-indigo-100 py-16" id="menu-details">
	<div class="container mx-auto px-4">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-12 animate-fade-in">
				<h1 class="text-4xl font-extrabold text-gray-800 mb-4">{{ $viewMenu->menu_title }}</h1>
				<div class="mt-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-r-lg shadow-md animate-fade-in" role="alert">
					<p class="font-semibold"><?php echo $message . " and " . $meal_type . " meal will be provided based on your distance"; ?></p>
				</div>
			</div>

			<div class="bg-white shadow-2xl rounded-lg overflow-hidden">
				@if ($viewMenu->menu_image)
				<div class="relative h-80">
					<img src="{{ asset('uploads/meal/'. $viewMenu->menu_image) }}" class="w-full h-full object-cover" alt="menu image">
					<div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
						<h2 class="text-4xl font-bold text-white text-center">{{ $viewMenu->menu_title }}</h2>
					</div>
				</div>
				@endif

				<div class="p-8 space-y-8">
					<div class="animate-fade-in">
						<h3 class="text-2xl font-semibold text-gray-800 mb-4">Description</h3>
						<p class="text-gray-600 text-lg">{{ $viewMenu->menu_description }}</p>
					</div>

					<div class="grid md:grid-cols-2 gap-8">
						<div class="animate-fade-in bg-blue-50 p-6 rounded-lg shadow-md">
							<h3 class="text-xl font-semibold text-gray-800 mb-2">Time Availability</h3>
							<p class="text-gray-600"><?php echo $message; ?></p>
						</div>

						<div class="animate-fade-in bg-green-50 p-6 rounded-lg shadow-md">
							<h3 class="text-xl font-semibold text-gray-800 mb-2">Meal Type</h3>
							<p class="text-gray-600"><?php echo $meal_type; ?></p>
						</div>
					</div>

					<div class="animate-fade-in flex justify-center">
						<a href="{{ route('member#foodSafety') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300">
							<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
							</svg>
							Food Safety
						</a>
					</div>
				</div>
			</div>

			@if($memberData->member_meal_duration != 0 && $message == "This Meal is available today")
			<div class="mt-12 animate-fade-in text-center">
				<a href="{{ route('member#orderConfirmation', ['partner_id' => $viewMenu->partner_id, 'menu_id' => $viewMenu->id, 'user_id' => Auth()->user()->id]) }}" class="inline-flex items-center px-8 py-3 border border-transparent text-lg font-medium rounded-full text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
					<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
					</svg>
					Order Now
				</a>
			</div>
			@endif
		</div>
	</div>
	</div>
	@endsection