<x-app-layout>
  <section class="bg-light my-5 mt-36">
    <div class="container header">
      <div class="row">
        <!-- cart -->
        <div class="col-lg-9">
          <div class="card border shadow-0 mt-5">
            <div class="m-4">
              <h4 class="card-title mb-4">Keranjang Kamu</h4>
              @if($cartItems->isEmpty())
          <p>Keranjang Anda kosong.</p>
        @else
        @foreach($cartItems as $item)
      <div class="row gy-3 mb-4">
      <div class="col-lg-5">
        <div class="me-lg-5">
        <div class="d-flex">
        <img src="{{ asset('storage/' . $item->product->image_1) }}" class="border rounded me-3"
        style="width: 96px; height: 96px;" />
        <div class="">
        <a href="#" class="nav-link">{{ $item->product->name }}</a>
        <p class="text-muted fs-5">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
        </div>
        </div>
        </div>
      </div>
      <div class="col-lg-2 col-sm-6 col-6">
        <select class="form-select me-4">
        <option>{{ $item->quantity }}</option>
        <!-- Bisa ditambah opsi lain jika ingin -->
        </select>
      </div>
      <div class="col-lg col-sm-6 d-flex justify-content-end mb-2">
        <a href="#" class="btn btn-light border text-danger icon-hover-danger"
        onclick="removeFromCart({{ $item->id }})"> Remove</a>
      </div>
      </div>
    @endforeach
      @endif

            </div>

            <div class="border-top pt-4 mx-4 mb-4">
              <p><i class="fas fa-truck text-muted fa-lg"></i> Gratis Ongkir Setiap Pembelian diatas Rp 500.000</p>
              <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip
              </p>
            </div>
          </div>
        </div>
        <!-- cart -->
        <!-- summary -->
        <div class="col-lg-3 mt-5">
          <div class="card mb-3 border shadow-0">
            <div class="card-body">
              <form>
                <div class="form-group">
                  <label class="form-label">Punya kupon?</label>
                  <div class="input-group">
                    <input type="text" class="form-control border" name="" placeholder="Coupon code" />
                    <button class="btn btn-light border">Terapkan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card shadow-0 border">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <p class="mb-2">Total Harga:</p>
                <p class="mb-2">Rp 329.000</p>
              </div>
              <div class="d-flex justify-content-between">
                <p class="mb-2">Diskon:</p>
                <p class="mb-2 text-success">-Rp 60.000</p>
              </div>
              <div class="d-flex justify-content-between">
                <p class="mb-2">Pajak:</p>
                <p class="mb-2">Rp 14.000</p>
              </div>
              <hr />
              <div class="d-flex justify-content-between">
                <p class="mb-2">Total Harga:</p>
                <p class="mb-2 fw-bold">Rp 283.000</p>
              </div>

              <div class="mt-3">
                <a href="#" class="btn btn-success w-100 shadow-0 mb-2"> Beli Sekarang </a>
                <a href="#" class="btn btn-light w-100 border mt-2"> Kembali ke toko </a>
              </div>
            </div>
          </div>
        </div>
        <!-- summary -->
      </div>
    </div>
  </section>
  <!-- cart + summary -->

</x-app-layout>