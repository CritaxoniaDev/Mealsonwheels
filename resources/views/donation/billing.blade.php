@section('title')
Donation
@endsection
@extends('layouts.app')

@section('content')

<body class="bg-gradient-to-r from-blue-100 to-purple-100">
  <section class="min-h-screen py-16">
    <div class="container mx-auto px-4">
      <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="flex flex-col md:flex-row">
          <div class="w-full md:w-1/2 p-10">
            <h2 class="text-4xl font-extrabold text-center mb-6 text-indigo-700">BILLING<br>DETAILS</h2>
            <p class="text-center text-gray-600 mb-10 text-lg">Please provide your billing information to complete your donation.</p>

            <div class="flex justify-between mb-10">
              <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-2">
                  <span class="text-white font-bold">1</span>
                </div>
                <p class="text-xs text-gray-500">DONATION</p>
              </div>
              <div class="text-center">
                <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-2">
                  <span class="text-white font-bold">2</span>
                </div>
                <p class="text-xs font-semibold text-indigo-600">BILLING</p>
              </div>
              <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-2">
                  <span class="text-white font-bold">3</span>
                </div>
                <p class="text-xs text-gray-500">PAYMENT</p>
              </div>
              <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-2">
                  <span class="text-white font-bold">4</span>
                </div>
                <p class="text-xs text-gray-500">COMPLETION</p>
              </div>
            </div>

            <form id="form" action="{{ route('saveBilling')}}" method="POST" class="space-y-6">
              @csrf
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label for="donor_first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                  <input type="text" id="donor_first_name" name="donor_first_name" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50">
                  <div class="error text-red-500 text-xs mt-1"></div>
                </div>
                <div>
                  <label for="donor_last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                  <input type="text" id="donor_last_name" name="donor_last_name" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50">
                  <div class="error text-red-500 text-xs mt-1"></div>
                </div>
              </div>

              <div>
                <label for="donor_address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="donor_address" name="donor_address" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50">
                <div class="error text-red-500 text-xs mt-1"></div>
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label for="donor_city" class="block text-sm font-medium text-gray-700">City</label>
                  <input type="text" id="donor_city" name="donor_city" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50">
                  <div class="error text-red-500 text-xs mt-1"></div>
                </div>
                <div>
                  <label for="donor_state" class="block text-sm font-medium text-gray-700">State</label>
                  <input type="text" id="donor_state" name="donor_state" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50">
                  <div class="error text-red-500 text-xs mt-1"></div>
                </div>
              </div>

              <div>
                <label for="donor_country" class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" id="donor_country" name="donor_country" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50">
                <div class="error text-red-500 text-xs mt-1"></div>
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label for="donor_email" class="block text-sm font-medium text-gray-700">Email</label>
                  <input type="email" id="donor_email" name="donor_email" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50">
                  <div class="error text-red-500 text-xs mt-1"></div>
                </div>
                <div>
                  <label for="donor_phone" class="block text-sm font-medium text-gray-700">Phone</label>
                  <input type="tel" id="donor_phone" name="donor_phone" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50">
                  <div class="error text-red-500 text-xs mt-1"></div>
                </div>
              </div>

              <button type="submit" class="w-full bg-indigo-600 text-white text-lg font-bold py-3 px-6 rounded-xl hover:bg-indigo-700 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Continue to Payment
              </button>
            </form>
          </div>
          <div class="w-full md:w-1/2 relative overflow-hidden">
            <img src="{{url('/images/donation.jpg')}}" alt="Donation" class="object-cover w-full h-full transform scale-105 hover:scale-110 transition-all duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-indigo-900 to-transparent opacity-70"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
              <h3 class="text-2xl font-bold mb-2">Your Information Matters</h3>
              <p class="text-sm">Providing accurate details helps us process your donation efficiently.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    const form = document.getElementById('form');
    const donor_first_name = document.getElementById('donor_first_name');
    const donor_last_name = document.getElementById('donor_last_name');
    const donor_address = document.getElementById('donor_address');
    const donor_city = document.getElementById('donor_city');
    const donor_state = document.getElementById('donor_state');
    const donor_country = document.getElementById('donor_country');
    const donor_email = document.getElementById('donor_email');
    const donor_phone = document.getElementById('donor_phone');

    form.addEventListener('submit', (e) => {
      e.preventDefault();

      validateInputs();
    });

    const setError = (element, message) => {
      const inputControl = element.parentElement;
      const errorDisplay = inputControl.querySelector('.error');

      errorDisplay.innerText = message;
      inputControl.classList.add('error');
      inputControl.classList.remove('success');
    };

    const setSuccess = (element) => {
      const inputControl = element.parentElement;
      const errorDisplay = inputControl.querySelector('.error');

      errorDisplay.innerText = '';
      inputControl.classList.add('success');
      inputControl.classList.remove('error');
    };

    const isValidEmail = donor_email => {
      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(donor_email).toLowerCase());
    }

    const validateInputs = () => {
      const donor_first_name_value = donor_first_name.value.trim();
      const donor_last_name_value = donor_last_name.value.trim();
      const donor_address_value = donor_address.value.trim();
      const donor_city_value = donor_city.value.trim();
      const donor_state_value = donor_state.value.trim();
      const donor_country_value = donor_country.value.trim();
      const donor_email_value = donor_email.value.trim();
      const donor_phone_value = donor_phone.value.trim();

      if (donor_first_name_value === '') {
        setError(donor_first_name, 'This field is required');
        return false;
      } else {
        setSuccess(donor_first_name);
      }

      if (donor_last_name_value === '') {
        setError(donor_last_name, 'This field is required');
        return false;
      } else {
        setSuccess(donor_last_name);
      }

      if (donor_address_value === '') {
        setError(donor_address, 'This field is required');
        return false;
      } else {
        setSuccess(donor_address);
      }

      if (donor_city_value === '') {
        setError(donor_city, 'This field is required');
        return false;
      } else {
        setSuccess(donor_city);
      }

      if (donor_state_value === '') {
        setError(donor_state, 'This field is required');
        return false;
      } else {
        setSuccess(donor_state);
      }

      if (donor_country_value === '') {
        setError(donor_country, 'This field is required');
        return false;
      } else {
        setSuccess(donor_country);
      }

      if (donor_email_value === '') {
        setError(donor_email, 'This field is required');
      } else if (!isValidEmail(donor_email_value)) {
        setError(donor_email, 'Provide a valid email address');
        return false;
      } else {
        setSuccess(donor_email);
      }

      if (donor_phone_value === '') {
        setError(donor_phone, 'This field is required');
        return false;
      } else {
        setSuccess(donor_phone);
      }
      form.submit();

    };
  </script>
</body>
@endsection