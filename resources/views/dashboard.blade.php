<x-app-layout>
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
            onclick="window.location.href='/daftar'">Bergabung</button>
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


                                <!-- Hover Action Wrapper -->
                                <div class="hover-options">
                                    <button class="action-btn" onclick="addToCart('{{ $product->id }}')"><i
                                            class='bx bx-cart-add'></i></button>
                                    <button class="action-btn" onclick="addToWishlist('{{ $product->id }}')"><i
                                            class='bx bx-heart'></i></button>
                                </div>
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
                        <div
                            class="shape w-[300px] bg-slate-400 h-100 rounded-2xl d-flex align-items-center">
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

                                    <!-- Hover Action Wrapper -->
                                    <div class="hover-options">
                                        <button class="action-btn" onclick="addToCart('{{ $product->id }}')"><i
                                                class='bx bx-cart-add'></i></button>
                                        <button class="action-btn" onclick="addToWishlist('{{ $product->id }}')"><i
                                                class='bx bx-heart'></i></button>
                                    </div>
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
    <!-- <div class="category-container container">
        <h1 class="fw-bold text-center">Cari berdasarkan Kategori</h1>
        <div class="row m-5">
            <div class="col-6 col-md-5">
                <div class="category-item">
                    <img src="{{ asset('image/hero.png') }}" style="height: 100px; width: 150px;" alt="Snack"
                        class="img-fluid">
                    <p class="text-center">Makanan</p>
                </div>
            </div>
            <div class="col-6 col-md-7">
                <div class="category-item">
                    <img src="https://via.placeholder.com/150x100" alt="Minuman" class="img-fluid">
                    <p class="text-center">Minuman</p>
                </div>
            </div>
            <div class="col-6 col-md-7">
                <div class="category-item">
                    <img src="https://via.placeholder.com/150x100" alt="Makanan" class="img-fluid">
                    <p class="text-center">Buah & Sayur</p>
                </div>
            </div>
            <div class="col-6 col-md-5">
                <div class="category-item">
                    <img src="https://via.placeholder.com/150x100" alt="Suplemen" class="img-fluid">
                    <p class="text-center">Bahan Makanan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="nutritionModal" tabindex="-1" aria-labelledby="nutritionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nutritionModalLabel">Informasi Peringkat Gizi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <table class='table table-bordered text-center'>
                        <thead>
                            <tr>
                                <th>Peringkat</th>
                                <th>Kandungan Gula & Natrium</th>
                                <th>Rekomendasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A+</td>
                                <td>
                                    <strong>Gula:</strong> ≤ 5g/100g<br>
                                    <strong>Natrium:</strong> ≤ 120mg/100g
                                </td>
                                <td>Sangat dianjurkan untuk diet sehat, bebas gula tambahan, dan rendah natrium.</td>
                            </tr>
                            <tr>
                                <td>B</td>
                                <td>
                                    <strong>Gula:</strong> 6-10g/100g<br>
                                    <strong>Natrium:</strong> 121-200mg/100g
                                </td>
                                <td>Baik untuk konsumsi harian, dengan kandungan gula dan natrium rendah.</td>
                            </tr>
                            <tr>
                                <td>C</td>
                                <td>
                                    <strong>Gula:</strong> 11-15g/100g<br>
                                    <strong>Natrium:</strong> 201-300mg/100g
                                </td>
                                <td>Konsumsi dengan hati-hati, gula dan natrium sedang.</td>
                            </tr>
                            <tr>
                                <td>D</td>
                                <td>
                                    <strong>Gula:</strong> > 15g/100g<br>
                                    <strong>Natrium:</strong> > 300mg/100g
                                </td>
                                <td>Konsumsi dalam jumlah terbatas, kadar gula dan natrium tinggi.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div> -->
    <x-address-component />

    <script>
        function addToCart(productId) {
            // Logika untuk menambahkan produk ke keranjang
            console.log('Menambahkan produk ke keranjang:', productId);
        }

        function addToWishlist(productId) {
            // Logika untuk menambahkan produk ke wishlist
            console.log('Menambahkan produk ke wishlist:', productId);
        }

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
</x-app-layout>
