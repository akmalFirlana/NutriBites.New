<x-app-layout>
    <section class="bg-light mt-5">
        <div class="wish text-center position-fixed w-100">
            <i class='bx bx-history text-green-600' style='font-size:80px'></i>
            <h1 class="text-center">Histori Pembelian</h1>
        </div>

        <div class="container pb-5 pt-5">
            <div class="row pt-40">
                <div class="col-lg-12 mt-72">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Produk</h4>

                            @foreach ($transactions as $transaction)
                                <div class="card card-transaction shadow-md mb-3">
                                    <div class="transaction-header px-3 py-2">
                                        <div class="d-flex align-items-center">
                                            <span class="me-2"><i
                                                    class='bx bxs-shopping-bag bx-sm text-success'></i></span>
                                            <span class="fw-bolder"> Belanja</span>
                                            <span
                                                class="mx-2 text-muted">{{ $transaction->transaction_time->format('d M Y') }}</span>
                                            @php
                                                $translations = [
                                                    'completed' => 'Selesai',
                                                    'pending' => 'Menunggu',
                                                    'confirmed' => 'Dikonfirmasi',
                                                    'cancelled' => 'Dibatalkan',
                                                    'shipped' => 'Sedang Dikirim',
                                                ];
                                            @endphp

                                            <span
                                                class="inline-block px-3 py-1 rounded-md text-xs font-semibold text-white cursor-pointer
                                                {{ strtolower($transaction->status) === 'completed' ? 'bg-green-500' : '' }}
                                                {{ strtolower($transaction->status) === 'pending' ? 'bg-yellow-500' : '' }}
                                                {{ strtolower($transaction->status) === 'confirmed' ? 'bg-blue-500' : '' }}
                                                {{ strtolower($transaction->status) === 'cancelled' ? 'bg-red-500' : '' }}
                                                {{ strtolower($transaction->status) === 'shipped' ? 'bg-green-500' : '' }}"
                                                onclick="openModal({{ $transaction->id }}, '{{ $transaction->status }}')"
                                                data-bs-toggle="modal" data-bs-target="#orderModal">
                                                {{ $translations[strtolower($transaction->status)] ?? $transaction->status }}
                                            </span>

                                        </div>
                                        <div class="invoice">
                                            {{ 'INV/' . $transaction->transaction_time->format('Hi') . $transaction->transaction_time->format('d') }}
                                        </div>
                                    </div>

                                    <div class="transaction-body px-3 py-2 d-flex align-items-center">
                                        @php
                                            $images = json_decode($transaction->product->images, true);
                                        @endphp

                                        @if (!empty($images) && isset($images[0]))
                                            <img src="{{ asset('storage/' . $images[0]) }}" alt="Product"
                                                class="rounded border ms-3" style="width: 60px; height: 60px">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                        <div class="item-info ms-3">
                                            <h6 class="fw-bold text-lg">
                                                {{ $transaction->product->name ?? 'Nama Produk' }}</h6>
                                            <span>{{ $transaction->quantity }} barang x
                                                Rp{{ number_format($transaction->total_price, 0, ',', '.') }}</span>
                                        </div>
                                    </div>

                                    <div
                                        class="transaction-footer px-3 py-2 d-flex justify-content-between align-items-center">
                                        <div class="total">
                                            Total Belanja Rp
                                            {{ number_format($transaction->total_price + ($transaction->shipping_cost ?? 0) + 10700, 0, ',', '.') }}
                                        </div>
                                        <div>
                                            <button class="btn btn-outline-none fw-bold text-success"
                                                data-bs-toggle="modal" data-bs-target="#transactionDetailModal"
                                                data-transaction-id="{{ $transaction->id }}"
                                                data-resi="{{ $transaction->resi ?? 'INV/000000000' }}"
                                                data-status="{{ $translations[strtolower($transaction->status)] ?? $transaction->status }}"
                                                data-product-name="{{ $transaction->product->name ?? 'Nama Produk' }}"
                                                data-quantity="{{ $transaction->quantity }}"
                                                data-total-price="{{ number_format($transaction->total_price, 0, ',', '.') }}"
                                                data-shipping-method="{{ $transaction->shipping_method }}"
                                                data-shipping-address="{{ $transaction->user->address ?? 'Alamat tidak tersedia' }}"
                                                onclick="populateModal(this)">
                                                Lihat Detail Transaksi
                                            </button>

                                            @if ($transaction->status === 'shipped')
                                                <button class="btn btn-outline-success fw-bold" data-bs-toggle="modal"
                                                    data-bs-target="#confirmOrderModal">
                                                    Konfirmasi Pesanan
                                                </button>
                                                <div class="modal fade" id="confirmOrderModal" tabindex="-1"
                                                    aria-labelledby="confirmOrderModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmOrderModalLabel">
                                                                    Konfirmasi Pesanan</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Apakah Anda yakin ingin menyelesaikan pesanan ini?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <!-- Form untuk mengubah status menjadi 'completed' -->
                                                                <form id="orderForm" method="POST"
                                                                    action="{{ route('transactions.complete', $transaction->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="status"
                                                                        value="completed">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Konfirmasi</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($transaction->status === 'completed')
                                                <button class="btn btn-outline-success fw-bold"
                                                    onclick="">Ulas</button>
                                            @endif
                                            <button class="btn btn-success fw-bold"
                                                onclick="window.location.href = '{{ route('product.detail', ['id' => $transaction->product->id]) }}'">Beli
                                                Lagi</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="transactionDetailModal" tabindex="-1" aria-labelledby="transactionDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <!-- Header -->
              <div class="modal-header">
                <h5 class="modal-title font-bold fs-5" id="orderDetailsLabel">Detail Pesanan</h5>
                <button type="button" class="btn-close bg-white rounded-full" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
        
              <!-- Body -->
              <div class="modal-body">
                <!-- Loader -->
                <div id="modalContent" class="text-center mt-5 text-gray-500">
                  <p>Memuat data...</p>
                </div>
              </div>
            </div>
          </div>
    </div>

    <script>
        function populateModal(button) {
            // Ambil elemen modal konten
            const modalContent = document.getElementById('modalContent');

            // Ambil data dari atribut tombol
            const transactionId = button.getAttribute('data-transaction-id');
            const resi = button.getAttribute('data-resi');
            const status = button.getAttribute('data-status');
            const productName = button.getAttribute('data-product-name');
            const quantity = button.getAttribute('data-quantity');
            const totalPrice = button.getAttribute('data-total-price');
            const shippingMethod = button.getAttribute('data-shipping-method');
            const shippingAddress = button.getAttribute('data-shipping-address');


            modalContent.innerHTML = `
              <div class="row gap-4">
                  <!-- Informasi Pesanan -->
                  <div class="col-md-12">
                    <div class="bg-gray-100 p-4 pt-0 rounded-lg shadow">
                      <h6 class="font-semibold text-lg text-gray-700">Nomor Resi:</h6>
                      <p class="text-gray-600">${resi}</p>
        
                      <h6 class="font-semibold text-lg text-gray-700 mt-3">Status:</h6>
                      <p class="text-gray-600">${status}</p>
        
                      <h6 class="font-semibold text-lg text-gray-700 mt-3">Nama Produk:</h6>
                      <p class="text-gray-600">${productName}</p>
        
                      <h6 class="font-semibold text-lg text-gray-700 mt-3">Jumlah:</h6>
                      <p class="text-gray-600">${quantity}</p>
        
                      <h6 class="font-semibold text-lg text-gray-700 mt-3">Total Harga:</h6>
                      <p class="text-gray-600">Rp ${totalPrice}</p>
        
                      <h6 class="font-semibold text-lg text-gray-700 mt-3">Metode Pengiriman:</h6>
                      <p class="text-gray-600">${shippingMethod}</p>
        
                      <h6 class="font-semibold text-lg text-gray-700 mt-3">Alamat Pengiriman:</h6>
                      <p class="text-gray-600">${shippingAddress}</p>
                    </div>
                  </div>
        
                <div class="col-md-5">
                        <div class="custom-loader mt-72">
                            <div class="custom-truckWrapper">
                                <div class="custom-truckBody">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 198 93"
                                        class="custom-trucksvg">
                                        <path stroke-width="3" stroke="#282828" fill="#F83D3D"
                                            d="M135 22.5H177.264C178.295 22.5 179.22 23.133 179.594 24.0939L192.33 56.8443C192.442 57.1332 192.5 57.4404 192.5 57.7504V89C192.5 90.3807 191.381 91.5 190 91.5H135C133.619 91.5 132.5 90.3807 132.5 89V25C132.5 23.6193 133.619 22.5 135 22.5Z">
                                        </path>
                                        <path stroke-width="3" stroke="#282828" fill="#7D7C7C"
                                            d="M146 33.5H181.741C182.779 33.5 183.709 34.1415 184.078 35.112L190.538 52.112C191.16 53.748 189.951 55.5 188.201 55.5H146C144.619 55.5 143.5 54.3807 143.5 53V36C143.5 34.6193 144.619 33.5 146 33.5Z">
                                        </path>
                                        <path stroke-width="2" stroke="#282828" fill="#282828"
                                            d="M150 65C150 65.39 149.763 65.8656 149.127 66.2893C148.499 66.7083 147.573 67 146.5 67C145.427 67 144.501 66.7083 143.873 66.2893C143.237 65.8656 143 65.39 143 65C143 64.61 143.237 64.1344 143.873 63.7107C144.501 63.2917 145.427 63 146.5 63C147.573 63 148.499 63.2917 149.127 63.7107C149.763 64.1344 150 64.61 150 65Z">
                                        </path>
                                        <rect stroke-width="2" stroke="#282828" fill="#FFFCAB" rx="1"
                                            height="7" width="5" y="63" x="187"></rect>
                                        <rect stroke-width="2" stroke="#282828" fill="#282828" rx="1"
                                            height="11" width="4" y="81" x="193"></rect>
                                        <rect stroke-width="3" stroke="#282828" fill="#DFDFDF" rx="2.5"
                                            height="90" width="121" y="1.5" x="6.5"></rect>
                                        <rect stroke-width="2" stroke="#282828" fill="#DFDFDF" rx="2"
                                            height="4" width="6" y="84" x="1"></rect>
                                    </svg>
                                </div>
                                <div class="custom-truckTires">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 30 30"
                                        class="custom-tiresvg">
                                        <circle stroke-width="3" stroke="#282828" fill="#282828" r="13.5"
                                            cy="15" cx="15"></circle>
                                        <circle fill="#DFDFDF" r="7" cy="15" cx="15"></circle>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 30 30"
                                        class="custom-tiresvg">
                                        <circle stroke-width="3" stroke="#282828" fill="#282828" r="13.5"
                                            cy="15" cx="15"></circle>
                                        <circle fill="#DFDFDF" r="7" cy="15" cx="15"></circle>
                                    </svg>
                                </div>
                                <div class="custom-road"></div>
        
                                <svg xml:space="preserve" viewBox="0 0 453.459 453.459"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                                    id="Capa_1" version="1.1" fill="#000000" class="custom-lampPost">
                                    <path d="M252.882,0c-37.781,0-68.686,29.953-70.245,67.358h-6.917v8.954c-26.109,2.163-45.463,10.011-45.463,19.366h9.993
                                    c-1.65,5.146-2.507,10.54-2.507,16.017c0,28.956,23.558,52.514,52.514,52.514c28.956,0,52.514-23.558,52.514-52.514
                                    c0-5.478-0.856-10.872-2.506-16.017h9.992c0-9.354-19.352-17.204-45.463-19.366v-8.954h-6.149C200.189,38.779,223.924,16,252.882,16
                                    c29.952,0,54.32,24.368,54.32,54.32c0,28.774-11.078,37.009-25.105,47.437c-17.444,12.968-37.216,27.667-37.216,78.884v113.914
                                    h-0.797c-5.068,0-9.174,4.108-9.174,9.177c0,2.844,1.293,5.383,3.321,7.066c-3.432,27.933-26.851,95.744-8.226,115.459v11.202h45.75
                                    v-11.202c18.625-19.715-4.794-87.527-8.227-115.459c2.029-1.683,3.322-4.223,3.322-7.066c0-5.068-4.107-9.177-9.176-9.177h-0.795
                                    V196.641c0-43.174,14.942-54.283,30.762-66.043c14.793-10.997,31.559-23.461,31.559-60.277C323.202,31.545,291.656,0,252.882,0z
                                    M232.77,111.694c0,23.442-19.071,42.514-42.514,42.514c-23.442,0-42.514-19.072-42.514-42.514c0-5.531,1.078-10.957,3.141-16.017
                                    h78.747C231.693,100.736,232.77,106.162,232.77,111.694z"></path>
                                </svg>
                            </div>
                        </div>
        
                </div>
            </div>
        `;
        }
    </script>

</x-app-layout>
