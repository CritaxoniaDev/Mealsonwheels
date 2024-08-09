@extends('layouts.app')
@section('title', 'About Us')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')

<body class="antialiased bg-gradient-to-br from-indigo-100 to-orange-100 min-h-screen" id="header2">
  <div class="container mx-auto px-4 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
      <div class="space-y-8 bg-white p-8 rounded-xl shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-orange-200 rounded-full opacity-50"></div>
        <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-indigo-200 rounded-full opacity-50"></div>
        <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-orange-500 relative z-10">
          About MerryMeal
        </h1>
        <h2 class="text-3xl font-semibold text-gray-700 relative z-10">Nourishing Communities, One Meal at a Time</h2>
        <p class="text-gray-600 leading-relaxed text-lg relative z-10">
          MerryMeal, in collaboration with <strong class="text-indigo-600">Meals on Wheels</strong>, is a beacon of hope for those in need. We're not just delivering meals; we're serving up smiles, comfort, and a sense of community to adults facing challenges in their daily lives.
        </p>
        <p class="text-gray-600 leading-relaxed text-lg relative z-10">
          Our dedicated team of chefs and volunteers work tirelessly to create delicious, nutritionally balanced meals that cater to various dietary needs. From hearty soups to vibrant salads, every dish is crafted with love and care.
        </p>
        <div class="flex space-x-4 mt-8 relative z-10">
          <a href="#" class="bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:-translate-y-1 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
            </svg>
            Our Impact
          </a>
          <a href="#" class="bg-orange-500 text-white px-6 py-3 rounded-full hover:bg-orange-600 transition duration-300 ease-in-out transform hover:-translate-y-1 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
            </svg>
            Volunteer
          </a>
        </div>
      </div>
      <div class="relative group">
        <img src="images/about-us.jpg" alt="MerryMeal in action" class="rounded-2xl shadow-2xl group-hover:shadow-orange-300 transition duration-300">
        <div class="absolute -bottom-6 -right-4 bg-white p-6 rounded-xl shadow-xl transform group-hover:rotate-3 transition duration-300">
          <p class="font-bold text-2xl text-indigo-600">Serving with love since 2024</p>
          @php
          $totalOrders = DB::table('orders')->count();
          @endphp
          <p class="text-gray-600">{{ number_format($totalOrders) }} meals delivered and counting</p>
        </div>
        <div class="absolute top-4 left-4 bg-orange-500 text-white p-3 rounded-full transform -rotate-12 group-hover:rotate-0 transition duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
      </div>
    </div>

    <!-- About Our Community -->
    <div class="mt-16 bg-gradient-to-br from-white to-indigo-50 p-12 rounded-3xl shadow-2xl relative overflow-hidden">
      <div class="absolute top-0 right-0 -mt-16 -mr-16 w-96 h-96 bg-green-100 rounded-full opacity-25 animate-pulse"></div>
      <div class="absolute bottom-0 left-0 -mb-16 -ml-16 w-96 h-96 bg-orange-100 rounded-full opacity-25 animate-pulse"></div>

      <h3 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-green-500 mb-10 relative z-10">About Our Vibrant Community</h3>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative z-10">
        <!-- Members -->
        <div class="bg-white p-8 rounded-2xl shadow-lg transform hover:scale-105 transition duration-300">
          <div class="flex items-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <h4 class="text-2xl font-bold text-gray-800">Our Members</h4>
          </div>
          <p class="text-gray-600 leading-relaxed">
            Our members are the heart of MerryMeal. They are the individuals we serve daily, each with unique stories and needs. From seniors living independently to adults facing temporary challenges, our members come from all walks of life.
          </p>
          <div class="mt-6 flex items-center text-indigo-600 font-semibold">
            <span>Learn more about our impact</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>

        <!-- Volunteers -->
        <div class="bg-white p-8 rounded-2xl shadow-lg transform hover:scale-105 transition duration-300">
          <div class="flex items-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
            </svg>
            <h4 class="text-2xl font-bold text-gray-800">Our Volunteers</h4>
          </div>
          <p class="text-gray-600 leading-relaxed">
            Volunteers are the lifeblood of MerryMeal. These dedicated individuals give their time and energy to prepare meals, deliver to our members, and provide friendly check-ins. Their commitment and compassion drive our mission forward every day.
          </p>
          <div class="mt-6 bg-green-100 rounded-full px-4 py-2 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-green-800 font-semibold">Over 500 active volunteers</span>
          </div>
        </div>

        <!-- Partners -->
        <div class="bg-white p-8 rounded-2xl shadow-lg transform hover:scale-105 transition duration-300">
          <div class="flex items-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-orange-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
            </svg>
            <h4 class="text-2xl font-bold text-gray-800">Our Partners</h4>
          </div>
          <p class="text-gray-600 leading-relaxed">
            MerryMeal thrives thanks to our incredible network of partners. Local businesses, community organizations, and government agencies work alongside us to expand our reach and enhance our services.
          </p>
          <div class="mt-6 bg-orange-100 rounded-full px-4 py-2 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span class="text-orange-800 font-semibold">Partnered with 50+ local organizations</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Team and Leadership -->
    <div class="mt-16 bg-white p-8 rounded-xl shadow-2xl relative overflow-hidden">
      <div class="absolute top-0 left-0 -mt-8 -ml-8 w-64 h-64 bg-indigo-100 rounded-full opacity-25"></div>
      <h3 class="text-3xl font-bold text-indigo-600 mb-6 relative z-10">Team and Leadership</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
        <div class="text-center transform hover:scale-105 transition duration-300">
          <img src="images/leader1.jpg" alt="Leader 1" class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-indigo-200">
          <h4 class="text-xl font-semibold text-gray-700">Jane Doe</h4>
          <p class="text-gray-600">Executive Director</p>
          <div class="mt-2 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" viewBox="0 0 20 20" fill="currentColor">
              <path d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" />
              <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
            </svg>
          </div>
        </div>
        <div class="text-center transform hover:scale-105 transition duration-300">
          <img src="images/leader2.jpg" alt="Leader 2" class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-orange-200">
          <h4 class="text-xl font-semibold text-gray-700">John Smith</h4>
          <p class="text-gray-600">Operations Manager</p>
          <div class="mt-2 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
        <div class="text-center transform hover:scale-105 transition duration-300">
          <img src="images/leader3.jpg" alt="Leader 3" class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-green-200">
          <h4 class="text-xl font-semibold text-gray-700">Emily Brown</h4>
          <p class="text-gray-600">Volunteer Coordinator</p>
          <div class="mt-2 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
              <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
            </svg>
          </div>
        </div>
      </div>
    </div>

    <!-- Partners and Sponsors -->
    <div class="mt-16 bg-white p-8 rounded-xl shadow-2xl relative overflow-hidden">
      <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-64 h-64 bg-orange-100 rounded-full opacity-25"></div>
      <h3 class="text-3xl font-bold text-indigo-600 mb-6 relative z-10">Partners and Sponsors</h3>
      <p class="text-gray-600 mb-8 relative z-10">We're grateful for the support of our partners and sponsors who make our work possible:</p>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 relative z-10">
        <img src="images/sponsor1.png" alt="Sponsor 1" class="h-16 object-contain transform hover:scale-110 transition duration-300">
        <img src="images/sponsor2.png" alt="Sponsor 2" class="h-16 object-contain transform hover:scale-110 transition duration-300">
        <img src="images/sponsor3.png" alt="Sponsor 3" class="h-16 object-contain transform hover:scale-110 transition duration-300">
        <img src="images/sponsor4.png" alt="Sponsor 4" class="h-16 object-contain transform hover:scale-110 transition duration-300">
      </div>
    </div>
  </div>
</body>
@endsection