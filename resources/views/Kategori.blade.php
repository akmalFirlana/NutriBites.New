<x-app-layout>
    <section class="row header">
        <!-- Filter Sidebar -->
        <div class="cont ms-5 col-md-3">
            <h1 class="fw-bold fs-3 mb-3 ms-16 pt-24">Filter</h1>
            <form method="GET" action="{{ route('kategori') }}">
                <div class="border bg-white shadow-sm px-4 py-4 rounded-lg w-[200px] ms-16">
                    <!-- Dropdown Kategori -->
                    <div class="mb-5">
                        <h5 class="font-semibold text-gray-700 mb-3">Sortir Produk</h5>
                        <ul class="list-none">
                            <li class="mb-2">
                                <button class="flex justify-between w-full text-left text-gray-700" type="button"
                                    onclick="toggleDropdown('kategori')">
                                    Kategori
                                    <span class="text-gray-400"><i class='bx bx-chevron-down'></i></span>
                                </button>
                                <div id="kategori" class="hidden mt-2 ml-4">
                                    <ul class="space-y-1">
                                        <li class="flex items-center gap-3 hover:bg-gray-50 p-1 rounded-md transition">
                                            <input type="checkbox" name="kategori[]" value="Minuman" id="minuman"
                                                class="accent-indigo-500 w-5 h-5" />
                                            <label for="minuman" class="text-gray-700 cursor-pointer">Minuman</label>
                                        </li>
                                        <li class="flex items-center gap-3 hover:bg-gray-50 p-1 rounded-md transition">
                                            <input type="checkbox" name="kategori[]" value="Makanan" id="makanan"
                                                class="accent-indigo-500 w-5 h-5" />
                                            <label for="makanan" class="text-gray-700 cursor-pointer">Makanan</label>
                                        </li>
                                        <li class="flex items-center gap-3 hover:bg-gray-50 p-1 rounded-md transition">
                                            <input type="checkbox" name="kategori[]" value="Kesehatan" id="kesehatan"
                                                class="accent-indigo-500 w-5 h-5" />
                                            <label for="kesehatan"
                                                class="text-gray-700 cursor-pointer">Kesehatan</label>
                                        </li>
                                        <li class="flex items-center gap-3 hover:bg-gray-50 p-1 rounded-md transition">
                                            <input type="checkbox" name="kategori[]" value="Snack" id="snack"
                                                class="accent-indigo-500 w-5 h-5" />
                                            <label for="snack" class="text-gray-700 cursor-pointer">Snack</label>
                                        </li>
                                        <li class="flex items-center gap-3 hover:bg-gray-50 p-1 rounded-md transition">
                                            <input type="checkbox" name="kategori[]" value="Jus" id="jus"
                                                class="accent-indigo-500 w-5 h-5" />
                                            <label for="jus" class="text-gray-700 cursor-pointer">Jus</label>
                                        </li>
                                        <li class="flex items-center gap-3 hover:bg-gray-50 p-1 rounded-md transition">
                                            <input type="checkbox" name="kategori[]" value="Suplemen" id="suplemen"
                                                class="accent-indigo-500 w-5 h-5" />
                                            <label for="suplemen" class="text-gray-700 cursor-pointer">Suplemen</label>
                                        </li>
                                        <li class="flex items-center gap-3 hover:bg-gray-50 p-1 rounded-md transition">
                                            <input type="checkbox" name="kategori[]" value="Vitamin" id="vitamin"
                                                class="accent-indigo-500 w-5 h-5" />
                                            <label for="vitamin" class="text-gray-700 cursor-pointer">Vitamin</label>
                                        </li>
                                        <li class="flex items-center gap-3 hover:bg-gray-50 p-1 rounded-md transition">
                                            <input type="checkbox" name="kategori[]" value="Herbal" id="herbal"
                                                class="accent-indigo-500 w-5 h-5" />
                                            <label for="herbal" class="text-gray-700 cursor-pointer">Herbal</label>
                                        </li>
                                        <li class="flex items-center gap-3 hover:bg-gray-50 p-1 rounded-md transition">
                                            <input type="checkbox" name="kategori[]" value="Minuman Serat"
                                                id="minuman-serat" class="accent-indigo-500 w-5 h-5" />
                                            <label for="minuman-serat" class="text-gray-700 cursor-pointer">Minuman
                                                Serat</label>
                                        </li>
                                        <li class="flex items-center gap-3 hover:bg-gray-50 p-1 rounded-md transition">
                                            <input type="checkbox" name="kategori[]" value="Minuman Herbal"
                                                id="minuman-herbal" class="accent-indigo-500 w-5 h-5" />
                                            <label for="minuman-herbal" class="text-gray-700 cursor-pointer">Minuman
                                                Herbal</label>
                                        </li>
                                        <li class="flex items-center gap-3 hover:bg-gray-50 p-1 rounded-md transition">
                                            <input type="checkbox" name="kategori[]" value="Buah Kering"
                                                id="buah-kering" class="accent-indigo-500 w-5 h-5" />
                                            <label for="buah-kering" class="text-gray-700 cursor-pointer">Buah
                                                Kering</label>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Filter Harga -->
                    <div>
                        <h5 class="font-semibold text-gray-700 mb-3">Harga</h5>
                        <div class="mb-4">
                            <label for="harga-minimum" class="block text-sm text-gray-600 mb-1">Harga Minimum</label>
                            <div class="flex">
                                <span class="px-3 py-2 bg-gray-100 border rounded-l-md">Rp</span>
                                <input type="number" id="harga-minimum" name="harga_min"
                                    class="w-full border rounded-r-md px-3 py-2" placeholder="Minimum">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="harga-maksimum" class="block text-sm text-gray-600 mb-1">Harga
                                Maksimum</label>
                            <div class="flex">
                                <span class="px-3 py-2 bg-gray-100 border rounded-l-md">Rp</span>
                                <input type="number" id="harga-maksimum" name="harga_max"
                                    class="w-full border rounded-r-md px-3 py-2" placeholder="Maksimum">
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="bg-green-500 text-white rounded-full px-6 py-2 font-semibold">Terapkan</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Produk Section -->
        <div class="content col-md-8">
            <div class="hook">
                <h1 class="fw-bold fs-3 pt-24">Produk</h1>
            </div>
            <div class="row justify-content-around mx-auto">
                <div class="row ps-0">
                    @foreach ($products as $product)
                        <div class="col-sm-3 pe-0 mt-3 procard overflow-hidden">
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
                                <a href="{{ route('product.detail', ['id' => $product->id]) }}"
                                    class="product-card-link">
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
                                                <i class='bx bxs-star'
                                                    style='color:#d0e12b; margin: 0; padding: 0;'></i>
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
                                    </div>
    </section>
    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle("hidden");
        }
    </script>
</x-app-layout>
