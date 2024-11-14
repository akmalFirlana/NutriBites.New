<x-app-layout>
    <div class="container">
        <div class="btn fw-bold mx-3 border-success w-72 my-3">Kunjungi Toko {{ $user->name }}</div>
        <div class="toko-success p-3 border rounded row">
            <div class="col-md-1 ps-auto ms-auto pe-0">
                <img src="{{ asset('image/icon_toko.png') }}"
                    style="width: 100px; display: inline-flex; margin-right: 5px; margin: 0;">
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold" style="margin: 0; padding: 0;">{{ $user->name }}</h3>
                <p class="gudang">
                    Kota
                </p>
                <div class="d-flex gap-2">
                    <button class="btn btn-success py-1 fw-bold px-4">
                        Chat Penjual
                    </button>
                    <button class="btn border-success border py-2  px-2 d-flex align-items-center">
                        <i class='bx bx-store text-xl text-success'></i> </button>
                    <button class="btn border-success border py-2  px-2 d-flex align-items-center">
                        <i class='bx bx-share-alt text-xl text-success'></i> </button>
                </div>
            </div>
            <div class="col-md-5 d-flex gap-3 ps-5">
                <div class="d-flex flex-column align-items-center">
                    <p class="d-flex fs-5 fw-bolder">45 📦</p>
                    <p class="d-flex text-sm text-gray-400 ">Jumlah Produk</p>
                </div>
                <div class="vertical-line px-0"></div>
                <div class="d-flex flex-column align-items-center">
                    <p class="d-flex fs-5 fw-bolder">45 📦</p>
                    <p class="d-flex text-sm text-gray-400">Produk Terjual</p>
                </div>
                <div class="vertical-line px-0"></div>
                <div class="d-flex flex-column align-items-center">
                    <p class="d-flex fs-5 fw-bolder">45</p>
                    <p class="d-flex text-sm text-gray-400">Rating & ulasan</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-2 pe-0 mt-3 procard overflow-hidden">
                    <div class="product-card border mb-4 position-relative rounded-md shadow-md" style="width: 188px;">
                        <div class="img-wrapper">
                            @php
                                $images = json_decode($product->images, true); // Mengubah JSON menjadi array
                            @endphp
                            @if (!empty($images) && isset($images[0]))
                                <img src="{{ asset('storage/' . $images[0]) }}" alt="Product"
                                    class="product-img mx-auto">
                            @else
                                <span>No Image</span>
                            @endif

                            <div class="hover-options">
                                <button class="action-btn" onclick="addToCart('{{ $product->id }}')"><i
                                        class='bx bx-cart-add'></i></button>
                                <button class="action-btn" onclick="addToWishlist('{{ $product->id }}')"><i
                                        class='bx bx-heart'></i></button>
                            </div>
                        </div>
                        <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="product-card-link">
                            <div class="pointer-event card-footer border-top border-gray-300 pt-1"
                                style="padding: 0; margin: 0;"
                                onclick="window.location.href='{{ route('product.detail', ['id' => $product->id]) }}'">
                                <img src="{{ asset('image/badge1.png') }}" style="width: 100px; margin: 0; padding: 0;">
                                <div class="keterangan ps-2 pe-2" style="padding: 0; margin: 0;">
                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="product-name"
                                        style="margin: 0; padding: 0;line-height: 0.8;">{{ $product->name }}</a>
                                    <div class="" style="margin: 0; padding: 0;">
                                        <span class="mb-0 text-gray me-2 fs-6 fw-bold d-block"
                                            style="line-height: 0.8; margin: 0; padding: 0;">Rp
                                            {{ number_format($product->price, 0, ',', '.') }}</span>
                                        <span class="text-decoration-line-through"
                                            style="color:gray; line-height: 0; font-size: 0.8rem; margin: 0; padding: 0;">Rp
                                            {{ number_format($product->price * 1.25, 0, ',', '.') }}</span>
                                    </div>
                                    <p class="text-muted"
                                        style="display: inline-flex; align-items: center; margin: 0; padding: 0;">
                                        <img src="{{ asset('image/icon_toko.png') }}"
                                            style="width: 20px; display: inline-flex; margin-right: 5px; margin: 0;">
                                        {{ $product->user->name }}
                                    </p>

                                    <div class="d-flex" style="margin: 0; padding: 0;">
                                        <i class='bx bxs-star' style='color:#d0e12b; margin: 0; padding: 0;'></i>
                                        <span class="badge bg-success ms-2"
                                            style="margin: 0; padding: 0;">{{ $product->rating }}</span> |
                                        <span class="badge bg-success ms-2" ">{{ $product->sold }} Terjual</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
 @endforeach
                                    </div>
                                </div>
                                <style>
                                    .vertical-line {
                                        width: 1px;
                                        /* Ketebalan garis */
                                        height: 80%;
                                        /* Tinggi garis */
                                        background-color: rgb(172, 172, 172);
                                        /* Warna garis */
                                        margin: 0 10px;
                                        /* Margin samping */
                                    }
                                </style>
</x-app-layout>
