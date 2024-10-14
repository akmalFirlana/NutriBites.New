@extends('layouts.main_penjual')

@section('content')
<!--========== CONTENTS ==========-->
<main>
    <section class="row">
        <h1 class="fw-bold fs-3 mt-2 mb-3 col-md-8">Kelola Produk</h1>
        <div class="header__search col-md-2 m-2">
            <input type="search" placeholder="Cari Produk" class="header__input">
            <i class='bx bx-search header__icon mt-1'></i>
        </div>
        <div class="container pb-5 mb-3">
            <table class="table align-middle">
                <thead>
                    <tr class="">
                        <th class="text-center">Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://via.placeholder.com/40" alt="Product" class="product-img mx-auto"></td>
                        <td>
                            <div class="d-flex align-items-center">Apple Watch </div>
                        </td>
                        <td>6096 Marjolaine Landing</td>
                        <td>12.09.2019 - 12.53 PM</td>
                        <td>423</td>
                        <td>$34,295</td>
                        <td><button class="action-button1"><i class='bx bx-edit action-icon' style='color:#988282'></i></button><button class="action-button2"><i class='bx bx-trash action-icon' style='color:#f50b21' ></i></button></td>
                    </tr>
                    <tr>
                        <td><img src="https://via.placeholder.com/40" alt="Product" class="product-img mx-auto"></td>
                        <td>
                            <div class="d-flex align-items-center">Apple Watch </div>
                        </td>
                        <td>6096 Marjolaine Landing</td>
                        <td>12.09.2019 - 12.53 PM</td>
                        <td>423</td>
                        <td>$34,295</td>
                        <td><button class="action-button1"><i class='bx bx-edit action-icon' style='color:#988282'></i></button><button class="action-button2"><i class='bx bx-trash action-icon' style='color:#f50b21' ></i></button></td>
                    </tr>
                    <tr>
                        <td><img src="https://via.placeholder.com/40" alt="Product" class="product-img mx-auto"></td>
                        <td>
                            <div class="d-flex align-items-center">Apple Watch </div>
                        </td>
                        <td>6096 Marjolaine Landing</td>
                        <td>12.09.2019 - 12.53 PM</td>
                        <td>423</td>
                        <td>$34,295</td>
                        <td><button class="action-button1"><i class='bx bx-edit action-icon' style='color:#988282'></i></button><button class="action-button2"><i class='bx bx-trash action-icon' style='color:#f50b21' ></i></button></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </section>
</main>

<!--========== MAIN JS ==========-->