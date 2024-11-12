<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="addressModalLabel">Daftar Alamat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn w-100 border-success my-3" data-bs-toggle="modal"
                    data-bs-target="#addAddressModal">
                    Tambah Alamat
                </button>
                @foreach ($addresses as $address)
                    <div class="border p-3 mb-3 rounded-lg shadow-sm">
                        <h5 class="font-semibold"><i
                                class='bx bxs-map bx-sm text-success'></i>{{ $address->label ?? 'Alamat' }}
                            {{ $address->is_primary ? 'Utama' : '' }}
                        </h5>
                        <p class="fw-bold">{{ $address->recipient_name }}</p>
                        <p>{{ $address->phone_number }}</p>
                        <p>{{ $address->full_address }}<br>
                            {{ ucwords(strtolower($address->kecamatan->dis_name ?? 'Kecamatan tidak ditemukan')) }},
                            {{ ucwords(strtolower($address->kota->city_name ?? 'Kota tidak ditemukan')) }},
                            {{ ucwords(strtolower($address->provinsi->prov_name ?? 'Provinsi tidak ditemukan')) }}
                    </div>
                @endforeach


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Alamat -->
<div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <h5 class="modal-title font-semibold text-lg" id="addAddressModalLabel">Tambah Alamat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <!-- Body Modal (Multi-Halaman) -->
            <form id="addressForm" action="{{ route('user.addresses.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Step Progress -->
                    <div class="flex justify-around mb-2">
                        <div class="flex items-center space-x-2">
                            <div class="rounded-full w-8 h-8 bg-green-500 text-white flex items-center justify-center">1</div>
                            <span>Informasi Kontak</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="rounded-full w-8 h-8 bg-gray-300 text-gray-700 flex items-center justify-center">2</div>
                            <span>Lokasi</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="rounded-full w-8 h-8 bg-gray-300 text-gray-700 flex items-center justify-center">3</div>
                            <span>Detail Alamat</span>
                        </div>
                    </div>

                    <!-- Halaman 1: Informasi Kontak -->
                    <div id="step-1" class="step">
                        <h6 class="text-center font-bold mb-2">Informasi Kontak</h6>
                        <div class="mb-3">
                            <label for="label" class="form-label">Label</label>
                            <input type="text" class="form-control" id="label" name="label">
                        </div>
                        <div class="mb-3">
                            <label for="recipient_name" class="form-label">Nama Penerima</label>
                            <input type="text" class="form-control" id="recipient_name" name="recipient_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                        </div>
                    </div>

                    <!-- Halaman 2: Lokasi -->
                    <div id="step-2" class="step hidden">
                        <h6 class="text-center font-bold mb-2">Lokasi</h6>
                        <div class="mb-3">
                            <label for="province" class="form-label">Provinsi</label>
                            <select id="province" name="province_id" class="form-select" required>
                                <option value="">Pilih Provinsi</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->prov_id }}">{{ $province->prov_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">Kota/Kabupaten</label>
                            <select id="city" name="city_id" class="form-select" required disabled>
                                <option value="">Pilih Kota/Kabupaten</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="district" class="form-label">Kecamatan</label>
                            <select id="district" name="district_id" class="form-select" required disabled>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                    </div>

                    <!-- Halaman 3: Detail Alamat -->
                    <div id="step-3" class="step hidden">
                        <h6 class="text-center font-bold mb-2">Detail Alamat</h6>
                        <div class="mb-3">
                            <label for="postal_code" class="form-label">Kode Pos</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="full_address" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="full_address" name="full_address" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Footer Modal -->
                <div class="modal-footer justify-between">
                    <button type="button" class="btn btn-secondary" id="prevBtn" onclick="prevStep()">Sebelumnya</button>
                    <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextStep()">Selanjutnya</button>
                    <button type="submit" class="btn btn-success hidden" id="submitBtn">Simpan Alamat</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script untuk Navigasi Antar Step -->
<script>
    let currentStep = 1;

    function showStep(step) {
        document.querySelectorAll('.step').forEach((element, index) => {
            element.classList.add('hidden');
            if (index + 1 === step) {
                element.classList.remove('hidden');
            }
        });

        // Mengatur tombol navigasi
        document.getElementById('prevBtn').style.display = (step === 1) ? 'none' : 'inline-block';
        document.getElementById('nextBtn').style.display = (step === 3) ? 'none' : 'inline-block';
        document.getElementById('submitBtn').style.display = (step === 3) ? 'inline-block' : 'none';
        
        // Mengubah tampilan step progress
        document.querySelectorAll('.modal-body .flex .w-8').forEach((circle, index) => {
            if (index + 1 <= step) {
                circle.classList.add('bg-green-500', 'text-white');
                circle.classList.remove('bg-gray-300', 'text-gray-700');
            } else {
                circle.classList.add('bg-gray-300', 'text-gray-700');
                circle.classList.remove('bg-green-500', 'text-white');
            }
        });
    }

    function nextStep() {
        if (currentStep < 3) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }

    // Tampilkan step pertama saat modal dibuka
    document.addEventListener('DOMContentLoaded', function () {
        showStep(currentStep);
    });
</script>



<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Perubahan pada Provinsi
            document.getElementById('province').addEventListener('change', function () {
                let provinceId = this.value;
                let citySelect = document.getElementById('city');
                let districtSelect = document.getElementById('district');

                citySelect.disabled = true;
                districtSelect.disabled = true;
                districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

                fetch(`/get-cities/${provinceId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        citySelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
                        data.forEach(city => {
                            citySelect.innerHTML += `<option value="${city.city_id}">${city.city_name}</option>`;
                        });
                        citySelect.disabled = false;
                    })
                    .catch(error => {
                        console.error('Error fetching cities:', error);
                    });
            });

            // Perubahan pada Kota
            document.getElementById('city').addEventListener('change', function () {
                let cityId = this.value;
                let districtSelect = document.getElementById('district');

                districtSelect.disabled = true;

                fetch(`/get-districts/${cityId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        data.forEach(district => {
                            districtSelect.innerHTML += `<option value="${district.dis_id}">${district.dis_name}</option>`;
                        });
                        districtSelect.disabled = false;
                    })
                    .catch(error => {
                        console.error('Error fetching districts:', error);
                    });
            });
        });

    </script>