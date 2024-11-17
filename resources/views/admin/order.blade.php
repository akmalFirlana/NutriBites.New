<x-app-penjual>
    <!--========== CONTENTS ==========-->
    <main>
        <section class="row">
            <h1 class="fw-bold fs-3 mt-2 mb-3 col-md-8">Kelola Order</h1>

            <div class="relative bg-gray-50 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID Transaksi</th>
                            <th scope="col" class="px-6 py-3">Nama Produk</th>
                            <th scope="col" class="px-6 py-3"
                                style="word-wrap: break-word;
                                max-width: 150px;">Alamat
                                Tujuan</th>
                            <th scope="col" class="px-6 py-3">Waktu</th>
                            <th scope="col" class="px-6 py-3">Jumlah</th>
                            <th scope="col" class="px-6 py-3">Total Harga</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $transaction->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $transaction->product->name ?? 'Produk tidak ditemukan' }}
                                </td>
                                <td class="px-6 py-4"
                                    style="word-wrap: break-word;
                                    max-width: 150px;">
                                    {{ $transaction->full_address ?? 'Alamat tidak ditemukan' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $transaction->transaction_time?->format('d.m.Y - H:i') }} WIB
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $transaction->quantity }} Pcs
                                </td>
                                <td class="px-6 py-4 text-center">
                                    Rp
                                    {{ number_format($transaction->total_price + ($transaction->shipping_cost ?? 0), 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-block px-3 py-1 rounded-full text-xs font-semibold text-white cursor-pointer
                                        {{ strtolower($transaction->status) === 'completed' ? 'bg-green-500' : '' }}
                                        {{ strtolower($transaction->status) === 'pending' ? 'bg-yellow-500' : '' }}
                                        {{ strtolower($transaction->status) === 'confirmed' ? 'bg-blue-500' : '' }}
                                        {{ strtolower($transaction->status) === 'cancelled' ? 'bg-red-500' : '' }}
                                        {{ strtolower($transaction->status) === 'shipped' ? 'bg-green-500' : '' }}"
                                        onclick="openModal({{ $transaction->id }}, '{{ $transaction->status }}')"
                                        data-bs-toggle="modal" data-bs-target="#orderModal">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Konfirmasi Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="orderForm" method="POST">
                        @csrf
                        <div id="modalContent" class="mb-3">
                            <!-- Konten modal akan diisi dengan JavaScript -->
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--========== MAIN JS ==========-->
    <script>
        function openModal(transactionId, status) {
            const modal = document.getElementById('orderModal');
            const modalContent = document.getElementById('modalContent');
            const orderForm = document.getElementById('orderForm');

            modalContent.innerHTML = ''; // Kosongkan isi modal sebelumnya

            if (status === 'pending') {
                modalContent.innerHTML = `
                    <p>Apakah Anda ingin mengkonfirmasi pesanan ini?</p>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="status" value="confirmed">
                `;
                orderForm.action = `/transactions/${transactionId}/confirm`;
            } else if (status === 'confirmed') {
                modalContent.innerHTML = `
                    <p>Masukkan nomor resi untuk mengkonfirmasi pengiriman:</p>
                    <input type="text" name="resi" class="border p-2 w-full rounded" placeholder="Nomor Resi" required>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="status" value="shipped">

                `;
                orderForm.action = `/transactions/${transactionId}/ship`;
            } else if (status === 'shipped') {
                modalContent.innerHTML = `
                    <p>Kamu harus menunggu konfirmasi dari pembeli bahwa pesanan telah diterima oleh pembeli. Apakah kamu yakin pesanan ini telah diterima?</p>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="status" value="completed">
                `;
                orderForm.action = `/transactions/${transactionId}/complete`;
            }

            if (status === 'pending') {
                modalContent.innerHTML += `
                    <p class="text-red-500 mt-4">Atau, batalkan pesanan ini?</p>
                    <button type="button" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700"
                        onclick="cancelTransaction(${transactionId})">Batalkan Pesanan</button>
                `;
            }

            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('orderModal');
            modal.classList.add('hidden');
        }

        async function cancelTransaction(transactionId) {
            try {
                const response = await fetch(`/transactions/${transactionId}/cancel`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                });

                if (response.ok) {
                    alert('Pesanan berhasil dibatalkan.');
                    location.reload();
                } else {
                    alert('Gagal membatalkan pesanan.');
                }
            } catch (error) {
                console.error(error);
            }
        }
    </script>

</x-app-penjual>
