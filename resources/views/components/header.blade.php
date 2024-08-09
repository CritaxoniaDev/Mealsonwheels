@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@if(!request()->is('login'))
<header class="header" style="background-color: #004AAD;">
    <div class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 sm:px-6 lg:px-8">
        <a class="block text-teal-600">
            <span class="sr-only">Home</span>
            <img src="{{ url('/images/logo.png') }}" alt="company logo" class="h-12 rounded-lg">
        </a>

        <div class="flex flex-1 items-center justify-end md:justify-between">
            <nav aria-label="Global" class="hidden md:block">
                <ul class="flex items-center gap-6 text-sm">
                    @auth
                    @php
                    $userRole = Auth::user()->role;
                    @endphp
                    @if($userRole == 'admin')
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('admin#index') }}">Dashboard</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <button type="button" class="text-green-50 transition hover:text-gray-500/75 uppercase cursor-pointer flex items-center space-x-2" id="manage-users-dropdown" aria-expanded="false" onclick="toggleManageUsersDropdown()">
                            <span>Manage Users</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <ul class="absolute left-0 z-10 mt-2 w-48 origin-top-left rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none transition-all duration-300 ease-in-out opacity-0 transform scale-95" id="manage-users-menu" style="display: none;">
                            <li><a href="{{ route('admin#allMembers') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Member and Care Giver</a></li>
                            <li><a href="{{ route('admin#allPartners') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Partners</a></li>
                            <li><a href="{{ route('admin#allVolunteers') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Volunteers</a></li>
                            <li><a href="{{ route('admin#allDonors') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Donors</a></li>
                            <li><a href="{{ route('admin#allFeedbacks') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Feedbacks</a></li>
                        </ul>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('admin#allMenus') }}">Manage Menus</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('admin#allDeliveries') }}">Manage Deliveries</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="/about"> About us </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="/contact"> Contact </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    @elseif($userRole == 'member')
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('member#index') }}">Dashboard</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('order#showOrderDelivery', Auth::id()) }}">Orders</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('member#viewAllMenu') }}">Menu</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('member#deliveryHistory') }}">Delivery History</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="/about"> About us </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="/contact"> Contact </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    @elseif($userRole == 'partner')
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('partner#index') }}">Dashboard</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('partner#createMenu') }}">Create Menu</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="/about"> About us </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="/contact"> Contact </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    @elseif($userRole == 'volunteer')
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('volunteer#index') }}">Dashboard</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('deliver#AllDeliveryForVolunteer') }}">Deliveries</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('volunteer#viewAllMenu') }}">Menu</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="/about"> About us </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="/contact"> Contact </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    @endif
                    @else
                    @guest
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="/"> Home </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="/about"> About us </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('getmeals') }}"> Get Meal </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('blog') }}"> Blog </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('services') }}"> Services </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="relative group">
                        <a class="text-green-50 transition hover:text-gray-500/75 uppercase" href="{{ route('faq') }}"> Faq </a>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-teal-600 transition-all group-hover:w-full"></span>
                    </li>
                    @endguest
                    @endauth
                </ul>
            </nav>

            <div class="flex items-center gap-4" id="user-menu">
                <div class="relative">
                    @auth
                    <button type="button" class="text-green-50 transition hover:text-gray-500/75 flex items-center space-x-3 px-4 py-2" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" onclick="toggleDropdown()">
                        @if(Auth::user()->role === 'partner')
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        @elseif(Auth::user()->role === 'admin')
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        @elseif(Auth::user()->role === 'volunteer')
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        @else
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        @endif
                        <span class="font-sm">
                            @if(Auth::user()->role === 'partner')
                            {{ \Illuminate\Support\Facades\DB::table('partners')->where('user_id', Auth::id())->value('partnership_restaurant') }}
                            @else
                            {{ Auth::user()->name }}
                            @endif
                        </span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        <span class="px-2 py-1 uppercase rounded text-xs font-semibold text-white bg-{{ $userRole == 'admin' ? 'red' : ($userRole == 'member' ? 'yellow' : ($userRole == 'volunteer' ? 'green' : 'pink')) }}-500">
                            {{ $userRole }}
                        </span>
                    </button>
                    <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none transition-all duration-300 ease-in-out opacity-0 transform scale-95" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-dropdown" style="display: none;">
                        <a href="{{ $userRole === 'admin' ? route('admin#updateAdmin', Auth::id()) : route($userRole.'#updateProfile', Auth::id()) }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Update Profile</a>
                        @if($userRole == 'partner')
                        <a href="{{ route('order#AllOrderForPartner', Auth::id()) }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Orders</a>
                        @endif
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Logout</button>
                        </form>
                    </div>
                    @else
                    @guest
                    <div class="sm:flex sm:gap-4">
                        <a class="block rounded-md border-2 border-green-50 px-5 py-2.5 text-sm font-medium text-green-100 transition hover:bg-teal-600 hover:text-white" href="{{ route('login') }}">
                            Login
                        </a>
                        @if(!request()->is('register') && !request()->is('registration'))
                        <a class="hidden rounded-md bg-green-50 px-5 py-2.5 text-sm font-medium text-blue-700 transition hover:bg-teal-600 hover:text-black sm:block" href="{{ route('registration') }}">
                            Sign-up
                        </a>
                        @endif
                    </div>
                    @endguest
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>

