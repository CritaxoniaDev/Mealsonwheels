@extends('layouts.app')
@section('title', 'Delivery Status')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-100 to-purple-100 py-12" id="header2">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-10">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-purple-500">
                Delivery Status - Volunteer
            </span>
        </h1>

        <!-- Active Deliveries -->
        <div class="bg-white shadow-xl rounded-lg overflow-hidden mb-8">
            <div class="p-6 bg-gradient-to-r from-blue-500 to-purple-500">
                <h2 class="text-2xl font-bold text-white">Active Deliveries</h2>
                <p class="text-blue-100">Manage your ongoing deliveries and update their status.</p>
            </div>
            <div class="overflow-x-auto">
                @if(count($activeDeliveries) > 0)
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Meal Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Restaurant</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Restaurant Address</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rider</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Delivery Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delivery Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($activeDeliveries as $delivery)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $delivery->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $delivery->member_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ DB::table('menus')->where('id', $delivery->menu_id)->value('menu_title')  }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $delivery->partner_restaurant_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $delivery->partner_address }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ date('Y-m-d', strtotime($delivery->created_at)) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ date('H:i:s', strtotime($delivery->created_at)) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($delivery->volunteer_name && $delivery->volunteer_name != 'Volunteer to be assigned')
                                <span class="text-blue-600 font-semibold">Accepted by {{ $delivery->volunteer_name }}</span>
                                @else
                                <form action="{{ route('deliver#updateDelivery', $delivery->id) }}" method="GET" class="flex items-center space-x-2">
                                    <input type="hidden" name="volunteer_name" value="{{ Auth::user()->name }}" />
                                    <input type="hidden" name="volunteer_id" value="{{ Auth::id() }}" />
                                    <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Accept
                                    </button>
                                </form>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if(DB::table('users')->where('name', $delivery->volunteer_name)->value('id') == Auth::id() && !$delivery->start_deliver_time)
                                <form action="{{ route('deliver#updateDelivery', $delivery->id) }}" method="GET" class="flex items-center space-x-2">
                                    <input type="hidden" name="start_deliver_time" value="{{ now() }}" />
                                    <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        Start
                                    </button>
                                </form>
                                @elseif($delivery->start_deliver_time)
                                <span class="text-green-600 font-semibold">Started at {{ $delivery->start_deliver_time }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if(DB::table('users')->where('name', $delivery->volunteer_name)->value('id') == Auth::id() && $delivery->start_deliver_time)
                                <form action="{{ route('deliver#updateDelivery', $delivery->id) }}" method="GET" class="flex items-center space-x-2">
                                    <select name="delivery_status" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Select Status</option>
                                        <option value="Pick the meal" {{ $delivery->delivery_status == 'Pick the meal' ? 'selected' : '' }}>Pick up the meal</option>
                                        <option value="On the way to destination" {{ $delivery->delivery_status == 'On the way to destination' ? 'selected' : '' }}>On the way to destination</option>
                                        <option value="Arrived at destination" {{ $delivery->delivery_status == 'Arrived at destination' ? 'selected' : '' }}>Arrived at destination</option>
                                    </select>
                                    <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Update
                                    </button>
                                </form>
                                @elseif($delivery->delivery_status)
                                <span class="text-blue-600 font-semibold">{{ $delivery->delivery_status }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17l6-6-6-6"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No active deliveries</h3>
                            <p class="mt-1 text-sm text-gray-500">There are currently no active deliveries to display.</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Completed Deliveries -->
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="p-6 bg-gradient-to-r from-green-500 to-blue-500">
                <h2 class="text-2xl font-bold text-white">Completed Deliveries</h2>
                <p class="text-blue-100">View your successful and cancelled deliveries.</p>
            </div>
            <div class="overflow-x-auto">
                @if(count($completedDeliveries) > 0)
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Meal Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Restaurant</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Completion Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($completedDeliveries as $delivery)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $delivery->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $delivery->member_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ DB::table('menus')->where('id', $delivery->menu_id)->value('menu_title') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $delivery->partner_restaurant_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ date('Y-m-d', strtotime($delivery->created_at)) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if(DB::table('orders')->where('id', $delivery->id)->value('order_received_status') == 'Received Well')
                                <span class="text-green-600 font-semibold">Successful Delivery</span>
                                @elseif(DB::table('orders')->where('id', $delivery->id)->value('order_cooking_status') == 'Cancelled')
                                <span class="text-red-600 font-semibold">Cancelled Delivery</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17l6-6-6-6"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No completed deliveries</h3>
                            <p class="mt-1 text-sm text-gray-500">There are currently no completed deliveries to display.</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection