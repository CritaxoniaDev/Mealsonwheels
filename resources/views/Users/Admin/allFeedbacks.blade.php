@extends('layouts.app')
@section('title', 'Feedbacks - Admin')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-100 to-indigo-100 min-h-screen py-12" id="header2">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-indigo-800 mb-8 text-center">Member Feedbacks</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($feedbacks as $feedback)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-500 hover:scale-105">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $feedback->user->name }}</h2>
                        <span class="text-sm text-gray-600">{{ $feedback->created_at->format('M d, Y') }}</span>
                    </div>
                    <p class="text-gray-600 mb-2">Menu: <span class="text-green-600 mb-2">{{ $feedback->order->order_menu_name }}</span></p>
                    @php
                        $caregiver = DB::table('members')
                        ->where('user_id', $feedback->user_id)
                        ->value('member_caregiver_name');
                    @endphp
                    <p class="text-gray-500 mb-4">Caregiver: {{ $caregiver ?? 'N/A' }}</p>
                    <div class="flex items-center mb-4">
                        @for($i = 1; $i <= 5; $i++) <svg class="w-5 h-5 {{ $i <= $feedback->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            @endfor
                    </div>
                    <p class="text-gray-700">{{ $feedback->comment }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection