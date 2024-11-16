<x-app-layout>
    <section class="bg-light py-28">
        <div class="container header">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h2 class="card-title mb-2 fs-5 fw-bold">Barang Yang Dibeli</h2>
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

                                <hr style="width: 95%; border: 5px solid"
                                    class="mx-auto mt-5 bg-slate-200 border-gray-200">
                            </div>

                            <div class="mt-2">
                                <div class="p-3">
                                    <p class="mb-3 font-extrabold fs-5">Pengiriman dan Pembayaran</p>
                                    <div class="shadow-md rounded-md border-top">
                                        <div
                                            class="d-flex justify-content-between align-items-start mt-3 p-4  pb-3 pt-2 rounded-md">
                                            <div>
                                                @foreach ($addresses as $address)
                                                    <p class="text-semibold mb-0">
                                                        <i class='bx bxs-map text-success'></i>
                                                        <span
                                                            class="bg-gray-300 fw-bolder text-sm mx-1 rounded-1 text-white p-1 ">Utama</span>
                                                        <span class="fw-bold">{{ $address->label ?? 'Alamat' }} -
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
                                            <button class="btn text-lg font-semibold hover:text-gray-700"><box-icon
                                                    name='chevron-right'></box-icon></button>
                                        </div>
                                        <div class="divider border m-0"></div>
                                        <div class="pengiriman row  p-4 pt-3">
                                            <div class="col-md-6">
                                                <form
                                                    action="{{ route('transaction.calculateShipping', ['transaction' => $transaction->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <label for="courier"
                                                        class="block text-sm font-semibold text-gray-700 mb-2">Pilih
                                                        Kurir:</label>
                                                    <select name="courier" id="courier" required
                                                        class="w-full p-2 border border-gray-300 rounded-md bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                        <option value="">Pilih Kurir</option>
                                                        <option value="jne">JNE</option>
                                                        <option value="pos">POS Indonesia</option>
                                                        <option value="tiki">TIKI</option>
                                                    </select>
                                                </form>
                                            </div>

                                            <div id="shipping-costs" class="col-md-6">
                                                <!-- Tempat untuk menampilkan data biaya pengiriman -->
                                            </div>
                                        </div>
                                        <div class="divider border m-0"></div>
                                        <div class="py-3 px-4">
                                            <div class="d-flex justify-content-between">
                                                <div class="logo d-inline-flex"><img
                                                        src="https://upload.wikimedia.org/wikipedia/id/5/55/BNI_logo.svg"
                                                        alt="BNI Logo" width="40">
                                                    <p class="fw-bold text-sm mx-2">BNI Virtual Account</p>
                                                </div>
                                                <a onclick="buyNow()" class=""><box-icon
                                                        name='chevron-right'></box-icon></a>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="transaction-id" value="1">

                                    <div class="mb-3 mt-4 p-4 rounded-md shadow-md border-top">
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
                                <h1 class="fs-6 mb-1 fw-bold">Ringkasan Belanja</h1>
                                <h1 class="fs-6 mb-2">Total Belanja</h1>
                                <div class="d-flex justify-content-between text-muted">
                                    <p class="mb-1 text-sm">Total Harga:</p>
                                    <p class="mb-1 text-sm" id="total">
                                        Rp
                                        {{ number_format($transaction->product->price * $transaction->quantity, 0, ',', '.') }}
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between text-muted">
                                    <p class="mb-1 text-sm">Total Ongkos Kirim:</p>
                                    <p class="mb-1 text-sm" id="shipping-cost-display">-Rp
                                        {{ number_format($transaction->shipping_cost ?? 0, 0, ',', '.') }}</p>
                                </div>


                                <div class="d-flex justify-content-between text-muted">
                                    <p class="mb-2 text-sm">Asuransi Pengiriman:</p>
                                    <p class="mb-2 text-sm">Rp {{ number_format(3700, 0, ',', '.') }}</p>
                                </div>
                                <hr />

                                <h1 class="fs-6 mb-2 mt-1">Biaya Transaksi</h1>
                                <div class="d-flex justify-content-between text-muted">
                                    <p class="mb-1 text-sm">Biaya Layanan</p>
                                    <p class="mb-1 text-sm">Rp
                                        {{ number_format($transaction->service_fee ?? 6000, 0, ',', '.') }}</p>
                                </div>

                                <div class="d-flex justify-content-between text-muted fs-sm">
                                    <p class="mb-1 text-sm">Biaya Jasa Aplikasi</p>
                                    <p class="mb-1 text-sm">Rp
                                        {{ number_format($transaction->application_fee ?? 1000, 0, ',', '.') }}</p>
                                </div>
                                <hr />

                                <div class="d-flex justify-content-between text-muted fs-sm">
                                    <p class="mb-1 text-sm">Total Harga:</p>
                                    <p class="mb-1 fw-bold text-sm" id="total-price">
                                        Rp
                                        {{ number_format(
                                            $transaction->product->price * $transaction->quantity +
                                                ($transaction->shipping_cost ?? 0) +
                                                3700 +
                                                ($transaction->service_fee ?? 6000) +
                                                ($transaction->application_fee ?? 1000),
                                            0,
                                            ',',
                                            '.',
                                        ) }}
                                    </p>
                                </div>

                                <div id="paymentModal"
                                    class="fixed inset-0 bg-gray-500 bg-opacity-50 justify-center items-center hidden">
                                    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                                        <h2 class="text-xl font-semibold mb-4">Proses Transaksi</h2>
                                        <form id="postTransactionForm" action="{{ route('post_transaction.store') }}"
                                            method="POST">
                                            @csrf
                                            <!-- Form fields -->
                                            <input type="hidden" id="user_id" name="user_id"
                                                value="{{ Auth::user()->id }}" />
                                            <input type="hidden" id="product_id" name="product_id"
                                                value="{{ $transaction->product->id }}" />
                                            <input type="hidden" id="quantity" name="quantity"
                                                value="{{ number_format($transaction->quantity) }}" />
                                            <!-- Quantity -->
                                            @foreach ($addresses as $address)
                                                <input type="hidden" name="recipient_name"
                                                    value="{{ $address->recipient_name }}">
                                                <input type="hidden" name="recipient_phone"
                                                    value="{{ $address->phone_number }}">
                                                <input type="hidden" name="full_address"
                                                    value="{{ $address->full_address }}, {{ ucwords(strtolower($address->kecamatan->dis_name ?? 'Kecamatan tidak ditemukan')) }},
                                                            {{ ucwords(strtolower($address->kota->city_name ?? 'Kota tidak ditemukan')) }},
                                                             {{ ucwords(strtolower($address->provinsi->prov_name ?? 'Provinsi tidak ditemukan')) }}">
                                            @endforeach

                                            <input type="hidden" id="total_price" name="total_price"
                                                value="{{ $transaction->product->price * $transaction->quantity }}" />
                                            <input type="hidden" id="status" name="status" value="pending" />
                                            <!-- Status -->
                                            <input type="hidden" id="shipping_method" name="shipping_method"
                                                value="jne" /> <!-- Shipping method -->
                                            <input type="hidden" id="estimated_delivery" name="estimated_delivery"
                                                value="5-8 days" />
                                            <input type="hidden" id="order_status" name="order_status"
                                                value="processing" /> <!-- Order status -->
                                            <input type="hidden" id="payment_type" name="payment_type"
                                                value="credit_card" /> <!-- Payment type -->
                                            <input type="hidden" id="transaction_time" name="transaction_time"
                                                value="{{ now() }}" /> <!-- Transaction time -->
                                            <input type="hidden" id="shipping_cost" name="shipping_cost"
                                                value="16000" />

                                            <!-- Submit Button -->
                                            <div class="flex justify-end">
                                                <button type="submit"
                                                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Proses
                                                    Transaksi</button>
                                            </div>
                                        </form>
                                        <div class="mt-4 text-center">
                                            <button class="text-red-500" id="closeModalBtn">Tutup</button>
                                        </div>
                                    </div>
                                </div>



                                <div class="mt-3">
                                    <a href="#" onclick="buyNow()"
                                        class="btn btn-success w-100 shadow-0 py-2 fs-6">
                                        <i class='bx bxs-check-shield me-1' style='color:#ffffff'></i> Beli Sekarang
                                    </a>
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
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
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
            document.getElementById('total').innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
        }

        function buyNow() {
            fetch('/get-midtrans-token', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        total_price: document.getElementById('total-price').innerText.replace(/[^\d]/g, '')
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.token) {
                        snap.pay(data.token, {
                            onSuccess: function(result) {
                                // Menyembunyikan modal jika ada
                                document.getElementById("paymentModal").classList.add("hidden");

                                // Mengisi nilai input pada form dengan data dari result
                                document.getElementById("shipping_method").value = result.shipping_method ||
                                    "jne";
                                document.getElementById("status").value = "pending";
                                document.getElementById("order_status").value = "processing";
                                document.getElementById("payment_type").value = result.payment_type ||
                                    "credit_card";
                                document.getElementById("transaction_time").value = result
                                    .transaction_time || new Date().toISOString();

                                // Menyubmit form langsung tanpa menunggu interaksi dari user
                                const form = document.getElementById("postTransactionForm");
                                form.submit();
                            },
                            onPending: function(result) {
                                alert("Menunggu pembayaran Anda!");
                            },
                            onError: function(result) {
                                alert("Pembayaran gagal!");
                            },
                            onClose: function() {
                                alert("Anda menutup pembayaran tanpa menyelesaikannya.");
                            }
                        });
                    } else {
                        console.error('Token tidak ditemukan');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        document.getElementById("courier").addEventListener("change", function() {
            calculateShipping();
        });

        function calculateShipping() {
            const transactionId = "{{ $transaction->id }}";
            const url = `/transaction/${transactionId}/calculate-shipping`;
            const courier = document.getElementById("courier").value;

            console.log('Mengirim permintaan ongkir untuk transaksi ID:', transactionId, 'dengan kurir:', courier);

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        courier: courier
                    })
                })
                .then(response => response.json())
                .then(data => {
                    const shippingCostsDiv = document.getElementById('shipping-costs');
                    shippingCostsDiv.innerHTML = '';

                    if (data.error) {
                        shippingCostsDiv.innerHTML = `<p class="text-red-500">${data.error}</p>`;
                        return;
                    }

                    if (!data.shipping_costs || data.shipping_costs.length === 0) {
                        shippingCostsDiv.innerHTML =
                            `<p class="text-red-500">Tidak ada pilihan layanan tersedia untuk kurir ini.</p>`;
                        return;
                    }

                    let options = `
                                                        <label for="service" class="block text-sm font-semibold text-gray-700 mb-2">Pilih Layanan:</label>
                                                        <select name="service" id="service" required
                                                        class="w-full p-2 border border-gray-300 rounded-md bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                        onchange="updateShippingCost(this)">
                                                        `;

                    data.shipping_costs.forEach((cost, index) => {
                        const service = cost.service;
                        const originalValue = cost.cost[0].value;
                        const discountedValue = originalValue / 4;
                        const etd = cost.cost[0].etd;

                        options +=
                            `<option value="${discountedValue}" data-etd="${etd}" ${index === 0 ? 'selected' : ''}>${service} - Rp ${discountedValue.toLocaleString()}</option>`;
                    });

                    options += `
                                                        </select>
                                                        <p id="estimated-time" class="mt-2 text-sm text-gray-600">Estimasi waktu pengiriman: - hari</p>
                                                    `;

                    shippingCostsDiv.innerHTML = options;
                })
                .catch(error => console.error('Error:', error));
        }

        function updateShippingCost(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const shippingCost = parseFloat(selectedOption.value) || 0;
            const etd = selectedOption.getAttribute("data-etd") || "-";
            const shippingMethod = selectElement.options[selectElement.selectedIndex].text.split(' - ')[0];

            // Menampilkan estimasi waktu pengiriman
            document.getElementById("estimated-time").innerText = `Estimasi waktu pengiriman: ${etd} hari`;
            document.getElementById("shipping-cost-display").innerText = `Rp ${shippingCost.toLocaleString()}`;

            // Update elemen tersembunyi dengan shipping method dan estimated delivery
            document.getElementById("shipping_method").value = shippingMethod;
            document.getElementById("estimated_delivery").value = etd;
            document.getElementById("shipping_cost").value = shippingCost;

            const totalPriceElement = document.getElementById("total-price");
            const productPrice = parseFloat("{{ $transaction->product->price * $transaction->quantity }}") || 0;
            const serviceFee = parseFloat("{{ $transaction->service_fee ?? 6000 }}");
            const applicationFee = parseFloat("{{ $transaction->application_fee ?? 1000 }}");
            const insuranceFee = 3700;

            // Perhitungan total biaya
            const totalCost = productPrice + shippingCost + serviceFee + applicationFee + insuranceFee;
            totalPriceElement.innerText = `Rp ${totalCost.toLocaleString()}`;
        }
    </script>
</x-app-layout>
