<x-app-layout>
<section class="bg-light my-5">
    <div class="container header">
        <div class="row">
            <div class="col-lg-9">
                <div class="card border shadow-0">
                    <div class="m-4">
                        <h2 class="card-title mb-4 fw-bold">Barang Yang Dibeli</h2>
                        <div class="row gy-3 mb-4">
                            <div class="col-lg-5">
                                <div class="me-lg-5">
                                    <div class="d-flex">
                                        <img src="{{ asset('image/dummi2.webp') }}" class="border rounded me-3"
                                            style="width: 96px; height: 96px;" />
                                        <div class="">
                                            <a href="#" class="nav-link d-block">Kripik Nangka Original</a>
                                            <p class="text-muted fs-6 mb-0">Varian: Original</p>
                                            <text class="text-decoration-line-through text-muted"><span
                                                    class="badge bg-success ms-2">10%</span>Rp 60.000</text>
                                            <small class="text-nowrap fw-bold"> Rp 50.000 </small>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class=" mt-5">
                            <div class="box-shadow">
                                <h5>Pengiriman dan Pembayaran</h5>
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
                                    <h2> Pilih Metode Pengiriman:</h2>
                                    <!-- Tombol untuk memilih metode pengiriman -->
                                    <button class="btn btn-outline-secondary w-100 dropdown-toggle mb-4" type="button"
                                        id="dropdownShipping" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="background-color: #fff; color: black; padding: 1rem 3rem; font-size: 1.5rem; font-weight: 500">
                                        Pilih Metode Pengiriman
                                    </button>

                                    <!-- Dropdown metode pengiriman -->
                                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownShipping">
                                        <li class="dropdown-item"
                                            onclick="selectShipping('Reguler', 'Rp23.000 - Rp25.900', 'Estimasi tiba 24 - 28 Sep')">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-bold fs-3">Reguler</span>
                                                <span class="text-muted fs-5">Rp23.000 - Rp25.900</span>
                                            </div>
                                            <small class="text-muted fs-5">Estimasi tiba 24 - 28 Sep</small>
                                        </li>
                                        <li class="dropdown-item"
                                            onclick="selectShipping('Kargo', 'Rp80.000', 'Estimasi tiba 25 - 30 Sep', 'Rekomendasi berat di atas 5kg')">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-bold fs-3">Kargo</span>
                                                <span class="text-muted fs-5">Rp80.000</span>
                                            </div>
                                            <small class="text-muted fs-5">Estimasi tiba 25 - 30 Sep</small>
                                            <small class="text-danger fs-5">Rekomendasi berat di atas 5kg</small>
                                        </li>
                                        <li class="dropdown-item"
                                            onclick="selectShipping('Ekonomi', 'Rp23.400', 'Estimasi tiba 25 - 28 Sep')">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-bold fs-3">Ekonomi</span>
                                                <span class="text-muted fs-5">Rp23.400</span>
                                            </div>
                                            <small class="text-muted fs-5">Estimasi tiba 25 - 28 Sep</small>
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
                <span class="fw-bold fs-4">JNE</span>
                <span class="text-muted fs-5">Rp10.000</span>
            </div>
            <small class="text-muted fs-5">Estimasi tiba 1 - 3 hari</small>
        </li>
        <li class="dropdown-item" onclick="selectCourier('TIKI', 'Rp11.500', 'Estimasi tiba 2 - 4 hari')">
            <div class="d-flex justify-content-between">
                <span class="fw-bold fs-4">TIKI</span>
                <span class="text-muted fs-5">Rp11.500</span>
            </div>
            <small class="text-muted fs-5">Estimasi tiba 2 - 4 hari</small>
        </li>
        <li class="dropdown-item" onclick="selectCourier('POS Indonesia', 'Rp9.000', 'Estimasi tiba 3 - 5 hari')">
            <div class="d-flex justify-content-between">
                <span class="fw-bold fs-4">POS Indonesia</span>
                <span class="text-muted fs-5">Rp9.000</span>
            </div>
            <small class="text-muted fs-5">Estimasi tiba 3 - 5 hari</small>
        </li>
        <li class="dropdown-item" onclick="selectCourier('SiCepat', 'Rp12.000', 'Estimasi tiba 1 - 3 hari')">
            <div class="d-flex justify-content-between">
                <span class="fw-bold fs-4">SiCepat</span>
                <span class="text-muted fs-5">Rp12.000</span>
            </div>
            <small class="text-muted fs-5">Estimasi tiba 1 - 3 hari</small>
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
                <div class="card mb-3 border shadow-0">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label class="form-label">Punya kupon?</label>
                                <div class="input-group">
                                    <input type="text" class="form-control border" name="" placeholder="Coupon code" />
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
                            <p class="mb-2 ">Total Harga:</p>
                            <p class="mb-2">Rp 329.000</p>
                        </div>
                        <div class="d-flex justify-content-between text-muted">
                            <p class="mb-2">Total Ongkos Kirim:</p>
                            <p class="mb-2 text-success">-Rp 60.000</p>
                        </div>
                        <div class="d-flex justify-content-between text-muted">
                            <p class="mb-2">Ansuransi Pengiriman:</p>
                            <p class="mb-2">Rp 14.000</p>
                        </div>
                        <hr />
                        <h1 class="fs-6 mb-2">Biaya Transaksi</h1>
                        <div class="d-flex justify-content-between text-muted">
                            <p class="mb-2">Biaya Layanan</p>
                            <p class="mb-2 text-success">Rp 6.000</p>
                        </div>
                        <div class="d-flex justify-content-between text-muted fs-sm">
                            <p class="mb-2">Biaya Jasa Aplikasi</p>
                            <p class="mb-2">Rp 1.000</p>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between text-muted fs-sm">
                            <p class="mb-2">Total Harga:</p>
                            <p class="mb-2 fw-bold">Rp 283.000</p>
                        </div>

                        <div class="mt-3">
                            <!-- Tombol untuk memicu modal -->
                            <a href="#" class="btn btn-success w-100 shadow-0 py-2 fs-6" data-bs-toggle="modal"
                                data-bs-target="#beliModal">
                                <i class='bx bxs-check-shield me-1' style='color:#ffffff'></i> Beli Sekarang
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="beliModal" tabindex="-1" aria-labelledby="beliModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content ">
                                        <div class="modal-body text-center">
                                            <i class='bx bx-check bg-light p-3 fs-1 rounded-circle'></i><br>
                                            <h2>Pesanan Tervalidasi</h2>
                                            <p class="text-muted pt-3 fw-3">Terima kasih atas pembelian Anda.<br>
                                                Paket Anda akan dikirim dalam waktu 2 hari<br> setelah pembelian Anda</p>
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
            <!-- summary -->
        </div>
    </div>
</section>
</x-app-layout>