<x-app-penjual>
<!--========== CONTENTS ==========-->
<main>
    <section class="row">
        <h1 class="fw-bold fs-3 mt-2 mb-3 col-md-8">Kelola Order</h1>
        <div class="container pb-2 mb-3">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Produk</th>
                        <th>Alamat Tujuan</th>
                        <th>Waktu</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->product->name ?? 'Produk tidak ditemukan' }}</td>
                            <td>{{ $transaction->userAddress->alamat ?? 'Alamat tidak ditemukan' }}</td>
                            <td>{{ $transaction->transaction_time?->format('d.m.Y - H:i') }} WIB</td>
                            <td>{{ $transaction->quantity }}</td>
                            <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                            <td>
                                <span class="status-badge status-{{ strtolower($transaction->order_status) }}">
                                    {{ ucfirst($transaction->order_status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>   
    </section>
</main>

<!--========== MAIN JS ==========-->
</x-app-penjual>