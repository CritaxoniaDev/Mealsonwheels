@extends('layouts.app')
@section('title', 'Order Status - Partner')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8" id="menu-description">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-extrabold text-center text-gray-900 sm:text-4xl mb-10">
            Order Status - Partner
        </h1>

        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Meal Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Time</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Cooking Time</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Menu Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Received Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($orderData as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->member_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->order_menu_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ date('H:i:s', strtotime($order->created_at)) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($order->order_received_status == 'Received Well')
                                <div class="text-green-600 font-semibold">Successful Delivery</div>
                                @elseif($order->order_cooking_status == 'Cancelled')
                                <div class="text-red-600 font-semibold">Cancelled by Member</div>
                                @else
                                <form action="{{ route('order#updateOrder', $order->id) }}" method="GET" class="flex items-center space-x-2">
                                    <input type="text" name="start_cooking_time" value="{{ $order->start_cooking_time }}" readonly class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Start
                                    </button>
                                </form>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($order->order_received_status == 'Received Well')
                                <div class="text-green-600 font-semibold">Successful Delivery</div>
                                @elseif($order->order_cooking_status == 'Cancelled')
                                <div class="text-red-600 font-semibold">Cancelled by Member</div>
                                @else
                                <form action="{{ route('order#updateOrder', $order->id) }}" method="GET" class="flex items-center space-x-2">
                                    <select name="order_cooking_status" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Select Status</option>
                                        <option value="Being prepared" {{ $order->order_cooking_status == 'Being prepared' ? 'selected' : '' }}>Being prepared</option>
                                        <option value="Ready to deliver" {{ $order->order_cooking_status == 'Ready to deliver' ? 'selected' : '' }}>Ready to deliver</option>
                                    </select>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        Update
                                    </button>
                                </form>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $order->order_received_status }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection