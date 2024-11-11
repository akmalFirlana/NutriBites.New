<x-app-layout>
    <section class="bg-light pt-28">
        <div class="container header">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-9">
                    <!-- Pilih Semua Checkbox -->
                    <div class="card border mb-2">
                        <div class="d-flex align-items-center m-3">
                            <input type="checkbox" id="selectAll" class="form-check-input me-2"
                                onclick="toggleAllCheckboxes()" />
                            <label for="selectAll" class="form-check-label font-semibold">Pilih Semua
                                ({{ $cartItems->count() }})</label>
                        </div>
                    </div>

                    <!-- Produk Item -->
                    @forelse($cartItems as $item)
                        <div class="card border mb-2">
                            <div class="p-3">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input me-2 item-checkbox"
                                        onclick="updateSelectAllCheckbox()" />

                                    <div class="position-relative">
                                        @php
                                            $images = json_decode($item->product->images, true);
                                        @endphp

                                        @if (!empty($images) && isset($images[0]))
                                            <img src="{{ asset('storage/' . $images[0]) }}" alt="Product"
                                                class="rounded border me-3" style="width: 96px; height: 96px">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                        <span
                                            class="badge bg-danger position-absolute top-0 start-0">{{ $item->product->discount }}%</span>
                                    </div>

                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">{{ $item->product->name }}</h6>
                                        <p class="text-muted mb-1 truncate w-80">{{ $item->product->description }}</p>
                                        <p class="text-muted mb-0">
                                            <img src="{{ asset('image/icon_toko.png') }}"
                                                style="width: 20px; display: inline-flex; margin-right: 5px; margin: 0;">
                                            <strong>{{ $item->product->user->name }}</strong>
                                        </p>
                                    </div>

                                    <div class="d-flex align-items-center mx-4 mt-auto mb-2">
                                        <i class="bx bx-edit bx-sm me-2 text-gray-400"></i>
                                        <i class="bx bx-heart bx-sm me-2 text-gray-400"
                                            onclick="addToWishlist({{ $item->id }})"></i>
                                        <i class="bx bx-trash bx-sm text-gray-400"
                                            onclick="removeFromCart({{ $item->id }})"></i>
                                    </div>

                                    <div class="text-end">
                                        <p class="font-bold fs-6" id="subtotal-{{ $item->id }}">
                                            Rp{{ number_format($item->product->price, 0, ',', '.') }}
                                        </p>
                                        <p class="mb-1 font-bold text-gray-400" id="discount-{{ $item->id }}">
                                            <s>Rp{{ number_format($item->product->price * 1.25, 0, ',', '.') }}</s>
                                        </p>

                                        <div class="checkout d-inline-flex mt-3">
                                            <div class="input-number-container">
                                                <button type="button" class="btn-decrement px-1"
                                                    onclick="decrement('{{ $item->id }}')">−</button>
                                                <input type="number" id="number-input-{{ $item->id }}"
                                                    name="quantity" value="1" min="1"
                                                    max="{{ $item->product->stock }}" class="input-number"
                                                    oninput="updateSubtotal('{{ $item->id }}')" />
                                                <button type="button" class="btn-increment px-1"
                                                    onclick="increment('{{ $item->id }}')">+</button>
                                            </div>
                                            <p class="my-auto ms-3 fw-bold">Stok: {{ $item->product->stock }}</p>
                                        </div>
                                    </div>
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
                                    <label class="form-label">Punya kupon?</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control border" name=""
                                            placeholder="Coupon code" />
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
                                <a href="#" class="btn btn-success w-100 shadow-0 mb-2">
                                    Beli Sekarang
                                </a>
                                <a href="#" class="btn btn-light w-100 border mt-2">
                                    Kembali ke toko
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
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

                    const productPrice = {{ $item->product->price }};
                    const productStock = {{ $item->product->stock }};

                    function increment(itemId) {
                        const input = document.getElementById(`number-input-${itemId}`);
                        const productStock = parseInt(input.getAttribute("max"));
                        if (parseInt(input.value) < productStock) {
                            input.value = parseInt(input.value) + 1;
                            updateSubtotal(itemId);
                        }
                    }

                    function decrement(itemId) {
                        const input = document.getElementById(`number-input-${itemId}`);
                        if (parseInt(input.value) > 1) {
                            input.value = parseInt(input.value) - 1;
                            updateSubtotal(itemId);
                        }
                    }

                    function updateSubtotal(itemId) {
                        const input = document.getElementById(`number-input-${itemId}`);
                        const productPrice = {{ $item->product->price }};
                        let quantity = parseInt(input.value);
                        const productStock = parseInt(input.getAttribute("max"));

                        if (quantity > productStock) {
                            input.value = productStock;
                            quantity = productStock;
                        }

                        const subtotal = productPrice * quantity;
                        const discount = productPrice * 1.25 * quantity;
                        document.getElementById(`subtotal-${itemId}`).innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
                        document.getElementById(`discount-${itemId}`).innerText = 'Rp ' + discount.toLocaleString('id-ID');
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
