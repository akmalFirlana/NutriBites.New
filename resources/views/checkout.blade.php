<x-app-layout>
    <section class="bg-light py-28">
        <div class="container header">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h2 class="card-title mb-4 fw-bold">Barang Yang Dibeli</h2>
                            <div class="row gy-3 mb-4 px-3">
                                <div class="penjual mb-1">
                                    <p class= fw-bold mb-0"
                                        style="display: inline-flex; align-items: center; margin: 0; padding: 0;">
                                        <img src="{{ asset('image/icon_toko.png') }}"
                                            style="width: 30px; display: inline-flex; margin-right: 5px; margin: 0;">
                                        penjual
                                    </p>
                                    <p class="text-muted" style="line-height: 0.2">Kota Asal</p>
                                </div>
                                <div class="col-lg-6">
                                    <div class="me-lg-8 row">
                                        <div class="d-flex col-md-4 ps-3">
                                            <img src="{{ asset('image/dummi2.webp') }}" class="border rounded"
                                                style="width: 96px; height: 96px;" />
                                        </div>
                                        <div class="col-md-7 px-0 ">
                                            <a href="#" class="nav-link d-block">Kripik Nangka Original</a>
                                            <div class="flex items-center space-x-2 mb-2">
                                                <!-- Diskon Badge dan Harga Lama -->
                                                <div class="flex items-center space-x-1 text-gray-500 line-through">
                                                    <span
                                                        class="bg-green-500 text-white text-xs font-semibold px-2 py-0.5 rounded">10%</span>
                                                    <span>Rp 60.000</span>
                                                </div>
                                                <!-- Harga Baru -->
                                                <p class="text-lg font-bold text-black">Rp 50.000</p>
                                            </div>
                                            <a href="" class="catatan text-success fw-bold">Tulis Catatan</a> | 
                                            <div class="input-number-container ms-2">
                                                <button type="button" class="btn-decrement px-1"
                                                    onclick="decrement()">−</button>
                                                <input type="number" id="number-input" value="1" min="0"
                                                    class="input-number" />
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
                                    <div class="d-flex justify-content-between align-items-start mt-3 p-3 border">
                                        <div>
                                            <span class="label-badge">Utama</span>
                                            <p class="fw-bold mb-0">Rumah (bengkel) - Raka Bagus (6282237650234)</p>
                                            <p class="small-text">DS. Petungsewu RT 09 RW 03 Kec. Wagir Kab. Malang
                                                (bengkel), Wagir, Kab. Malang</p>
                                        </div>
                                        <button class="btn btn-link">></button>
                                    </div>

                                    <div class="divider"></div>

                                    <div class="dropdown mb-4 col-md-9">
                                        <p> Pilih Metode Pengiriman:</p>
                                        <!-- Tombol untuk memilih metode pengiriman -->
                                        <button class="btn btn-outline-secondary w-100 dropdown-toggle mb-4"
                                            type="button" id="dropdownShipping" data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                            style="background-color: #fff; color: black; padding: 1rem 3rem; font-size: 1.5rem; font-weight: 500">
                                            Pilih Metode Pengiriman
                                        </button>

                                        <!-- Dropdown metode pengiriman -->
                                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownShipping">
                                            <li class="dropdown-item"
                                                onclick="selectShipping('Reguler', 'Rp23.000 - Rp25.900', 'Estimasi tiba 24 - 28 Sep')">
                                                <div class="d-flex justify-content-between">
                                                    <span class="fw-bold fs-6">Reguler</span>
                                                    <span class="text-muted ">Rp23.000 - Rp25.900</span>
                                                </div>
                                                <small class="text-muted ">Estimasi tiba 24 - 28 Sep</small>
                                            </li>
                                            <li class="dropdown-item"
                                                onclick="selectShipping('Kargo', 'Rp80.000', 'Estimasi tiba 25 - 30 Sep', 'Rekomendasi berat di atas 5kg')">
                                                <div class="d-flex justify-content-between">
                                                    <span class="fw-bold fs-6">Kargo</span>
                                                    <span class="text-muted ">Rp80.000</span>
                                                </div>
                                                <small class="text-muted ">Estimasi tiba 25 - 30 Sep</small>
                                                <small class="text-danger ">Rekomendasi berat di atas 5kg</small>
                                            </li>
                                            <li class="dropdown-item"
                                                onclick="selectShipping('Ekonomi', 'Rp23.400', 'Estimasi tiba 25 - 28 Sep')">
                                                <div class="d-flex justify-content-between">
                                                    <span class="fw-bold fs-6">Ekonomi</span>
                                                    <span class="text-muted ">Rp23.400</span>
                                                </div>
                                                <small class="text-muted ">Estimasi tiba 25 - 28 Sep</small>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Tempat untuk menampilkan dropdown kurir dengan desain yang sama -->
                                    <div id="selectedShipping" class="mt-3 col-md-9"></div>

                                    <script>
                                        // Fungsi untuk menampilkan metode pengiriman yang dipilih di tombol dan menampilkan dropdown kurir
                                        function selectShipping(method, price, estimate, note = '') {
                                            // Ubah teks tombol menjadi pilihan pengiriman
                                            const button = document.getElementById('dropdownShipping');
                                            button.innerText = `${method} - ${price}`;

                                            // Dropdown untuk kurir dengan desain serupa
                                            const courierDropdown = `
    <button class="btn btn-outline-secondary w-100 dropdown-toggle" type="button" id="dropdownCourier"
        data-bs-toggle="dropdown" aria-expanded="false"
        style="background-color: #fff; color: black; padding: 1rem 3rem; font-size: 1.5rem; font-weight: 500">
        Pilih Kurir
    </button>
    <ul class="dropdown-menu w-75" aria-labelledby="dropdownCourier">
        <li class="dropdown-item" onclick="selectCourier('JNE', 'Rp10.000', 'Estimasi tiba 1 - 3 hari')">
            <div class="d-flex justify-content-between">
                <span class="fw-bold">JNE</span>
                <span class="text-muted ">Rp10.000</span>
            </div>
            <small class="text-muted ">Estimasi tiba 1 - 3 hari</small>
        </li>
        <li class="dropdown-item" onclick="selectCourier('TIKI', 'Rp11.500', 'Estimasi tiba 2 - 4 hari')">
            <div class="d-flex justify-content-between">
                <span class="fw-bold">TIKI</span>
                <span class="text-muted ">Rp11.500</span>
            </div>
            <small class="text-muted ">Estimasi tiba 2 - 4 hari</small>
        </li>
        <li class="dropdown-item" onclick="selectCourier('POS Indonesia', 'Rp9.000', 'Estimasi tiba 3 - 5 hari')">
            <div class="d-flex justify-content-between">
                <span class="fw-bold">POS Indonesia</span>
                <span class="text-muted ">Rp9.000</span>
            </div>
            <small class="text-muted ">Estimasi tiba 3 - 5 hari</small>
        </li>
        <li class="dropdown-item" onclick="selectCourier('SiCepat', 'Rp12.000', 'Estimasi tiba 1 - 3 hari')">
            <div class="d-flex justify-content-between">
                <span class="fw-bold">SiCepat</span>
                <span class="text-muted ">Rp12.000</span>
            </div>
            <small class="text-muted ">Estimasi tiba 1 - 3 hari</small>
        </li>
    </ul>`;

                                            // Tampilkan dropdown kurir di div "selectedShipping"
                                            document.getElementById('selectedShipping').innerHTML = courierDropdown;
                                        }

                                        // Fungsi untuk menampilkan kurir yang dipilih di tombol
                                        function selectCourier(courier, price, estimate) {
                                            const courierButton = document.getElementById('dropdownCourier');
                                            courierButton.innerText = `${courier} - ${price}`;
                                        }
                                    </script>


                                    <div class="divider"></div>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <img src="https://upload.wikimedia.org/wikipedia/id/5/55/BNI_logo.svg"
                                                alt="BNI Logo" width="40">
                                            <p class="fw-bold">BNI Virtual Account</p>
                                        </div>
                                    </div>

                                    <div class="divider"></div>

                                    <div class="mb-3">
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
                                    <a href="#" class="btn btn-success w-100 shadow-0 py-2 fs-6" data-bs-toggle="modal"
                                        data-bs-target="#beliModal">
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
</x-app-layout>