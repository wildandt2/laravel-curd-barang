<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $r)
    {
        $barangs = Barang::query()
            ->when($r->search, fn($q, $s) => $q->where('nama', 'like', "%$s%"))
            ->when($r->kategori, fn($q, $k) => $q->where('kategori', $k))
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        $kategoris = Barang::select('kategori')->distinct()->pluck('kategori');
        return view('barang.index', compact('barangs', 'kategoris'));
    }

    public function create() { return view('barang.create'); }

    public function store(Request $r)
    {
        $r->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0'
        ]);

        Barang::create($r->all());
        return redirect()->route('barang.index')->with('ok', 'Barang ditambah!');
    }

    public function edit(Barang $barang) { return view('barang.edit', compact('barang')); }

    public function update(Request $r, Barang $barang)
    {
        $r->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0'
        ]);

        $barang->update($r->all());
        return back()->with('ok', 'Barang di-update!');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return back()->with('ok', 'Barang dihapus!');
    }
}
