<div class="mb-3">
    <label for="name" class="form-label">Nama Produk</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $product ? $product->name : old('name') }}" required>
</div>

<div class="mb-3">
    <label for="stock" class="form-label">Stok Produk</label>
    <input type="number" class="form-control" name="stock" id="stock" value="{{ $product ? $product->stock : old('stock') }}" required>
</div>

<div class="mb-3">
    <label for="price" class="form-label">Harga Produk</label>
    <input type="text" class="form-control" name="price" id="price" value="{{ $product ? $product->price : old('price') }}" required>
</div>

<div class="mb-3">
    <label for="categories" class="form-label">Kategori Produk</label>
    <input type="text" class="form-control" name="categories" id="categories" value="{{ $product ? $product->categories : old('categories') }}" required>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Deskripsi Produk</label>
    <textarea class="form-control" name="description" id="description">{{ $product ? $product->description : old('description') }}</textarea>
</div>

<div class="mb-3">
    <label for="nutrition_info" class="form-label">Informasi Gizi (opsional)</label>
    <input type="file" class="form-control" name="nutrition_info" id="nutrition_info">
</div>

<div class="mb-3">
    <label for="photos" class="form-label">Foto Produk (maksimal 4)</label>
    <input type="file" class="form-control" name="photos[]" id="photos" multiple>
</div>
