<!--========== CONTENTS ==========-->
<x-app-penjual>
    <section class="row">
        <h1 class="fw-bold fs-3 mt-2 mb-3 col-md-8">Kelola Produk</h1>
        <!-- Button to Open the Add Product Modal -->
        <button type="button" class="btn btn-primary mb-3" onclick="window.location='{{ route('admin.upload') }}'">
            Tambah Produk
        </button>
        <div class="header__search col-md-2 m-2">
            <input type="search" placeholder="Cari Produk" class="header__input">
            <i class='bx bx-search header__icon mt-1'></i>
        </div>
        <div class="container pb-5 mb-3">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th class="text-center">Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                                    @if($product->user_id == auth()->id())
                                                    <tr>
                                                        <td>@php
                                                            $images = json_decode($product->images, true); // Mengubah JSON menjadi array
                                                         @endphp

                                                            @if(!empty($images) && isset($images[0]))
                                                                <img src="{{ asset('storage/' . $images[0]) }}" alt="Product" class="product-img mx-auto"
                                                                    style="width: 40px;">
                                                            @else
                                                                <span>No Image</span>
                                                            @endif
                                                        </td>

                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ implode(', ', explode(',', $product->category)) }}</td>
                                                        <td>{{ $product->description }}</td>
                                                        <td>{{ $product->stock }}</td>
                                                        <td>{{ number_format($product->price, 2) }}</td>
                                                        <td>
                                                            <!-- Edit Button -->
                                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                                data-bs-target="#editProductModal{{ $product->id }}">
                                                                <i class='bx bx-edit'></i>
                                                            </button>
                                                            <!-- Delete Button -->
                                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                                data-bs-target="#deleteProductModal{{ $product->id }}">
                                                                <i class='bx bx-trash'></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <!-- Edit Product Modal -->
                                                    <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1"
                                                        aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{ route('products.update', $product->id) }}" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editProductModalLabel{{ $product->id }}">Edit Produk
                                                                        </h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        @include('admin.produk._form', ['product' => $product])
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Delete Product Modal -->
                                                    <div class="modal fade" id="deleteProductModal{{ $product->id }}" tabindex="-1"
                                                        aria-labelledby="deleteProductModalLabel{{ $product->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteProductModalLabel{{ $product->id }}">Hapus
                                                                            Produk</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Apakah anda yakin ingin menghapus produk
                                                                            <strong>{{ $product->name }}</strong>?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.produk._form', ['product' => null])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-penjual>