<x-app-penjual>
<!--========== CONTENTS ==========-->
<main>
    <section class="row">
        <h1 class="fw-bold fs-3 mt-2 mb-3 col-md-8">Kelola Order</h1>
        <!---
        <div class="col-md-3 row">

            <h1 style="margin-top: 0.5rem;"><i class='bx bx-filter-alt fw-bold bx-sm'></i>Filter Berdasarkan:</h1>
            <div class="select" style="position: absolute; margin-top: 0.5rem; margin-left: 11rem">
                <div class="selected" data-default="All" data-one="option-1" data-two="option-2" data-three="option-3">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" class="arrow">
                        <path
                            d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z">
                        </path>
                    </svg>
                </div>
                <div class="options">
                    <div title="all">
                        <input id="all" name="option" type="radio" checked="" />
                        <label class="option" for="all" data-txt="All"></label>
                    </div>
                    <div title="option-1">
                        <input id="option-1" name="option" type="radio" />
                        <label class="option" for="option-1" data-txt="option-1"></label>
                    </div>
                    <div title="option-2">
                        <input id="option-2" name="option" type="radio" />
                        <label class="option" for="option-2" data-txt="option-2"></label>
                    </div>
                    <div title="option-3">
                        <input id="option-3" name="option" type="radio" />
                        <label class="option" for="option-3" data-txt="option-3"></label>
                    </div>
                </div>
            </div>
        </div>-->

        <div class="container pb-2 mb-3">
            <table class="table align-middle">
                <thead>
                    <tr class="">
                        <th >ID_Transaksi</th>
                        <th>Nama Produk</th>
                        <th>Alamat Tujuan</th>
                        <th>Waktu</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0001</td>
                        <td>
                            <div class="d-flex align-items-center">Kacang Almond </div>
                        </td>
                        <td>Malang, jawa Timur</td>
                        <td>12.09.2019 - 12.53 WIB</td>
                        <td>4</td>
                        <td>Rp 34,295</td>
                        <td><span class="status-badge status-delivered">Terkirim</span></td>
                    </tr>
                    <tr>
                        <td>0011</td>
                        <td>
                            <div class="d-flex align-items-center">Kacang Almond </div>
                        </td>
                        <td>Malang, jawa Timur</td>
                        <td>12.09.2019 - 12.53 WIB</td>
                        <td>4</td>
                        <td>Rp 34,295</td>
                        <td><span class="status-badge status-pending">Mengirim</span></td>
                    </tr>
                    <tr>
                        <td>0021</td>
                        <td>
                            <div class="d-flex align-items-center">Kacang Almond </div>
                        </td>
                        <td>Malang, jawa Timur</td>
                        <td>12.09.2019 - 12.53 WIB</td>
                        <td>4</td>
                        <td>Rp 34,295</td>
                        <td><span class="status-badge status-rejected">Dibatalkan</span></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </section>
</main>

<!--========== MAIN JS ==========-->
</x-app-penjual>