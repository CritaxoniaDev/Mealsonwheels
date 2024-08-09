@extends('layouts.app')
@section('title', 'Order Status - Member')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')

<body class="bg-gray-100">
  <div class="container mx-auto px-4 py-8" style="padding-bottom: 150px;" id="order-status">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
      <div class="px-6 py-4 bg-blue-600">
        <h1 class="text-3xl font-bold text-white text-center">
          Current Orders - Member
        </h1>
      </div>
      <div class="p-6">
        <div class="mb-6">
          <a href="{{ route('member#viewAllMenu') }}" class="inline-block bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300">
            Order Meal
          </a>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full table-auto">
            <thead>
              <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">No.</th>
                <th class="py-3 px-6 text-left">Partner Name</th>
                <th class="py-3 px-6 text-left">Meal Name</th>
                <th class="py-3 px-6 text-left">Order Date</th>
                <th class="py-3 px-6 text-left">Order Time</th>
                <th class="py-3 px-6 text-left">Menu Preparation Status</th>
                <th class="py-3 px-6 text-left">Assigned Rider</th>
                <th class="py-3 px-6 text-left">Delivery Status</th>
                <th class="py-3 px-6 text-left">Confirm Receive</th>
                <th class="py-3 px-6 text-left">Cancel Delivery</th>
              </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
              @php
              $userId = Auth::id();
              $orders = DB::table('orders')->where('user_id', $userId)->get();
              @endphp

              @foreach($orders as $order)
              @if($order->order_cooking_status != 'Cancelled' && $order->order_received_status != 'Received Well')
              <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $order->id }}</td>
                <td class="py-3 px-6 text-left">{{ $order->order_menu_restaurant }}</td>
                <td class="py-3 px-6 text-left">{{ $order->order_menu_name }}</td>
                <td class="py-3 px-6 text-left">{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                <td class="py-3 px-6 text-left">{{ date('H:i:s', strtotime($order->created_at)) }}</td>
                <td class="py-3 px-6 text-left">{{ $order->order_cooking_status }}</td>
                <td class="py-3 px-6 text-left">
                  {{ DB::table('delivers')->where('id', $order->id)->value('volunteer_name') ?? 'Not Assigned' }}
                </td>
                <td class="py-3 px-6 text-left">
                  {{ DB::table('delivers')->where('id', $order->id)->value('delivery_status') ?? 'Pending' }}
                </td>
                <td class="py-3 px-6 text-left">
                  @if($order->order_received_status == 'Well Received')
                  <span class="text-green-600 font-semibold">Well Received</span>
                  @else
                  <form action="{{ route('member#updateMemberOrder', $order->id) }}" method="GET" class="flex items-center">
                    <input type="hidden" name="order_received_status" value="Well Received" />
                    <button type="submit" class="bg-green-500 text-white font-bold py-1 px-3 rounded hover:bg-green-600 transition duration-300" {{ $order->order_received_status == 'Well Received' ? 'disabled' : '' }}>
                      Received?
                    </button>
                  </form>
                  @endif
                </td>
                <td class="py-3 px-6 text-left">
                  @if($order->order_received_status != 'Well Received' && $order->order_cooking_status != 'Ready to deliver')
                  <form action="{{ route('member.cancelOrder', $order->id) }}" method="POST" class="flex items-center">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bg-red-500 text-white font-bold py-1 px-3 rounded hover:bg-red-600 transition duration-300">
                      Cancel
                    </button>
                  </form>
                  @else
                  <span class="text-gray-500">Cannot cancel</span>
                  @endif
                </td>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection