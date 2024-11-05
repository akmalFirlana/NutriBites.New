<x-app-penjual>
    <section>
        <x-address-component />
        <h1 class="fw-bold fs-3 mt-2 mb-3 col-md-8">Lokasi Gudang</h1>
        <div class="container p-3">
            @foreach ($addresses as $address)
                <div class="border p-3 mb-3 rounded-lg shadow-sm">
                    <h5 class="font-semibold"><i class='bx bxs-map bx-sm text-success'></i>{{ $address->label ?? 'Alamat' }}
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

            <button type="button" class="btn border-success fw-bold w-48" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                Tambah Alamat
            </button>
        </div>
    </section>
</x-app-penjual>