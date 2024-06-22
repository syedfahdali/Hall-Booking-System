<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Hall Booking System') }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        /* Additional styles for customization */
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-img-top {
            max-height: 200px;
            object-fit: cover;
        }
        .dropdown-menu {
            display: none;
        }
        .dropdown-menu.show {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div id="app">
        <nav class="bg-white shadow-md">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <a class="navbar-brand text-lg font-bold" href="{{ url('/') }}">
                        Hall Booking System
                    </a>
                    <div class="flex items-center">
                        <button class="navbar-toggler md:hidden" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="hidden md:flex md:items-center md:space-x-4" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="flex space-x-4">
                                <li class="nav-item">
                                    <a class="nav-link text-gray-700" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                </li>
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-700" href="{{ route('halls.index') }}">{{ __('Halls') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-700" href="{{ route('bookings.index') }}">{{ __('Bookings') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-700" href="{{ route('employees.index') }}">{{ __('Employees') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-700" href="{{ route('customer-cares.index') }}">{{ __('Customer Care') }}</a>
                                    </li>
                                @endauth
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="flex space-x-4 ml-auto">
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-700" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link text-gray-700" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item relative">
                                        <a id="navbarDropdown" class="nav-link text-gray-700 cursor-pointer">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div id="dropdownMenu" class="dropdown-menu absolute right-0 mt-2 py-2 w-48 bg-white border rounded shadow-xl">
                                            <a class="dropdown-item block px-4 py-2 text-gray-800 hover:bg-gray-100" href="{{ route('profile.edit') }}">
                                                {{ __('Profile') }}
                                            </a>
                                            <a class="dropdown-item block px-4 py-2 text-gray-800 hover:bg-gray-100" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-8">
            @yield('content')
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdown = document.getElementById('navbarDropdown');
            const dropdownMenu = document.getElementById('dropdownMenu');

            let showTimeout;
            let hideTimeout;

            function showDropdown() {
                clearTimeout(hideTimeout);
                showTimeout = setTimeout(() => {
                    dropdownMenu.classList.add('show');
                }, 100);
            }

            function hideDropdown() {
                clearTimeout(showTimeout);
                hideTimeout = setTimeout(() => {
                    dropdownMenu.classList.remove('show');
                }, 100);
            }

            dropdown.addEventListener('mouseenter', showDropdown);
            dropdown.addEventListener('mouseleave', hideDropdown);
            dropdownMenu.addEventListener('mouseenter', showDropdown);
            dropdownMenu.addEventListener('mouseleave', hideDropdown);
        });
    </script>
</body>
</html>
