<!--========== CONTENTS ==========-->
<x-app-penjual>
    <section class="row">
        <h1 class="fw-bold fs-3 mt-2 mb-3 col-md-8">Kelola Produk</h1>
        <button type="button" class="btn btn-primary mb-3" onclick="window.location='{{ route('admin.upload') }}'">
            Tambah Produk
        </button>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container pb-3 mb-3">
            <h1 class="fw-bold fs-5 pt-3 mb-3">Produk Kamu</h1>
            <table class="table table-s align-middle">
                <thead>
                    <tr>
                        <th class="text-center">Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Penjualan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($products as $product)
                        @if ($product->user_id == auth()->id())
                            <tr>
                                <td>@php
                                    $images = json_decode($product->images, true); 
                                @endphp

                                    @if (!empty($images) && isset($images[0]))
                                        <img src="{{ asset('storage/' . $images[0]) }}" alt="Product"
                                            class="product-img mx-auto" style="width: 40px;">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>

                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->sold }}</td>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editProductModal{{ $product->id }}">
                                        <i class='bx bx-edit'></i>
                                    </button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteProductModal{{ $product->id }}">
                                        <i class='bx bx-trash'></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1"
                                aria-labelledby="editProductModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('products.update', $product->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editProductModalLabel">Edit Produk</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <h1 class="fw-bold fs-5 p-3">Informasi Produk</h1>
                                                <div class="form row m-2">
                                                    <div class="col-md-6">
                                                        <label class="fw-bold">Nama Produk:</label>
                                                        <input type="text" name="name" class="form-control"
                                                            style="width: 450px;" value="{{ $product->name }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="fw-bold">Stok Produk:</label>
                                                        <input type="number" name="stock" class="form-control"
                                                            style="width: 350px;" value="{{ $product->stock }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label class="fw-bold">Harga Produk:</label>
                                                        <input type="number" name="price" class="form-control"
                                                            style="width: 450px;" value="{{ $product->price }}"
                                                            required>
                                                    </div>

                                                    <div class="col-md-6 mt-3">
                                                        <label class="fw-bold">Daya Tahan Produk (hari):</label>
                                                        <input type="number" name="shelf_life" class="form-control"
                                                            value="{{ $product->shelf_life }}">
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label class="fw-bold">Berat Produk (gram):</label>
                                                        <input type="number" name="weight" class="form-control"
                                                            value="{{ $product->weight }}">
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label class="fw-bold">Lokasi Produk Dikirim:</label>
                                                        <select name="shipping_address_id" class="form-select">
                                                            <option value="">Pilih Alamat Pengiriman</option>
                                                            @foreach ($addresses as $address)
                                                                <option value="{{ $address->id }}"
                                                                    {{ $product->shipping_address_id == $address->id ? 'selected' : '' }}>
                                                                    {{ $address->full_address }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label class="fw-bold">Izin Edar BPOM:</label>
                                                        <input type="text" name="bpom_license" class="form-control"
                                                            value="{{ $product->bpom_license }}">
                                                    </div>
                                                    <div class="col-md-10 mt-3">
                                                        <label class="fw-bold">Deskripsi:</label>
                                                        <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label class="fw-bold">Komposisi:</label>
                                                        <textarea name="composition" class="form-control" rows="3">{{ $product->composition }}</textarea>
                                                    </div>

                                                    <div class="col-md-6 mt-3">
                                                        <label class="fw-bold">Kategori Produk:</label>
                                                        <div class="relative mt-2">
                                                            <button
                                                                class="w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-md shadow-sm focus:outline-none"
                                                                type="button"
                                                                id="dropdownButton{{ $product->id }}">
                                                                Pilih kategori
                                                            </button>
                                                            <ul id="dropdownMenu{{ $product->id }}"
                                                                class="absolute mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto hidden z-10">
                                                                @foreach (['Minuman', 'Makanan', 'Kesehatan', 'Snack', 'Jus', 'Suplemen', 'Vitamin', 'Herbal', 'Minuman Serat', 'minuman herbal', 'buah kering'] as $kategori)
                                                                    <li class="px-4 py-2 hover:bg-gray-100">
                                                                        <label class="inline-flex items-center">
                                                                            <input type="checkbox"
                                                                                class="form-checkbox h-4 w-4 text-indigo-600"
                                                                                name="category[]"
                                                                                value="{{ $kategori }}">
                                                                            <span class="ml-2">📦
                                                                                {{ ucfirst($kategori) }}</span>
                                                                        </label>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        // Dropdown kategori khusus untuk setiap produk
                                                        const dropdownButton{{ $product->id }} = document.getElementById('dropdownButton{{ $product->id }}');
                                                        const dropdownMenu{{ $product->id }} = document.getElementById('dropdownMenu{{ $product->id }}');

                                                        dropdownButton{{ $product->id }}.addEventListener('click', () => {
                                                            dropdownMenu{{ $product->id }}.classList.toggle('hidden');
                                                        });

                                                        document.addEventListener('click', (event) => {
                                                            if (!dropdownButton{{ $product->id }}.contains(event.target) &&
                                                                !dropdownMenu{{ $product->id }}.contains(event.target)) {
                                                                dropdownMenu{{ $product->id }}.classList.add('hidden');
                                                            }
                                                        });
                                                    </script>


                                                    <input type="hidden" name="images[]"
                                                        value="{{ json_encode($product->images) }}">

                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan
                                                    Perubahan</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <script>
                                // Dropdown kategori untuk edit modal
                                const dropdownButtonEdit = document.getElementById('dropdownButtonEdit');
                                const dropdownMenuEdit = document.getElementById('dropdownMenuEdit');
                                dropdownButtonEdit.addEventListener('click', () => dropdownMenuEdit.classList.toggle('hidden'));
                            </script>

                            <!-- Delete Product Modal -->
                            <div class="modal fade" id="deleteProductModal{{ $product->id }}" tabindex="-1"
                                aria-labelledby="deleteProductModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="deleteProductModalLabel{{ $product->id }}">Hapus
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
</x-app-penjual>
