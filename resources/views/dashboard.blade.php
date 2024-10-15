<x-app-layout>
    <div class="" style="margin-left: 7rem;">
        <h1 class="header-text col-md-7 fw-bold mt-4 slide-in-left" style="font-size: 4.8rem;  padding: 6rem 7rem 0 0;">
            Camilan Sehat,
            Rasa
            Nikmat: Pilihan Tepat Untuk Hidup Yang Lebih Baik</h1>
        <p class="col-md-6 text-gray-400 slide-in-left2" style="padding: 0.8rem 7rem 2rem 0; font-size: 1.5rem;">
            Temukan Snack dan makanan dengan kualitas terbaik untuk dirimu dan keluargamu hanya di NutriBites</p>
        <button class="btn slide-in-right" style="border-radius: 25px; background-color: #01AB31; color:
         white; padding: 1rem 3rem; font-size: 1.5rem; font-weight: 500"
            onclick="window.location.href='/daftar'">Bergabung</button>
        <div class="support row mt-5 slide-in-right">
            <div class="col-md-1 kanan">
                <h1 class="fw-bold fs-1">200+</h1>
                <h1 class="fs-6" style="color: grey">Brand Makanan</h1>
            </div>
            <div class="col-md-1 me-2 kanan">
                <h1 class="fw-bold fs-1">5.000+</h1>
                <h1 class="fs-6" style="color: grey">Produk Makanan</h1>
            </div>
            <div class="col-md-1 ms-2">
                <h1 class="fw-bold fs-1">10+</h1>
                <h1 class="fs-6" style="color: grey">Metode Pembayaran</h1>
            </div>
        </div>
        <img src="{{ asset('image/Vector.svg') }}" alt="Logo" class="appear"
            style="position: absolute; bottom: 190; right: 500;">
        <img src="{{ asset('image/Vector.svg') }}" alt="Logo" class="appear"
            style="height: 80; position: absolute; bottom: 380; right: 90;">
        <img src="{{ asset('image/Vector.svg') }}" alt="Logo" class="appear"
            style="height: 40; position: absolute; bottom: 100; right: 700;">
        <img src="{{ asset('image/Vector.svg') }}" alt="Logo" class="appear"
            style="height: 50; position: absolute; bottom: 350; right: 390;">
        <img src="{{ asset('image/hero.png') }}" alt="Logo" class="an1 slide-in-right"
            style="height: 590px; position: absolute; bottom: -160px; right: -100px;">

    </div>
    </section>

    <section class="mt-5">
        <h1 class="text-center fw-bold" style="font-size: 4rem; margin-top: 6rem">Rekomendasi Produk</h1>
        <p class="text-center text-gray-400 mb-5" style="font-size: 1.5rem;">Nikmati pilihan produk snack sehat terbaik
            yang
            dipilih khusus untuk Anda!</p>
        <div class="row justify-content-between" style="margin: 0 7rem">
            <div class="col-sm-3 procard tw-rounded-3xl">
                <div class="card shadow position-relative" style="border-radius: 12px">
                    <!-- Peringkat Gizi dengan Tooltip -->
                    <div class="nutrition-badge position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="popover"
                        data-bs-trigger="hover" data-bs-html="true">
                        <span class="badge text-dark"
                            style="background-image: url('{{ asset('image/list.png') }}'); background-size: cover; background-position: center; padding: 10px; display: inline-block; cursor: pointer;"
                            data-bs-toggle="modal" data-bs-target="#nutritionModal">A+</span>
                    </div>

                    <!-- Konten Card -->
                    <img src="{{ asset('image/dummi2.webp') }}" alt="black watch" class="tw-rounded-t-2xl">
                    <div onclick="location.href='{{ route('dashboard') }}';"
                        class="card-footer border-top border-gray-300 p-4">
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

            <div class="col-sm-3 procard tw-rounded-3xl">
                <div class="card shadow position-relative" style="border-radius: 12px">
                    <!-- Peringkat Gizi dengan Tooltip -->
                    <div class="nutrition-badge position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="popover"
                        data-bs-trigger="hover" data-bs-html="true">
                        <span class="badge text-dark"
                            style="background-image: url('{{ asset('image/list.png') }}'); background-size: cover; background-position: center; padding: 10px; display: inline-block; cursor: pointer;"
                            data-bs-toggle="modal" data-bs-target="#nutritionModal">A+</span>
                    </div>

                    <!-- Konten Card -->
                    <img src="{{ asset('image/dummi2.webp') }}" alt="black watch" class="tw-rounded-t-2xl">
                    <div onclick="location.href='{{ route('dashboard') }}';"
                        class="card-footer border-top border-gray-300 p-4">
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

            <div class="col-sm-3 procard tw-rounded-3xl">
                <div class="card shadow position-relative" style="border-radius: 12px">
                    <!-- Peringkat Gizi dengan Tooltip -->
                    <div class="nutrition-badge position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="popover"
                        data-bs-trigger="hover" data-bs-html="true">
                        <span class="badge text-dark"
                            style="background-image: url('{{ asset('image/list.png') }}'); background-size: cover; background-position: center; padding: 10px; display: inline-block; cursor: pointer;"
                            data-bs-toggle="modal" data-bs-target="#nutritionModal">A+</span>
                    </div>

                    <!-- Konten Card -->
                    <img src="{{ asset('image/dummi2.webp') }}" alt="black watch" class="tw-rounded-t-2xl">
                    <div onclick="location.href='{{ route('dashboard') }}';"
                        class="card-footer border-top border-gray-300 p-4">
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
            <div class="col-sm-3 procard tw-rounded-3xl">
                <div class="card shadow position-relative" style="border-radius: 12px">
                    <!-- Peringkat Gizi dengan Tooltip -->
                    <div class="nutrition-badge position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="popover"
                        data-bs-trigger="hover" data-bs-html="true">
                        <span class="badge text-dark"
                            style="background-image: url('{{ asset('image/list.png') }}'); background-size: cover; background-position: center; padding: 10px; display: inline-block; cursor: pointer;"
                            data-bs-toggle="modal" data-bs-target="#nutritionModal">A+</span>
                    </div>

                    <!-- Konten Card -->
                    <img src="{{ asset('image/dummi2.webp') }}" alt="black watch" class="tw-rounded-t-2xl">
                    <div onclick="location.href='{{ route('dashboard') }}';"
                        class="card-footer border-top border-gray-300 p-4">
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
            <div class="col-sm-3 procard tw-rounded-3xl">
                <div class="card shadow position-relative" style="border-radius: 12px">
                    <!-- Peringkat Gizi dengan Tooltip -->
                    <div class="nutrition-badge position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="popover"
                        data-bs-trigger="hover" data-bs-html="true">
                        <span class="badge text-dark"
                            style="background-image: url('{{ asset('image/list.png') }}'); background-size: cover; background-position: center; padding: 10px; display: inline-block; cursor: pointer;"
                            data-bs-toggle="modal" data-bs-target="#nutritionModal">A+</span>
                    </div>

                    <!-- Konten Card -->
                    <img src="{{ asset('image/dummi2.webp') }}" alt="black watch" class="tw-rounded-t-2xl">
                    <div onclick="location.href='{{ route('dashboard') }}';"
                        class="card-footer border-top border-gray-300 p-4">
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
        <div class="text-center m-5">
            <button class="btn btn-white">Muat Lebih</button>
        </div>
    </section>
    <hr class="mx-auto" style="border-color: #141113; width: 90%; height: 2px">
    <section class="mt-1 mb-5">
        <h1 class="text-center fw-bold" style="font-size: 4rem; margin-top: 4rem">Rekomendasi Produk</h1>
        <p class="text-center text-gray-400 mb-5" style="font-size: 1.5rem;">Nikmati pilihan produk snack sehat terbaik
            yang
            dipilih khusus untuk Anda!</p>
        <div class="row justify-content-between" style="margin: 0 7rem">
            <div class="col-sm-3 procard tw-rounded-3xl">
                <div class="card shadow position-relative" style="border-radius: 12px">
                    <!-- Peringkat Gizi dengan Tooltip -->
                    <div class="nutrition-badge position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="popover"
                        data-bs-trigger="hover" data-bs-html="true">
                        <span class="badge text-dark"
                            style="background-image: url('{{ asset('image/list.png') }}'); background-size: cover; background-position: center; padding: 10px; display: inline-block; cursor: pointer;"
                            data-bs-toggle="modal" data-bs-target="#nutritionModal">A+</span>
                    </div>

                    <!-- Konten Card -->
                    <img src="{{ asset('image/dummi2.webp') }}" alt="black watch" class="tw-rounded-t-2xl">
                    <div onclick="location.href='{{ route('dashboard') }}';"
                        class="card-footer border-top border-gray-300 p-4">
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
            <div class="col-sm-3 procard tw-rounded-3xl">
                <div class="card shadow position-relative" style="border-radius: 12px">
                    <!-- Peringkat Gizi dengan Tooltip -->
                    <div class="nutrition-badge position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="popover"
                        data-bs-trigger="hover" data-bs-html="true">
                        <span class="badge text-dark"
                            style="background-image: url('{{ asset('image/list.png') }}'); background-size: cover; background-position: center; padding: 10px; display: inline-block; cursor: pointer;"
                            data-bs-toggle="modal" data-bs-target="#nutritionModal">A+</span>
                    </div>

                    <!-- Konten Card -->
                    <img src="{{ asset('image/dummi2.webp') }}" alt="black watch" class="tw-rounded-t-2xl">
                    <div onclick="location.href='{{ route('dashboard') }}';"
                        class="card-footer border-top border-gray-300 p-4">
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
            <div class="col-sm-3 procard tw-rounded-3xl">
                <div class="card shadow position-relative" style="border-radius: 12px">
                    <!-- Peringkat Gizi dengan Tooltip -->
                    <div class="nutrition-badge position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="popover"
                        data-bs-trigger="hover" data-bs-html="true">
                        <span class="badge text-dark"
                            style="background-image: url('{{ asset('image/list.png') }}'); background-size: cover; background-position: center; padding: 10px; display: inline-block; cursor: pointer;"
                            data-bs-toggle="modal" data-bs-target="#nutritionModal">A+</span>
                    </div>

                    <!-- Konten Card -->
                    <img src="{{ asset('image/dummi2.webp') }}" alt="black watch" class="tw-rounded-t-2xl">
                    <div onclick="location.href='{{ route('dashboard') }}';"
                        class="card-footer border-top border-gray-300 p-4">
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
            <div class="col-sm-3 procard tw-rounded-3xl">
                <div class="card shadow position-relative" style="border-radius: 12px">
                    <!-- Peringkat Gizi dengan Tooltip -->
                    <div class="nutrition-badge position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="popover"
                        data-bs-trigger="hover" data-bs-html="true">
                        <span class="badge text-dark"
                            style="background-image: url('{{ asset('image/list.png') }}'); background-size: cover; background-position: center; padding: 10px; display: inline-block; cursor: pointer;"
                            data-bs-toggle="modal" data-bs-target="#nutritionModal">A+</span>
                    </div>

                    <!-- Konten Card -->
                    <img src="{{ asset('image/dummi2.webp') }}" alt="black watch" class="tw-rounded-t-2xl">
                    <div onclick="location.href='{{ route('dashboard') }}';"
                        class="card-footer border-top border-gray-300 p-4">
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
            <div class="col-sm-3 procard tw-rounded-3xl">
                <div class="card shadow position-relative" style="border-radius: 12px">
                    <!-- Peringkat Gizi dengan Tooltip -->
                    <div class="nutrition-badge position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="popover"
                        data-bs-trigger="hover" data-bs-html="true">
                        <span class="badge text-dark"
                            style="background-image: url('{{ asset('image/list.png') }}'); background-size: cover; background-position: center; padding: 10px; display: inline-block; cursor: pointer;"
                            data-bs-toggle="modal" data-bs-target="#nutritionModal">A+</span>
                    </div>

                    <!-- Konten Card -->
                    <img src="{{ asset('image/dummi2.webp') }}" alt="black watch" class="tw-rounded-t-2xl">
                    <div onclick="location.href='{{ route('dashboard') }}';"
                        class="card-footer border-top border-gray-300 p-4">
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
        <div class="text-center mt-5">
            <button class="btn btn-white">Muat Lebih</button>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const img = document.querySelector('.rolling');

                img.addEventListener('animationend', function () {
                    img.classList.add('done');
                });
            });
        </script>

    </section>
    <!-- 
