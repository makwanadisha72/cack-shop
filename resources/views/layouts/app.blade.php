<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CackShop Admin</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: #f5f7fb;
        }

        /* NAVBAR */
        .main-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 22px;
            color: #2563eb !important;
            letter-spacing: 0.5px;
        }

        .nav-link {
            font-weight: 600;
            color: #374151 !important;
            padding: 8px 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            background: #f0f5ff;
            color: #2563eb !important;
        }

        /* USER DROPDOWN */
        .dropdown-menu {
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .dropdown-item {
            font-weight: 600;
        }

        .dropdown-item:hover {
            background: #f0f5ff;
            color: #2563eb;
        }

        /* MAIN CONTENT */
        main {
            padding-top: 30px;
            padding-bottom: 40px;
        }
    </style>
</head>
<body>

<div id="app">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md main-navbar shadow-sm">
        <div class="container">

            <!-- BRAND -->
            <a class="navbar-brand" href="{{ url('/') }}">
                CackShop Admin
            </a>

            <!-- TOGGLER -->
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- LEFT -->
                <ul class="navbar-nav me-auto">
                    {{-- add menu links later --}}
                </ul>

                <!-- RIGHT -->
                <ul class="navbar-nav ms-auto align-items-center">

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                               href="#"
                               role="button"
                               data-bs-toggle="dropdown"
                               aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item"
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form"
                                      action="{{ route('logout') }}"
                                      method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>

    <!-- PAGE CONTENT -->
    <main>
        @yield('content')
    </main>

</div>

</body>
</html>
