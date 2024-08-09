@extends('layouts.app')
@section('title', 'Dashboard')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<div class="bg-gradient-to-r from-blue-100 to-purple-100 min-h-screen py-12" id="header2">
  <div class="container mx-auto px-4">
    <div class="bg-white rounded-lg shadow-xl overflow-hidden mb-12">
      <div class="relative h-96">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url(/images/close-up-volunteers-with-box-min.jpg);"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 flex items-center justify-center">
          <div class="text-center">
            <h2 class="text-4xl font-bold text-white mb-4"><span class="text-yellow-400">Strive to</span> Nourish <span class="text-blue-400">The Less Fortunate</span></h2>
            <p class="text-xl text-white mb-8">Your support transforms lives through the power of food.</p>
            <a href="{{ route('volunteer#viewAllMenu') }}" class="bg-blue-400 text-gray-900 font-bold py-3 px-6 rounded-full hover:bg-yellow-500 transition duration-300">Explore Meal Options</a>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-white rounded-lg shadow-xl overflow-hidden mb-12">
      <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Your Volunteer Details</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <div class="bg-blue-50 rounded-lg p-4">
            <h3 class="text-lg font-medium text-blue-700 mb-2">Vaccination Status</h3>
            <p class="text-2xl font-bold text-blue-900">
              <?php
              $vacc = $volunteerData->volunteer_vaccination;
              echo $vacc == 0 ? "Vaccinated" : "Not Vaccinated";
              ?>
            </p>
          </div>
          <div class="bg-purple-50 rounded-lg p-4">
            <h3 class="text-lg font-medium text-purple-700 mb-2">Volunteer Duration</h3>
            <p class="text-2xl font-bold text-purple-900">{{ $volunteerData->volunteer_duration }}</p>
          </div>
          <div class="bg-green-50 rounded-lg p-4 col-span-1 md:col-span-2">
            <h3 class="text-lg font-medium text-green-700 mb-2">Available Days</h3>
            <p class="text-xl font-bold text-green-900">{{ $volunteerData->volunteer_available }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-xl overflow-hidden mb-12">
      <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Your Impact</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-indigo-50 rounded-lg p-4 text-center">
            <h3 class="text-lg font-medium text-indigo-700 mb-2">Meals Delivered</h3>
            <p class="text-3xl font-bold text-indigo-900">150</p>
          </div>
          <div class="bg-pink-50 rounded-lg p-4 text-center">
            <h3 class="text-lg font-medium text-pink-700 mb-2">Hours Volunteered</h3>
            <p class="text-3xl font-bold text-pink-900">75</p>
          </div>
          <div class="bg-yellow-50 rounded-lg p-4 text-center">
            <h3 class="text-lg font-medium text-yellow-700 mb-2">People Helped</h3>
            <p class="text-3xl font-bold text-yellow-900">50</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection