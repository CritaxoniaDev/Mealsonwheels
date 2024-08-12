@extends('layouts.app')
@section('title')
Update {{ $updateMenu->menu_title }}
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<section class="bg-gray-100 py-16" id="header2">
	<div class="container mx-auto px-4">
		<div class="text-center mb-12">
			<h1 class="text-4xl font-bold text-indigo-700">Update {{ $updateMenu->menu_title }}</h1>
		</div>

		<div class="bg-white rounded-lg shadow-xl overflow-hidden">
			<form action="{{ route('admin#saveUpdateMenu', $updateMenu->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
				@csrf
				<div class="flex flex-wrap -mx-4">
					<div class="w-full lg:w-1/2 px-4 mb-8 lg:mb-0">
						@if ($updateMenu->menu_image)
						<img src="{{ asset('uploads/meal/'. $updateMenu->menu_image) }}" class="w-full h-64 object-cover rounded-lg mb-4" alt="Menu image">
						@endif
						<div class="mb-6">
							<label for="menu_image" class="block text-gray-700 text-sm font-bold mb-2">Menu Picture</label>
							<input type="file" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-indigo-500" name="menu_image" value="{{old('menu_image', $updateMenu->menu_image) }}" required>
						</div>
					</div>
					<div class="w-full lg:w-1/2 px-4">
						<div class="mb-6">
							<label for="menu_title" class="block text-gray-700 text-sm font-bold mb-2">Menu Title</label>
							<input type="text" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Enter menu title" name="menu_title" value="{{ old('menu_title', $updateMenu->menu_title) }}" required>
						</div>
						<div class="mb-6">
							<label for="menu_description" class="block text-gray-700 text-sm font-bold mb-2">Menu Description</label>
							<textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-indigo-500" rows="5" placeholder="Enter menu description" name="menu_description" required>{{ old('menu_description', $updateMenu->menu_description) }}</textarea>
						</div>
						<input type="hidden" name="partner" value="{{ $updateMenu->partner_id }}" required>
						<div class="text-right">
							<button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300">
								Update Menu
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection