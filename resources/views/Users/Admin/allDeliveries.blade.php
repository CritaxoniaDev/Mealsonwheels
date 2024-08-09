@extends('layouts.app')
@section('title', 'Order Status')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-100 to-purple-100 py-16" id="header2">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-extrabold text-center text-indigo-800 mb-12">Deliveries Dashboard</h1>
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-6 bg-indigo-600 text-white flex justify-between items-center">
                <h2 class="text-2xl font-semibold">Delivery Status Overview</h2>
                <button class="bg-white text-indigo-600 px-4 py-2 rounded-lg font-semibold hover:bg-indigo-100 transition duration-300">Export Data</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-indigo-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-700 uppercase tracking-wider">No.</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-700 uppercase tracking-wider">Member</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-700 uppercase tracking-wider">Meal</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-700 uppercase tracking-wider">Order Date & Time</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-700 uppercase tracking-wider">Cooking Start</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-700 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-700 uppercase tracking-wider">Received</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-indigo-200">
                        @foreach ($orderData as $order)
                        <tr class="hover:bg-indigo-50 transition duration-300">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-600">{{ $order->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($order->member_name) }}&color=7F9CF5&background=EBF4FF" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $order->member_name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $order->order_menu_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ date('M d, Y', strtotime($order->created_at)) }}
                                <span class="text-indigo-600">{{ date('H:i', strtotime($order->created_at)) }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $order->start_cooking_time }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $order->order_cooking_status == 'Completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $order->order_cooking_status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $order->order_received_status == 'Received' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $order->order_received_status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-indigo-50 px-6 py-4">
                <nav class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-indigo-700">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">100</span> results
                        </p>
                    </div>
                    <div>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-indigo-300 text-sm font-medium rounded-md text-indigo-700 bg-white hover:bg-indigo-50">
                            Previous
                        </a>
                        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-indigo-300 text-sm font-medium rounded-md text-indigo-700 bg-white hover:bg-indigo-50">
                            Next
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection