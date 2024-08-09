@extends('layouts.app')
@section('title', 'Donate Now')
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
            <h2 class="text-4xl font-extrabold text-center mb-6 text-indigo-700">EMPOWER<br>OUR ELDERS</h2>
            <p class="text-center text-gray-600 mb-10 text-lg">Your generosity fuels programs that ensure dignity, safety, and independence for seniors across the nation.</p>

            <div class="flex justify-between mb-10">
              <div class="text-center">
                <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-2">
                  <span class="text-white font-bold">1</span>
                </div>
                <p class="text-xs font-semibold text-indigo-600">CHOOSE</p>
              </div>
              <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-2">
                  <span class="text-white font-bold">2</span>
                </div>
                <p class="text-xs text-gray-500">DETAILS</p>
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
                <p class="text-xs text-gray-500">CONFIRM</p>
              </div>
            </div>

            <form id="form" action="{{ route('saveDonationFee') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
              @csrf
              <div class="grid grid-cols-2 gap-4 mb-6">
                <label class="flex items-center justify-center bg-indigo-100 rounded-xl p-6 cursor-pointer hover:bg-indigo-200 transition transform hover:scale-105">
                  <input type="radio" name="donor_fee" value="1000" class="sr-only" />
                  <span class="text-2xl font-bold text-indigo-700">$1000</span>
                </label>
                <label class="flex items-center justify-center bg-indigo-100 rounded-xl p-6 cursor-pointer hover:bg-indigo-200 transition transform hover:scale-105">
                  <input type="radio" name="donor_fee" value="500" class="sr-only" />
                  <span class="text-2xl font-bold text-indigo-700">$500</span>
                </label>
              </div>

              <div class="grid grid-cols-3 gap-4 mb-6">
                <label class="flex items-center justify-center bg-indigo-100 rounded-xl p-4 cursor-pointer hover:bg-indigo-200 transition transform hover:scale-105">
                  <input type="radio" name="donor_fee" value="300" class="sr-only" />
                  <span class="text-xl font-bold text-indigo-700">$300</span>
                </label>
                <label class="flex items-center justify-center bg-indigo-100 rounded-xl p-4 cursor-pointer hover:bg-indigo-200 transition transform hover:scale-105">
                  <input type="radio" name="donor_fee" value="200" class="sr-only" />
                  <span class="text-xl font-bold text-indigo-700">$200</span>
                </label>
                <label class="flex items-center justify-center bg-indigo-100 rounded-xl p-4 cursor-pointer hover:bg-indigo-200 transition transform hover:scale-105">
                  <input type="radio" name="donor_fee" value="100" class="sr-only" />
                  <span class="text-xl font-bold text-indigo-700">$100</span>
                </label>
              </div>

              <div class="flex items-center space-x-2 bg-indigo-50 p-4 rounded-xl">
                <span class="text-2xl font-bold text-indigo-700">$</span>
                <input type="number" id="donor_fee" name="donor_fee" placeholder="Enter custom amount" class="flex-grow text-xl font-bold text-indigo-700 bg-transparent border-none focus:ring-0 focus:outline-none" />
              </div>

              <div>
                <label for="donor_tribute" class="block text-sm font-medium text-gray-700 mb-1">Tribute (Optional)</label>
                <input type="text" id="donor_tribute" name="donor_tribute" placeholder="In memory of / In honor of" class="w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
              </div>

              <div>
                <label for="donor_honoree_name" class="block text-sm font-medium text-gray-700 mb-1">Honoree Name (Optional)</label>
                <input type="text" id="donor_honoree_name" name="donor_honoree_name" placeholder="Name of person being honored" class="w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
              </div>

              <button type="submit" class="w-full bg-indigo-600 text-white text-lg font-bold py-3 px-6 rounded-xl hover:bg-indigo-700 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Continue to Details
              </button>
            </form>
          </div>
          <div class="w-full md:w-1/2 relative overflow-hidden">
            <img src="{{url('/images/donation.jpg')}}" alt="Seniors Smiling" class="object-cover w-full h-full transform scale-105 hover:scale-110 transition-all duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-indigo-900 to-transparent opacity-70"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
              <h3 class="text-2xl font-bold mb-2">Make a Difference Today</h3>
              <p class="text-sm">Your donation directly impacts the lives of seniors in your community.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const form = document.getElementById('form');
      const donorFee = document.getElementById('donor_fee');
      const donorTribute = document.getElementById('donor_tribute');
      const donorHonoreeName = document.getElementById('donor_honoree_name');

      form.addEventListener('submit', (e) => {
        e.preventDefault();
        validateInputs();
      });

      const setError = (element, message) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error') || createErrorElement(inputControl);
        errorDisplay.textContent = message;
        inputControl.classList.add('error');
        inputControl.classList.remove('success');
      };

      const setSuccess = (element) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');
        if (errorDisplay) errorDisplay.textContent = '';
        inputControl.classList.remove('error');
        inputControl.classList.add('success');
      };

      const createErrorElement = (parent) => {
        const errorElement = document.createElement('p');
        errorElement.classList.add('error', 'text-red-500', 'text-xs', 'mt-1');
        parent.appendChild(errorElement);
        return errorElement;
      };

      const validateInputs = () => {
        const donorFeeValue = donorFee.value.trim();
        const donorTributeValue = donorTribute.value.trim();
        const donorHonoreeNameValue = donorHonoreeName.value.trim();

        let isValid = true;

        if (donorFeeValue === '') {
          setError(donorFee, 'This field is required');
          isValid = false;
        } else {
          setSuccess(donorFee);
        }

        if (donorTributeValue === '') {
          setError(donorTribute, 'This field is required');
          isValid = false;
        } else {
          setSuccess(donorTribute);
        }

        if (donorHonoreeNameValue === '') {
          setError(donorHonoreeName, 'This field is required');
          isValid = false;
        } else {
          setSuccess(donorHonoreeName);
        }

        if (isValid) {
          form.submit();
        }
      };
    });

    document.addEventListener('DOMContentLoaded', () => {
      const form = document.getElementById('form');
      const radioInputs = form.querySelectorAll('input[type="radio"][name="donor_fee"]');
      const customInput = document.getElementById('donor_fee');

      radioInputs.forEach(input => {
        input.addEventListener('change', () => {
          if (input.checked) {
            customInput.value = '';
            customInput.disabled = true;
            highlightSelected(input);
          }
        });
      });

      customInput.addEventListener('input', () => {
        radioInputs.forEach(input => {
          input.checked = false;
          input.parentElement.classList.remove('bg-indigo-300');
        });
        customInput.disabled = false;
      });

      function highlightSelected(selectedInput) {
        radioInputs.forEach(input => {
          input.parentElement.classList.remove('bg-indigo-300');
        });
        selectedInput.parentElement.classList.add('bg-indigo-300');
      }

      form.addEventListener('submit', (e) => {
        e.preventDefault();
        const selectedAmount = getSelectedAmount();
        if (selectedAmount) {
          console.log(`Selected amount: $${selectedAmount}`);
          form.submit();
        } else {
          alert('Please select or enter a donation amount.');
        }
      });

      function getSelectedAmount() {
        const checkedRadio = form.querySelector('input[type="radio"][name="donor_fee"]:checked');
        return checkedRadio ? checkedRadio.value : customInput.value;
      }
    });
  </script>
</body>
@endsection