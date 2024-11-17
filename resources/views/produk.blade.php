<x-app-layout>
    <div class="link d-block mt-20 tw-pt-5 ms-20">
        <a href="{{ route('dashboard') }}" class="text-muted me-2">Beranda</a> >
        <a href="{{ route('kategori') }}" class="text-muted ms-2">{{ $product->name }}</a>
    </div>

    <div class="row pt-3 px-5">
        <div class="main col-md-8">
            <div class="section tw-pt-10 pb-5">
                <div class="header row mt-3 mb-5 ms-5 ps-5">
                    <div class="img-container col-md-5 ps-4">
                        <div class="main-container max-w-[240px] pb-2" style="position: sticky; top: 135px">
                            <div class="main_img">
                                @php
                                    $images = json_decode($product->images, true); // Mengubah JSON menjadi array
                                @endphp

                                <!-- Tampilkan gambar utama, default ke gambar pertama -->
                                @if (!empty($images) && isset($images[0]))
                                    <img id="mainImage" src="{{ asset('storage/' . $images[0]) }}" alt="Product"
                                        class="main-img mx-auto">
                                @else
                                    <span>No Image</span>
                                @endif
                            </div>

                            <!-- Container untuk thumbnail, tampilkan jika lebih dari satu gambar tersedia -->
                            @if (count($images) > 1)
                                <div class="thumbnail-container mt-2">
                                    @foreach ($images as $index => $image)
                                        @if ($index < 4)
                                            <!-- Batasi hingga 4 gambar -->
                                            <img src="{{ asset('storage/' . $image) }}" onclick="changeImage(this)"
                                                alt="Thumbnail {{ $index + 1 }}"
                                                class="thumbnail @if ($index === 0) active @endif">
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-7 hero-desk tw-mt-20">
                        <h1 class="title-text text-2xl font-black">{{ $product->name }}</h1>
                        <div class="d-flex mt-1 fs-6">
                            <span class="badge bg-success ms-2 me-2">Terjual {{ $product->sold }}</span> |
                            <i class='bx bxs-star ms-2' style='color:#d0e12b'></i>
                            <span class="font-semibold text-gray-700">{{ $product->rating }} (126 Rating)</span>
                        </div>

                        <div class="harga mt-4 mb-4">
                            <h1 class="price me-3 mt-3 fs-2 font-black">Rp
                                {{ number_format($product->price, 0, ',', '.') }}
                            </h1>
                            <h1 class="discount fw-bold text-sm text-gray-400 text-decoration-line-through">
                                <span class="badge bg-success mt-1">20%</span><span
                                    class="text-gray-400 fw-bold ms-2">Rp
                                    {{ number_format($product->price * 1.25, 0, ',', '.') }} </span>
                            </h1>
                        </div>
                        <hr class="bawah">
                        <div class="deskripsi py-2">
                            <h4 class="fw-bold fs-5 pb-2">Deskripsi</h4>
                            <p class=""><span class="text-gray-400 ">Berat :</span> {{ $product->weight }} gram
                            </p>
                            <p class=""><span class="text-gray-400 ">Daya Tahan :</span>
                                {{ $product->shelf_life }} Hari
                            </p>
                            <div class="relative">
                                <!-- Teks Deskripsi Produk -->
                                <p class="pt-2 clamp-7 overflow-hidden transition-all duration-300 ease-in-out"
                                    id="description">
                                    {!! nl2br(e($product->description)) !!}
                                </p>

                                <!-- Tombol Lihat Selengkapnya -->
                                <button class="text-gray-500 mt-2 " onclick="toggleDescription()" id="toggleButton">
                                    Lihat Selengkapnya
                                </button>
                            </div>
                        </div>
                        <hr class="bawah">
                        <div class="toko-container row mx-2 pt-2">
                            <div class="img col-md-2">
                                <img src="{{ asset('image/dummi.jpg') }}" alt="" class="icon-toko rounded-full"
                                    style="width: 60px;">
                            </div>
                            <div class="link-toko col-md-9">
                                <p class="fs-5 nama-toko pt-1 fw-bold"
                                    style="display: inline-flex; align-items: center; margin: 0; padding: 0; line-height: 0.8;">
                                    <img src="{{ asset('image/icon_toko.png') }}"
                                        style="width: 20px; display: inline-flex; margin: 0 5px;">
                                    {{ $product->user->name }}
                                </p>
                                <p class="status" style="line-height: 0.4; font-weight: semibold; margin: 0 5px">Toko Di
                                    <span
                                        class="fw-bold">{{ ucwords(strtolower($product->shippingAddress && $product->shippingAddress->kota ? $product->shippingAddress->kota->city_name : 'Kota tidak tersedia')) }}</span>
                                </p>
                                <div class="btn fw-bold mx-3 border-success w-72 my-3">
                                    <a href="{{ route('store.show', ['user_id' => $product->user_id]) }}"
                                        class="text-decoration-none text-dark">
                                        Kunjungi Toko
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="Pengiriman-container row mx-2 py-2">
                            <div class="link-toko col-md-9">
                                <p class="fs-5 nama-toko pt-1 fw-bold"
                                    style="display: inline-flex; align-items: center; margin: 0; padding: 0; line-height: 0.8;">
                                    Pengiriman
                                </p>
                                <p class="status" style=" font-weight: semibold; margin: 0 5px"><i
                                        class='bx bx-map bx-sm'></i> Dikirim Dari <span
                                        class="fw-bold">{{ ucwords(strtolower($product->shippingAddress && $product->shippingAddress->kota ? $product->shippingAddress->kota->city_name : 'Kota tidak tersedia')) }}</span>
                                </p>
                            </div>
                        </div>
                        <hr class="bawah">
                        <div class="report d-inline-flex justify-content-between w-100 px-2 py-2">
                            <p class="text-muted d-flex mb-0">Ada Masalah dengan Produk ini?</p>
                            <a class="fw-bold d-flex mb-0" href="#" data-bs-toggle="modal"
                                data-bs-target="#reportModal"><i class='bx bx-error'></i>laporkan!</a>
                        </div>
                    </div>
                    <hr class="bawah">
                </div>
                <div class="contain  ms-14 me-3">
                    <div class="tabs d-flex justify-content-around">
                        <button class="tab-link active" onclick="openTab(event, 'productDetails')">Detail
                            Produk</button>
                        <button class="tab-link" onclick="openTab(event, 'ratingReviews')">Rating & Ulasan</button>
                        <button class="tab-link" onclick="openTab(event, 'faqs')">Diskusi</button>
                    </div>

                    <div id="productDetails" class="tab-content" style="display: block;">
                        <div class="product-detail container my-5 px-2">
                            <!-- Nama Produk -->
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="fw-bold mb-4">Nama Produk</h1>
                                </div>
                            </div>

                            <!-- Deskripsi dan Komposisi Produk -->
                            <div class="row">
                                <div class="col-md-8 mb-4">
                                    <h2 class="fs-6 fw-bold">Deskripsi Produk</h2>
                                    <p class="text-muted">{!! nl2br(e($product->description)) !!}
                                    </p>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <h2 class="fs-6 fw-bold">Komposisi</h2>
                                    {!! $product->composition ? nl2br(e($product->composition)) : 'Penjual Belum Menambahkan komposisi' !!}
                                    </p>
                                </div>
                                <div class="BPOM">
                                    <h2 class="fs-6 fw-bold">BPOM</h2>
                                    <p class="text-muted">{{ $product->bpom_license }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="ratingReviews" class="tab-content">
                        <div class="ulasan-header">
                            <div class="ulasan-header">
                                <h2>Ulasan <span class="text-muted fs-6">({{ $reviews->count() }})</span></h2>
                            
                                <div class="flex p-4 rounded-lg justify-between items-center bg-gray-100 mb-4">
                                    <div class="text-center">
                                        <p class="text-2xl font-semibold">{{ $usersCount }}</p>
                                        <p class="text-gray-500">Users</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-2xl font-semibold">{{ $reviews->count() }}</p>
                                        <p class="text-gray-500">Reviews</p>
                                    </div>
                                    <div class="text-center">
                                        <div class="flex items-center justify-center">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class='bx {{ $i <= round($averageRating) ? "bxs-star text-yellow-400" : "bx-star text-gray-400" }}'></i>
                                            @endfor
                                        </div>
                                        <p class="text-gray-500">Overall rating</p>
                                    </div>
                                </div>
                            
                                <div class="space-y-2 bg-gray-100 p-4 rounded-lg">
                                    @for ($i = 5; $i >= 1; $i--)
                                        @php
                                            $ratingCount = $reviews->where('rating', $i)->count();
                                            $percentage = $reviews->count() > 0 ? ($ratingCount / $reviews->count()) * 100 : 0;
                                        @endphp
                                        <div class="flex items-center">
                                            <div class="flex items-center space-x-1 text-yellow-400">
                                                @for ($j = 1; $j <= 5; $j++)
                                                    <i class='bx {{ $j <= $i ? "bxs-star" : "bx-star text-gray-400" }}'></i>
                                                @endfor
                                            </div>
                                            <div class="flex-1 h-2 bg-gray-200 ml-4 rounded">
                                                <div class="h-2 bg-gray-400 rounded" style="width: {{ $percentage }}%;"></div>
                                            </div>
                                            <span class="ml-4 text-gray-500">{{ $ratingCount }}</span>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            
                        </div>
                        @if ($hasPurchased)
                            <div class="submit-review rounded-lg p-6">
                                <h3 class="text-lg font-bold text-gray-800 mb-4">Berikan Ulasan Anda</h3>
                                <form method="POST" action="{{ route('review.store', $product->id) }}"
                                    class="space-y-4">
                                    @csrf
                                    <!-- Rating -->
                                    <div class="form-group">
                                        <label for="rating"
                                            class="block text-sm font-medium text-gray-700 mb-1">Rating:</label>
                                        <select name="rating" id="rating" required
                                            class="form-select block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            <option value="1">⭐ - Sangat Buruk</option>
                                            <option value="2">⭐⭐ - Buruk</option>
                                            <option value="3">⭐⭐⭐ - Cukup</option>
                                            <option value="4">⭐⭐⭐⭐ - Bagus</option>
                                            <option value="5">⭐⭐⭐⭐⭐ - Luar Biasa</option>
                                        </select>
                                    </div>

                                    <!-- Komentar -->
                                    <div class="form-group">
                                        <label for="comment"
                                            class="block text-sm font-medium text-gray-700 mb-1">Komentar:</label>
                                        <textarea name="comment" id="comment" rows="4" required
                                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            placeholder="Tulis komentar Anda..."></textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Kirim Ulasan
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="text-center bg-yellow-100 text-yellow-700 py-4 px-6 rounded-md shadow-md mt-3">
                                <p class="text-sm font-medium">Anda harus membeli produk ini untuk memberikan ulasan.
                                </p>
                            </div>
                        @endif

                        <hr>

                        <div class="colom-ulasan row justify-content-around">
                            @forelse ($product->reviews as $review)
                                <div class="card-ulasan mt-4 px-5 py-2 row">
                                    <div class="comment-profile col-md-4 d-flex align-items-center">
                                        <img src="https://i.pravatar.cc/300?u={{ $review->user->id }}" alt="profile"
                                            class="rounded-circle me-2" style="width: 40px; height: 40px;">
                                        <h1 class="fs-6 fw-bold mb-0">{{ $review->user->name }}</h1>
                                    </div>

                                    <div class="comment-text col-md-8">
                                        <div class="rating-date d-flex align-items-center mb-1">
                                            <div class="rating me-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <!-- Bintang penuh -->
                                                    @else
                                                        <i class='bx bx-star text-gray-400'></i>
                                                        <!-- Bintang kosong -->
                                                    @endif
                                                @endfor
                                            </div>
                                            <p class="text-muted text-sm mb-0">
                                                {{ $review->created_at->translatedFormat('d F Y') }}</p>
                                        </div>

                                        <p class="text-muted mb-2">
                                            {{ $review->comment }}
                                        </p>
                                    </div>
                                    <hr>
                                </div>
                            @empty
                                <p>Belum ada ulasan untuk produk ini.</p>
                            @endforelse

                        </div>

                    </div>

                    <div id="faqs" class="tab-content">
                        <div class="ulasan-header">
                            <h2>Pertanyaan <span class="text-muted fs-6">(12)</span></h2>

                        </div>
                        <div class="faq-ulasan row justify-content-around">
                            <div class="card-ulasan border rounded-lg px-6 py-4 mb-6 bg-white shadow-md">
                                <!-- User Comment Section -->
                                <div class="d-flex items-center mb-3">
                                    <i class='bx bxs-user-circle text-blue-500' style='font-size:28px;'></i>
                                    <h1 class="text-lg font-bold mx-2 flex items-center">Samantha D.
                                        <i class="bx bxs-check-circle text-green-500 ml-1"></i>
                                    </h1>
                                </div>
                                <p class="text-gray-700 mb-2">"Apakah bahan kaos ini mudah rusak setelah dicuci
                                    beberapa
                                    kali?"</p>
                                <p class="text-gray-500 font-semibold text-sm">Posted on August 14, 2023</p>

                                <!-- Seller Reply Section -->
                                <div class="d-flex items-center mt-6 mb-2 ml-6">
                                    <i class='bx bxs-store text-blue-500' style='font-size:28px;'></i>
                                    <h1 class="text-lg font-bold mx-2 flex items-center">Penjual
                                        <i class="bx bxs-check-circle text-green-500 ml-1"></i>
                                    </h1>
                                </div>
                                <p class="text-gray-500 ml-8 mb-3">"Terima kasih atas pertanyaannya. Bahan kaos ini
                                    sangat tahan lama dan tidak mudah rusak bahkan setelah dicuci berkali-kali. Pastikan
                                    mencuci dengan air dingin dan jangan menggunakan pemutih untuk menjaga kualitas
                                    bahan."</p>
                                <a href="#" class="text-blue-500 font-bold ml-8 mb-4 inline-block">Lihat Lebih
                                    Banyak</a>

                                <!-- Text Input Section -->
                                <div class="mt-4">
                                    <input type="text" placeholder="Tulis balasan..."
                                        class="border border-gray-300 rounded-md w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <div class="flex justify-end mt-2">
                                        <button
                                            class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">
                                            Kirim
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="side col-md-4">
            <div class="wrapper px-5" style="position: sticky; top: 130px">
                <div class="upper-card rounded mb-3"
                    style="padding: 10px; margin: 0;
                background: rgb(0,164,47);
                background: linear-gradient(90deg, rgba(0,164,47,1) 28%, rgba(6,210,64,1) 95%);">
                    <p class="fw-bold text-white ms-2">Beli Jajan</p>
                </div>
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="lower-card border-1 rounded p-3">
                        <p class="font-extrabold pb-2">Atur Jumlah Dan Catatan</p>
                        <div class="produk d-inline-flex">
                            <img class="img-fluid" src="{{ asset('storage/' . $images[0]) }}" alt=""
                                style=" height: 56px; width: 56px;">
                            <p class="d-flex fs-6 ms-2 truncate w-40">{{ $product->name }}</p>
                        </div>
                        <hr>
                        <div class="checkout d-inline-flex mt-3">
                            <div class="input-number-container">
                                <button type="button" class="btn-decrement px-1" onclick="decrement()">−</button>
                                <input type="number" id="number-input" name="quantity" value="1"
                                    min="1" max="{{ $product->stock }}" class="input-number"
                                    oninput="updateSubtotal()" />
                                <button type="button" class="btn-increment px-1" onclick="increment()">+</button>
                            </div>
                            <p class="my-auto ms-3 fw-bold">Stok: {{ $product->stock }}</p>
                        </div>

                        <div class="harga d-inline-flex justify-content-between w-100 mt-3">
                            <p class="text-muted my-auto fw-bold">Subtotal</p>
                            <p>
                                <span class="fw-bold text-sm text-gray-400 text-decoration-line-through"
                                    style="line-height: 0;" id="discount">Rp
                                    {{ number_format($product->price * 1.25, 0, ',', '.') }}</span><br>
                                <span id="subtotal" class="fw-bold fs-5" style="line-height: 0;">Rp
                                    {{ number_format($product->price, 0, ',', '.') }}</span>
                            </p>
                        </div>

                        <div class="action justify-content-between d-flex mt-3">
                            <button type="submit" class="btn border border-success fw-bold"
                                style="width: 48%; padding: 6px!important;">Beli Langsung</button>
                            <button type="submit" class="btn btn-success fw-bold"
                                onclick="addToCart('{{ $product->id }}')"
                                style="width: 48%; padding: 6px!important;">+ Keranjang</button>
                        </div>

                        <div class="footer_action text-muted d-flex justify-content-evenly px-1 mt-3 fs-6 fw-bold">
                            <a href="" class="link_footer"><i class='bx bx-conversation'></i> Chat</a> |
                            <a onclick="addToWishlist('{{ $product->id }}')"class="link_footer"> <i
                                    class='bx bx-heart'></i> wishlist</a> |
                            <a href="" class="link_footer"><i class='bx bx-share-alt'></i> Bagikan</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="p-5">
            </div>
        </div>
    </div>

    {{-- ================================================================================================== --}}

    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title fs-4 font-extrabold" id="reportModalLabel">Laporkan Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="reportForm">
                        <!-- Jenis Pelanggaran -->
                        <div class="mb-3 text-medium">
                            <label class="form-label fw-bold">Pilih kategori pelanggaran yang terjadi pada produk
                                ini!</label>
                            <div>
                                <input type="radio" name="violation_type" value="Palsu" id="fake" required
                                    class="custom-radio">
                                <label for="fake">Produk Palsu</label>
                            </div>
                            <div>
                                <input type="radio" name="violation_type" value="Informasi Menyesatkan"
                                    id="misleading" required class="custom-radio">
                                <label for="misleading">Informasi Menyesatkan</label>
                            </div>
                            <div>
                                <input type="radio" name="violation_type" value="Produk Berbahaya" id="dangerous"
                                    required class="custom-radio">
                                <label for="dangerous">Produk Berbahaya</label>
                            </div>
                            <div>
                                <input type="radio" name="violation_type" value="Lainnya" id="other" required
                                    class="custom-radio">
                                <label for="other">Lainnya</label>
                            </div>
                        </div>

                        <style>
                            .custom-radio {
                                transform: scale(1.3);
                                margin: 8px;
                            }
                        </style>

                        <div class="mb-3">
                            <label for="reason" class="form-label fw-bold">Detail Pelanggaran</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="proof" class="form-label fw-bold">Bukti (opsional)</label>
                            <div class="image-upload-wrapper flex flex-col p-2">
                                <label for="image-upload" class="image-upload-label relative">
                                    <input type="file" name="photos[]" class="image-upload-input hidden"
                                        id="image-upload" accept="image/*" onchange="previewImage(event, 0)"
                                        multiple />
                                    <div id="preview-0"
                                        class="upload-placeholder w-24 h-24 border border-dashed border-gray-300 rounded flex justify-center items-center">
                                        <i class='bx bx-plus text-gray-400 text-2xl'></i>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="honesty" required>
                            <label class="form-check-label text-sm" for="honesty">Saya dengan ini menyatakan bahwa
                                segala informasi yang dilaporkan memang benar.</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" form="reportForm" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ================================================================================================== --}}
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tab-link");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        const productPrice = {{ $product->price }};
        const productStock = {{ $product->stock }};

        function increment() {
            const input = document.getElementById('number-input');
            if (parseInt(input.value) < productStock) {
                input.value = parseInt(input.value) + 1;
                updateSubtotal();
            }
        }

        function decrement() {
            const input = document.getElementById('number-input');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                updateSubtotal();
            }
        }

        function updateSubtotal() {
            const input = document.getElementById('number-input');
            let quantity = parseInt(input.value);


            if (quantity > productStock) {
                input.value = productStock;
                quantity = productStock;
            }

            const subtotal = productPrice * quantity;
            const discount = productPrice * 1.25 * quantity;
            document.getElementById('subtotal').innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
            document.getElementById('discount').innerText = 'Rp ' + discount.toLocaleString('id-ID');
        }

        function changeImage(thumbnail) {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = thumbnail.src;
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            thumbnail.classList.add('active');
        }

        function toggleDescription() {
            const description = document.getElementById("description");
            const button = document.getElementById("toggleButton");


            if (description.classList.contains("clamp-7")) {
                description.classList.remove("clamp-7");
                button.innerText = "Lihat Lebih Sedikit";
            } else {
                description.classList.add("clamp-7");
                button.innerText = "Lihat Selengkapnya";
            }
        }

        document.getElementById('reportForm').addEventListener('submit', function(event) {
            event.preventDefault();
            // Logika untuk mengirim laporan
            alert('Laporan telah dikirim!');
            // Setelah laporan dikirim, tutup modal
            let modal = bootstrap.Modal.getInstance(document.getElementById('reportModal'));
            modal.hide();
        });

        function previewImage(event, index) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewContainer = document.getElementById(`preview-${index}`);
                    previewContainer.innerHTML =
                        `<img src="${e.target.result}" class="w-24 h-24 object-cover rounded" />`;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
