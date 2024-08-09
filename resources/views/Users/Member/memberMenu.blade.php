@extends('layouts.app')
@section('title', 'Menus')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-50 to-indigo-100 py-16" id="all-menu">
	<div class="container mx-auto px-4">
		<div class="text-center mb-12 animate-fade-in">
			<h3 class="text-4xl font-extrabold text-gray-800 mb-4">Our Delicious Menus</h3>
			<div class="bg-yellow-100 border-l-4 rounded-lg border-yellow-500 text-yellow-700 p-4 max-w-3xl mx-auto shadow-md">
				<p class="italic text-center text-sm md:text-base">Based on your location, menu availability varies according to the day you are ordering and if your distance is within 10 km from our food service partner provider</p>
			</div>
		</div>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
			@foreach ($menuData as $menu)
			@php
			$partner_id = Illuminate\Support\Facades\DB::table('menus')->where('id', $menu->id)->value('partner_id');
			$partner_user_id = Illuminate\Support\Facades\DB::table('partners')->where('id', $partner_id)->value('user_id');
			$partner_geolocation = Illuminate\Support\Facades\DB::table('users')->where('id', $partner_user_id)->value('geolocation');
			$user_geolocation = Illuminate\Support\Facades\DB::table('users')->where('id', Auth()->user()->id)->value('geolocation');

			[$user_lat, $user_long] = explode(',', $user_geolocation);
			[$partner_lat, $partner_long] = explode(',', $partner_geolocation);

			$earth_radius = 6371; // in kilometers

			$lat_diff = deg2rad($partner_lat - $user_lat);
			$long_diff = deg2rad($partner_long - $user_long);

			$a = sin($lat_diff / 2) * sin($lat_diff / 2) +
			cos(deg2rad($user_lat)) * cos(deg2rad($partner_lat)) *
			sin($long_diff / 2) * sin($long_diff / 2);

			$c = 2 * atan2(sqrt($a), sqrt(1 - $a));

			$DistanceKM = round($earth_radius * $c, 3);

			$is_weekend = in_array(date('w'), [0, 6]);
			$is_within_range = $DistanceKM <= 10; if ($is_weekend) { if ($is_within_range) { $meal_type="Hot" ; $message="This Meal available only from Monday through Friday" ; } else { $meal_type="Cold" ; $message="This Meal is available today" ; } } else { if ($is_within_range) { $meal_type="Hot" ; $message="This Meal is available today" ; } else { $meal_type="Cold" ; $message="Support over weekend only" ; } } @endphp <a href="{{ route('member#viewMenu', $menu->id) }}" class="block group">
				<div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-2xl">
					<div class="relative">
						<img class="w-full h-56 object-cover transition duration-300 ease-in-out group-hover:opacity-75" src="{{ asset('uploads/meal/' . $menu->menu_image) }}" alt="{{ $menu->menu_title }}">
						<div class="absolute top-0 right-0 bg-blue-600 text-white px-3 py-1 text-sm font-semibold rounded-bl-lg">{{ $meal_type }}</div>
						<div class="absolute top-0 left-0 bg-green-600 text-white px-3 py-1 text-sm font-semibold rounded-br-lg">{{ $DistanceKM }} km</div>
					</div>
					<div class="p-6">
						<h2 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition duration-300">{{ $menu->menu_title }}</h2>
						<p class="text-sm text-gray-500 mb-3">
							{{ \Illuminate\Support\Facades\DB::table('partners')->where('id', $menu->partner_id)->value('partnership_restaurant') }}
						</p>
						<p class="text-gray-600 mb-4 line-clamp-2">{{ $menu->menu_description }}</p>
						<div class="flex items-center justify-between">
							<span class="text-sm font-medium {{ $message == 'This Meal is available today' ? 'text-green-600' : 'text-red-500' }}">
								{{ $message }}
							</span>
							<svg class="w-6 h-6 text-blue-600 transition duration-300 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
							</svg>
						</div>
					</div>
				</div>
				</a>
				@endforeach
		</div>
	</div>
</div>
@endsection