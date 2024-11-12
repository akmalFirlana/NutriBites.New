<x-app-layout>
    <section class="bg-light py-28">
        <div class="container header">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h2 class="card-title mb-4 fw-bold">Barang Yang Dibeli</h2>
                            <div class="row gy-3 mb-2 px-3">
                                <div class="penjual mb-1">
                                    <p class=fw-bold mb-0"
                                        style="display: inline-flex; align-items: center; margin: 0; padding: 0;">
                                        <img src="{{ asset('image/icon_toko.png') }}"
                                            style="width: 30px; display: inline-flex; margin-right: 5px; margin: 0;">
                                        {{ $transaction->product->user->name }}
                                    </p>
                                    <p class="text-muted" style="line-height: 0.2">
                                        {{ ucwords(strtolower($transaction->product->shippingAddress && $transaction->product->shippingAddress->kota ? $transaction->product->shippingAddress->kota->city_name : 'Kota tidak tersedia')) }}
                                    </p>
                                </div>
                                <div class="col-lg-8 mt-0">
                                    <div class="col-md-12 mt-2 row">
                                        <div class="d-flex col-md-3 ps-3">
                                            @php
                                                $images = json_decode($transaction->product->images, true); // Mengubah JSON menjadi array
                                            @endphp

                                            @if (!empty($images) && isset($images[0]))
                                                <img src="{{ asset('storage/' . $images[0]) }}" alt="Product"
                                                    class="border rounded" style="width: 96px; height: 96px;">
                                            @else
                                                <span>No Image</span>
                                            @endif

                                        </div>
                                        <div class="col-md-9 px-0 ">
                                            <a href="#"
                                                class="nav-link d-block">{{ $transaction->product->name }}</a>
                                                <div class="d-flex align-items-center">
                                                    <p class="weight text-sm text-gray-400 fw-bold me-3">
                                                        {{ $transaction->product->weight }}gr
                                                    </p>
                                                    <p class="text-sm text-danger fw-bold">
                                                        stok sisa: {{ $transaction->product->stock }}
                                                    </p>
                                                </div>
                                                

                                            <div class="flex items-center space-x-2 mb-2">
                                                <div class="flex items-center space-x-1 text-gray-500 line-through">
                                                    <span
                                                        class="bg-green-500 text-white text-xs font-semibold px-2 py-0.5 rounded">20%</span>
                                                    <span
                                                        id="discount">{{ number_format($transaction->product->price * $transaction->quantity * 1.25, 0, ',', '.') }}</span>
                                                </div>
                                                <!-- Harga Baru -->
                                                <p class="text-lg font-bold text-black" id="subtotal">
                                                    {{ number_format($transaction->product->price * $transaction->quantity, 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <a href="" class="catatan text-success fw-bold">Tulis Catatan</a> |
                                            <div class="input-number-container ms-2">
                                                <button type="button" class="btn-decrement px-1"
                                                    onclick="decrement()">−</button>
                                                <input type="number" id="number-input" name="quantity"
                                                    value="{{ $transaction->quantity }}" min="1"
                                                    max="{{ $transaction->product->stock }}" class="input-number"
                                                    oninput="updateSubtotal()" />
                                                <button type="button" class="btn-increment px-1"
                                                    onclick="increment()">+</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <hr style="width: 90%; border: 5px solid" class="mx-auto mt-5">
                            </div>

                            <div class="mt-2">
                                <div class="box-shadow">
                                    <p>Pengiriman dan Pembayaran</p>
                                    <div
                                        class="d-flex justify-content-between align-items-start mt-3 p-3 border rounded-md">
                                        <div>
                                            @foreach ($addresses as $address)
                                                <p class="text-semibold mb-0"><i
                                                        class='bx bxs-map text-success'></i><span
                                                        class="bg-gray-300 fw-bolder text-sm mx-1 rounded-1 text-white p-1 ">Utama</span><span
                                                        class="fw-bold">{{ $address->label ?? 'Alamat' }} -
                                                    </span>{{ $address->recipient_name }}
                                                    ({{ $address->phone_number }})
                                                </p>
                                                <p class="mt-2">{{ $address->full_address }}
                                                    {{ ucwords(strtolower($address->kecamatan->dis_name ?? 'Kecamatan tidak ditemukan')) }},
                                                    {{ ucwords(strtolower($address->kota->city_name ?? 'Kota tidak ditemukan')) }},
                                                    {{ ucwords(strtolower($address->provinsi->prov_name ?? 'Provinsi tidak ditemukan')) }}
                                                </p>
                                            @endforeach
                                        </div>
                                        <button class="btn">></button>
                                    </div>
                                    <div class="divider"></div>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <img src="https://upload.wikimedia.org/wikipedia/id/5/55/BNI_logo.svg"
                                                alt="BNI Logo" width="40">
                                            <p class="fw-bold">BNI Virtual Account</p>
                                        </div>
                                    </div>

                                    <div class="divider"></div>

                                    <div class="mb-3 p-4 rounded-md shadow-md border-top">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Asuransi Pengiriman</p>
                                            <span>Rp3.700</span>
                                            <input class="form-check-input" type="checkbox" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- cart -->
                <!-- summary -->
                <div class="col-lg-3">
                    <div class="sticky" style="position: sticky; top: 110px">
                        <div class="card mb-3 border shadow-0">
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label class="form-label">Punya kupon?</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control border" name=""
                                                placeholder="Coupon code" />
                                            <button class="btn btn-light border">Terapkan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow-0 border">
                            <div class="card-body">
                                <h1 class="fs-6 mb-3">Ringkasan Belanja</h1>
                                <h1 class="fs-6 mb-2">Total Belanja</h1>
                                <div class="d-flex justify-content-between text-muted">
                                    <p class="mb-1 text-sm">Total Harga:</p>
                                    <p class="mb-1 text-sm">Rp 329.000</p>
                                </div>
                                <div class="d-flex justify-content-between text-muted">
                                    <p class="mb-1 text-sm">Total Ongkos Kirim:</p>
                                    <p class="mb-1 text-sm">-Rp 60.000</p>
                                </div>
                                <div class="d-flex justify-content-between text-muted">
                                    <p class="mb-2 text-sm">Ansuransi Pengiriman:</p>
                                    <p class="mb-2 text-sm">Rp 14.000</p>
                                </div>
                                <hr />
                                <h1 class="fs-6 mb-2 mt-1">Biaya Transaksi</h1>
                                <div class="d-flex justify-content-between text-muted">
                                    <p class="mb-1 text-sm">Biaya Layanan</p>
                                    <p class="mb-1 text-sm">Rp 6.000</p>
                                </div>
                                <div class="d-flex justify-content-between text-muted fs-sm">
                                    <p class="mb-1 text-sm">Biaya Jasa Aplikasi</p>
                                    <p class="mb-1 text-sm">Rp 1.000</p>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between text-muted fs-sm">
                                    <p class="mb-1 text-sm">Total Harga:</p>
                                    <p class="mb-1 fw-bold text-sm">Rp 283.000</p>
                                </div>

                                <div class="mt-3">
                                    <!-- Tombol untuk memicu modal -->
                                    <a href="#" class="btn btn-success w-100 shadow-0 py-2 fs-6"
                                        data-bs-toggle="modal" data-bs-target="#beliModal">
                                        <i class='bx bxs-check-shield me-1' style='color:#ffffff'></i> Beli Sekarang
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="beliModal" tabindex="-1"
                                        aria-labelledby="beliModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content ">
                                                <div class="modal-body text-center">
                                                    <i class='bx bx-check bg-light p-3 fs-1 rounded-circle'></i><br>
                                                    <h2>Pesanan Tervalidasi</h2>
                                                    <p class="text-muted pt-3 fw-3">Terima kasih atas pembelian
                                                        Anda.<br>
                                                        Paket Anda akan dikirim dalam waktu 2 hari<br> setelah pembelian
                                                        Anda</p>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn btn-success">Lanjutkan
                                                        Pembelian</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- summary -->
            </div>
        </div>
    </section>
    <x-address-component />
    <script>
        const productPrice = {{ $transaction->product->price }};
        const productStock = {{ $transaction->product->stock }};

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
    </script>
</x-app-layout>
