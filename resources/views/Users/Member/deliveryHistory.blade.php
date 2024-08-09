@extends('layouts.app')
@section('title', 'Order History - Member')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-100 to-purple-100 min-h-screen py-12" id="header2">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-10">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-purple-500">
                Delivery History
            </span>
        </h1>

        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="p-6 bg-gradient-to-r from-blue-500 to-purple-500">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <select class="bg-white text-gray-800 font-semibold py-2 px-4 rounded-l focus:outline-none focus:shadow-outline">
                            <option>5</option>
                            <option>10</option>
                            <option>20</option>
                        </select>
                        <select class="bg-white text-gray-800 font-semibold py-2 px-4 rounded-r border-l focus:outline-none focus:shadow-outline">
                            <option>All</option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    <div class="relative">
                        <input type="text" placeholder="Search" class="bg-white text-gray-800 font-semibold py-2 pl-10 pr-4 rounded-full focus:outline-none focus:shadow-outline" />
                        <div class="absolute top-0 left-0 mt-2 ml-3">
                            <svg class="h-6 w-6 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Order ID</th>
                        <th class="py-3 px-6 text-left">Menu</th>
                        <th class="py-3 px-6 text-center">Status</th>
                        <th class="py-3 px-6 text-center">Date</th>
                        <th class="py-3 px-6 text-center">Volunteer Rider</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($orders as $order)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $order->id }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{ DB::table('menus')->where('id', $order->menu_id)->value('menu_title') }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            @if($order->order_received_status == 'Received Well')
                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Received Well</span>
                            @else
                            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Not Delivered</span>
                            @endif
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span>{{ $order->created_at->format('M d, Y') }}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            @if($order->order_received_status == 'Received Well')
                            <span class="text-green-600">{{ DB::table('delivers')->where('id', $order->id)->value('volunteer_name') }}</span>
                            @elseif($order->order_cooking_status == 'Cancelled')
                            <span class="text-red-600">Cancelled</span>
                            @else
                            <span class="text-yellow-600">Pending</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection