<x-app-penjual>
<main>
    <section>
        <div class="container mt-4">
            <h1 class="fw-bold fs-3 m-3 pt-3">Pesan</h1>

            <div class="row">
                <!-- Daftar pesan -->
                <div class="col-md-3">
                    <ul class="list-group" id="message-list">
                        <li class="list-group-item active"
                            data-message="Halo, saya ingin menanyakan tentang produk yang Anda tawarkan..."
                            data-date="Kemarin, 14:20">
                            <div class="fw-bold">John Doe</div>
                            <small>Pesan pertama...</small>
                        </li>
                        <li class="list-group-item" data-message="Terima kasih atas informasi yang telah diberikan..."
                            data-date="Hari ini, 09:30">
                            <div class="fw-bold">John Doe</div>
                            <small>Pesan kedua...</small>
                        </li>
                        <li class="list-group-item" data-message="Apakah produk ini tersedia dalam ukuran lain?"
                            data-date="Kemarin, 16:45">
                            <div class="fw-bold">Jane Doe</div>
                            <small>Pesan pertama...</small>
                        </li>
                        <!-- Tambahkan pesan lainnya -->
                    </ul>
                </div>

                <!-- Konten pesan -->
                <div class="col-md-9 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 id="message-title">John Doe</h5>
                        </div>
                        <div class="card-body">
                            <p id="message-content" class="card-text">Halo, saya ingin menanyakan tentang produk yang
                                Anda tawarkan...</p>
                            <p id="message-date" class="card-text text-muted"><small>Dikirim pada: Kemarin,
                                    14:20</small></p>
                        </div>
                        <div class="card-footer">
                            <form>
                                <div class="mb-3">
                                    <textarea class="form-control" placeholder="Tulis balasan Anda..."
                                        rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>


<script>
    // Event listener untuk mengganti pesan yang ditampilkan
    const messageList = document.querySelectorAll('#message-list .list-group-item');
    const messageTitle = document.getElementById('message-title');
    const messageContent = document.getElementById('message-content');
    const messageDate = document.getElementById('message-date');

    messageList.forEach(item => {
        item.addEventListener('click', function () {
            // Hapus kelas 'active' dari semua item
            messageList.forEach(i => i.classList.remove('active'));
            // Tambah kelas 'active' ke item yang diklik
            this.classList.add('active');
            // Ganti konten pesan
            messageTitle.innerText = this.querySelector('.fw-bold').innerText;
            messageContent.innerText = this.dataset.message;
            messageDate.innerHTML = `<small>Dikirim pada: ${this.dataset.date}</small>`;
        });
    });
</script>
</x-app-penjual>