<div class="category-container container">
    <h1 class="fw-bold text-center">Cari berdasarkan Kategori</h1>
    <div class="row m-5">
        <div class="col-6 col-md-5">
            <div class="category-item">
                <img src="{{ asset('image/hero.png') }}" style="height: 100px; width: 150px;" alt="Snack" class="img-fluid">
                <p class="text-center">Makanan</p>
            </div>
        </div>
        <div class="col-6 col-md-7">
            <div class="category-item">
                <img src="https://via.placeholder.com/150x100" alt="Minuman" class="img-fluid">
                <p class="text-center">Minuman</p>
            </div>
        </div>
        <div class="col-6 col-md-7">
            <div class="category-item">
                <img src="https://via.placeholder.com/150x100" alt="Makanan" class="img-fluid">
                <p class="text-center">Buah & Sayur</p>
            </div>
        </div>
        <div class="col-6 col-md-5">
            <div class="category-item">
                <img src="https://via.placeholder.com/150x100" alt="Suplemen" class="img-fluid">
                <p class="text-center">Bahan Makanan</p>
            </div>
        </div>
    </div>
</div> --->

    <div class="modal fade" id="nutritionModal" tabindex="-1" aria-labelledby="nutritionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nutritionModalLabel">Informasi Peringkat Gizi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Konten Tabel -->
                    <table class='table table-bordered text-center'>
                        <thead>
                            <tr>
                                <th>Peringkat</th>
                                <th>Kandungan Gula & Natrium</th>
                                <th>Rekomendasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A+</td>
                                <td>
                                    <strong>Gula:</strong> ≤ 5g/100g<br>
                                    <strong>Natrium:</strong> ≤ 120mg/100g
                                </td>
                                <td>Sangat dianjurkan untuk diet sehat, bebas gula tambahan, dan rendah natrium.</td>
                            </tr>
                            <tr>
                                <td>B</td>
                                <td>
                                    <strong>Gula:</strong> 6-10g/100g<br>
                                    <strong>Natrium:</strong> 121-200mg/100g
                                </td>
                                <td>Baik untuk konsumsi harian, dengan kandungan gula dan natrium rendah.</td>
                            </tr>
                            <tr>
                                <td>C</td>
                                <td>
                                    <strong>Gula:</strong> 11-15g/100g<br>
                                    <strong>Natrium:</strong> 201-300mg/100g
                                </td>
                                <td>Konsumsi dengan hati-hati, gula dan natrium sedang.</td>
                            </tr>
                            <tr>
                                <td>D</td>
                                <td>
                                    <strong>Gula:</strong> > 15g/100g<br>
                                    <strong>Natrium:</strong> > 300mg/100g
                                </td>
                                <td>Konsumsi dalam jumlah terbatas, kadar gula dan natrium tinggi.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>