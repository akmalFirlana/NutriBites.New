<x-app-penjual>
    <section>
        <h1 class="fw-bold fs-3 mt-2 mb-3">Tambah Produk</h1>
        <div class="container pb-5 mb-3">
            <h1 class="fw-bold fs-5 p-3">Foto Produk</h1>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="row d-flex">
                @csrf
                <div class="container mx-auto p-3">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload hingga 4 foto</label>
                    <div id="image-upload-container" class="grid grid-cols-8 gap-4">
                        <!-- Foto 1 -->
                        <div class="image-upload-wrapper flex flex-col items-center p-2">
                            <label for="image-upload-1" class="image-upload-label relative">
                                <input type="file" name="photos[]" class="image-upload-input hidden" id="image-upload-1"
                                    accept="image/*" />
                                <div
                                    class="upload-placeholder w-24 h-24 border border-dashed border-gray-300 rounded flex justify-center items-center">
                                    <i class='bx bx-plus text-gray-400 text-2xl'></i>
                                </div>
                            </label>
                        </div>
                        <!-- Foto 2 -->
                        <div class="image-upload-wrapper flex flex-col items-center p-2">
                            <label for="image-upload-2" class="image-upload-label relative">
                                <input type="file" name="photos[]" class="image-upload-input hidden" id="image-upload-2"
                                    accept="image/*" />
                                <div
                                    class="upload-placeholder w-24 h-24 border border-dashed border-gray-300 rounded flex justify-center items-center">
                                    <i class='bx bx-plus text-gray-400 text-2xl'></i>
                                </div>
                            </label>
                        </div>
                        <!-- Foto 3 -->
                        <div class="image-upload-wrapper flex flex-col items-center p-2">
                            <label for="image-upload-3" class="image-upload-label relative">
                                <input type="file" name="photos[]" class="image-upload-input hidden" id="image-upload-3"
                                    accept="image/*" />
                                <div
                                    class="upload-placeholder w-24 h-24 border border-dashed border-gray-300 rounded flex justify-center items-center">
                                    <i class='bx bx-plus text-gray-400 text-2xl'></i>
                                </div>
                            </label>
                        </div>
                        <!-- Foto 4 -->
                        <div class="image-upload-wrapper flex flex-col items-center p-2">
                            <label for="image-upload-4" class="image-upload-label relative">
                                <input type="file" name="photos[]" class="image-upload-input hidden" id="image-upload-4"
                                    accept="image/*" />
                                <div
                                    class="upload-placeholder w-24 h-24 border border-dashed border-gray-300 rounded flex justify-center items-center">
                                    <i class='bx bx-plus text-gray-400 text-2xl'></i>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <h1 class="fw-bold fs-5 p-3">informasi Produk</h1>
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
                    <div class="col-md-6 mt-3">
                        <label class="font-bold">Kategori Produk:</label>
                        <div class="relative mt-2">
                            <button
                                class="w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-md shadow-sm focus:outline-none"
                                type="button" id="dropdownButton">
                                Pilih kategori
                            </button>
                            <ul id="dropdownMenu"
                                class="absolute mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto hidden z-10">
                                <li class="px-4 py-2 hover:bg-gray-100">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600"
                                            name="category[]" value="kategori1">
                                        <span class="ml-2">📦 Kategori 1</span>
                                    </label>
                                </li>
                                <li class="px-4 py-2 hover:bg-gray-100">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600"
                                            name="category[]" value="kategori2">
                                        <span class="ml-2">📦 Kategori 2</span>
                                    </label>
                                </li>
                                <li class="px-4 py-2 hover:bg-gray-100">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600"
                                            name="category[]" value="kategori3">
                                        <span class="ml-2">📦 Kategori 3</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
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
                            <label class="text-sm text-gray-400 font-medium leading-none">dapat berupa gambar atau file
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
            </form>

        </div>
        </div>
    </section>
</x-app-penjual>