@csrf
<div class="mb-3">
  <label class="form-label">Nama</label>
  <input name="nama" value="{{ old('nama', $barang->nama ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
  <label class="form-label">Kategori</label>
  <input name="kategori" value="{{ old('kategori', $barang->kategori ?? '') }}" class="form-control">
</div>
<div class="mb-3">
  <label class="form-label">Stok</label>
  <input type="number" name="stok" value="{{ old('stok', $barang->stok ?? 0) }}" class="form-control" required>
</div>
<div class="mb-3">
  <label class="form-label">Harga</label>
  <input type="number" step="0.01" name="harga" value="{{ old('harga', $barang->harga ?? 0) }}" class="form-control" required>
</div>
<button class="btn btn-primary">Simpan</button>
<a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
