@extends('layouts.main_penjual')

@section('content')
<!--========== CONTENTS ==========-->
<main>
    <section>
    <h1 class="fw-bold fs-3 mt-2 mb-1">Keamanan</h1>
        <div class="container mt-2 pb-2">
            <h2 class="p-2 fw-bold fs-5">Pengaturan Akun</h2>

            <form class="ms-3">
                <!-- Username -->
                <div class="form-group row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="Username" value="Sara123">
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="********">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti password.</small>
                    </div>
                </div>

                <!-- Pertanyaan Keamanan -->
                <div class="form-group row mb-3">
                    <label for="security-question" class="col-sm-2 col-form-label">Pertanyaan Keamanan</label>
                    <div class="col-sm-10 mt-2">
                        <select class="form-control" id="security-question">
                            <option>Pilih pertanyaan keamanan</option>
                            <option>Nama sekolah pertama Anda?</option>
                            <option>Nama hewan peliharaan pertama?</option>
                            <option>Nama kota tempat lahir?</option>
                        </select>
                    </div>
                </div>

                <!-- Jawaban Keamanan -->
                <div class="form-group row mb-3">
                    <label for="security-answer" class="col-sm-2 col-form-label">Jawaban Keamanan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="security-answer" placeholder="Masukkan jawaban">
                    </div>
                </div>

                <!-- Preferensi Notifikasi -->
                <div class="form-group row mb-3">
                    <label class="col-sm-2 col-form-label">Notifikasi</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="email-notifications" checked>
                            <label class="form-check-label" for="email-notifications">
                                Email
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sms-notifications">
                            <label class="form-check-label" for="sms-notifications">
                                SMS
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="push-notifications">
                            <label class="form-check-label" for="push-notifications">
                                Push Notifications
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Autentikasi Dua Faktor -->
                <div class="form-group row mb-3">
                    <label class="col-sm-2 col-form-label">Autentikasi Dua Faktor</label>
                    <div class="col-sm-10">
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" id="two-factor-auth">
                            <label class="form-check-label" for="two-factor-auth">Aktifkan</label>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</main>