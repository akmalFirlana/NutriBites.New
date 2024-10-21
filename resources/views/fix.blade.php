<x-app-layout>
<div class="col-sm-3 col-md-2 procard rounded-3xl">
    <div class="product-card shadow position-relative">
        <!-- Konten Card -->
        <div class="img-wrapper">
            <img src="{{ asset('image/hero.png')}}" class="product-img">

            <!-- Hover Action Wrapper -->
            <div class="hover-options">
                <button class="action-btn">Add to
                    cart</button>
                <button class="action-btn" >Wishlist</button>
            </div>
        </div>

        <div class="card-footer border-top border-gray-300 p-4">
            <a href="#" class="h5">nama produk</a>
            <h3 class="h6 fw-light text-gray mt-2">deskripsi produk</h3>

            <div class="d-flex mt-3">
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                <span class="badge bg-success ms-2">rating produk</span>
            </div>

            <div class="d-flex mt-3">
                <span class="mb-0 text-gray me-2 fs-5">Rp
                    99.000</span>
                <span class="text-decoration-line-through fs-6" style="color:gray">Rp
                    100.000</span>
            </div>
        </div>
    </div>
</div>

</x-app-layout>