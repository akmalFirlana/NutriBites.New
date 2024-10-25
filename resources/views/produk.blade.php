<x-app-layout>
    <div class="link d-block mt-20 tw-pt-5 ms-20">
        <a href="{{ route('dashboard') }}" class="text-muted me-2">Beranda</a> >
        <a href="{{ route('kategori') }}" class="text-muted ms-2">Kripik Kacang</a>
    </div>
    <div class="row pt-3 px-5">
        <div class="main col-md-8">
            <div class="section tw-pt-10 pb-5">
                <div class="header row mt-3 mb-5 mx-5">
                    <div class="img-container col-md-4">
                        <div class="main_img" style="position: sticky; top: 135px">
                            <img src="{{ asset('image/nangka.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-8 hero-desk tw-mt-20">
                        <h1 class="title-text text-3xl fw-bold">Kacang Pede</h1>
                        <div class="d-flex mt-1 fs-6">
                            <span class="badge bg-success ms-2 me-2">Terjual 4 rb.</span> |
                            <i class='bx bxs-star ms-2' style='color:#d0e12b'></i>
                            <span class="font-semibold text-gray-700">4.7 (126 Rating)</span>
                        </div>

                        <div class="harga mt-4 mb-4">
                            <h1 class="price me-3 mt-3 fs-2 font-extrabold">Rp 40.000</h1>
                            <h1 class="discount text-decoration-line-through text-muted"><span
                                    class="badge bg-success mt-1">20%</span><span class="text-gray-400 fw-bold ms-2">Rp
                                    50.000 </span></h1>
                        </div>
                        <hr class="bawah">
                        <div class="deskripsi py-2">
                            <h4 class="fw-bold fs-5">Deskripsi</h4>
                            <p>Lorem ipsum dolor sit ametdgdgdfgdhrdrh consectetur adipisicing elit.
                                Lorem ipsum dolor sit amet cordggrgnsectetur adipisicing elit.
                                Lorem ipsum dolor sit amet cordgdrgrdgdrnsectetur adipisicing elit.
                            </p>
                        </div>
                        <hr class="bawah">
                        <!-- <p>Varian:</p>
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
                        </div> -->
                        <div class="toko-container row mx-2 pt-2">
                            <div class="img col-md-2">
                                <img src="{{ asset('image/dummi.jpg') }}" alt="" class="icon-toko" style="width: 60px;">
                            </div>
                            <div class="link-toko col-md-9">
                                <p class="fs-5 nama-toko pt-1 fw-bold "
                                    style="display: inline-flex; align-items: center; margin: 0; padding: 0; line-height: 0.8;">
                                    <img src="{{ asset('image/icon_toko.png') }}"
                                        style="width: 20px; display: inline-flex; margin: 0  5px;">
                                    Nama Toko
                                </p>
                                <p class="status text-muted" style="line-height: 0.2; font-weight: semibold; margin: 0 5px">Online <span class="fw-bold">1 Jam lalu</span></p>
                                <div class="btn fw-bold mx-3 border-success w-72 mt-3">Ikuti Toko</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="contain  mx-5">
                    <!-- Tabs Navigation -->
                    <div class="tabs d-flex justify-content-around">
                        <button class="tab-link active" onclick="openTab(event, 'productDetails')">Detail
                            Produk</button>
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
                                    <h2 class="fs-6 fw-bold">Deskripsi Produk</h2>
                                    <p class="text-muted">Produk ini adalah makanan ringan sehat yang terbuat dari bahan
                                        alami
                                        dan
                                        bergizi. Cocok untuk kamu yang ingin menjaga pola makan dengan makanan yang
                                        sehat dan
                                        praktis.
                                    </p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h2 class="fs-6 fw-bold">Komposisi</h2>
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
                                    <h2 class="fs-6 fw-bold">Informasi Gizi</h2>
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
                            <h2>Ulasan <span class="text-muted fs-6">(123)</span></h2>

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
                                <h1 class="fs-5 fw-bold my-2">Tedeus Judas</h1>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem
                                    ipsum dolor
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
                                <h1 class="fs-5 fw-bold my-2">Tedeus Judas</h1>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem
                                    ipsum dolor
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
                                <h1 class="fs-5 fw-bold my-2">Tedeus Judas</h1>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem
                                    ipsum dolor
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
                                <h1 class="fs-5 fw-bold my-2">Tedeus Judas</h1>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem
                                    ipsum dolor
                                    sit amet
                                    consectetur adipisicing elit</p>

                                <p class="text-muted fw-bold">17 Agustus 2045</p>
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-white fw-bold py-2 px-5 fs-6 rounded-pill"
                                    style="border: #000 1px solid">Muat
                                    Lebih</button>
                            </div>
                        </div>
                    </div>

                    <div id="faqs" class="tab-content">
                        <div class="ulasan-header">
                            <h2>Pertanyaan <span class="text-muted fs-6">(12)</span></h2>

                        </div>
                        <div class="faq-ulasan row justify-content-around">
                            <div class="card-ulasan border rounded px-5 py-3 mb-4" style="flex-basis:48%">
                                <div class="d-flex align-items-center mb-2">
                                    <i class='bx bxs-user-circle' style='font-size:24px; color:#007bff'></i>
                                    <h1 class="fs-5 pt-2 fw-bold mx-2">Samantha D. <i class="bx bxs-check-circle"
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
                                <p class="text-muted ms-5">"Terima kasih atas pertanyaannya. Bahan kaos ini sangat tahan
                                    lama
                                    dan tidak
                                    mudah
                                    rusak bahkan setelah dicuci berkali-kali. Pastikan mencuci dengan air dingin dan
                                    jangan
                                    menggunakan
                                    pemutih untuk menjaga kualitas bahan."</p>
                                <a href="#" class="fw-bold text-decoration-none">Lihat Lebih Banyak</a>
                            </div>
                            <div class="card-ulasan border rounded px-5 py-3 mb-4" style="flex-basis:48%">
                                <div class="d-flex align-items-center mb-2">
                                    <i class='bx bxs-user-circle' style='font-size:24px; color:#007bff'></i>
                                    <h1 class="fs-5 pt-2 fw-bold mx-2">Samantha D. <i class="bx bxs-check-circle"
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
                                <p class="text-muted ms-5">"Terima kasih atas pertanyaannya. Bahan kaos ini sangat tahan
                                    lama
                                    dan tidak
                                    mudah
                                    rusak bahkan setelah dicuci berkali-kali. Pastikan mencuci dengan air dingin dan
                                    jangan
                                    menggunakan
                                    pemutih untuk menjaga kualitas bahan."</p>
                                <a href="#" class="fw-bold text-decoration-none">Lihat Lebih Banyak</a>
                            </div>
                            <div class="card-ulasan border rounded px-5 py-3 mb-4" style="flex-basis:48%">
                                <div class="d-flex align-items-center mb-2">
                                    <i class='bx bxs-user-circle' style='font-size:24px; color:#007bff'></i>
                                    <h1 class="fs-5 pt-2 fw-bold mx-2">Samantha D. <i class="bx bxs-check-circle"
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
                                <p class="text-muted ms-5">"Terima kasih atas pertanyaannya. Bahan kaos ini sangat tahan
                                    lama
                                    dan tidak
                                    mudah
                                    rusak bahkan setelah dicuci berkali-kali. Pastikan mencuci dengan air dingin dan
                                    jangan
                                    menggunakan
                                    pemutih untuk menjaga kualitas bahan."</p>
                                <a href="#" class="fw-bold text-decoration-none">Lihat Lebih Banyak</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="side col-md-4 ">
            <div class="wrapper px-5" style="position: sticky; top: 130px">
                <div class="upper-card rounded mb-3" style="padding: 10px; margin: 0;
                background: rgb(0,164,47);
                background: linear-gradient(90deg, rgba(0,164,47,1) 28%, rgba(6,210,64,1) 95%);">
                    <p class="fw-bold text-white ms-2">Beli Jajan</p>
                </div>

                <div class="lower-card border-1 rounded p-3 ">
                    <p class="font-extrabold pb-2">Atur Jumlah Dan Catatan </p>
                    <div class="produk d-inline-flex">
                        <img class="img-fluid" src="{{ asset('image/hero.png') }}" alt=""
                            style=" height: 56px; width: 56px;">
                        <p class="d-flex fs-5 ms-2">Nama Produk</p>

                    </div>
                    <hr>
                    <div class="checkout d-inline-flex mt-3">
                        <div class="input-number-container">
                            <button type="button" class="btn-decrement px-1" onclick="decrement()">−</button>
                            <input type="number" id="number-input" value="1" min="0" class="input-number" />
                            <button type="button" class="btn-increment px-1" onclick="increment()">+</button>
                        </div>
                        <p class="my-auto ms-3 fw-bold">Stok: sisa</p>
                    </div>

                    <div class="harga d-inline-flex justify-content-between w-100 mt-3">
                        <p class="text-muted my-auto fw-bold">Subtotal</p>
                        <p class=""><span class="fw-bold text-sm text-gray-400 text-decoration-line-through"
                                style="line-height: 0;">Rp
                                10.000</span><br>
                            <span class="fw-bold fs-5" style="line-height: 0;">Rp 20.000</span>
                        </p>
                    </div>

                    <div class="action justify-content-between d-flex mt-3">
                        <button class="btn border border-success fw-bold"
                            style="width: 48%; padding: 6px!important;">Beli Langsung</button>
                        <button class="btn btn-success fw-bold" style="width: 48%; padding: 6px!important;">+
                            Keranjang</button>
                    </div>

                    <div class="footer_action text-muted d-flex justify-content-evenly px-1 mt-3 fs-6 fw-bold">
                        <a href="" class="link_footer"><i class='bx bx-conversation'></i> Chat</a> |
                        <a href="" class="link_footer"> <i class='bx bx-heart'></i> wishlist</a> |
                        <a href="" class="link_footer"><i class='bx bx-share-alt'></i> Bagikan</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="p-5">

            </div>
        </div>
    </div>
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

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
</x-app-layout>