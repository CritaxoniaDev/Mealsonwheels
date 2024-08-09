@extends('layouts.app')
@section('title', 'Order Confirmation')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
@php
$partner_id = Illuminate\Support\Facades\DB::table('menus')->where('id', $partnerData->id)->value('partner_id');
$partner_user_id = Illuminate\Support\Facades\DB::table('partners')->where('id', $partner_id)->value('user_id');
$partner_geolocation = Illuminate\Support\Facades\DB::table('users')->where('id', $partner_user_id)->value('geolocation');
$user_geolocation = Illuminate\Support\Facades\DB::table('users')->where('id', Auth()->user()->id)->value('geolocation');

[$user_lat, $user_long] = explode(',', $user_geolocation);
[$partner_lat, $partner_long] = explode(',', $partner_geolocation);

$earth_radius = 6371; // in kilometers

$lat_diff = deg2rad($partner_lat - $user_lat);
$long_diff = deg2rad($partner_long - $user_long);

$a = sin($lat_diff / 2) * sin($lat_diff / 2) +
    cos(deg2rad($user_lat)) * cos(deg2rad($partner_lat)) *
    sin($long_diff / 2) * sin($long_diff / 2);

$c = 2 * atan2(sqrt($a), sqrt(1 - $a));

$DistanceKM = round($earth_radius * $c, 3);
$DistanceMeter = $DistanceKM * 1000;

$is_weekend = in_array(date('w'), [0, 6]);
$is_within_range = $DistanceKM <= 10;

if ($is_weekend) {
    if ($is_within_range) {
        $meal_type = "Hot";
        $message = "This Meal available only from Monday through Friday";
    } else {
        $meal_type = "Cold";
        $message = "This Meal is available today";
    }
} else {
    if ($is_within_range) {
        $meal_type = "Hot";
        $message = "This Meal is available today";
    } else {
        $meal_type = "Cold";
        $message = "Support over weekend only";
    }
}
@endphp
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8" id="menu-order-confirmation">
  <div class="max-w-4xl mx-auto">
    <a href="javascript:history.go(-1)" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition duration-300 ease-in-out">
      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
      </svg>
      Cancel order and go back to menu
    </a>

    <div class="mt-8 bg-white shadow-2xl rounded-lg overflow-hidden">
      <div class="px-6 py-8 bg-gradient-to-r from-blue-600 to-indigo-600">
        <h1 class="text-3xl font-extrabold text-white">Confirm Your Order</h1>
      </div>

      <form action="{{ route('order#saveOrder') }}" method="POST" enctype="multipart/form-data" class="p-8">
        @csrf
        <div class="grid grid-cols-1 gap-y-8 gap-x-6 sm:grid-cols-2">
          <div class="sm:col-span-2">
            <h3 class="text-xl font-semibold text-gray-900 mb-6 pb-2 border-b-2 border-blue-200">Your Details</h3>
          </div>

          <!-- Input fields -->
          @foreach ([
          ['fname', 'Full Name', 'member_name', $userData->name],
          ['email', 'Email', 'email', $userData->email],
          ['adr', 'Address', 'member_address', $userData->address],
          ['phone', 'Phone', 'member_phone', $userData->phone],
          ['caregiver', 'Caregiver Name', 'caregiver', $memberData->member_caregiver_name],
          ['relation', 'Caregiver Relation', 'relation', $memberData->member_caregiver_relation]
          ] as [$id, $label, $name, $value])
          <div class="relative">
            <label for="{{ $id }}" class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-900">{{ $label }}</label>
            <input type="text" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" readonly class="block w-full rounded-md border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
          </div>
          @endforeach

          <div class="sm:col-span-2 mt-10">
            <h3 class="text-xl font-semibold text-gray-900 mb-6 pb-2 border-b-2 border-blue-200">Menu To Order</h3>
          </div>

          @if ($menuData->menu_image)
          <div class="sm:col-span-2">
            <img src="{{ asset('uploads/meal/'. $menuData->menu_image) }}" class="w-full h-64 object-cover rounded-lg shadow-md" alt="menu image">
          </div>
          @endif

          <!-- Hidden inputs -->
          @foreach ([
          ['order_menu_image', $menuData->menu_image],
          ['menu_id', $menuData->id],
          ['partner_id', $partnerData->id],
          ['member_id', $memberData->id],
          ['user_id', Auth()->user()->id],
          ['partner_address', $partnerData->partnership_address]
          ] as [$name, $value])
          <input type="hidden" name="{{ $name }}" value="{{ $value }}" />
          @endforeach

          <!-- Menu details inputs -->
          @foreach ([
          ['cname', 'Menu Name', 'order_menu_name', $menuData->menu_title],
          ['ccnum', 'Menu Type', 'order_menu_type', $meal_type],
          ['expmonth', 'Menu Prepared By', 'order_menu_restaurant', $partnerData->partnership_restaurant],
          ['expyear', 'Delivered By', 'volunteer_name', 'Volunteer to be assigned'],
          ['cvv', 'Meal Plan', 'menu_plan', $memberData->member_meal_duration - 1]
          ] as [$id, $label, $name, $value])
          <div class="relative">
            <label for="{{ $id }}" class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-900">{{ $label }}</label>
            <input type="text" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" readonly class="block w-full rounded-md border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
          </div>
          @endforeach
        </div>

        <p class="mt-2 text-sm text-gray-500">1 day will be deducted from your 30 days plan</p>

        <div class="mt-10">
          <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 border border-transparent rounded-md shadow-sm py-4 px-4 text-lg font-semibold text-white hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl">
            Confirm Order
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection