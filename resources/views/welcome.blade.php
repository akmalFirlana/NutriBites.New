<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ani masi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
</head>

<body>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed-top">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex" style="overflow: hidden">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>
    
                    <div class="hiddenspace-x-2 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Beranda') }}
                        </x-nav-link>
                        <x-nav-link :href="route('kategori')" :active="request()->routeIs('kategori')">
                            {{ __('Kategori') }}
                        </x-nav-link>
                        <x-nav-link :href="route('wishlist.index')" :active="request()->routeIs('wishlist.index')">
                            {{ __('Wishlist') }}
                        </x-nav-link>
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Daftar') }}
                        </x-nav-link>
                    </div>
    
                    
                    <form class="form-s mx-4 mt-3 border">
                        <button>
                            <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                                aria-labelledby="search">
                                <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                                    stroke="currentColor" stroke-width="1.333" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <input class="input" placeholder="Cari Produk Kamu" required="" type="text">
                        <button class="reset" type="reset">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ms-6 me-3">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>Bergabung</div>
    
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
    
                        <x-slot name="content">
                            <x-dropdown-link :href="route('login')">
                                {{ __('Login') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('register')">
                                {{ __('Register') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </nav>
    

    <div class="con h-auto pb-5 pt-24 bg-gray-100" style="padding-left: 6rem; overflow: hidden; position: relative;">
        <img src="{{ asset('image/Vector.svg') }}" alt="Logo" class="appear"
            style="position: absolute; bottom: 190px; right: 500px;">
        <img src="{{ asset('image/Vector.svg') }}" alt="Logo" class="appear"
            style="height: 80px; position: absolute; bottom: 380px; right: 90px;">
        <img src="{{ asset('image/Vector.svg') }}" alt="Logo" class="appear"
            style="height: 40px; position: absolute; bottom: 100px; right: 700px;">
        <img src="{{ asset('image/Vector.svg') }}" alt="Logo" class="appear"
            style="height: 50px; position: absolute; bottom: 350px; right: 390px;">
        <img src="{{ asset('image/hero.png') }}" alt="Logo" class="an1 slide-in-right"
            style="height: 590px; position: absolute; bottom: -160px; right: -100px;">

        <h1 class="header-text roboto col-md-7 fw-bold slide-in-left"
            style="font-size: 2.9rem!important; padding: 0.2rem 7rem 0 0;">
            Camilan Sehat, Rasa Nikmat: Pilihan Tepat Untuk Hidup Yang Lebih Baik</h1>
        <p class="col-md-6 text-gray-400 slide-in-left2" style="padding: 0.8rem 7rem 1rem 0; font-size: 0.9rem;">
            Temukan Snack dan makanan dengan kualitas terbaik untuk dirimu dan keluargamu hanya di NutriBites</p>
        <button class="btn slide-in-right"
            style=" background-color: #01AB31; color:
        white; font-size: 0.9rem; font-weight: 500"
            onclick="window.location.href='{{ route('register') }}'">Bergabung</button>
        <div class="support row mt-5 slide-in-right">
            <div class="col-md-1 kanan">
                <h1 class="fw-bold fs-4">200+</h1>
                <h1 class="text-sm" style="color: grey">Brand Makanan</h1>
            </div>
            <div class="col-md-1 me-2 kanan">
                <h1 class="fw-bold fs-4">5.000+</h1>
                <h1 class="text-sm" style="color: grey">Produk Makanan</h1>
            </div>
            <div class="col-md-1 ms-2 pe-0">
                <h1 class="fw-bold fs-4">10+</h1>
                <h6 class="text-sm" style="color: grey">Metode Pembayaran</h6>
            </div>
        </div>
    </div>


    <section class="mt-5">
        <h1 class="text-center fw-bold" style="font-size: 3rem; margin-top: 6rem"> Rekomendasi Produk</h1>
        <p class="text-center text-gray-400 mb-5" style="font-size: 1rem;">Nikmati pilihan produk snack sehat terbaik
            yang dipilih khusus untuk Anda!</p>
        <div class="row justify-content-around mx-auto">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-2 pe-0 mt-3 procard overflow-hidden">

                        <div class="product-card border mb-4 position-relative rounded-md shadow-md"
                            style="width: 188px;">
                            <!-- Konten Card -->
                            <div class="img-wrapper">
                                @php
                                    $images = json_decode($product->images, true); // Mengubah JSON menjadi array
                                @endphp

                                @if (!empty($images) && isset($images[0]))
                                    <img src="{{ asset('storage/' . $images[0]) }}" alt="Product"
                                        class="product-img mx-auto">
                                @else
                                    <span>No Image</span>
                                @endif
                            </div>
                            <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="product-card-link">
                                <div class="pointer-event card-footer border-top border-gray-300 pt-1"
                                    style="padding: 0; margin: 0;"
                                    onclick="window.location.href='{{ route('product.detail', ['id' => $product->id]) }}'">
                                    <img src="{{ asset('image/badge1.png') }}"
                                        style="width: 100px; margin: 0; padding: 0;">
                                    <div class="keterangan ps-2 pe-2" style="padding: 0; margin: 0;">
                                        <a href="{{ route('product.detail', ['id' => $product->id]) }}"
                                            class="product-name"
                                            style="margin: 0; padding: 0;line-height: 0.8;">{{ $product->name }}</a>
                                        <div class="" style="margin: 0; padding: 0;">
                                            <span class="mb-0 text-gray me-2 fs-6 fw-bold d-block"
                                                style="line-height: 0.8; margin: 0; padding: 0;">Rp
                                                {{ number_format($product->price, 0, ',', '.') }}</span>
                                            <span class="text-decoration-line-through"
                                                style="color:gray; line-height: 0; font-size: 0.8rem; margin: 0; padding: 0;">Rp
                                                {{ number_format($product->price * 1.25, 0, ',', '.') }}</span>
                                        </div>
                                        <p class="text-muted"
                                            style="display: inline-flex; align-items: center; margin: 0; padding: 0;">
                                            <img src="{{ asset('image/icon_toko.png') }}"
                                                style="width: 20px; display: inline-flex; margin-right: 5px; margin: 0;">
                                            {{ $product->user->name }}
                                        </p>

                                        <div class="d-flex" style="margin: 0; padding: 0;">
                                            <i class='bx bxs-star' style='color:#d0e12b; margin: 0; padding: 0;'></i>
                                            <span class="badge bg-success ms-2"
                                                style="margin: 0; padding: 0;">{{ $product->rating }}</span> |
                                            <span class="badge bg-success ms-2" ">{{ $product->sold }} Terjual</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
 @endforeach
                                        </div>
                                    </div>

                                    <div class=" text-center mx-5 my-3">
                                        <button class="btn btn-white border">Muat Lebih</button>
                                    </div>
    </section>

    <hr class="mx-auto" style="border-color: #141113; width: 95%; height: 2px">

    <section>
        <div class="flash-sale mt-5">
            <div class="flash-header d-inline-flex">
                <h1 class="fw-bold d-flex ps-3 pe-2" style="font-size: 1.5rem">Flash Sale
                </h1>
                <div class="d-flex pt-auto">
                    <p class="pt-2 pe-2">Berakhir Dalam</p>
                    <div id="countdown" class="d-flex gap-2">
                        <div class="time-box" id="hours">00</div>
                        <div class="separator">:</div>
                        <div class="time-box" id="minutes">00</div>
                        <div class="separator">:</div>
                        <div class="time-box" id="seconds">00</div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around mx-auto">
                <div class="row">
                    <div class="col-sm-2 mt-3 pt-2 mb-5">
                        <div class="shape w-[300px] bg-slate-400 h-100 rounded-2xl d-flex align-items-center">
                            <img src="{{ asset('image/flashsale.png') }}" class="fs-img"
                                style="width: 200px; height: 220px; object-fit: cover;">
                        </div>

                    </div>
                    @php
                        $products = \App\Models\Product::inRandomOrder()->take(5)->get();
                    @endphp

                    @foreach ($products as $product)
                        <div class="col-sm-2 pe-0 py-5 procard overflow-hidden">
                            <div class="product-card bg-white border mb-4 position-relative rounded-md shadow-md"
                                style="width: 188px;">
                                <!-- Konten Card -->
                                <div class="img-wrapper">
                                    @php
                                        $images = json_decode($product->images, true); // Mengubah JSON menjadi array
                                    @endphp

                                    @if (!empty($images) && isset($images[0]))
                                        <img src="{{ asset('storage/' . $images[0]) }}" alt="Product"
                                            class="product-img mx-auto">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </div>
                                <a href="{{ route('product.detail', ['id' => $product->id]) }}"
                                    class="product-card-link">
                                    <div class="pointer-event card-footer-flash pb-2 border-top border-gray-300 pt-1"
                                        style="padding: 0; margin: 0;"
                                        onclick="window.location.href='{{ route('product.detail', ['id' => $product->id]) }}'">
                                        <div class="keterangan ps-2 pe-2" style="padding: 0; margin: 0;">
                                            <a href="{{ route('product.detail', ['id' => $product->id]) }}"
                                                class="product-name"
                                                style="margin: 0; padding: 0;line-height: 0.8;">{{ $product->name }}</a>
                                            <div class="" style="margin: 0; padding: 0;">
                                                <span class="mb-0 text-gray me-2 fs-6 fw-bold d-block"
                                                    style="line-height: 0.8; margin: 0; padding: 0;">Rp
                                                    {{ number_format($product->price, 0, ',', '.') }}</span>
                                                <span class="text-decoration-line-through"
                                                    style="color:gray; line-height: 0; font-size: 0.8rem; margin: 0; padding: 0;">Rp
                                                    {{ number_format($product->price * 1.25, 0, ',', '.') }}</span>
                                            </div>

                                            <div class="d-flex" style="margin: 0; padding: 0;">
                                                <i class='bx bxs-star'
                                                    style='color:#d0e12b; margin: 0; padding: 0;'></i>
                                                <span class="badge bg-success ms-2"
                                                    style="margin: 0; padding: 0;">{{ $product->rating }}</span> |
                                                <span class="badge bg-success ms-2">{{ $product->sold }}
                                                    Terjual</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <footer class="text-center text-lg-start pt-3 pb-3" style="background-color: #f0f0f0; z-index: 9999">
        <div class="container p-4 pb-0">
            <section class="">
                <div class="row">
                    <div class="col-lg-3 col-md-5 mb-4 mb-md-0 ms-5">
                        <img class="logo-img" src="{{ asset('image/NutriBites.svg') }}" style="width: 120px;"
                            alt="Logok">
                        <p style="color: #606060; font-size: 14px; max-width: 200px" class="mt-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Molestiae modi cum ipsam ad.
                        </p>

                        <div class="mt-4 d-flex">

                            <a class="socialContainer containerOne " href="#">
                                <svg viewBox="0 0 16 16" class="socialSvg instagramSvg">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                    </path>
                                </svg>
                            </a>

                            <a class="socialContainer containerTwo" href="#">
                                <svg viewBox="0 0 16 16" class="socialSvg twitterSvg">
                                    <path
                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
                                    </path>
                                </svg> </a>

                            <a class="socialContainer containerThree" href="#">
                                <svg viewBox="0 0 448 512" class="socialSvg linkdinSvg">
                                    <path
                                        d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                    </path>
                                </svg>
                            </a>

                            <a class="socialContainer containerFour" href="#">
                                <svg viewBox="0 0 16 16" class="socialSvg whatsappSvg">
                                    <path
                                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
                                    </path>
                                </svg>
                            </a>

                        </div>

                    </div>
                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase fw-bold">Company</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="footer-link text-muted">Tentang kami</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link text-muted">Fitur</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link text-muted">E-mail</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link text-muted">Dukung kami</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase fw-bold">Bantuan</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="footer-link text-muted">Cusstomer support</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link text-muted">Metode pengiriman</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link text-muted">Syarat & ketentuan</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link text-muted">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase fw-bold">Faq</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="footer-link text-muted">Akun</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link text-muted">Atur Pengiriman</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link text-muted">Pesanan</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link text-muted">Pembayaran</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase fw-bold">Resources</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="footer-link text-muted">Sumber Informasi</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link text-muted">Komunitas</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link text-muted">Dukungan</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link text-muted">Free course</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

        </div>
        <!-- Grid container -->
        <hr style="margin-top: 22px; max-width: 90%;" class="mx-auto">
        <!-- Copyright -->
        <div class="ps-5 pt-3 pb-3 col-md-4" style="background-color: rgba(0, 0, 0,); font-size: 0.8rem">
            NutriBites © 2024, All Rights Reserved
        </div>
    </footer>
    <x-address-component />

    <script>
        function startCountdown() {
            const hoursElem = document.getElementById("hours");
            const minutesElem = document.getElementById("minutes");
            const secondsElem = document.getElementById("seconds");

            function updateCountdown() {
                const now = new Date();
                const midnight = new Date();
                midnight.setHours(24, 0, 0, 0); // Set time to 12:00 AM

                // Calculate the time difference in seconds
                const timeRemaining = (midnight - now) / 1000;

                const hours = Math.floor(timeRemaining / 3600);
                const minutes = Math.floor((timeRemaining % 3600) / 60);
                const seconds = Math.floor(timeRemaining % 60);

                hoursElem.innerHTML = String(hours).padStart(2, '0');
                minutesElem.innerHTML = String(minutes).padStart(2, '0');
                secondsElem.innerHTML = String(seconds).padStart(2, '0');

                if (timeRemaining <= 0) {
                    // Optional: Reset countdown or trigger any other action
                    hoursElem.innerHTML = "00";
                    minutesElem.innerHTML = "00";
                    secondsElem.innerHTML = "00";
                }
            }

            setInterval(updateCountdown, 1000);
        }
        window.onload = startCountdown;
    </script>
</body>

</html>
