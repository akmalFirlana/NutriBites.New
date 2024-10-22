<x-app-layout>
  <section class="bg-light my-5">
    <div class="container header">
      <div class="row">
        <!-- cart -->
        <div class="col-lg-9">
          <div class="card border shadow-0">
            <div class="m-4">
              <h4 class="card-title mb-4">Keranjang Kamu</h4>
              <div class="row gy-3 mb-4">
                <div class="col-lg-5">
                  <div class="me-lg-5">
                    <div class="d-flex">
                      <img src="{{ asset('image/dummi2.webp') }}" class="border rounded me-3"
                        style="width: 96px; height: 96px;" />
                      <div class="">
                        <a href="#" class="nav-link">Kripik Nangka Original</a>
                        <p class="text-muted fs-5">Varian: Original</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                  <div class="">
                    <select style="width: 100px;" class="form-select me-4">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>
                  <div class="">
                    <text class="h6">Rp 45.000</text> <br />
                    <small class="text-muted text-nowrap"> Rp 15.000 / per item </small>
                  </div>
                </div>
                <div
                  class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                  <div class="float-md-end">
                    <a href="#!" class="btn btn-light border p-0 icon-hover-primary"><i
                        class="bx bxs-heart bx-sm p-1 text-danger"></i></a>
                    <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                  </div>
                </div>
              </div>

              <div class="row gy-3 mb-4">
                <div class="col-lg-5">
                  <div class="me-lg-5">
                    <div class="d-flex">
                      <img src="{{ asset('image/dummi2.webp') }}" class="border rounded me-3"
                        style="width: 96px; height: 96px;" />
                      <div class="">
                        <a href="#" class="nav-link">Kacang Pede</a>
                        <p class="text-muted">Varian: Pedas Manis</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                  <div class="">
                    <select style="width: 100px;" class="form-select me-4">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>
                  <div class="">
                    <text class="h6">Rp 32.000</text> <br />
                    <small class="text-muted fs-5"> Rp 20.000 / per item </small>
                  </div>
                </div>
                <div
                  class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                  <div class="float-md-end">
                    <a href="#!" class="btn btn-light border p-0 icon-hover-primary"><i
                        class="bx bx-heart bx-sm p-1  text-danger"></i></a>
                    <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                  </div>
                </div>
              </div>

              <div class="row gy-3">
                <div class="col-lg-5">
                  <div class="me-lg-5">
                    <div class="d-flex">
                      <img src="{{ asset('image/dummi2.webp') }}" class="border rounded me-3"
                        style="width: 96px; height: 96px;" />
                      <div class="">
                        <a href="#" class="nav-link">Bumbu Dry Rub</a>
                        <p class="text-muted fs-5">Varian: Original</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                  <div class="">
                    <select style="width: 100px;" class="form-select me-4">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>
                  <div class="">
                    <text class="h6">Rp 50.000</text> <br />
                    <small class="text-muted text-nowrap"> Rp 50.000 / per item </small>
                  </div>
                </div>
                <div
                  class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                  <div class="float-md-end">
                    <a href="#!" class="btn btn-light border p-0 icon-hover-primary"><i
                        class="bx bx-heart bx-sm p-1 text-danger"></i></a>
                    <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                  </div>
                </div>
              </div>
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
        <div class="col-lg-3">
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
  <section>
    <div class="container my-5">
      <header class="mb-4">
        <h3 class="fw-bold">Rekomendasi Untuk Kamu</h3>
      </header>

      <div class="row justify-content-between" style="margin: 0 7rem">
        <div class="col-sm-3 procard">
          <div class="card shadow">
            <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
            <div class="card-footer border-top border-gray-300 p-4">
              <a href="#" class="h5">Kripik Nangka</a>
              <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
              <div class="d-flex mt-3">
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                <span class="badge bg-success ms-2">4.7</span>
              </div>
              <div class="d-flex mt-3">
                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3 procard">
          <div class="card shadow">
            <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
            <div class="card-footer border-top border-gray-300 p-4">
              <a href="#" class="h5">Kripik Nangka</a>
              <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
              <div class="d-flex mt-3">
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                <span class="badge bg-success ms-2">4.7</span>
              </div>
              <div class="d-flex mt-3">
                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3 procard">
          <div class="card shadow">
            <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
            <div class="card-footer border-top border-gray-300 p-4">
              <a href="#" class="h5">Kripik Nangka</a>
              <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
              <div class="d-flex mt-3">
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                <span class="badge bg-success ms-2">4.7</span>
              </div>
              <div class="d-flex mt-3">
                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3 procard">
          <div class="card shadow">
            <img src="{{ asset('image/dummi2.webp') }}" alt="black watch">
            <div class="card-footer border-top border-gray-300 p-4">
              <a href="#" class="h5">Kripik Nangka</a>
              <h3 class="h6 fw-light text-gray mt-2">Kripik yang terbuat dari buah nangka pilihan</h3>
              <div class="d-flex mt-3">
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star' style='color:#d0e12b'></i>
                <i class='bx bxs-star-half' style='color:#d0e12b'></i>
                <span class="badge bg-success ms-2">4.7</span>
              </div>
              <div class="d-flex mt-3">
                <span class=" mb-0 text-gray me-2 fs-5">Rp 20.000</span>
                <span class="text-decoration-line-through fs-6" style="color:gray">Rp 25.000</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    </div>
  </section>
</x-app-layout>