@section('title', 'Registration')
@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<section class="py-12 bg-gradient-to-br from-blue-50 to-indigo-100" id="member-register">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden">
      <div class="px-6 py-8 bg-gradient-to-r from-blue-600 to-indigo-600 sm:px-10">
        <div class="flex justify-between items-center">
          <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 rounded-lg">
          <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
            Register With Us!
          </h2>
        </div>
      </div>

      <div class="px-6 py-8 sm:px-10">
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
          @csrf

          <div class="space-y-6">
            <!-- Name field -->
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="name" class="block pl-2 text-sm uppercase py-2 font-medium text-gray-700">Name:</label>
              </div>
              <div class="sm:col-span-4">
                <input type="text" name="name" id="name" class="mt-1 py-2 px-3 border-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
              </div>
            </div>

            <!-- Gender field -->
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label class="block text-sm pl-2 uppercase font-medium text-gray-700">Gender:</label>
              </div>
              <div class="sm:col-span-4">
                <div class="flex space-x-4">
                  <div class="flex items-center">
                    <input class="form-radio text-indigo-600 h-5 w-5" type="radio" name="gender" id="inline_Radio1" value="0" required="">
                    <label class="ml-2 text-sm text-gray-700" for="inline_Radio1">Male</label>
                  </div>
                  <div class="flex items-center">
                    <input class="form-radio text-indigo-600 h-5 w-5" type="radio" name="gender" id="inline_Radio2" value="1" required="">
                    <label class="ml-2 text-sm text-gray-700" for="inline_Radio2">Female</label>
                  </div>
                </div>
              </div>
            </div>

            <!-- Age field -->
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="age" class="block pl-2 py-2 text-sm uppercase font-medium text-gray-700">Age:</label>
              </div>
              <div class="sm:col-span-4">
                <input type="number" name="age" id="age" class="mt-1 py-2 px-3 border-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
              </div>
            </div>

            <!-- Email field -->
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="email" class="block pl-2 text-sm uppercase py-2 font-medium text-gray-700">Email:</label>
              </div>
              <div class="sm:col-span-4">
                <input type="email" name="email" id="email" class="mt-1 py-2 px-3 border-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                @error('email')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <!-- Password field -->
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="password" class="block pl-2 py-2 text-sm uppercase font-medium text-gray-700">Password:</label>
              </div>
              <div class="sm:col-span-4">
                <input type="password" name="password" id="password" class="mt-1 py-2 px-3 border-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
              </div>
            </div>

            <!-- Phone number field -->
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="phone" class="block pl-2 py-2 text-sm uppercase font-medium text-gray-700">Phone number:</label>
              </div>
              <div class="sm:col-span-4">
                <input type="tel" name="phone" id="phone" maxlength="11" class="mt-1 py-2 px-3 border-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
              </div>
            </div>

            <!-- Address field -->
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="address" class="block pl-2 text-sm uppercase font-medium text-gray-700">Address:</label>
              </div>
              <div class="sm:col-span-4">
                <textarea name="address" id="address" rows="3" class="mt-1 block w-full py-2 px-3 border-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></textarea>
              </div>
            </div>

            <!-- Geo Location field -->
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="location" class="block pl-2 text-sm py-2 uppercase font-medium text-gray-700">GeoLocation:</label>
              </div>
              <div class="sm:col-span-4 flex">
                <input type="text" name="geolocation" id="location" class="mt-1 border-2 px-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                <button type="button" onclick="getlocation()" class="ml-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Get Location
                </button>
              </div>
            </div>

            <!-- Interest field -->
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="role" class="block py-2 pl-2 text-sm uppercase font-medium text-gray-700">Interest (Choose role):</label>
              </div>
              <div class="sm:col-span-4">
                <select name="role" class="mt-1 block w-full py-2 px-3 border-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                  <option value="">Choose Your Interest</option>
                  <option value="member">Member</option>
                  <option value="partner">Partner</option>
                  <option value="volunteer">Volunteer</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Member box -->
          <div class="member box space-y-6 bg-blue-50 p-6 rounded-lg shadow-inner">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="member_caregiver_name" class="block uppercase pl-2 text-sm py-2 font-medium text-gray-700">Care Giver Name:</label>
              </div>
              <div class="sm:col-span-4">
                <input type="text" name="member_caregiver_name" id="member_caregiver_name" class="mt-1 block w-full py-2 px-3 border-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
              </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="member_caregiver_relation" class="block text-sm uppercase pl-2 py-2 font-medium text-gray-700">Care Giver Relationship:</label>
              </div>
              <div class="sm:col-span-4">
                <input type="text" name="member_caregiver_relation" id="member_caregiver_relation" class="mt-1 block w-full py-2 px-3 border-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
              </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="member_medical_condition" class="block text-sm uppercase pl-2 py-2 font-medium text-gray-700">Requestor Medical Condition:</label>
              </div>
              <div class="sm:col-span-4">
                <input type="text" name="member_medical_condition" id="member_medical_condition" class="mt-1 block w-full py-2 px-3 border-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
              </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="member_medical_number" class="block text-sm py-2 uppercase pl-2 font-medium text-gray-700">Medical Card ID:</label>
              </div>
              <div class="sm:col-span-4">
                <input type="number" name="member_medical_number" id="member_medical_number" class="mt-1 block w-full py-2 px-3 border-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
              </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="member_meal_duration" class="block text-sm py-2 uppercase pl-2 font-medium text-gray-700">Meal Plan Duration (days):</label>
              </div>
              <div class="sm:col-span-4">
                <input type="number" name="member_meal_duration" id="member_meal_duration" value="30" class="mt-1 block w-full py-2 px-3 border-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" readonly>
              </div>
            </div>
          </div>

          <!-- Partner box -->
          <div class="partner box space-y-6 bg-green-50 p-6 rounded-lg shadow-inner">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="partnership_restaurant" class="block uppercase pl-2 py-2 text-sm font-medium text-gray-700">Restaurant Name:</label>
              </div>
              <div class="sm:col-span-4">
                <input type="text" name="partnership_restaurant" id="partnership_restaurant" class="mt-1 py-2 px-3 border-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
              </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="partnership_duration" class="block uppercase pl-2 py-2 text-sm font-medium text-gray-700">Partnership Duration:</label>
              </div>
              <div class="sm:col-span-4">
                <input type="text" name="partnership_duration" id="partnership_duration" class="mt-1 py-2 px-3 border-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
              </div>
            </div>
          </div>

          <!-- Volunteer box -->
          <div class="volunteer box space-y-6 bg-yellow-50 p-6 rounded-lg shadow-inner">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label class="block text-sm uppercase pl-2 py-2 font-medium text-gray-700">Volunteer Vaccination Status:</label>
              </div>
              <div class="sm:col-span-4">
                <div class="flex space-x-4">
                  <div class="flex items-center pt-2">
                    <input type="radio" name="volunteer_vaccination" id="inlineRadio1" value="0" class="form-radio text-indigo-600">
                    <label for="inlineRadio1" class="ml-2 text-sm text-gray-700">Yes</label>
                  </div>
                  <div class="flex items-center pt-2">
                    <input type="radio" name="volunteer_vaccination" id="inlineRadio2" value="1" class="form-radio text-indigo-600">
                    <label for="inlineRadio2" class="ml-2 text-sm text-gray-700">No</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label for="volunteer_duration" class="block uppercase pl-2 py-2 text-sm font-medium text-gray-700">Volunteer Duration:</label>
              </div>
              <div class="sm:col-span-4">
                <input type="text" name="volunteer_duration" id="volunteer_duration" class="mt-1 py-2 px-3 border-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
              </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label class="block text-sm uppercase pl-2 py-2 font-medium text-gray-700">Available days:</label>
              </div>
              <div class="sm:col-span-4">
                <div class="grid grid-cols-3 gap-4">
                  @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                  <div class="flex items-center">
                    <input type="checkbox" name="volunteer_available[]" value="{{ $day }}" id="{{ $day }}" class="form-checkbox text-indigo-600 h-4 w-4">
                    <label for="{{ $day }}" class="ml-2 text-sm text-gray-700">{{ $day }}</label>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <div class="flex justify-end space-x-4 pt-8">
            <button type="reset" class="px-6 py-3 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
              Clear
            </button>
            <button type="submit" name="button2" class="px-6 py-3 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
              Register
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script src="{{ asset('js/member-register.js') }}"></script>
<script>
  var variable1 = document.getElementById("demo1");

  function getlocation() {
    navigator.geolocation.getCurrentPosition(showLoc);
  }

  function showLoc(pos) {
    var lat = pos.coords.latitude;
    var log = pos.coords.longitude;

    document.getElementById("location").value = lat + "," + log;

    variable1.innerHTML =
      "Latitude: " +
      pos.coords.latitude +
      "<br>Longitude: " +
      pos.coords.longitude;
  }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function() {
    $("select").change(function() {
      $(this).find("option:selected").each(function() {
        var optionValue = $(this).attr("value");
        if (optionValue) {
          $(".box").not("." + optionValue).hide();
          $("." + optionValue).show();
        } else {
          $(".box").hide();
        }
      });
    }).change();
  });
</script>
@endsection