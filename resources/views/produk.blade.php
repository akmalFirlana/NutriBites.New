<x-app-layout>
    <div class="link d-block tw-mt-20 tw-pt-5 tw-ms-20">
        <a href="{{ route('dashboard') }}" class="text-muted me-2">Beranda</a> >
        <a href="{{ route('kategori') }}" class="text-muted ms-2">Kripik Kacang</a>
    </div>
    <div class="section tw-pt-10 pb-5">
        <div class="header row mt-3 mb-5">
            <div class="col-md-2 d-flex flex-column justify-content-end align-items-end sub_img">
                <img src="{{ asset('image/nangka.jpeg') }}" alt="" class="sideimg" style="margin-top: 0px!important">
                <img src="{{ asset('image/nangka.jpeg') }}" alt="" class="sideimg">
                <img src="{{ asset('image/nangka.jpeg') }}" alt="" class="sideimg">
            </div>
            <div class="col-md-4 main_img">
                <img src="{{ asset('image/nangka.jpeg') }}" alt="" class="mainimg tw-bg-cover tw-bg-center"
                    style="border-radius: 20px; border: 1px solid #d0e12b; height: 440px; width: 400px;">
            </div>

            <div class="col-md-6 hero-desk tw-mt-20">
                <h1 class="title-text tw-text-5xl fw-bold">Kacang Pede</h1>
                <div class="d-flex mt-4">
                    <i class='bx bxs-star bx-lg' style='color:#d0e12b'></i>
                    <i class='bx bxs-star bx-lg' style='color:#d0e12b'></i>
                    <i class='bx bxs-star bx-lg' style='color:#d0e12b'></i>
                    <i class='bx bxs-star bx-lg' style='color:#d0e12b'></i>
                    <i class='bx bxs-star-half bx-lg' style='color:#d0e12b'></i>
                    <span class="badge bg-success ms-2">4.7</span>
                </div>

                <div class="harga d-flex mt-4">
                    <h1 class="price me-3 fs-2">Rp 40.000</h1>
                    <h1 class="discount fs-3 text-decoration-line-through text-muted">Rp 50.000 <span
                            class="badge bg-success ms-2">20%</span></h1>
                </div>
                <p class="desc mt-4 text-muted fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem
                    ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur
                    adipisicing elit.</p>
                <hr class="bawah">
                <div class="jumlah">
                    <label>Jumlah</label>
                    <div class="input-number-container">
                        <button type="button" class="btn-decrement" onclick="decrement()">−</button>
                        <input type="number" id="number-input" value="1" min="0" class="input-number" />
                        <button type="button" class="btn-increment" onclick="increment()">+</button>
                    </div>
                </div>
                <hr class="bawah">
                <p>Varian:</p>
                <div class="d-flex">
                    <div class="button-group">
                        <input type="radio" id="svelt" name="frameworks" checked="" />
                        <label for="svelt">Manis</label>
                    </div>

                    <div class="button-group">
                        <input type="radio" id="react" name="frameworks" />
                        <label for="react">Original</label>
                    </div>

                    <div class="button-group">
                        <input type="radio" id="vue" name="frameworks" />
                        <label for="vue">Pedas</label>
                    </div>
                    <div class="button-group">
                        <input type="radio" id="vua" name="frameworks" />
                        <label for="vua">Asam</label>
                    </div>
                    <div class="button-group">
                        <input type="radio" id="vui" name="frameworks" />
                        <label for="vui">coklat</label>
                    </div>
                </div>
                <div class="action row mt-5 text-center d-flex justify-content-intebetween">
                    <div class="col-md-4"></div>
                    <button type="submit" class="btn btn-success mt-3 ms-3 col-md-5 rounded-pill px-2 py-3 fs-5"
                        onclick="window.location.href='{{ route('checkout') }}'">Beli Sekarang</button>

                </div>

            </div>

        </div>

        <div class="contain">
            <!-- Tabs Navigation -->
            <div class="tabs d-flex justify-content-around">
                <button class="tab-link active" onclick="openTab(event, 'productDetails')">Detail Produk</button>
                <button class="tab-link" onclick="openTab(event, 'ratingReviews')">Rating & Ulasan</button>
                <button class="tab-link" onclick="openTab(event, 'faqs')">FAQs</button>
            </div>

            <!-- Tabs Content -->
            <div id="productDetails" class="tab-content" style="display: block;">
                <div class="product-detail container my-5">
                    <!-- Nama Produk -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1 class="fw-bold mb-4">Nama Produk</h1>
                        </div>
                    </div>

                    <!-- Deskripsi dan Komposisi Produk -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <h2 class="fs-4 fw-bold">Deskripsi Produk</h2>
                            <p class="text-muted">Produk ini adalah makanan ringan sehat yang terbuat dari bahan alami
                                dan
                                bergizi. Cocok untuk kamu yang ingin menjaga pola makan dengan makanan yang sehat dan
                                praktis.
                            </p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h2 class="fs-4 fw-bold">Komposisi</h2>
                            <ul class="list-unstyled text-muted">
                                <li>- Biji Gandum Utuh</li>
                                <li>- Gula Kelapa</li>
                                <li>- Garam Laut</li>
                                <li>- Minyak Zaitun</li>
                                <li>- Kacang Almond</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Informasi Gizi -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <h2 class="fs-4 fw-bold">Informasi Gizi</h2>
                            <p class="text-muted">Per sajian (100g):</p>
                            <ul class="list-unstyled text-muted">
                                <li>- Kalori: 250 kkal</li>
                                <li>- Lemak: 12g</li>
                                <li>- Karbohidrat: 30g</li>
                                <li>- Protein: 6g</li>
                                <li>- Serat: 5g</li>
                            </ul>
                        </div>
                        <!-- Foto Informasi Gizi -->
                        <div class="col-md-6 mb-4 text-center">

                            <p class="text-muted mt-2">Informasi Gizi Lengkap</p>
                            <p>-</p>
                        </div>
                    </div>
                </div>

            </div>

            <div id="ratingReviews" class="tab-content">
                <div class="ulasan-header">
                    <h2>Ulasan <span class="text-muted fs-4">(123)</span></h2>

                </div>
                <div class="colom-ulasan row justify-content-around">
                    <div class="card-ulasan mt-4 border rounded-4 px-5 py-2" style="flex-basis:48%">
                        <div class="rating">
                            <div class="d-flex mt-4">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                            </div>
                        </div>
                        <h1 class="fs-3 fw-bold my-2">Tedeus Judas</h1>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor
                            sit amet
                            consectetur adipisicing elit</p>

                        <p class="text-muted fw-bold">17 Agustus 2045</p>
                    </div>
                    <div class="card-ulasan mt-4 border rounded-4 px-5 py-2" style="flex-basis:48%">
                        <div class="rating">
                            <div class="d-flex mt-4">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                            </div>
                        </div>
                        <h1 class="fs-3 fw-bold my-2">Tedeus Judas</h1>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor
                            sit amet
                            consectetur adipisicing elit</p>

                        <p class="text-muted fw-bold">17 Agustus 2045</p>
                    </div>
                    <div class="card-ulasan mt-4 border rounded-4 px-5 py-2" style="flex-basis:48%">
                        <div class="rating">
                            <div class="d-flex mt-4">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                            </div>
                        </div>
                        <h1 class="fs-3 fw-bold my-2">Tedeus Judas</h1>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor
                            sit amet
                            consectetur adipisicing elit</p>

                        <p class="text-muted fw-bold">17 Agustus 2045</p>
                    </div>
                    <div class="card-ulasan mt-4 border rounded-4 px-5 py-2" style="flex-basis:48%">
                        <div class="rating">
                            <div class="d-flex mt-4">
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star' style='color:#d0e12b'></i>
                                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                            </div>
                        </div>
                        <h1 class="fs-3 fw-bold my-2">Tedeus Judas</h1>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor
                            sit amet
                            consectetur adipisicing elit</p>

                        <p class="text-muted fw-bold">17 Agustus 2045</p>
                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-white fw-bold py-2 px-5 fs-4 rounded-pill"
                            style="border: #000 1px solid">Muat
                            Lebih</button>
                    </div>
                </div>
            </div>

            <div id="faqs" class="tab-content">
                <div class="ulasan-header">
                    <h2>Pertanyaan <span class="text-muted fs-4">(12)</span></h2>

                </div>
                <div class="faq-ulasan row justify-content-around">
                    <div class="card-ulasan border rounded px-5 py-3 mb-4" style="flex-basis:48%">
                        <div class="d-flex align-items-center mb-2">
                            <i class='bx bxs-user-circle' style='font-size:24px; color:#007bff'></i>
                            <h1 class="fs-3 pt-2 fw-bold mx-2">Samantha D. <i class="bx bxs-check-circle"
                                    style="color:green"></i>
                            </h1>
                        </div>
                        <p class="">"Apakah bahan kaos ini mudah rusak setelah dicuci beberapa kali?"</p>
                        <p class="text-muted fw-bold">Posted on August 14, 2023</p>


                        <div class="d-flex align-items-center mt-4 ms-4">
                            <i class='bx bxs-store' style='font-size:24px; color:#007bff'></i>
                            <h1 class="fs-5 fw-bold mx-2">Penjual <i class="bx bxs-check-circle"
                                    style="color:green"></i></h1>
                        </div>
                        <p class="text-muted ms-5">"Terima kasih atas pertanyaannya. Bahan kaos ini sangat tahan lama
                            dan tidak
                            mudah
                            rusak bahkan setelah dicuci berkali-kali. Pastikan mencuci dengan air dingin dan jangan
                            menggunakan
                            pemutih untuk menjaga kualitas bahan."</p>
                        <a href="#" class="fw-bold text-decoration-none">Lihat Lebih Banyak</a>
                    </div>
                    <div class="card-ulasan border rounded px-5 py-3 mb-4" style="flex-basis:48%">
                        <div class="d-flex align-items-center mb-2">
                            <i class='bx bxs-user-circle' style='font-size:24px; color:#007bff'></i>
                            <h1 class="fs-3 pt-2 fw-bold mx-2">Samantha D. <i class="bx bxs-check-circle"
                                    style="color:green"></i>
                            </h1>
                        </div>
                        <p class="">"Apakah bahan kaos ini mudah rusak setelah dicuci beberapa kali?"</p>
                        <p class="text-muted fw-bold">Posted on August 14, 2023</p>


                        <div class="d-flex align-items-center mt-4 ms-4">
                            <i class='bx bxs-store' style='font-size:24px; color:#007bff'></i>
                            <h1 class="fs-5 fw-bold mx-2">Penjual <i class="bx bxs-check-circle"
                                    style="color:green"></i></h1>
                        </div>
                        <p class="text-muted ms-5">"Terima kasih atas pertanyaannya. Bahan kaos ini sangat tahan lama
                            dan tidak
                            mudah
                            rusak bahkan setelah dicuci berkali-kali. Pastikan mencuci dengan air dingin dan jangan
                            menggunakan
                            pemutih untuk menjaga kualitas bahan."</p>
                        <a href="#" class="fw-bold text-decoration-none">Lihat Lebih Banyak</a>
                    </div>
                    <div class="card-ulasan border rounded px-5 py-3 mb-4" style="flex-basis:48%">
                        <div class="d-flex align-items-center mb-2">
                            <i class='bx bxs-user-circle' style='font-size:24px; color:#007bff'></i>
                            <h1 class="fs-3 pt-2 fw-bold mx-2">Samantha D. <i class="bx bxs-check-circle"
                                    style="color:green"></i>
                            </h1>
                        </div>
                        <p class="">"Apakah bahan kaos ini mudah rusak setelah dicuci beberapa kali?"</p>
                        <p class="text-muted fw-bold">Posted on August 14, 2023</p>


                        <div class="d-flex align-items-center mt-4 ms-4">
                            <i class='bx bxs-store' style='font-size:24px; color:#007bff'></i>
                            <h1 class="fs-5 fw-bold mx-2">Penjual <i class="bx bxs-check-circle"
                                    style="color:green"></i></h1>
                        </div>
                        <p class="text-muted ms-5">"Terima kasih atas pertanyaannya. Bahan kaos ini sangat tahan lama
                            dan tidak
                            mudah
                            rusak bahkan setelah dicuci berkali-kali. Pastikan mencuci dengan air dingin dan jangan
                            menggunakan
                            pemutih untuk menjaga kualitas bahan."</p>
                        <a href="#" class="fw-bold text-decoration-none">Lihat Lebih Banyak</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openTab(evt, tabName) {
                // Sembunyikan semua tab-content
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tab-content");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Hapus class 'active' dari semua tab-link
                tablinks = document.getElementsByClassName("tab-link");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Tampilkan tab yang dipilih, tambahkan class 'active' pada tab-link yang diklik
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            function increment() {
                const input = document.getElementById('number-input');
                input.value = parseInt(input.value) + 1;
            }

            function decrement() {
                const input = document.getElementById('number-input');
                if (input.value > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            }

        </script>
    </div>
</x-app-layout>