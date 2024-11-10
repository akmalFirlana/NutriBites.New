<x-app-layout>
    <section class="bg-light mt-5 min-h-screen">
        <div class="wish text-center position-fixed tw-w-100 mt-5">
            <i class='bx bx-heart text-danger' style='font-size:80px'></i>
            <h1 class="text-center text-danger">Wishlist Kamu</h1>
        </div>

        <div class="container pb-5">
            <div class="row pt-72">
                <div class="col-lg-12 tw-mt-72">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-1">Favorit</h4>
                            <hr class="mb-3">
                            @if ($wishlists->isEmpty())
                                <p class="text-center">Wishlist Anda kosong.</p>
                            @else
                                @foreach ($wishlists as $wishlist)
                                    <div class="row gy-3 mb-4 border-bottom">
                                        <div class="col-lg-5">
                                            <div class="me-lg-5">
                                                <div class="d-flex">
                                                    @php
                                                        $images = json_decode($wishlist->product->images, true); // Mengubah JSON menjadi array
                                                    @endphp

                                                    @if (!empty($images) && isset($images[0]))
                                                        <img src="{{ asset('storage/' . $images[0]) }}" alt="Product"
                                                        class="border rounded me-3"
                                                        style="width: 96px; height: 96px;">
                                                    @else
                                                        <span>No Image</span>
                                                    @endif
                                                    
                                                    <div class="">
                                                        <a href="#"
                                                            class="nav-link">{{ $wishlist->product->name }}</a>
                                                        <p class="text-muted fs-5">Varian:
                                                            {{ $wishlist->product->variant }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                            <div class="me-5">
                                                <text class="h6">Sisa Stok:</text> <br />
                                                <small
                                                    class="text-muted text-nowrap">{{ $wishlist->product->stock }}</small>
                                            </div>
                                            <div class="ms-5">
                                                <text class="h6 text-decoration-line-through">Rp
                                                    {{ number_format($wishlist->product->price * 1.25, 0, ',', '.') }}<span
                                                        class="badge bg-success ms-2">10%</span></text> <br />
                                                <small class="text-muted text-nowrap"> Rp
                                                    {{ number_format($wishlist->product->price, 0, ',', '.') }}</small>
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                            <div class="float-md-end">
                                                <a href="{{ route('cart.add', $wishlist->product->id) }}"
                                                    class="btn btn-success border px-2 icon-hover-primary">+
                                                    Keranjang</a>
                                                <button onclick="removeFromWishlist('{{ $wishlist->id }}')"
                                                    class="btn btn-light border text-danger icon-hover-danger">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-app-layout>
