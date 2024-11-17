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
                                            {{ number_format($transaction->total_price + ($transaction->shipping_cost ?? 0), 0, ',', '.') }}
                                        </div>
                                        <div>
                                            <button class="btn btn-outline-none fw-bold text-success"
                                                data-bs-toggle="modal" data-bs-target="#transactionDetailModal">
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
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionDetailModalLabel">Detail Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="col-md-6">
                                <h6><strong>Nomor Resi:</strong></h6>
                                <p>{{ $transaction->resi ?? 'INV/000000000' }}</p>
                            </div>
                            @php
                                $translations = [
                                    'completed' => 'Selesai',
                                    'pending' => 'Menunggu',
                                    'confirmed' => 'Dikonfirmasi',
                                    'cancelled' => 'Dibatalkan',
                                    'shipped' => 'Sedang Dikirim',
                                ];
                            @endphp
                            <div class="col-md-6">
                                <h6><strong>Status:</strong></h6>
                                <p>{{ $translations[strtolower($transaction->status)] ?? $transaction->status }}</p>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <h6><strong>Nama Produk:</strong></h6>
                                    <p>{{ $transaction->product->name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6><strong>Jumlah:</strong></h6>
                                    <p>{{ $transaction->quantity }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6><strong>Total Harga:</strong></h6>
                                    <p>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6><strong>Metode Pengiriman:</strong></h6>
                                    <p>{{ $transaction->shipping_method }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6><strong>Alamat Pengiriman:</strong></h6>
                                    <p>{{ $transaction->user->address ?? 'Alamat tidak tersedia' }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
