@extends('layout')
@section('title','Edit Barang')
@section('content')
<h3 class="mb-3">Edit Barang</h3>
<form action="{{ route('barang.update', $barang) }}" method="POST">
  @method('PUT')
  @include('barang._form')
</form>
@endsection
