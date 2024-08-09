@section('title', 'Thank You!')
@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<body class="bg-gradient-to-r from-blue-100 to-purple-100" id="donation">
  <section class="min-h-screen py-16">
    <div class="container mx-auto px-4">
      <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="flex flex-col md:flex-row">
          <div class="w-full md:w-1/2 p-10">
            <h2 class="text-4xl font-extrabold text-center mb-6 text-indigo-700">THANK YOU<br>FOR YOUR SUPPORT</h2>

            <div class="flex justify-between mb-10">
              <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-2">
                  <span class="text-white font-bold">1</span>
                </div>
                <p class="text-xs text-gray-500">DONATION</p>
              </div>
              <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-2">
                  <span class="text-white font-bold">2</span>
                </div>
                <p class="text-xs text-gray-500">BILLING</p>
              </div>
              <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-2">
                  <span class="text-white font-bold">3</span>
                </div>
                <p class="text-xs text-gray-500">PAYMENT</p>
              </div>
              <div class="text-center">
                <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-2">
                  <span class="text-white font-bold">4</span>
                </div>
                <p class="text-xs font-semibold text-indigo-600">COMPLETION</p>
              </div>
            </div>

            <div class="text-center mb-8">
              <svg class="w-16 h-16 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <h3 class="text-2xl font-bold text-green-500">SUCCESS!</h3>
            </div>

            <p class="text-center text-gray-600 mb-10">
              Thank you for your gift! Together, we are helping to provide nutritious meals to seniors around the world! An email acknowledging your donation will be sent to the address you provided.
            </p>

            <a href="/" class="block w-full bg-indigo-600 text-white text-center font-bold py-3 px-6 rounded-xl hover:bg-indigo-700 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
              RETURN HOME
            </a>
          </div>
          <div class="w-full md:w-1/2 relative overflow-hidden">
            <img src="{{url('/images/donation.jpg')}}" alt="Thank You" class="object-cover w-full h-full transform scale-105 hover:scale-110 transition-all duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-indigo-900 to-transparent opacity-70"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
              <h3 class="text-2xl font-bold mb-2">Your Impact Matters</h3>
              <p class="text-sm">Your generosity will make a real difference in seniors' lives.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>




@endsection