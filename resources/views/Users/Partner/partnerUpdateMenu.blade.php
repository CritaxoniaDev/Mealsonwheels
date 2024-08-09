@extends('layouts.app')
@section('title')
Update {{ $updateMenu->menu_title }}
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gray-100 py-12">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="update-menu">
		<div class="text-center">
			<h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
				Update {{ $updateMenu->menu_title }}
			</h1>
		</div>

		<div class="mt-12 bg-white shadow-lg rounded-lg overflow-hidden">
			<form action="{{ route('partner#saveUpdate', $updateMenu->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
				@csrf
				<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
					<div class="space-y-6">
						@if ($updateMenu->menu_image)
						<img src="{{ asset('uploads/meal/'. $updateMenu->menu_image) }}" class="w-full h-64 object-cover rounded-lg" alt="menu image">
						@endif
						<div>
							<label for="menu_image" class="block text-sm font-medium text-gray-700">Update Menu Picture</label>
							<input type="file" id="menu_image" name="menu_image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
						</div>
					</div>

					<div class="space-y-6">
						<div>
							<label for="menu_title" class="block text-sm font-medium text-gray-700">Menu Title</label>
							<input type="text" id="menu_title" name="menu_title" value="{{ old('menu_title', $updateMenu->menu_title) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
						</div>

						<div>
							<label for="menu_description" class="block text-sm font-medium text-gray-700">Menu Description</label>
							<textarea id="menu_description" name="menu_description" rows="4" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('menu_description', $updateMenu->menu_description) }}</textarea>
						</div>

						<input type="hidden" name="partner" value="{{ $partnerData->id }}" required>

						<div>
							<button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
								Update Menu
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection