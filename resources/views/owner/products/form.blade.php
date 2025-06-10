<div class="mb-3">
    <label class="form-label">Nama Produk</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Harga</label>
    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Stok</label>
    <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Gambar</label>
    <input type="file" name="image" class="form-control">
    @if(isset($product) && $product->image)
        <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-2">
    @endif
</div>

<div class="d-grid">
    <button type="submit" class="btn btn-success">{{ $button }}</button>
</div>