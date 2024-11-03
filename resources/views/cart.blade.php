<x-app-layout>
    <section class="bg-light pt-28">
        <div class="container header">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-9">
                    <!-- Pilih Semua Checkbox -->
                    <div class="card border mb-2">
                        <div class="d-flex align-items-center m-3">
                            <input
                                type="checkbox"
                                id="selectAll"
                                class="form-check-input me-2"
                                onclick="toggleAllCheckboxes()"
                            />
                            <label
                                for="selectAll"
                                class="form-check-label font-semibold"
                                >Pilih Semua ({{ $cartItems->count() }})</label
                            >
                        </div>
                    </div>

                    <!-- Produk Item -->
                    @forelse($cartItems as $item)
                    <div class="card border mb-2">
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <!-- Checkbox -->
                                <input
                                    type="checkbox"
                                    class="form-check-input me-2 item-checkbox"
                                    onclick="updateSelectAllCheckbox()"
                                />

                                <!-- Gambar Produk dan Diskon -->
                                <div class="position-relative">
                                    <img
                                        src="{{ asset('storage/' . $item->product->image_1) }}"
                                        alt="Product Image"
                                        class="rounded border me-3"
                                        style="width: 96px; height: 96px"
                                    />
                                    <span
                                        class="badge bg-danger position-absolute top-0 start-0"
                                        >{{ $item->product->discount }}%</span
                                    >
                                </div>

                                <!-- Detail Produk -->
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">
                                        {{ $item->product->name }}
                                    </h6>
                                    <p class="text-muted mb-1">
                                        {{ $item->product->description }}
                                    </p>
                                    <p class="text-muted mb-0">
                                    <img src="{{ asset('image/icon_toko.png') }}"
                                            style="width: 20px; display: inline-flex; margin-right: 5px; margin: 0;">    
                                        <strong
                                            >{{ $item->product->user->name
                                            }}</strong
                                        >
                                    </p>
                                </div>
                                <div class="d-flex align-items-center mx-4 mt-auto mb-2">
                                    <i class="bx bx-edit bx-sm me-2 text-gray-400"></i>
                                    <i class="bx bx-heart bx-sm me-2 text-gray-400"></i>
                                    <i
                                        class="bx bx-trash bx-sm text-gray-400"
                                        onclick="removeFromCart({{ $item->id }})"
                                    ></i>
                                </div>
                                <!-- Harga dan Kuantitas -->
                                <div class="text-end">
                                    <p class="font-bold fs-6">
                                        Rp{{ number_format(
                                        $item->product->price, 0, ',', '.' ) }}
                                    </p>
                                    <p class="mb-1 font-bold text-gray-400">
                                        <s
                                            >Rp{{ number_format(
                                            $item->product->original_price, 0,
                                            ',', '.' ) }}</s
                                        >
                                    </p>

                                    <div class="d-flex align-items-center">
                                        <button
                                            class="btn btn-light border"
                                            onclick="decreaseQuantity({{ $item->id }})"
                                        >
                                            <i class="bx bx-minus"></i>
                                        </button>
                                        <input
                                            type="text"
                                            value="{{ $item->quantity }}"
                                            class="form-control text-center mx-1"
                                            style="width: 50px"
                                            readonly
                                        />
                                        <button
                                            class="btn btn-light border"
                                            onclick="increaseQuantity({{ $item->id }})"
                                        >
                                            <i class="bx bx-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Ikon Aksi -->
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>Keranjang Anda kosong.</p>
                    @endforelse
                </div>
                <div class="col-lg-3 mt-5">
                    <div class="card mb-3 border shadow-0">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label class="form-label"
                                        >Punya kupon?</label
                                    >
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            class="form-control border"
                                            name=""
                                            placeholder="Coupon code"
                                        />
                                        <button class="btn btn-light border">
                                            Terapkan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow-0 border">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total Harga:</p>
                                <p class="mb-2">Rp 329.000</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Diskon:</p>
                                <p class="mb-2 text-success">-Rp 60.000</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Pajak:</p>
                                <p class="mb-2">Rp 14.000</p>
                            </div>
                            <hr />
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total Harga:</p>
                                <p class="mb-2 fw-bold">Rp 283.000</p>
                            </div>

                            <div class="mt-3">
                                <a
                                    href="#"
                                    class="btn btn-success w-100 shadow-0 mb-2"
                                >
                                    Beli Sekarang
                                </a>
                                <a
                                    href="#"
                                    class="btn btn-light w-100 border mt-2"
                                >
                                    Kembali ke toko
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    // JavaScript untuk checkbox dan quantity
                    function toggleAllCheckboxes() {
                      const checkboxes = document.querySelectorAll('.item-checkbox');
                      const selectAllCheckbox = document.getElementById('selectAll');
                      checkboxes.forEach(checkbox => {
                        checkbox.checked = selectAllCheckbox.checked;
                      });
                    }

                    function updateSelectAllCheckbox() {
                      const checkboxes = document.querySelectorAll('.item-checkbox');
                      const selectAllCheckbox = document.getElementById('selectAll');
                      selectAllCheckbox.checked = Array.from(checkboxes).every(checkbox => checkbox.checked);
                    }

                    function decreaseQuantity(cartItemId) {
                      // Logic to decrease quantity via AJAX
                    }

                    function increaseQuantity(cartItemId) {
                      // Logic to increase quantity via AJAX
                    }

                    function removeFromCart(cartItemId) {
                      // Logic to remove item from cart via AJAX
                    }
                </script>

                <div class="border-top pt-4 mx-4 mb-4">
                    <p>
                        <i class="fas fa-truck text-muted fa-lg"></i> Gratis
                        Ongkir Setiap Pembelian diatas Rp 500.000
                    </p>
                </div>

                <!-- cart -->
                <!-- summary -->

                <!-- summary -->
            </div>
        </div>
    </section>
    <!-- cart + summary -->
</x-app-layout>
