<x-app-penjual>
    <section>
        <x-address-component />
        <h1 class="fw-bold fs-3 mt-2 mb-3">Tambah Produk</h1>
        <div class="container pb-5 mb-3">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h1 class="fw-bold fs-5 p-3">Foto Produk</h1>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="row d-flex">
                @csrf
                <div class="container mx-auto p-3">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload hingga 4 foto</label>
                    <div id="image-upload-container" class="grid grid-cols-8 gap-4">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="image-upload-wrapper flex flex-col items-center p-2">
                                <label for="image-upload-{{ $i }}" class="image-upload-label relative">
                                    <input type="file" name="photos[]" class="image-upload-input hidden"
                                        id="image-upload-{{ $i }}" accept="image/*" />
                                    <div
                                        class="upload-placeholder w-24 h-24 border border-dashed border-gray-300 rounded flex justify-center items-center">
                                        <i class='bx bx-plus text-gray-400 text-2xl'></i>
                                    </div>
                                </label>
                            </div>
                        @endfor
                    </div>
                </div>

                <h1 class="fw-bold fs-5 p-3">Informasi Produk</h1>
                <div class="form row m-2">
                    <div class="col-md-6">
                        <label class="fw-bold">Nama Produk:</label>
                        <input type="text" name="name" class="form-control" style="width: 450px;"
                            placeholder="Masukkan Nama Produk">
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold">Stok Produk:</label>
                        <input type="number" name="stock" class="form-control" style="width: 350px;"
                            placeholder="Masukkan Jumlah Produk">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="fw-bold">Harga Produk</label>
                        <input type="number" name="price" class="form-control" style="width: 450px;"
                            placeholder="Rp 3xxxxx">
                    </div>
                    <input type="hidden" name="sold" value="0">
                    <div class="col-md-6 mt-3">
                        <label class="fw-bold">Kategori Produk:</label>
                        <div class="relative mt-2">
                            <button
                                class="w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-md shadow-sm focus:outline-none"
                                type="button" id="dropdownButton">
                                Pilih kategori
                            </button>
                            <ul id="dropdownMenu"
                                class="absolute mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto hidden z-10">
                                @foreach(['kategori1', 'kategori2', 'kategori3'] as $kategori)
                                    <li class="px-4 py-2 hover:bg-gray-100">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600"
                                                name="category[]" value="{{ $kategori }}">
                                            <span class="ml-2">📦 {{ ucfirst($kategori) }}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="fw-bold">Daya Tahan Produk (hari):</label>
                        <input type="number" name="shelf_life" class="form-control"
                            placeholder="Masukkan daya tahan produk dalam hari">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="fw-bold">Berat Produk (gram):</label>
                        <input type="number" name="weight" class="form-control"
                            placeholder="Masukkan berat produk dalam gram">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="fw-bold">Lokasi Produk Dikirim:</label>
                        <select name="shipping_address_id" class="form-select">
                            <option value="">Pilih Alamat Pengiriman</option>
                            @foreach($addresses as $address)
                                <option value="{{ $address->id }}">{{ $address->full_address }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="fw-bold">Izin Edar BPOM:</label>
                        <input type="text" name="bpom_license" class="form-control"
                            placeholder="Masukkan nomor izin BPOM">
                    </div>

                    <script>
                        const dropdownButton = document.getElementById('dropdownButton');
                        const dropdownMenu = document.getElementById('dropdownMenu');

                        dropdownButton.addEventListener('click', () => {
                            dropdownMenu.classList.toggle('hidden');
                        });

                        document.addEventListener('click', (event) => {
                            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                                dropdownMenu.classList.add('hidden');
                            }
                        });
                    </script>

                    <div class="col-md-10 mt-3">
                        <label class="fw-bold">Deskripsi:</label>
                        <textarea name="description" class="form-control" rows="3"
                            placeholder="Deskripsikan produkmu"></textarea>
                    </div>
                    <div class="col-md-5 mt-3">
                        <label class="fw-bold">Informasi Gizi:</label>
                        <div class="grid w-full max-w-xs items-center gap-1.5">
                            <label class="text-sm text-gray-400 font-medium leading-none">Dapat berupa gambar atau file
                                excel</label>
                            <button class="container-btn-file mt-2">
                                <i class='bx bxs-file-plus me-2'></i> Upload File
                                <input type="file" name="nutrition_info" />
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <button type="submit" class="btn btn-primary mt-3 ms-5" style="width: 200px;">
                            <i class='bx bxs-cloud-upload me-2'></i>Upload
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-penjual>