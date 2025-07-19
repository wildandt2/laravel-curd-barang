<?php
use App\Http\Controllers\BarangController;
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::resource('barang', BarangController::class);

Route::get('/', function () {
    return redirect()->route('barang.index');
});

