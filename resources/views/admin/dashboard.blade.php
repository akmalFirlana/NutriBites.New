<x-app-penjual>
    <!--========== CONTENTS ==========-->
    <main>
        <section class="row">
            <h1 class="fw-bold fs-4 mt-2">Dashboard</h1>
            <div class="vertical-align-container">
                <div class="row">
                    <div class="my-3 col-md-3">
                        <div class="card card-custom">
                            <h1 class="text-muted">Total Pesanan</h1>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="fw-bold fs-3" style="text-align: right;">{{ $totalOrders }}</h2>
                                    <h5 class="text-muted ps-5 ms-4" style="font-size: 14px;">Produk</h5>
                                </div>
                                <div class="card-icon">
                                    <i class='bx bxs-package bx-lg icon-color'></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-3 col-md-3">
                        <div class="card card-custom">
                            <h1 class="text-muted">Dalam Pengiriman</h1>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="fw-bold fs-3" style="text-align: right;">{{ $inShipping }}</h2>
                                    <h5 class="text-muted ps-5 ms-4" style="font-size: 14px;">Produk</h5>
                                </div>
                                <div class="card-icon">
                                    <i class='bx bxs-truck bx-lg icon-color'></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-3 col-md-3">
                        <div class="card card-custom">
                            <h1 class="text-muted">Pesanan Selesai</h1>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="fw-bold fs-3" style="text-align: right;">{{ $completedOrders }}</h2>
                                    <h5 class="text-muted ps-5 ms-4" style="font-size: 14px;">Produk</h5>
                                </div>
                                <div class="card-icon">
                                    <i class='bx bx-list-check bx-lg icon-color'></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-3 col-md-3">
                        <div class="card card-custom">
                            <h1 class="text-muted">Total Pemasukan</h1>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="fw-bold fs-4">Rp. {{ number_format($totalEarnings, 0, ',', '.') }}</h2>
                                    <h5 class="text-muted ps-5 ms-4" style="font-size: 14px;">Rupiah</h5>
                                </div>
                                <div class="card-icon">
                                    <i class='bx bx-wallet-alt bx-lg icon-color'></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container pt-2 pb-4 m-2">
                        <p class="fs-5 fw-bold mx-3">Pendapatan bulan ini</p>
                        <canvas id="salesChart" style="height: 350px; width: 100%;"></canvas>
                    </div>
                    <div class="container mt-2 mx-2 mb-20">
                        <h1 class="fw-bold fs-5 pt-3 mb-3">Pesanan Terakhir</h1>
                        <table class="table table-s align-middle">
                            <thead>
                                <tr class="">
                                    <th>Nama Produk</th>
                                    <th>Lokasi Pengiriman</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentOrders as $order)
                                    <tr class="text-sm">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @php
                                                    $images = json_decode($order->product->images, true);
                                                @endphp

                                                @if (!empty($images) && isset($images[0]))
                                                    <img src="{{ asset('storage/' . $images[0]) }}" alt="Product"
                                                        class="rounded border product-img me-2"
                                                        style="width: 40px; height: 40px">
                                                @else
                                                    <span>No Image</span>
                                                @endif
                                                {{ $order->product->name ?? 'Unknown Product' }}
                                            </div>
                                        </td>
                                        <td>{{ $order->full_address ?? 'No Address' }}</td>
                                        <td>{{ $order->transaction_time->format('d.m.Y') }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>Rp
                                            {{ number_format($order->total_price + ($order->shipping_cost ?? 0), 0, ',', '.') }}
                                        </td>
                                        <td>
                                            <span
                                                class="inline-block px-3 py-1 rounded-md text-xs font-semibold text-white cursor-pointer
                                        {{ strtolower($order->status) === 'completed' ? 'bg-green-500' : '' }}
                                        {{ strtolower($order->status) === 'pending' ? 'bg-yellow-500' : '' }}
                                        {{ strtolower($order->status) === 'confirmed' ? 'bg-blue-500' : '' }}
                                        {{ strtolower($order->status) === 'cancelled' ? 'bg-red-500' : '' }}
                                        {{ strtolower($order->status) === 'shipped' ? 'bg-green-500' : '' }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </section>
    </main>

    <!--========== MAIN JS ==========-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const dataPoints = @json($dataPoints);
        const labels = dataPoints.map(point => new Date(point.x).toLocaleDateString('id-ID'));
        const data = dataPoints.map(point => point.y);
        const config = {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pemasukan (Rp)',
                    data: data,
                    borderColor: '#4285F4',
                    backgroundColor: 'rgba(66, 133, 244, 0.2)',
                    tension: 0.4, // Garis melengkung
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }, // Sembunyikan legenda
                    tooltip: {
                        callbacks: {
                            label: ctx => `Rp ${ctx.raw.toLocaleString('id-ID')}`
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Pemasukan (Rp)'
                        },
                        beginAtZero: true
                    }
                }
            }
        };

        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, config);
    </script>
</x-app-penjual>
