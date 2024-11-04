<x-app-penjual>
    <x-address-component />
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAddressModal">
        Tambah Alamat
    </button>
    @foreach ($addresses as $address)
                    <div class="border p-3 mb-3 rounded-lg shadow-sm">
                        <h5 class="font-semibold">{{ $address->label ?? 'Alamat' }} -
                            {{ $address->is_primary ? 'Utama' : '' }}
                        </h5>
                        <p>{{ $address->recipient_name }}</p>
                        <p>{{ $address->full_address }}, {{ $address->alamat->subdis_name ?? 'Subdis tidak ditemukan' }},
                            {{ $address->alamat->city_name ?? 'Kota tidak ditemukan' }}
                        </p>
                        <p>{{ $address->phone_number }}</p>
                    </div>
                @endforeach
</x-app-penjual>