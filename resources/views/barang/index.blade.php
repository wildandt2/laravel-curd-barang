@extends('layout')
@section('title','Data Barang')

@section('content')
<h3 class="mb-3">Data Barang</h3>

<form class="row g-2 mb-3">
  <div class="col-auto">
    <input name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama…">
  </div>
  <div class="col-auto">
    <select name="kategori" class="form-select">
      <option value="">Semua Kategori</option>
      @foreach($kategoris as $kat)
        <option {{ request('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-auto">
    <button class="btn btn-primary">Filter</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Reset</a>
  </div>
  <div class="col text-end">
    <a href="{{ route('barang.create') }}" class="btn btn-success">+ Tambah</a>
  </div>
</form>

<table class="table table-bordered table-hover">
  <thead class="table-light">
    <tr>
      <th>#</th><th>Nama</th><th>Kategori</th><th>Stok</th><th>Harga</th><th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($barangs as $b)
    <tr>
      <td>{{ $loop->iteration + ($barangs->currentPage()-1)*$barangs->perPage() }}</td>
      <td>{{ $b->nama }}</td>
      <td>{{ $b->kategori ?? '-' }}</td>
      <td>{{ $b->stok }}</td>
      <td>Rp{{ number_format($b->harga,0,',','.') }}</td>
      <td>
        <a href="{{ route('barang.edit', $b) }}" class="btn btn-sm btn-warning">Edit</a>
        <form onsubmit="return confirm('Hapus?')" class="d-inline" method="POST" action="{{ route('barang.destroy', $b) }}">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $barangs->links('pagination::bootstrap-5') }}
@endsection
