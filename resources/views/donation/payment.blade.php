@extends('layouts.app')
@section('title', 'Payment')
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
            <h2 class="text-4xl font-extrabold text-center mb-6 text-indigo-700">PAYMENT<br>DETAILS</h2>
            <p class="text-center text-gray-600 mb-10 text-lg">Please provide your payment information to complete your donation.</p>

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
                <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-2">
                  <span class="text-white font-bold">3</span>
                </div>
                <p class="text-xs font-semibold text-indigo-600">PAYMENT</p>
              </div>
              <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-2">
                  <span class="text-white font-bold">4</span>
                </div>
                <p class="text-xs text-gray-500">COMPLETION</p>
              </div>
            </div>

            @if (Session::has('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
              <p class="font-bold">Success</p>
              <p>{{ Session::get('success') }}</p>
            </div>
            @endif

            <form role="form" action="{{route('stripe.post')}}" method="post" class="require-validation space-y-6" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
              @csrf
              <div>
                <label for="card_holder_name" class="block text-sm font-medium text-gray-700">Card Holder's Full Name</label>
                <input type="text" id="card_holder_name" name="card_holder_name" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50">
              </div>

              <div>
                <label for="card_number" class="block text-sm font-medium text-gray-700">Credit Card Number</label>
                <input type="text" id="card_number" name="card_number" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50 card-number">
              </div>

              <div>
                <label for="card_type" class="block text-sm font-medium text-gray-700">Card Type</label>
                <input type="text" id="card_type" name="card_type" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50">
              </div>

              <div>
                <label for="card_cvc" class="block text-sm font-medium text-gray-700">CVC</label>
                <input type="text" id="card_cvc" name="card_cvc" placeholder="ex. 311" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50 card-cvc">
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label for="card_expiry_month" class="block text-sm font-medium text-gray-700">Expiration Month</label>
                  <input type="text" id="card_expiry_month" name="card_expiry_month" placeholder="MM" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50 card-expiry-month">
                </div>
                <div>
                  <label for="card_expiry_year" class="block text-sm font-medium text-gray-700">Expiration Year</label>
                  <input type="text" id="card_expiry_year" name="card_expiry_year" placeholder="YYYY" class="mt-1 block w-full px-4 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-50 card-expiry-year">
                </div>
              </div>

              <button type="submit" class="w-full bg-indigo-600 text-white text-lg font-bold py-3 px-6 rounded-xl hover:bg-indigo-700 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Pay Now
              </button>
            </form>
          </div>
          <div class="w-full md:w-1/2 relative overflow-hidden">
            <img src="{{url('/images/donation.jpg')}}" alt="Donation" class="object-cover w-full h-full transform scale-105 hover:scale-110 transition-all duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-indigo-900 to-transparent opacity-70"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
              <h3 class="text-2xl font-bold mb-2">Secure Payment</h3>
              <p class="text-sm">Your payment information is encrypted and secure.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script type="text/javascript">
    $(function() {
      var $form = $(".require-validation");
      $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
          inputSelector = [
            'input[type=email]',
            'input[type=password]',
            'input[type=text]',
            'input[type=file]',
            'textarea'
          ].join(', '),

          $inputs = $form.find('.required').find(inputSelector),
          $errorMessage = $form.find('div.error'),
          valid = true;
        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });

        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
      });

      function stripeResponseHandler(status, response) {
        if (response.error) {
          $('.error')
            .removeClass('hide')
            .find('.alert')
            .text(response.error.message);
        } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
        }
      }
    });
  </script>
</body>
@endsection