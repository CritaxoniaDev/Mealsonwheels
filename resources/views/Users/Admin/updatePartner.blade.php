@extends('layouts.app')
@section('title', 'Update Partner Information')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gray-100 py-12" id="update-partner-information">
	@if (Session::has('dataInform'))
	<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-8 text-center" role="alert">
		{{ Session::get('dataInform') }}
	</div>
	@endif
	<div class="container mx-auto px-4">
		<h2 class="font-semibold text-2xl text-gray-600 text-center">Update Partner Information: <span class="font-extrabold text-indigo-700">{{ $partnerData->partnership_restaurant }}</h2>
		<p class="text-gray-500 mb-6 text-center">Please update the partner's information below.</p>

		<div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
			<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
				<div class="text-gray-600">
					<p class="font-medium text-lg">User Information</p>
					<p>Update the partner's general details.</p>
				</div>

				<div class="lg:col-span-2">
					<form action="{{ route('admin#userUpdated', $userData->id) }}" method="POST">
						@csrf
						<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
							<div class="md:col-span-5">
								<label for="name" class="font-bold uppercase">Name</label>
								<input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('name', $userData->name) }}" />
							</div>

							<div class="md:col-span-5">
								<label for="email" class="font-bold uppercase">Email Address</label>
								<input type="email" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('email', $userData->email) }}" />
							</div>

							<div class="md:col-span-3">
								<label for="age" class="font-bold uppercase">Age</label>
								<input type="text" name="age" id="age" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('age', $userData->age) }}" />
							</div>

							<div class="md:col-span-2">
								<label for="phone" class="font-bold uppercase">Contact</label>
								<input type="text" name="phone" id="phone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('phone', $userData->phone) }}" />
							</div>

							<div class="md:col-span-5">
								<label for="address" class="font-bold uppercase">Address</label>
								<input type="text" name="address" id="address" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('address', $userData->address) }}" />
							</div>

							<input name='gender' type="hidden" value="{{ old('gender', $userData->gender) }}" />

							<div class="md:col-span-5 text-right">
								<div class="inline-flex items-end">
									<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update General Info</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
			<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
				<div class="text-gray-600">
					<p class="font-medium text-lg">Partner Details</p>
					<p>Update specific partner information.</p>
				</div>

				<div class="lg:col-span-2">
					<form action="{{ route('admin#partnerUpdated', $userData->id) }}" method="POST">
						@csrf
						<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
							<div class="md:col-span-5">
								<label for="partnership_restaurant" class="font-bold uppercase">Restaurant Name</label>
								<input type="text" name="partnership_restaurant" id="partnership_restaurant" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('partnership_restaurant', $partnerData->partnership_restaurant) }}" />
							</div>

							<div class="md:col-span-5">
								<label for="partnership_duration" class="font-bold uppercase">Partnership Duration</label>
								<input type="text" name="partnership_duration" id="partnership_duration" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('partnership_duration', $partnerData->partnership_duration) }}" />
							</div>

							<div class="md:col-span-5 text-right">
								<div class="inline-flex items-end">
									<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Partner Details</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection