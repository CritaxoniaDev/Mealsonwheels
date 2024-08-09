@extends('layouts.app')
@section('title', 'Donations - Admin')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<section class="bg-gradient-to-r from-blue-50 to-indigo-100 py-16" id="header2">
	<div class="container mx-auto px-4">
		<div class="text-center mb-16">
			<h2 class="text-4xl font-extrabold text-indigo-700 mb-4">Current Total Donation</h2>
			<p class="text-3xl font-bold text-green-600">${{ number_format($totalDonate, 2) }}</p>
			<p class="mt-4 text-xl text-gray-600">Generous contributions from our MerryMeals donors</p>
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
			@foreach ($donorData as $donor)
			<div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:scale-105">
				<div class="p-8">
					<div class="text-center mb-6">
						<span class="inline-block p-3 rounded-full bg-indigo-100 text-indigo-500">
							<img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($donor->donor_first_name . ' ' . $donor->donor_last_name) }}&color=7F9CF5&background=EBF4FF" alt="Donor Avatar">
						</span>
					</div>
					<h3 class="text-2xl font-semibold text-gray-800 text-center mb-2">{{ $donor->donor_first_name }} {{ $donor->donor_last_name }}</h3>
					<p class="text-xl font-bold text-green-600 text-center mb-4">Donation: ${{ number_format(DB::table('donor_fees')->where('id',$donor->id)->value('donor_fee'), 2) }}</p>
					<div class="space-y-2 text-gray-600">
						<p><span class="font-semibold">Address:</span> {{ $donor->donor_address }}</p>
						<p><span class="font-semibold">Contact:</span> {{ $donor->donor_phone }}</p>
						<p><span class="font-semibold">Email:</span> {{ $donor->donor_email }}</p>
						<p><span class="font-semibold">Date:</span> {{ $donor->updated_at->format('F d, Y') }}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection