<x-app-layout>
<section class="row header m-5 ">
    <div class="cont ms-5 col-md-3 col-lg-2">
        <h1 class="fw-bold fs-3 mb-3  tw-pt-40">Filter</h1>
        <div class=" border tw-bg-white tw-shadow-md tw-h-screen tw-px-3 pt-2 rounded-2">
            <!-- Dropdown Kategori -->
            <div class="mb-4">
                <h5 class="tw-font-semibold p-3 pb-0 fs-4">Kategori</h5>
                <ul class="list-group">
                    <li class="list-group-item tw-bg-gray-100 tw-text-gray-700">
                        <a class="tw-flex tw-justify-between tw-items-center" data-bs-toggle="collapse"
                            href="#fashionWan" role="button" aria-expanded="false" aria-controls="fashionWan">
                            Makanan
                            <span class="tw-text-gray-400"><i class='bx bx-chevron-up bx-md'></i></span>
                        </a>
                        <div class="collapse" id="fashionWan">
                            <ul class="tw-ml-4 tw-mt-2">
                                <li><a href="#">Buah Kering</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="list-group-item tw-bg-gray-100 tw-text-gray-700">
                        <a class="tw-flex tw-justify-between tw-items-center" data-bs-toggle="collapse"
                            href="#fashionWanita" role="button" aria-expanded="false" aria-controls="fashionWanita">
                            Minuman
                            <span class="tw-text-gray-400"><i class='bx bx-chevron-up bx-md'></i></span>
                        </a>
                        <div class="collapse" id="fashionWanita">
                            <ul class="tw-ml-4 tw-mt-2">
                                <li><a href="#">Jus Buah</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="list-group-item tw-bg-gray-100 tw-text-gray-700">
                        <a class="tw-flex tw-justify-between tw-items-center" data-bs-toggle="collapse"
                            href="#fashionMuslim" role="button" aria-expanded="false" aria-controls="fashionMuslim">
                            Bahan Makanan
                            <span class="tw-text-gray-400"><i class='bx bx-chevron-up bx-md'></i></span>
                        </a>
                        <div class="collapse" id="fashionMuslim">
                            <ul class="tw-ml-4 tw-mt-2">
                                <li><a href="#">Bumbu Kering</a></li>
                                <li><a href="#">Bumbu Basah</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="list-group-item tw-bg-gray-100 tw-text-gray-700">
                        <a class="tw-flex tw-justify-between tw-items-center" data-bs-toggle="collapse"
                            href="#fashionPria" role="button" aria-expanded="false" aria-controls="fashionPria">
                            Buah & Sayur
                            <span class="tw-text-gray-400"><i class='bx bx-chevron-up bx-md'></i></span>
                        </a>
                        <div class="collapse" id="fashionPria">
                            <ul class="tw-ml-4 tw-mt-2">
                                <li><a href="#"> Buah</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Filter Lokasi -->
            <div class="mb-4">
                <h5 class="tw-font-semibold">Lokasi</h5>
                <div class="form-check">
                    <input class="form-check-input custom-checkbox" type="checkbox" id="jakarta">
                    <label class="form-check-label" for="jakarta">
                        DKI Jakarta
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input custom-checkbox" type="checkbox" id="jabodetabek">
                    <label class="form-check-label" for="jabodetabek">
                        Jabodetabek
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input custom-checkbox" type="checkbox" id="bandung">
                    <label class="form-check-label" for="bandung">
                        Bandung
                    </label>
                </div>
                <a href="#" class="tw-text-green-500 tw-text-sm">Lihat selengkapnya</a>
            </div>

            <!-- Filter Harga -->
            <!-- Filter Harga -->
            <div class="mb-4">
                <h5 class="tw-font-semibold">Harga</h5>

                <!-- Input Harga Minimum -->
                <div class="mb-2">
                    <label for="harga-minimum" class="form-label tw-text-sm">Harga Minimum</label>
                    <div class="input-group">
                        <span class="input-group-text tw-bg-light fs-4 tw-border rounded-start-pill">Rp</span>
                        <input type="number" id="harga-minimum"
                            class="form-control tw-border tw-text-sm fs-5 rounded-end-pill"
                            placeholder="Harga Minimum" />
                    </div>
                </div>

                <!-- Input Harga Maksimum -->
                <div class="mb-2">
                    <label for="harga-maksimum" class="form-label tw-text-sm">Harga Maksimum</label>
                    <div class="input-group">
                        <span class="input-group-text tw-bg-light fs-4 tw-border rounded-start-pill">Rp</span>
                        <input type="number" id="harga-maksimum"
                            class="form-control tw-border tw-text-sm fs-5 rounded-end-pill"
                            placeholder="Harga Maksimum" />
                    </div>
                </div>
                <div class="mx-auto text-center">
                <button class="btn mt-3" style="border-radius: 25px; background-color: #01AB31; color:
                    white; padding: 0.8rem 7rem; font-size: 1rem; font-weight: 500">Terapkan</button></div>
            </div>

        </div>
    </div>
    <div class="content col-md-9">
        <div class="hook">
            <h1 class="fw-bold fs-3 mb-5 tw-pt-40">Produk</h1>
        </div>

        <div class="pro">
            <div class="row justify-content-between" style="margin: 0 7rem">
                <div class="col-sm-3 procard mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
                        <div class="card-footer border-top border-gray-300 p-4">
                            <a href="#" class="h5">Kripik Nangka</a>
                            <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
                            <div class="d-flex mt-3">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                                <span class="badge bg-success ms-2">4.7</span>
                            </div>
                            <div class="d-flex mt-3">
                                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 procard mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
                        <div class="card-footer border-top border-gray-300 p-4">
                            <a href="#" class="h5">Kripik Nangka</a>
                            <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
                            <div class="d-flex mt-3">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                                <span class="badge bg-success ms-2">4.7</span>
                            </div>
                            <div class="d-flex mt-3">
                                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 procard mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
                        <div class="card-footer border-top border-gray-300 p-4">
                            <a href="#" class="h5">Kripik Nangka</a>
                            <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
                            <div class="d-flex mt-3">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                                <span class="badge bg-success ms-2">4.7</span>
                            </div>
                            <div class="d-flex mt-3">
                                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 procard mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
                        <div class="card-footer border-top border-gray-300 p-4">
                            <a href="#" class="h5">Kripik Nangka</a>
                            <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
                            <div class="d-flex mt-3">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                                <span class="badge bg-success ms-2">4.7</span>
                            </div>
                            <div class="d-flex mt-3">
                                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 procard mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
                        <div class="card-footer border-top border-gray-300 p-4">
                            <a href="#" class="h5">Kripik Nangka</a>
                            <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
                            <div class="d-flex mt-3">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                                <span class="badge bg-success ms-2">4.7</span>
                            </div>
                            <div class="d-flex mt-3">
                                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 procard mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
                        <div class="card-footer border-top border-gray-300 p-4">
                            <a href="#" class="h5">Kripik Nangka</a>
                            <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
                            <div class="d-flex mt-3">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                                <span class="badge bg-success ms-2">4.7</span>
                            </div>
                            <div class="d-flex mt-3">
                                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 procard mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
                        <div class="card-footer border-top border-gray-300 p-4">
                            <a href="#" class="h5">Kripik Nangka</a>
                            <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
                            <div class="d-flex mt-3">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                                <span class="badge bg-success ms-2">4.7</span>
                            </div>
                            <div class="d-flex mt-3">
                                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 procard mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
                        <div class="card-footer border-top border-gray-300 p-4">
                            <a href="#" class="h5">Kripik Nangka</a>
                            <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
                            <div class="d-flex mt-3">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                                <span class="badge bg-success ms-2">4.7</span>
                            </div>
                            <div class="d-flex mt-3">
                                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 procard mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
                        <div class="card-footer border-top border-gray-300 p-4">
                            <a href="#" class="h5">Kripik Nangka</a>
                            <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
                            <div class="d-flex mt-3">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                                <span class="badge bg-success ms-2">4.7</span>
                            </div>
                            <div class="d-flex mt-3">
                                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 procard mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
                        <div class="card-footer border-top border-gray-300 p-4">
                            <a href="#" class="h5">Kripik Nangka</a>
                            <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
                            <div class="d-flex mt-3">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                                <span class="badge bg-success ms-2">4.7</span>
                            </div>
                            <div class="d-flex mt-3">
                                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 procard mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
                        <div class="card-footer border-top border-gray-300 p-4">
                            <a href="#" class="h5">Kripik Nangka</a>
                            <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
                            <div class="d-flex mt-3">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                                <span class="badge bg-success ms-2">4.7</span>
                            </div>
                            <div class="d-flex mt-3">
                                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 procard mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
                        <div class="card-footer border-top border-gray-300 p-4">
                            <a href="#" class="h5">Kripik Nangka</a>
                            <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
                            <div class="d-flex mt-3">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                                <span class="badge bg-success ms-2">4.7</span>
                            </div>
                            <div class="d-flex mt-3">
                                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</x-app-layout>