@if(!request()->is('register') && !request()->is('registration') && !request()->is('login') && !Auth::check())
<!-- Secondary Header -->
<header class="text-white bg-green-800" id="header2">
    <div class="container mx-auto flex flex-col items-center py-2 px-2 sm:px-4 md:px-6">
        <div class="mb-3">
            <p class="text-center uppercase text-sm sm:text-base">Join us in Making a Difference</p>
        </div>
        <div class="flex flex-col sm:flex-row uppercase w-full justify-center">
            <a href="/donationFee" class="px-4 sm:px-8 md:px-20 lg:px-40 text-base sm:text-lg xl:text-xl hover:text-white text-center py-2">Donate now</a>
            <a href="{{ route('register') }}" class="px-4 sm:px-8 md:px-20 lg:px-40 text-base sm:text-lg xl:text-xl hover:text-white text-center py-2">Volunteer</a>
            <a href="#" class="px-4 sm:px-8 md:px-20 lg:px-40 text-base sm:text-lg xl:text-xl hover:text-white text-center py-2">Contact Us</a>
        </div>
    </div>
</header>
@endif
@endif
<script>
    function toggleDropdown() {
        var dropdown = document.getElementById('user-dropdown');
        var button = document.getElementById('user-menu-button');

        if (dropdown.style.display === 'none') {
            dropdown.style.display = 'block';
            setTimeout(() => {
                dropdown.classList.add('opacity-100', 'scale-100');
                dropdown.classList.remove('opacity-0', 'scale-95');
            }, 10);
            button.setAttribute('aria-expanded', 'true');
        } else {
            dropdown.classList.remove('opacity-100', 'scale-100');
            dropdown.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                dropdown.style.display = 'none';
            }, 300);
            button.setAttribute('aria-expanded', 'false');
        }
    }

    function toggleManageUsersDropdown() {
        var dropdown = document.getElementById('manage-users-menu');
        var button = document.getElementById('manage-users-dropdown');

        if (dropdown.style.display === 'none') {
            dropdown.style.display = 'block';
            setTimeout(() => {
                dropdown.classList.add('opacity-100', 'scale-100');
                dropdown.classList.remove('opacity-0', 'scale-95');
            }, 10);
            button.setAttribute('aria-expanded', 'true');
        } else {
            dropdown.classList.remove('opacity-100', 'scale-100');
            dropdown.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                dropdown.style.display = 'none';
            }, 300);
            button.setAttribute('aria-expanded', 'false');
        }
    }

    // Close the dropdown when clicking outside
    document.addEventListener('click', function(e) {
        var dropdown = document.getElementById('manage-users-menu');
        var button = document.getElementById('manage-users-dropdown');
        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.remove('opacity-100', 'scale-100');
            dropdown.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                dropdown.style.display = 'none';
            }, 300);
            button.setAttribute('aria-expanded', 'false');
        }
    });
</script>
<script src="{{ asset('js/header.js') }}"></script>