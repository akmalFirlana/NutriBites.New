@extends('layouts.main_penjual')

@section('content')

<main>
    <section>
        <h1 class="fw-bold fs-3 mt-2 mb-1">Profil</h1>
        <div class="container pb-2 mb-3 row">
            <h2 class="fw-bold fs-3 ms-2 pt-3 mb-3">Informasi Toko</h2>
            <div class="profile-image-upload col-md-3 text-center">
                <label for="profile-pic-input" class="profile-pic-label">
                    <img src="{{ asset('image/dummi.jpg') }}" alt="Profile Picture" class="unique-profile-pic mx-auto"
                        id="profile-pic-display">
                </label>
                <input type="file" id="profile-pic-input" class="d-none unique-profile-input" accept="image/*">
            </div>

            <div class="profile-info col-md-5">
                <div class="form-group" style="margin-bottom: 0!important">
                    <label for="nama" class="info-title">Nama Toko</label>
                    <input type="name" id="name" class="form-control" value="Toko Mekarsari">
                    <span class="edit-icon text-muted"><i class='bx bxs-pencil'></i></span>
                </div>
                <p class="text-muted" style="font-size: 12px">Member since: January 2022</p>
                
                <div class="form-group mt-3">
                    <label for="Deskripsi" class="info-title">Deskripsi Toko</label>
                    <textarea type="text" id="Deskripsi" class="form-control"
                    rows="4"> Lorem ipsum dolor sit amet,consectetur adipiscing elit. Sed commodo egestas sem, id facilisis</textarea>
                    <span class="edit-icon text-muted"><i class='bx bxs-pencil'></i></span>
                </div>
            </div>


            <div class="contact-info mt-4 mb-3 row">
                <h1 class="fw-bold fs-4 mt-2 mb-1 d-flex">Informasi tambahan</h1>
                
                <div class="form-group col-md-5">
                    <label for="email" class="info-title">Email Toko</label>
                    <input type="email" id="email" class="form-control" value="johndoe@example.com">
                    <span class="edit-icon text-muted"><i class='bx bxs-pencil'></i></span>
                </div>

                <div class="form-group col-md-5">
                    <label for="phone" class="info-title">Nomor Telepon Toko</label>
                    <input type="tel" id="phone" class="form-control" value="+62 8123 456 7890">
                    <span class="edit-icon text-muted"><i class='bx bxs-pencil'></i></span>
                </div>

                <div class="form-group col-md-10">
                    <label for="address" class="info-title">Alamat Toko </label>
                    <textarea type="text" id="address" class="form-control" value="">123 Main Street, Springfield, USA</textarea>
                    <span class="edit-icon text-muted"><i class='bx bxs-pencil'></i></span>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    document.getElementById('profile-pic-input').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('profile-pic-display').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>