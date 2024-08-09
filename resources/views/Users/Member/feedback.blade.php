@extends('layouts.app')
@section('title', 'Feedback Ratings')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-100 to-indigo-100 min-h-screen py-12" id="header2">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                <h1 class="text-3xl font-extrabold text-white">Your Feedback Matters</h1>
                <p class="text-blue-100 mt-1">Help us improve our service</p>
            </div>

            <form action="{{ route('feedback#store') }}" method="POST" class="p-6">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">

                <div class="mb-6">
                    <label for="rating" class="block text-gray-700 font-semibold mb-2">
                        How would you rate your experience?
                    </label>
                    <div class="flex items-center space-x-8">
                        @for ($i = 5; $i >= 1; $i--)
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                            <span class="w-16 h-16 flex items-center justify-center text-lg rounded-full border-2 border-gray-300 peer-checked:border-yellow-400 peer-checked:bg-yellow-400 peer-checked:text-white transition-all duration-200 ease-in-out">
                                {{ str_repeat('★', $i) }}
                            </span>
                        </label>
                        @endfor
                    </div>
                </div>

                <div class="mb-6">
                    <label for="comment" class="block text-gray-700 font-semibold mb-2">Your comments</label>
                    <textarea name="comment" id="comment" rows="4" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500" placeholder="Tell us about your experience..." required></textarea>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold py-3 px-6 rounded-full hover:from-blue-600 hover:to-indigo-700 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        Submit Feedback
                    </button>
                    <a href="{{ route('member#index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Maybe Later</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection