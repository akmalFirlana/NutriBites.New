<x-app-layout>
    <div class="container mx-auto p-4">
        <h2 class="text-xl font-semibold mb-4">Daftar Alamat</h2>

        <!-- Pesan sukses jika ada -->
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Daftar Alamat -->
        <a href="#" data-bs-toggle="modal" data-bs-target="#addressModal" class="btn btn-primary mb-4">Tambah Alamat
            Baru</a>
        @foreach ($addresses as $address)
            <div class="border p-3 mb-3 rounded-lg shadow-sm">
                <h5 class="font-semibold">{{ $address->label ?? 'Alamat' }} - {{ $address->is_primary ? 'Utama' : '' }}</h5>
                <p>{{ $address->recipient_name }}</p>
                <p>
                    {{ $address->full_address }},
                    {{ $address->alamat->subdis_name ?? 'Subdis tidak ditemukan' }},
                    {{ $address->alamat->city_name ?? 'Kota tidak ditemukan' }}
                </p>
                <p>{{ $address->phone_number }}</p>
            </div>
        @endforeach


    </div>

    <!-- Modal Tambah Alamat -->
    <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addressModalLabel">Tambah Alamat Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addressForm" action="{{ route('user.addresses.store') }}" method="POST">
                        @csrf
                        <!-- Provinsi -->
                        <div class="mb-3">
                            <label for="province" class="form-label">Provinsi</label>
                            <select id="province" name="province_id" class="form-select" required>
                                <option value="">Pilih Provinsi</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->prov_id }}">{{ $province->prov_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Kota/Kabupaten -->
                        <div class="mb-3">
                            <label for="city" class="form-label">Kota/Kabupaten</label>
                            <select id="city" name="city_id" class="form-select" required disabled>
                                <option value="">Pilih Kota/Kabupaten</option>
                            </select>
                        </div>

                        <!-- Kecamatan -->
                        <div class="mb-3">
                            <label for="district" class="form-label">Kecamatan</label>
                            <select id="district" name="district_id" class="form-select" required disabled>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>

                        <!-- Field Lainnya -->
                        <div class="mb-3">
                            <label for="label" class="form-label">Label</label>
                            <input type="text" class="form-control" id="label" name="label">
                        </div>
                        <div class="mb-3">
                            <label for="postal_code" class="form-label">Kode Pos</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                        </div>

                        <div class="mb-3">
                            <label for="recipient_name" class="form-label">Nama Penerima</label>
                            <input type="text" class="form-control" id="recipient_name" name="recipient_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="full_address" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="full_address" name="full_address" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan Alamat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
</x-app-layout>