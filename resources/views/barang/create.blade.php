@extends('layout')
@section('title','Tambah Barang')
@section('content')
<h3 class="mb-3">Tambah Barang</h3>
<form action="{{ route('barang.store') }}" method="POST">@include('barang._form')</form>
@endsection
