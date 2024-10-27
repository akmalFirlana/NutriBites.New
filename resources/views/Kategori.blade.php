<x-app-layout>
    <section class="row header">
        <div class="cont ms-5 col-md-3 col-lg-2">
            <h1 class="fw-bold fs-3 mb-3  pt-24">Filter</h1>
            <div class="border bg-white shadow-sm px-4 py-4 rounded-lg">
                <!-- Dropdown Kategori -->
                <div class="mb-5">
                    <h5 class="font-semibold text-gray-700 mb-3">Kategori</h5>
                    <ul class="list-none">
                        <li class="mb-2">
                            <button class="flex justify-between w-full text-left text-gray-700"
                                onclick="toggleDropdown('makanan')">
                                Makanan
                                <span class="text-gray-400"><i class='bx bx-chevron-down'></i></span>
                            </button>
                            <div id="makanan" class="hidden mt-2 ml-4">
                                <ul class="space-y-1">
                                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Buah Kering</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-2">
                            <button class="flex justify-between w-full text-left text-gray-700"
                                onclick="toggleDropdown('minuman')">
                                Minuman
                                <span class="text-gray-400"><i class='bx bx-chevron-down'></i></span>
                            </button>
                            <div id="minuman" class="hidden mt-2 ml-4">
                                <ul class="space-y-1">
                                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Jus Buah</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- Tambahkan kategori lain di sini -->
                    </ul>
                </div>

                <!-- Filter Lokasi -->
                <div class="mb-5">
                    <h5 class="font-semibold text-gray-700 mb-3">Lokasi</h5>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox text-green-500">
                            <span class="ml-2 text-gray-600">DKI Jakarta</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox text-green-500">
                            <span class="ml-2 text-gray-600">Jabodetabek</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox text-green-500">
                            <span class="ml-2 text-gray-600">Bandung</span>
                        </label>
                    </div>
                </div>

                <!-- Filter Harga -->
                <div>
                    <h5 class="font-semibold text-gray-700 mb-3">Harga</h5>
                    <div class="mb-4">
                        <label for="harga-minimum" class="block text-sm text-gray-600 mb-1">Harga Minimum</label>
                        <div class="flex">
                            <span class="px-3 py-2 bg-gray-100 border rounded-l-md">Rp</span>
                            <input type="number" id="harga-minimum" class="w-full border rounded-r-md px-3 py-2"
                                placeholder="Minimum">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="harga-maksimum" class="block text-sm text-gray-600 mb-1">Harga Maksimum</label>
                        <div class="flex">
                            <span class="px-3 py-2 bg-gray-100 border rounded-l-md">Rp</span>
                            <input type="number" id="harga-maksimum" class="w-full border rounded-r-md px-3 py-2"
                                placeholder="Maksimum">
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="bg-green-500 text-white rounded-full px-6 py-2 font-semibold">Terapkan</button>
                    </div>
                </div>
            </div>

            <script>
                function toggleDropdown(id) {
                    const dropdown = document.getElementById(id);
                    dropdown.classList.toggle("hidden");
                }
            </script>


        </div>
        <div class="content col-md-9">
            <div class="hook">
                <h1 class="fw-bold fs-3 mb-5 pt-24">Produk</h1>
            </div>

            <div class="pro">
                <div class="row justify-content-between" style="margin: 0 7rem">

                </div>
            </div>
        </div>
    </section>

</x-app-layout>