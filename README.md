# Laravel CRUD Barang

Aplikasi CRUD (Create, Read, Update, Delete) sederhana untuk manajemen data barang menggunakan Laravel.

## Fitur

* Menampilkan daftar barang
* Menambah data barang baru
* Mengedit data barang
* Menghapus data barang
* Validasi input form
* Pencarian data barang
* Responsive UI (jika menggunakan Bootstrap atau sejenisnya)

## Tech Stack

* **Laravel** (Versi 8/9/10)
* **PHP** (Minimal 7.4 atau 8.x)
* **MySQL** / MariaDB
* **Bootstrap** (optional, untuk tampilan)
* **Composer**
* **Git**

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/wildandt2/laravel-curd-barang.git
cd laravel-curd-barang
```

### 2. Install Dependency

```bash
composer install
```

### 3. Copy & Edit File .env

```bash
cp .env.example .env
```

Edit `.env` sesuai konfigurasi database kamu, misal:

```
DB_DATABASE=laravel_barang
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key

```bash
php artisan key:generate
```

### 5. Jalankan Migrasi Database

```bash
php artisan migrate
```

### 6. Jalankan Project

```bash
php artisan serve
```

Akses di: [http://localhost:8000](http://localhost:8000)

---

## Struktur Tabel Barang

Contoh migration `barangs`:

```php
Schema::create('barangs', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('kode')->unique();
    $table->integer('stok');
    $table->decimal('harga', 12, 2);
    $table->timestamps();
});
```

---

## Contoh CRUD Controller

```php
// app/Http/Controllers/BarangController.php

public function index() {
    $barangs = Barang::all();
    return view('barangs.index', compact('barangs'));
}

public function create() {
    return view('barangs.create');
}

public function store(Request $request) {
    $request->validate([
        'nama' => 'required',
        'kode' => 'required|unique:barangs,kode',
        'stok' => 'required|integer|min:0',
        'harga' => 'required|numeric|min:0',
    ]);
    Barang::create($request->all());
    return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambah!');
}
```

---

## Kontribusi

1. Fork repository
2. Buat branch baru: `git checkout -b fitur-baru`
3. Commit perubahan: `git commit -am 'Tambah fitur baru'`
4. Push ke branch: `git push origin fitur-baru`
5. Buat Pull Request

---

## Lisensi

Project ini menggunakan lisensi [MIT License](LICENSE).

---

## Author

* [wildandt2](https://github.com/wildandt2)
