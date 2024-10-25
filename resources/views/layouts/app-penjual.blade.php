<!DOCTYPE html>
< lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/css/app.css')
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('css/penjual.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        <link rel="icon" href="{{ asset('image/logo_main.png') }}" type="image/png">
    </head>

    <body class="font-sans antialiased">
        <header class="header">
            <div class="header__container w-100">
                <div class="position-absolute end-0 me-5 d-flex">

                    <div class="hidden sm:flex sm:items-center sm:ms-6 me-3 border-0">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <img src="{{ asset('image/dummi.jpg') }}" alt="" class="header__img d-flex">
                </div>
                <a href="#" class="header__logo fw-bold pe-5">Nutri<span style="color: #BAB41E">Bit</span>es</a>

                <div class="header__search p-0">
                    <input type="search" placeholder="Cari Halaman" class="header__input">
                    <i class='bx bx-search header__icon my-auto me-2'></i>
                </div>

                <div class="header__toggle">
                    <i class='bx bx-menu' id="header-toggle"></i>
                </div>
            </div>
        </header>

        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="{{ route('admin.dashboard') }}" class="nav__link nav__logo">
                        <i class='bx bx-menu nav__icon'></i>
                        <span class="nav__logo-name">Nutri<span style="color: #BAB41E">Bit</span>es</span>
                    </a>

                    <div class="nav__list">
                        <div class="nav__items">

                            <a href="{{ route('admin.dashboard') }}" class="nav__link">
                                <i class='bx bxs-dashboard nav__icon'></i>
                                <span class="nav__name">Dashboard</span>
                            </a>

                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-user nav__icon'></i>
                                    <span class="nav__name">Profil</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="{{ route('dashboard') }}" class="nav__dropdown-item">Keamanan</a>
                                        <a href="{{ route('admin.pesan') }}" class="nav__dropdown-item">Pesan</a>
                                        <a href="{{ route('profile.edit') }}" class="nav__dropdown-item">Akun</a>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('admin.pesanan') }}" class="nav__link">
                                <i class='bx bx-cart nav__icon'></i>
                                <span class="nav__name">Pesanan</span>
                            </a>
                        </div>

                        <div class="nav__items">
                            <h3 class="nav__subtitle">Menu</h3>

                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-package nav__icon'></i>
                                    <span class="nav__name">Produk</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="{{ route('admin.produk') }}" class="nav__dropdown-item">Produk kamu</a>
                                        <a href="{{ route('admin.upload') }}" class="nav__dropdown-item">Tambah-
                                            Produk</a>
                                    </div>
                                </div>

                            </div>

                            <a href="{{ route('dashboard') }}" class="nav__link">
                                <i class='bx bxs-truck nav__icon'></i>
                                <span class="nav__name">Pengiriman</span>
                            </a>

                            <a href="#" class="nav__link">
                                <i class='bx bx-cog nav__icon'></i>
                                <span class="nav__name">Setelan</span>
                            </a>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav__link nav__logout">
                        <i class='bx bx-log-out nav__icon'></i>
                        <span class="nav__name">Log Out</span>
                    </button>
                </form>

            </nav>
        </div>


        <!--========== CONTENTS ==========-->

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!--========== MAIN JS ==========-->
        <script src="{{ asset('js/nav.js') }}"></script>
        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        @vite('resources/js/app.js')
    </body>

    </html>